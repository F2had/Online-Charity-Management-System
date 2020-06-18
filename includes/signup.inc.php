<?php

require('config.inc.php');

$allowedext = array('gif', 'png', 'jpg', 'jpeg');

// if a profile image not uploaded will replace it with place holder
$data['needPH'] = true;
$imgBase64_ph = "data:image/png;base64,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";

if ($_SERVER['REQUEST_METHOD']  == 'POST'){
    
        if(isset($_POST['name']) && isset($_POST['username']) && isset($_POST['email']) && isset($_POST['pass1']) && isset($_POST['pass2'])  && isset($_POST['phone'])  && isset($_POST['occ'])){
            
            $name = mysqli_real_escape_string($db, $_POST['name']);
            $username = mysqli_real_escape_string($db, $_POST['username']);
            $email = mysqli_real_escape_string($db, $_POST['email']);
            $phone = mysqli_real_escape_string($db, $_POST['phone']);
            $occupation = mysqli_real_escape_string($db, $_POST['occ']);
            $pass1 = password_hash(mysqli_real_escape_string($db, $_POST['pass1']), PASSWORD_BCRYPT);
            $pass2 = mysqli_real_escape_string($db, $_POST['pass2']);   
            
            if(is_uploaded_file($_FILES['file']['tmp_name'])){
                $img = $_FILES['file']['name'];
                $ext = pathinfo($img, PATHINFO_EXTENSION);
                $data['ext'] = $ext;
                if(!in_array($ext, $allowedext)){
                    $data['validext'] = false;
                }
                else {
                    $data['validext'] = true;
                }

                $imgsize = $_FILES['file']['size'];
                if($imgsize > 2000000){
                    $data['size'] = false;
                }else {
                    $data['size'] = true;
                }
                if($data['validext'] &&  $data['size']) {
                $imgData = file_get_contents($_FILES['file']['tmp_name']);
                $imgBase64 = "data:image/" . $ext . ";base64," .base64_encode($imgData);
                
                }
                
                
                $data['needPH'] = false;
                
            } 
           
           
            $data['missingInfo'] = false;
        }
        else {

            $data['missingInfo'] = true;
            
        }
        
        if($data['missingInfo'] == false){
            $data['validnmae'] = validate_name($name);
            $data['validuname'] = validate_uname($username);
            $data['validemail'] = validate_email($email);
            $data['validphone'] = validate_phone($phone);
            $data['validoccupation'] = validate_occ($occupation);
            $data['matchpass'] = validate_match($pass2, $pass1);
        }
        else {
            die();
        }
         

    if($data['validnmae'] && $data['matchpass'] && $data['validuname'] && $data['validemail']  &&  $data['validoccupation'] && $data['validphone'] ){
        if(!empty($img)){
            if($data['validext'] && $data['size']){
                $data['valid_info'] = true;
            }else {
                $data['valid_info'] = false;
            }
          
        }else {
            $data['valid_info'] = true;
        }
         
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

               if(!$data['needPH']){

                $data['success'] = register_user($username, $email, $pass1, $name, $phone, $occupation, $imgBase64,  $db);
               } 
               else {
                $data['success'] = register_user($username, $email, $pass1, $name, $phone, $occupation,$imgBase64_ph,  $db);
            }
               
             
               

              }
           
} 
else {
    // Return the user to the login page if tried to access this page without a POST method
    header('Location: ../login.php');
    die();
}

function validate_name($name){
    if(preg_match('/^[a-zA-Z ]*$/', $name))   return true;
    return false;
} 

function validate_occ($occupation){
    if(preg_match('/^[a-zA-Z ]*$/', $occupation))   return true;
    return false;
} 
function validate_email($email){
    if(preg_match('/^(?!(?:(?:\x22?\x5C[\x00-\x7E]\x22?)|(?:\x22?[^\x5C\x22]\x22?)){255,})(?!(?:(?:\x22?\x5C[\x00-\x7E]\x22?)|(?:\x22?[^\x5C\x22]\x22?)){65,}@)(?:(?:[\x21\x23-\x27\x2A\x2B\x2D\x2F-\x39\x3D\x3F\x5E-\x7E]+)|(?:\x22(?:[\x01-\x08\x0B\x0C\x0E-\x1F\x21\x23-\x5B\x5D-\x7F]|(?:\x5C[\x00-\x7F]))*\x22))(?:\.(?:(?:[\x21\x23-\x27\x2A\x2B\x2D\x2F-\x39\x3D\x3F\x5E-\x7E]+)|(?:\x22(?:[\x01-\x08\x0B\x0C\x0E-\x1F\x21\x23-\x5B\x5D-\x7F]|(?:\x5C[\x00-\x7F]))*\x22)))*@(?:(?:(?!.*[^.]{64,})(?:(?:(?:xn--)?[a-z0-9]+(?:-[a-z0-9]+)*\.){1,126}){1,}(?:(?:[a-z][a-z0-9]*)|(?:(?:xn--)[a-z0-9]+))(?:-[a-z0-9]+)*)|(?:\[(?:(?:IPv6:(?:(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){7})|(?:(?!(?:.*[a-f0-9][:\]]){7,})(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,5})?::(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,5})?)))|(?:(?:IPv6:(?:(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){5}:)|(?:(?!(?:.*[a-f0-9]:){5,})(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,3})?::(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,3}:)?)))?(?:(?:25[0-5])|(?:2[0-4][0-9])|(?:1[0-9]{2})|(?:[1-9]?[0-9]))(?:\.(?:(?:25[0-5])|(?:2[0-4][0-9])|(?:1[0-9]{2})|(?:[1-9]?[0-9]))){3}))\]))$/id', $email))   return true;
    return false;
} 

function validate_uname($username){
    if(preg_match("/^[a-zA-z0-9]*$/", $username)) return true;
    return false;
}

function validate_phone($phone){
    if(preg_match("/^(01)[0-46-9]*[0-9]{7,8}$/", $phone)) return true;
    return false;
}

function validate_match($pass2, $pass1){
    if(password_verify($pass2, $pass1)) return true;
    return false;
}

function check_exist($username, $email, $db){
    
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

function register_user($username, $email, $pass1,$name,$phone, $occupation,$img, $db){

    $sql = "INSERT INTO users(username, email, `password`, `name`, `phone`, `occupation`, `img`) VALUES (?, ?, ?, ?, ?, ?, ?) ;";
    if($db->prepare($sql)){
        $stmt = $db->prepare($sql);
        $stmt->bind_param('sssssss',  $username, $email, $pass1, $name, $phone, $occupation, $img);
       
        if($stmt->execute()){
            
            return true;
        }
        $data['stmt'] = $stmt->error;
    }
    return false;
} 


$db->close();
echo json_encode($data);
