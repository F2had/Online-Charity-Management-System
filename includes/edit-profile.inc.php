<?php
session_start();
require 'config.inc.php';
$allowedext = array(
    'gif',
    'png',
    'jpg',
);

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $pass = mysqli_real_escape_string($db, $_POST['cpass']);

    $valid_password = check_password($pass, $db);

    if (!$valid_password == 1) {
        $data['password'] = false;

    } else {
        $data['password'] = true;
    }

    if (isset($_POST["reset"])) {

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

    if (isset($_POST["delete"])) {
       
       
        if ( $data['password']){
        $deleted = delete_account($db);
       } else{
        $deleted = false;
       }

        if ($deleted) {
            $data['deleted'] = true;

        } else {
            $data['deleted'] = false;
        }

    }

    if (isset($_POST['update'])) {

            if($data['password']){
                if (isset($_POST['name']) && isset($_POST['email'])) {

                    $name = mysqli_real_escape_string($db, $_POST['name']);
                    $email = mysqli_real_escape_string($db, $_POST['email']);
        
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
        
                        if($data['valid_size'] &&  $data['valid_ext'] ){
                            $data['valid_img'] = true;
                            $imgData = file_get_contents($_FILES['img']['tmp_name']);
                            $imgBase64 = "data:image/" . $ext . ";base64," . base64_encode($imgData);
                        } else 
                        {
                            $data['valid_img'] = false;
                        }

                        $data['newImg'] = true;
        
                    } else {
                        $data['newImg'] = false;
        
                    }
        
                    if ($name == $_SESSION['name'] && $email == $_SESSION['email'] && !$data['newImg']) {
                        $data['changed'] = false;
        
                    } else {
        
                        $data['changed'] = true;
        
                        $data['valid_name'] = validate_name($name);
                        $data['valid_email'] = validate_email($email);
                       
        
                        if ($data['valid_name'] && $data['valid_email']) {
        
                            if ($_SESSION['email'] == $email) {
                                $exist = false;
                                $data['exist'] = false;
        
                            } else {
                                $data['exist'] = check_exist($email, $db);
                            }

                            if ($name != $_SESSION['name']) {
                                $data['name_changed'] = true;
                            }else {
                                $data['name_changed'] = false;
                            }

        
                            if (!$data['exist']) {
        
                                if ($data['name_changed']) {
                                    $seccuss_name = edit_name($name, $db);
                                } else {
                                  
                                    $seccuss_name = 0;
                                }
        
                                if ($email != $_SESSION['email']) {
                                    $seccuss_email = edit_email($email, $db);
                                } else {
                                    $data['email_changed'] = false;
                                    $seccuss_email = 0;
                                }
        
                                if ($data['newImg'] && $data['valid_img']) {
                                    $seccuss_img = edit_img($imgBase64, $db);
                                } else {
                                    $seccuss_img = 0;
                                }
        
                                $data['name'] = $seccuss_name;
                                $data['email'] = $seccuss_email;
                                $data['img'] = $seccuss_img;
        
                            } else {
                                $data['exist'] = true;
        
                            }
        
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
    $stmt->execute();
    $data["stmt_name"] = $stmt->error;
    if ($stmt->execute()) {
        $data['name'] = $name;
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

function delete_account($db)
{

    $sql = "DELETE FROM users WHERE username = ? ;";
    $stmt = $db->prepare($sql);
    $stmt->bind_param('s', $_SESSION['username']);
    $stmt->execute();
    $data["stmt_delete"] = $stmt->error;
    if ($stmt->execute()) {
        return true;
    }
    return false;

}

$db->close();

echo json_encode($data);
