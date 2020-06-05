<?php

require('config.inc.php');
if ($_SERVER['REQUEST_METHOD']  == 'POST'){
    
        if(isset($_POST['name']) && isset($_POST['username']) && isset($_POST['email']) && isset($_POST['pass1']) && isset($_POST['pass2']) ){
            
            $name = mysqli_real_escape_string($db, $_POST['name']);
            $username = mysqli_real_escape_string($db, $_POST['username']);
            $email = mysqli_real_escape_string($db, $_POST['email']);
            $pass1 = password_hash(mysqli_real_escape_string($db, $_POST['pass1']), PASSWORD_BCRYPT);
            $pass2 = mysqli_real_escape_string($db, $_POST['pass2']);   
           
           
            $data['missingInfo'] = false;
        }
        else {

            $data['missingInfo'] = true;
            
        }
        
        if($data['missingInfo'] == false){
            $data['validnmae'] = validate_name($name);
            $data['validuname'] = validate_uname($username);
            $data['validemail'] = validate_email($email);
            $data['matchpass'] = validate_match($pass2, $pass1);
        }
        else {
            die();
        }
         

    if($data['validnmae'] && $data['matchpass'] && $data['validuname'] && $data['validemail'] ){
         $data['valid_info'] = true;
    } 
    else {
         $data['valid_info'] = false;
    }
   
            if($data['valid_info']){
                $data['exist'] = check_exist($username, $email, $db);
            }
            else {
                $data['exist'] = false;
            }
          

            if(!$data['exist'] && $data['valid_info']){
                $data['success'] = register_user($username, $email, $pass1, $name, $db);
              }
           
}

function validate_name($name){
    if(preg_match('/^[a-zA-Z ]*$/', $name))   return true;
    return false;
} 
function validate_email($email){
    if(preg_match('/^(([^<>()\[\]\.,;:\s@\"]+(\.[^<>()\[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i', $email))   return true;
    return false;
} 

function validate_uname($username){
    if(preg_match("/^[a-zA-z0-9]*$/", $username)) return true;
    return false;
}

function validate_match($pass2, $pass1){
    if(password_verify($pass2, $pass1)) return true;
    return false;
}

function check_exist($username, $email, $db){
    
    $sql = "SELECT COUNT(1) FROM users WHERE username = ? OR email = ?";
    $stmt = $db->prepare($sql);
    $stmt->bind_param('ss',$username, $email);
    $stmt->execute();
    $row = $stmt->get_result()->fetch_row();

    if($row[0] > 0){
        return true;
    }
    return false;
}

function register_user($username, $email, $pass1,$name, $db){

    $sql = "INSERT INTO users(username, email, `password`, `name`) VALUES (?, ?, ?, ?)";
    if($db->prepare($sql)){
        $stmt = $db->prepare($sql);
        $stmt->bind_param('ssss',  $username, $email, $pass1, $name);
        return  $stmt->execute();
    }
    return false;
} 


$db->close();
echo json_encode($data);