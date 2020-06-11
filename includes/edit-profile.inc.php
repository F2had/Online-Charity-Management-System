<?php
session_start();
require('config.inc.php');
$allowedext = array(
    'gif',
    'png',
    'jpg'
);

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $pass = mysqli_real_escape_string($db, $_POST['cpass']);


  
    $valid_password = check_password($pass, $db);

    if (!$valid_password == 1) {
        header("Location: ../profile.php?error=incorrectPass");
        die();
    }



    if(isset($_POST["reset"])){

        if (isset($_POST['pass1']) && isset($_POST['pass2'])) {
            if ($_POST['pass1'] == $_POST['pass2']) {
                $pass1 = password_hash(mysqli_real_escape_string($db, $_POST['pass1']), PASSWORD_BCRYPT);
                
                $seccuss_pass = change_password($pass1, $db);
                header("Location: ../profile.php?password_changed=$seccuss_pass");
                die();
            } else {
                
                header("Location: ../profile.php?error=passwordfoesnotmatch");
                
            }
        } else {
            header("Location: ../profile.php?error=missinginput");
        }
    }
    
    if(isset($_POST["delete"])){

       $deleted = delete_account($db);
       if($deleted){
        header("Location: ../logout.php?deleted=$deleted");
        die();
       }
       header("Location: ../profile.php?deleted=erorr");
       die();
    }
    
    if(isset($_POST['update'])){
      
        
        if (isset($_POST['name']) && isset($_POST['email'])) {

            $name  = mysqli_real_escape_string($db, $_POST['name']);
            $email = mysqli_real_escape_string($db, $_POST['email']);

            if (is_uploaded_file($_FILES['img']['tmp_name'])) {
                $img = $_FILES['img']['name'];
                $ext = pathinfo($img, PATHINFO_EXTENSION);
 

                if (!in_array($ext, $allowedext)) {
                    header("Location: ../profile.php?error=notallowedExt");
                    die();
                    
                }
                
                
                
                $imgsize = $_FILES['img']['size'];
                if ($imgsize > 2000000) {
                    header("Location: ../profile.php?error=size");
                    die();
                }

                $imgData = file_get_contents($_FILES['img']['tmp_name']);
                $imgBase64 = "data:image/" . $ext . ";base64," . base64_encode($imgData);
                $newImg  = true;
                
            } else {
                $newImg = false;
                echo $newImg;
       
            }

            
            if ($name == $_SESSION['name'] && $email == $_SESSION['email'] && !$newImg) {
                header("Location: ../profile.php?error=unchanged");
                die();
            } else {
                
                
                $valid_name  = validate_name($name);
                $valid_email = validate_email($email);
                
                
                if ($valid_email && $valid_name) {
                    
                    if ($_SESSION['email'] == $email) {
                        $exist = false;
                    } else {
                        check_exist($email, $db);
                    }
                    
                    if (!$exist) {
                        
                       if($name != $_SESSION['name']){
                        $seccuss_name  = edit_name($name, $db);
                       } else {
                        $seccuss_name = 0;
                       }

                       if($email != $_SESSION['email']){
                        $seccuss_email  = edit_email($email, $db);
                       } else {
                        $seccuss_email = 0;
                       }

                        if ($newImg) {
                            $seccuss_img = edit_img($imgBase64, $db);
                        }else {
                            $seccuss_img = 0;
                        }
 
                            header("Location: ../profile.php?email=$seccuss_email&name=$seccuss_name&img=$seccuss_img");
                            die();
                        
                        
                    } else {
                        header("Location: ../profile.php?error=exist");
                        die();
                    }
                    
                } else {
                    header("Location: ../profile.php?error=Incorrecformat");
                    die();
                }
                
                
                
                header("Location: ../profile.php?error=de");
                die();
                
            }
            
            
            
            
        }
    }
    
} else {
    header("Location: ../profile.php?error=method");
    die();
}

function validate_name($name)
{
    if (preg_match('/^[a-zA-Z ]*$/', $name))
        return true;
    return false;
}
function validate_email($email)
{
    if (preg_match('/^(([^<>()\[\]\.,;:\s@\"]+(\.[^<>()\[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i', $email))
        return true;
    return false;
}


function check_password($pass, $db)
{
    
    $sql  = "SELECT * FROM users WHERE username = ? ;";
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
    
    $sql  = "UPDATE users SET password = ? WHERE userID = ? ;";
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
    
    $sql  = "SELECT COUNT(1) FROM users WHERE username = ? OR email = ? ;";
    $stmt = $db->prepare($sql);
    $stmt->bind_param('ss', $username, $email);
    $stmt->execute();
    $row = $stmt->get_result()->fetch_row();
    
    if ($row[0] > 0) {
        return true;
    }
    return false;
}

function edit_img($img, $db)
{
    
    $sql  = "UPDATE users SET img = ?  WHERE username = ? ;";
    $stmt = $db->prepare($sql);
    $stmt->bind_param('ss',  $img, $_SESSION['username']);
    $stmt->execute();
    echo $stmt->error;
    if ($stmt->execute()) {
        return true;
    }
    return false;
    
}


function edit_name($name, $db)
{
    
    $sql  = "UPDATE users SET  `name` = ?  WHERE username = ? ;";
    $stmt = $db->prepare($sql);
    $stmt->bind_param('ss',  $name, $_SESSION['username']);
    $stmt->execute();
    echo $stmt->error;
    if ($stmt->execute()) {
        return true;
    }else {
        return false;
    }
    
    
}


function edit_email($email, $db)
{
    
    $sql  = "UPDATE users SET email=  ?  WHERE username = ? ;";
    $stmt = $db->prepare($sql);
    $stmt->bind_param('ss', $email,  $_SESSION['username']);
    $stmt->execute();
    echo $stmt->error;
    if ($stmt->execute()) {
        return true;
    }
    return false;
    
}


function delete_account($db)
{
    
    $sql  = "DELETE FROM users WHERE username = ? ;";
    $stmt = $db->prepare($sql);
    $stmt->bind_param('s', $_SESSION['username']);
    $stmt->execute();
    echo $stmt->error;
    if ($stmt->execute()) {
        return true;
    }
    return false;
    
}



$db->close();