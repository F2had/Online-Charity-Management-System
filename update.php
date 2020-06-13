<?php
// Include config file
require_once "includes/config.inc.php";
session_start();
$admin = 1;
$user = $_SESSION['userID'];


// Define variables and initialize with empty values
$FullName = "";
$DOB = "";
$mail = "";
$identity = 0 ;
$occupation = "";
$Address = "";
$Address2 = "";
$City = "";
$State = "";
$Zip = "";
$ContactNumber = 0;
$skills = "";
$howHelp = "";
$offences = "";
$medic = "";

$FullNameErr = $DOBErr = $mailErr = $identityErr = $occupationErr = $AddressErr = $Address2Err = $CityErr = $StateErr = $ZipErr = $ContactNumberErr = $skillsErr = $howHelpErr = $offencesErr = $medicErr = "";

if ($_SESSION["userID"] == $admin){
// Processing form data when form is submitted
if(isset($_POST["id"]) && !empty($_POST["id"])){
    // Get hidden input value
    $id = $_POST["id"];
    // Validate name
 
    $input_name = trim($_POST["name"]);
    if(empty($input_name)){
        $FullNameErr = "Please enter a name.";
    } else{
        $FullName = $input_name;
    }
    // Validate DOB address
    $input_dob = trim($_POST["DOB"]);
    if(empty($input_dob)){
        $DOBErr = "Please enter DOB.";     
    } else{
        $DOB = $input_dob;
    }    
    // Validate mail address
    $input_mail = trim($_POST["mail"]);
    if(empty($input_mail)){
        $mailErr = "Please enter mail.";     
    } else{
        $mail = $input_mail;
    }
        // Validate identity
    $input_identity = trim($_POST["identity"]);
    if(empty($input_identity)){
        $identityErr = "Please enter identity.";     
    } else{
        $identity = $input_identity;
    }
   
        // Validate Occupation
    $input_occupation = trim($_POST["occupation"]);
    if(empty($input_occupation)){ 
        $occupationErr = "Please enter Occupation."; 
    } else{
        $occupation = $input_occupation;
    }        
        // Validate Address
    $input_address = trim($_POST["Address"]);
    if(empty($input_address)){
        $AddressErr = "Please enter Address.";     
    } else{
        $Address = $input_address;
    }
        
    // Validate Address2
    $input_address2 = trim($_POST["Address2"]);
    if(empty($input_address2)){
        $Address2Err = "Please enter Address2.";   
    } else{
        $Address2 = $input_address2;
    }
   
        // Validate DOB address
    $input_city = trim($_POST["City"]);
    if(empty($input_city)){
        $CityErr = "Please enter City.";     
    } else{
        $City = $input_city;
    }
    
            // Validate State
    $input_state = trim($_POST["State"]);
    if(empty($input_state)){
        $StateErr = "Please enter State.";     
    } else{
        $State = $input_state;
    }
        // Validate Zip
    $input_zip = trim($_POST["Zip"]);
    if(empty($input_zip)){
        $ZipErr = "Please enter Zip.";     
    } else{
        $Zip = $input_zip;
    }
        // Validate ContactNumber
    $input_cn = trim($_POST["ContactNumber"]);
    if(empty($input_cn)){
        $ContactNumberErr = "Please enter Contact Number.";     
    } else{
        $ContactNumber = $input_cn;
    }
         
              // Validate Skills
    $input_skills = trim($_POST["Skills"]);
    if(empty($input_skills)){
        $skillsErr = "Please enter skills.";     
    } else{
        $skills = $input_skills;
    }
                       // Validate Help
    $input_howHelp = trim($_POST["howHelp"]);
    if(empty($input_howHelp)){  
        $howHelpErr = "Please enter How.";
    } else{
        $howHelp = $input_howHelp;
    }
    
                       // Validate Offences
    $input_offences = trim($_POST["offences"]);
    if(empty($input_offences)){
        $offencesErr = "Please enter offences.";     
    } else{
        $offences = $input_offences;
    }
    
                       // Validate medic
    $input_medic = trim($_POST["medic"]);
    if(empty($input_medic)){
        $medicErr = "Please enter medic.";     
    } else{
        $medic = $input_medic;
    }
    

   
    
    
    if(empty($FullNameErr) && empty($DOBErr) && empty($mailErr) && empty($identityErr) && empty($occupationErr) && empty($AddressErr) && empty($Address2Err) && empty($CityErr) && empty($StateErr) && empty($ZipErr) && empty($ContactNumberErr) && empty($skillsErr) && empty($howHelp) && empty($offencesErr) && empty($medicErr)){
        // Prepare an update statement
        $sql = "UPDATE VOLUNTEER SET FullName=?, DOB=?, mail=?, identity=? ,occupation=? , Address1=? , Address2=?, City=?, State=?, Zip=?, ContactNumber=?, skills=?, howHelp=?, offences=?, medic=? WHERE id=?";
         
        if($stmt = mysqli_prepare($db, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sssi", $param_name, $param_dob, $param_mail, $param_identity, $param_occupation, $param_address, $param_address2, $param_city, $param_state, $param_zip, $param_cn, $param_skills, $param_help, $param_offences, $param_medic);
            
            
            // Set parameters
                $param_name = $FullName;
                $param_dob = $DOB;
                $param_mail = $mail;
                $param_identity = $identity;
                $param_occupation = $occupation;
                $param_address = $Address;
                $param_address2 = $Address2;
                $param_city = $City;
                $param_state = $State;
                $param_zip = $Zip;
                $param_cn = $ContactNumber;
                $param_skills = $skills;
                $param_help = $howHelp;
                $param_offences = $offences;
                $param_medic = $medic;
        
            if(mysqli_stmt_execute($stmt)){
                // Records updated successfully. Redirect to landing page
                header("location: ViewList.php");
                exit();
            } else{
                echo "Something went wrong. Please try again later.";
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
    }
    
    // Close connection
    mysqli_close($db);
    
} else{
    // Check existence of id parameter before processing further
    if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
        // Get URL parameter
        $id =  trim($_GET["id"]);
        
        // Prepare a select statement
        $sql = "SELECT * FROM VOLUNTEER WHERE id = ?";
        if($stmt = mysqli_prepare($db, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "i", $param_id);
            
            // Set parameters
            $param_id = $id;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                $result = mysqli_stmt_get_result($stmt);
    
                if(mysqli_num_rows($result) == 1){
                    /* Fetch result row as an associative array. Since the result set contains only one row, we don't need to use while loop */
                    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

                    // Retrieve individual field value
                    $FullName = $row["Name"];
                    $DOB = $row["DOB"];
                    $mail = $row["Email"];
                    $identity = $row["IdentityCard"];
                    $occupation = $row["Occupation"];
                    $Address = $row["Address"];
                    $Address2 = $row["Address2"];
                    $City = $row["City"];
                    $State = $row["State"];
                    $Zip = $row["Zip"];
                    $ContactNumber = $row["ContactNumber"];
                    $skills = $row["Skills"];
                    $howHelp = $row["HowHelp"];
                    $offences = $row["Offences"];
                    $medic = $row["MedicalIssues"];
                    
                } else{
                    // URL doesn't contain valid id. Redirect to error page
                    header("location: error.php");
                    exit();
                }
                
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
        
        // Close statement
        mysqli_stmt_close($stmt);
        
        // Close connection
        mysqli_close($db);
    }  else{
        // URL doesn't contain id parameter. Redirect to error page
        header("location: error.php");
        exit();
    }
}}
    else{
    echo "<script>
alert('Sorry Editing can only be done by the ADMIN');
window.location.href='ViewList.php';
</script>";

    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Record</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        .wrapper{
            width: 500px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h2>Update Record</h2>
                    </div>
                
                    <p>Please edit the input values and submit to update the record.</p>
                    <form name="f1" method="post" action="edit_ctl.php">
	<input type="hidden" name="id" value="<?php print($id);?>">
                        <div class="form-group <?php echo (!empty($FullNameErr)) ? 'has-error' : ''; ?>">
                            <label>Name</label>
                            <input type="text" name="t1" class="form-control" value="<?php echo $FullName; ?>">
                            <span class="help-block"><?php echo $FullNameErr;?></span>
                        </div>
                   
                         <div class="form-group <?php echo (!empty($DOBErr)) ? 'has-error' : ''; ?>">
                            <label>DOB</label>
                            <input type="text" name="t2" class="form-control" value="<?php echo $DOB; ?>">
                            <span class="help-block"><?php echo $DOBErr;?></span>
                        </div>
                         <div class="form-group <?php echo (!empty($mailErr)) ? 'has-error' : ''; ?>">
                            <label>Email</label>
                            <input type="text" name="t3" class="form-control" value="<?php echo $mail; ?>">
                            <span class="help-block"><?php echo $mailErr;?></span>
                        </div>
                         <div class="form-group <?php echo (!empty($identityErr)) ? 'has-error' : ''; ?>">
                            <label>I/C No.</label>
                            <input type="text" name="t4" class="form-control" value="<?php echo $identity; ?>">
                            <span class="help-block"><?php echo $identityErr;?></span>
                        </div>
                        <div class="form-group">
                            <label>Occupation</label>
                            <input type="text" name="t5" class="form-control" value="<?php echo $occupation; ?>">
                        </div>
                         <div class="form-group <?php echo (!empty($AddressErr)) ? 'has-error' : ''; ?>">
                            <label>Address Line 1</label>
                            <input type="text" name="t6" class="form-control" value="<?php echo $Address; ?>">
                            <span class="help-block"><?php echo $AddressErr;?></span>
                        </div>
                         <div class="form-group">
                            <label>Address Line 2</label>
                            <input type="text" name="t7" class="form-control" value="<?php echo $Address2; ?>">
                        </div>                  
                         <div class="form-group <?php echo (!empty($CityErr)) ? 'has-error' : ''; ?>">
                            <label>City</label>
                            <input type="text" name="t8" class="form-control" value="<?php echo $City; ?>">
                            <span class="help-block"><?php echo $CityErr;?></span>
                        </div>
                         <div class="form-group <?php echo (!empty($StateErr)) ? 'has-error' : ''; ?>">
                            <label>State</label>
                            <input type="text" name="t9" class="form-control" value="<?php echo $State; ?>">
                            <span class="help-block"><?php echo $StateErr;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($ZipErr)) ? 'has-error' : ''; ?>">
                            <label>Zip</label>
                            <textarea name="t10" class="form-control"><?php echo $Zip; ?></textarea>
                            <span class="help-block"><?php echo $ZipErr;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($ContactNumberErr)) ? 'has-error' : ''; ?>">
                            <label>ContactNumber</label>
                            <input type="text" name="t11" class="form-control" value="<?php echo $ContactNumber; ?>">
                            <span class="help-block"><?php echo $ContactNumberErr;?></span>
                        </div>
                          <div class="form-group <?php echo (!empty($skillsErr)) ? 'has-error' : ''; ?>">
                            <label>Skills</label>
                            <input type="text" name="t12" class="form-control" value="<?php echo $skills; ?>">
                            <span class="help-block"><?php echo $skillsErr;?></span>
                        </div>
                               <div class="form-group">
                            <label>howHelp</label>
                            <input type="text" name="t13" class="form-control" value="<?php echo $howHelp; ?>">
                        </div>
                               <div class="form-group <?php echo (!empty($offencesErr)) ? 'has-error' : ''; ?>">
                            <label>offences</label>
                            <input type="text" name="t14" class="form-control" value="<?php echo $offences; ?>">
                            <span class="help-block"><?php echo $offencesErr;?></span>
                        </div>
                               <div class="form-group <?php echo (!empty($medicErr)) ? 'has-error' : ''; ?>">
                            <label>medic</label>
                            <input type="text" name="t15" class="form-control" value="<?php echo $medic; ?>">
                            <span class="help-block"><?php echo $medicErr;?></span>
                        </div>
                        
                        <input type="hidden" name="id" value="<?php echo $id; ?>"/>
     
                          <input type="submit" value="UPDATE"> 
                        <a href="ViewList.php" class="btn btn-default">Cancel</a>
                        
                        
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>