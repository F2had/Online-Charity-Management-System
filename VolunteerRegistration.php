<?php
require_once "includes/config.inc.php";
header("Location:Volunteer.php");

//Identify each variable
$FullName = "";
$DOB = "";
$mail = "";
$identity = 0;
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

$FullNameErr = $DOBErr = $mailErr = $identityErr = $AddressErr = $CityErr = $StateErr = $ZipErr = $ContactNumberErr = $skillsErr = $offencesErr = $medicErr = "";

// Post in the database from the form inserts

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
		// do post
		if ( isset($_POST["FullName"]) && isset($_POST["DOB"]) && isset($_POST["mail"]) && isset($_POST["identity"]) && isset($_POST["occupation"]) && isset($_POST["Address"]) && isset($_POST["Address2"])&& isset($_POST["City"]) && isset($_POST["State"]) && isset($_POST["Zip"])&& isset($_POST["ContactNumber"]) && isset($_POST["skills"]) && isset($_POST["howHelp"]) && isset($_POST["offences"]) && isset($_POST["medic"])) {
            
            $FullName = $_POST["FullName"];
            $DOB = $_POST["DOB"];
            $mail = $_POST["mail"];
            $identity = $_POST["identity"];
            $occupation = $_POST["occupation"];
            $Address = $_POST["Address"];
            $Address2 = $_POST["Address2"];
            $City = $_POST["City"];
            $State = $_POST["State"];
            $Zip = $_POST["Zip"];
            $ContactNumber = $_POST["ContactNumber"];
            $skills = $_POST["skills"];
            $howHelp = $_POST["howHelp"];
            $offences = $_POST["offences"];
            $medic = $_POST["medic"];
		}
    
    
	} 
else {
		// do get
		if ( isset($_GET["FullName"]) && isset($_GET["DOB"]) && isset($_GET["mail"]) && isset($_GET["identity"]) && isset($_GET["occupation"]) && isset($_GET["Address"]) && isset($_GET["Address2"])&& isset($_GET["City"]) && isset($_GET["State"]) && isset($_GET["Zip"])&& isset($_GET["ContactNumber"]) && isset($_GET["skills"]) && isset($_GET["howHelp"]) && isset($_GET["offences"]) && isset($_GET["medic"])) {	
            
            
            $FullName = $_GET["FullName"];
            $DOB = $_GET["DOB"];
            $mail = $_GET["mail"];
            $identity = $_GET["identity"];
            $occupation = $_GET["occupation"];
            $Address = $_GET["Address"];
            $Address2 = $_GET["Address2"];
            $City = $_GET["City"];
            $State = $_GET["State"];
            $Zip = $_GET["Zip"];
            $ContactNumber = $_GET["ContactNumber"];
            $skills = $_GET["skills"];
            $howHelp = $_GET["howHelp"];
            $offences = $_GET["offences"];
            $medic = $_GET["medic"];
            
		}	
		}	

//Make each of the variables in the form is required
function required($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}



if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["FullName"])) {
    $FullNameErr = "Name is required";
  } 
else { 
    $FullName = required($_POST["FullName"]);
  }

if (empty($_POST["DOB"])) {
    $DOBErr = "Date Of Birth is required";
  } else {
    $DOB = required($_POST["DOB"]);
  }

  if (empty($_POST["mail"])) {
    $mailErr = "Email is Required";
  } else {
    $mail = required($_POST["mail"]);
  }

  if (empty($_POST["identity"])) {
    $identityErr = "I/C No. is Required";
  } else {
    $identity = required($_POST["identity"]);
  }
if (empty($_POST["Address"])) {
    $AddressErr = "Address is required";
  } 
else { 
    $Address = required($_POST["Address"]);
  }
if (empty($_POST["City"])) {
    $CityErr = "City is required";
  } else {
    $City = required($_POST["City"]);
  }

  if (empty($_POST["State"])) {
    $StateErr = "State is Required";
  } else {
    $State = required($_POST["State"]);
  }
  if (empty($_POST["Zip"])) {
    $ZipErr = "Zip is Required";
  } else {
    $Zip = required($_POST["Zip"]);
  }
 if (empty($_POST["ContactNumber"])) {
    $ContactNumberErr = "Contact Number is Required";
  } else {
    $ContactNumber = required($_POST["ContactNumber"]);
  }
 if (empty($_POST["skills"])) {
    $skillsErr = "Skills is Required";
  } else {
    $skills = required($_POST["skills"]);
  }
 if (empty($_POST["offences"])) {
    $offencesErr = "Please choose one";
  } else {
    $offences = required($_POST["offences"]);
  }
    
 if (empty($_POST["medic"])) {
    $medicErr = "Please choose one";
  } else {
    $medic = required($_POST["medic"]);
  }
}


$risk = "";
    if($offences == "Yes" && $medic == "Yes"){
        $risk = "High";
    }
    elseif($offences == "No" && $medic == "No"){
         $risk = "None";
    }
    else {
         $risk = "Depends";
    }

    // Identifying the server after initializing it in phpmyadmin



    // getting the values of risk because they are not in the form and putting them in the sql database table
    
if(isset($_POST['risk'])){
    $risk = $_POST["risk"];
}
if(isset($_GET['risk'])){
    $risk = $_GET["risk"];
}
	 $sql = "INSERT INTO VOLUNTEER (Name,DOB,Email,IdentityCard,Occupation,Address,Address2,City,State,Zip,ContactNumber,Skills,HowHelp,Offences,MedicalIssues,Risk)
	 VALUES ('$FullName','$DOB','$mail','$identity','$occupation','$Address','$Address2','$City','$State','$Zip','$ContactNumber','$skills','$howHelp','$offences','$medic','$risk')";
 if ($db->query($sql)==TRUE) {
		echo "A new record created added into the database succesfully.";}
	  else {
		echo "Error: " .$sql;
	 }

$db->close();    

?>
