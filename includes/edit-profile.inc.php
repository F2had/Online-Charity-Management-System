<?php
session_start();
require 'config.inc.php';
$allowedext = array(
    'gif',
    'png',
    'jpg',
    'jpeg'
);

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $pass = mysqli_real_escape_string($db, $_POST['cpass']);

    $valid_password = check_password($pass, $db);

    if (!$valid_password == 1) {
        $data['password'] = false;
    } else {
        $data['password'] = true;
    }

$data['newImg'] = false;



    if (isset($_POST["reset"])) {

        if($data['password']){
                    
        if (isset($_POST['pass1']) && isset($_POST['pass2'])) {
            if ($_POST['pass1'] == $_POST['pass2']) {
                $pass1 = password_hash(mysqli_real_escape_string($db, $_POST['pass1']), PASSWORD_BCRYPT);

                $data['password_match'] = true;

                if ($data['password']) {

                    $seccuss_pass = change_password($pass1, $db);
                    $data['password_changed'] = $seccuss_pass;
                } else {
                    $data['password_changed'] = false;
                }
            } else {

                $data['password_match'] = false;
            }
        } else {
            $data['missing_input'] = false;
        }
        }
    }

    if (isset($_POST["delete"])) {


        if ($data['password']) {
            $deleted = delete_account($db);
        } else {
            $deleted = false;
        }

        if ($deleted) {
            $data['deleted'] = true;
        } else {
            $data['deleted'] = false;
        }
    }

    if (isset($_POST['update'])) {

        if ($data['password']) {
            if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['phone']) && isset($_POST['occupation'])) {

                $name = mysqli_real_escape_string($db, $_POST['name']);
                $email = mysqli_real_escape_string($db, $_POST['email']);
                $phone = mysqli_real_escape_string($db, $_POST['phone']);
                $occupation = mysqli_real_escape_string($db, $_POST['occupation']);

                if (is_uploaded_file($_FILES['img']['tmp_name'])) {
                    $img = $_FILES['img']['name'];
                    $ext = pathinfo($img, PATHINFO_EXTENSION);

                    if (!in_array($ext, $allowedext)) {
                        $data['valid_ext'] = false;
                    } else {
                        $data['valid_ext'] = true;
                    }

                    $imgsize = $_FILES['img']['size'];
                    if ($imgsize > 2000000) {
                        $data['valid_size'] = false;
                    } else {
                        $data['valid_size'] = true;
                    }

                    if ($data['valid_size'] &&  $data['valid_ext']) {
                        $data['valid_img'] = true;
                        $imgData = file_get_contents($_FILES['img']['tmp_name']);
                        $imgBase64 = "data:image/" . $ext . ";base64," . base64_encode($imgData);
                    } else {
                        $data['valid_img'] = false;
                    }

                    $data['newImg'] = true;
                } 
                // To check if all the info not changed 
                if ($name == $_SESSION['name'] && $email == $_SESSION['email'] && $phone == $_SESSION['phone']  && $occupation == $_SESSION['occ']  && !$data['newImg']) {
                    $data['changed'] = false;
                } 
                else {

                    $data['changed'] = true;

                    $data['valid_name'] = validate_name($name);
                    $data['valid_email'] = validate_email($email);
                    $data['valid_phone'] = validate_phone($phone);
                    $data['valid_occupation'] = validate_occ($occupation);


                    //Check if the name changed
                    if ($name != $_SESSION['name']) {

                        // Will update the name if the name is a valid name
                        if ($data['valid_name']) {
                            $data['name_changed'] = edit_name($name, $db);
                        } else {

                            $data['name_changed'] = false;
                        }
                    }


                    //Check if the phone changed
                    if ($phone != $_SESSION['phone']) {

                        // Will update the phone if its valid
                        if ($data['valid_phone']) {
                            $data['phone_changed'] = edit_phone($phone, $db);
                        } else {

                            $data['phone_changed'] = false;
                        }
                    }


                    //Check if the occupation changed
                    if ($occupation != $_SESSION['occ']) {

                        // Will update the occupation if its valid
                        if ($data['valid_occupation']) {
                            $data['occupation_changed'] = edit_occ($occupation, $db);
                        } else {

                            $data['occupation_changed'] = false;
                        }
                    }


                    //Check if the email changed
                    if ($email != $_SESSION['email']) {

                        //check if the email not registerd
                        $data['exist'] = check_exist($email, $db);

                        if (!$data['exist']) {

                            // Will update the email if its valid
                            if ($data['valid_email']) {
                                $data['email_changed'] = edit_email($email, $db);
                            } else {

                                $data['email_changed'] = false;
                            }
                        }
                    }else {
                        $data['hmmmm']= true;
                    }

                    //Check if we have a new img and its a valid one
                    if ($data['newImg'] && $data['valid_img']) {
                        $data['img_changed'] = edit_img($imgBase64, $db);
                    } else {
                        $data['img_changed'] = false;
                    }
                }
            }
        }
    }
} else {
    $data['method'] = false;
}

function validate_name($name)
{
    if (preg_match('/^[a-zA-Z ]*$/', $name)) {
        return true;
    }

    return false;
}

function validate_email($email)
{
    if (preg_match('/^(([^<>()\[\]\.,;:\s@\"]+(\.[^<>()\[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i', $email)) {
        return true;
    }

    return false;
}

function validate_occ($occupation)
{
    if (preg_match('/^[a-zA-Z ]*$/', $occupation))  {
        return true;
    }
    return false;
}

function validate_phone($phone)
{
    if (preg_match("/^(01)[0-46-9]*[0-9]{7,8}$/", $phone)) 
    {
        return true;
    }
    return false;
}


function check_password($pass, $db)
{

    $sql = "SELECT * FROM users WHERE username = ? ;";
    $stmt = $db->prepare($sql);
    $stmt->bind_param('s', $_SESSION['username']);
    $stmt->execute();
    $result = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($result)) {
        if (password_verify($pass, $row['password'])) {
            return true;
        }
        return false;
    }
    return false;
}

function change_password($pass1, $db)
{

    $sql = "UPDATE users SET password = ? WHERE userID = ? ;";
    $stmt = $db->prepare($sql);
    $stmt->bind_param('ss', $pass1, $_SESSION['userID']);
    $stmt->execute();
    if ($stmt->execute()) {
        return true;
    }

    return false;
}

function check_exist($email, $db)
{

    $sql = "SELECT COUNT(1) FROM users WHERE email = ? ;";
    $stmt = $db->prepare($sql);
    $stmt->bind_param('s', $email);
    $stmt->execute();
    $row = $stmt->get_result()->fetch_row();

    if ($row[0] > 0) {
        return true;
    }
    return false;
}

function edit_img($img, $db)
{

    $sql = "UPDATE users SET img = ?  WHERE username = ? ;";
    $stmt = $db->prepare($sql);
    $stmt->bind_param('ss', $img, $_SESSION['username']);
    $stmt->execute();
    $data["stmt_img"] = $stmt->error;
    if ($stmt->execute()) {
        $_SESSION['img'] = $img;
        return true;
    }
    return false;
}



function edit_name($name, $db)
{

    $sql = "UPDATE users SET  `name` = ?  WHERE username = ? ;";
    $stmt = $db->prepare($sql);
    $stmt->bind_param('ss', $name, $_SESSION['username']);
    if ($stmt->execute()) {
        $_SESSION['name'] = $name;
        return true;
    } else {
        return false;
    }
}

function edit_email($email, $db)
{

    $sql = "UPDATE users SET email=  ?  WHERE username = ? ;";
    $stmt = $db->prepare($sql);
    $stmt->bind_param('ss', $email, $_SESSION['username']);
    if ($stmt->execute()) {
        $_SESSION['email'] = $email;
        return true;
    }
    return false;
}

function edit_phone($phone, $db) {

    $sql = "UPDATE users SET  `phone` = ?  WHERE username = ? ;";
    $stmt = $db->prepare($sql);
    $stmt->bind_param('ss', $phone, $_SESSION['username']);
    if ($stmt->execute()) {
        $_SESSION['phone'] = $phone;
        return true;
    }
    return false;
}


function edit_occ($occupation, $db)
{

    $sql = "UPDATE users SET  `occupation` = ?  WHERE username = ? ;";
    $stmt = $db->prepare($sql);
    $stmt->bind_param('ss', $occupation, $_SESSION['username']);
    if ($stmt->execute()) {
        $_SESSION['occ'] = $occupation;
        return true;
    }
    return false;
}


function delete_account($db)
{

    $sql = "DELETE FROM users WHERE username = ? ;";
    $stmt = $db->prepare($sql);
    $stmt->bind_param('s', $_SESSION['username']);
    if ($stmt->execute()) {
        return true;
    }
    return false;
}

$db->close();

echo json_encode($data);
