<?php
session_start();
require('config.inc.php');

if($_SERVER["REQUEST_METHOD"] = "POST"){

    

        if(!empty($_POST['pass1']) && !empty($_POST['pass2']) ){
            if($_POST['pass1'] == $_POST['pass2']){
                $pass = mysqli_real_escape_string($db, $_POST['pass']);
                $pass1 = password_hash(mysqli_real_escape_string($db, $_POST['pass1']), PASSWORD_BCRYPT);
                $validpass = check_password($pass, $db);
    
    
                if($validpass){
                    $seccuss_pass = change_password($pass1, $db);
                    header("Location: ../profile.php?password_changed=$seccuss_pass");
                    die();
                 }
                 else {
                     header("Location: ../profile.php?error=incorrectpassword");
                     die();
                 } 
            }
            else {
                header("Location: ../profile.php?error=passwordfoesnotmatch");
                die();
            }
        }

        
        if(!empty($_POST['name']) &&   !empty($_POST['email'])){

            $name = mysqli_real_escape_string($db, $_POST['name']);
            $email = mysqli_real_escape_string($db, $_POST['email']);
            $pass = mysqli_real_escape_string($db, $_POST['pass']);

            if($name == $_SESSION['name'] && $email == $_SESSION['email']){
                header("Location: ../profile.php?error=unchanged");
                 die();
            }

            $valid_password = check_password($pass, $db);

            if($valid_password){

                $valid_name = validate_name($name);
                $valid_email = validate_email($email);
             

                if($valid_email &&  $valid_name){

                    if($_SESSION['email'] == $email){
                        $exist= false;
                    }
                    else {
                        check_exist($email, $db);
                    }

                    if(!$exist){    

                        $seccuss = edit_info($name,$email, $db);

                        if($seccuss){
                            header("Location: ../profile.php?error=seccuss");
                            die();
                        }
                        else {
                            eader("Location: ../profile.php?error=unseccuss");
                            die();
                        }

                    }
                    else {
                        header("Location: ../profile.php?error=exist");
                    die();
                    }

                } 
                else {
                    header("Location: ../profile.php?error=Incorrecformat");
                    die();
                }

            }else {
                header("Location: ../profile.php?error=Incorrectpassword");
            die();
            }


            header("Location: ../profile.php?error=de");
            die();

            
        } 
        
}
else {
    header("Location: ../profile.php?error=method");
    die();
}

function validate_name($name){
    if(preg_match('/^[a-zA-Z ]*$/', $name))   return true;
    return false;
} 
function validate_email($email){
    if(preg_match('/^(([^<>()\[\]\.,;:\s@\"]+(\.[^<>()\[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i', $email))   return true;
    return false;
} 


function check_password($pass, $db){

  $sql = "SELECT * FROM users WHERE username = ? ;";
  $stmt = $db->prepare($sql);
  $stmt->bind_param('s', $_SESSION['username']);
  $stmt->execute();
  $result = mysqli_stmt_get_result($stmt);
 
  if ($row = mysqli_fetch_assoc($result)){
        echo "hello";
    if(password_verify($pass, $row['password'])){ 
        return true;
    }

}
    return false;
}


function change_password($pass1, $db){

  $sql = "UPDATE users SET password = ? WHERE userID = ? ;";
  $stmt = $db->prepare($sql);
  $stmt->bind_param('ss', $pass1, $_SESSION['userID']);
  $stmt->execute();
  if($stmt->execute()){
      return true;
  }

  return false;
}

function check_exist($email, $db){
    
    $sql = "SELECT COUNT(1) FROM users WHERE username = ? OR email = ? ;";
    $stmt = $db->prepare($sql);
    $stmt->bind_param('ss',$username, $email);
    $stmt->execute();
    $row = $stmt->get_result()->fetch_row();

    if($row[0] > 0){
        return true;
    }
    return false;
}

function edit_info($name, $email, $db){
  
  $sql = "UPDATE users SET email=  ? , `name` = ?  WHERE username = ? ;";
  $stmt = $db->prepare($sql);
  $stmt->bind_param('sss',  $email,$name, $_SESSION['username'] );
  $stmt->execute();
  echo $stmt->error;
  if($stmt->execute()){
      return true;
  }
  return false;

}

$db->close();