<?php
// Check existence of id parameter before processing further
if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
    // Include config file
require_once "includes/config.inc.php";
    
    // Prepare a select statement
    $sql = "SELECT * FROM VOLUNTEER WHERE id = ?";
    
    if($stmt = mysqli_prepare($db, $sql)){
        // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "i", $param_id);
        
        // Set parameters
        $param_id = trim($_GET["id"]);
        
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
                $risk = $row["Risk"];
                
                
            } else{
                // URL doesn't contain valid id parameter. Redirect to error page
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
} else{
    // URL doesn't contain id parameter. Redirect to error page
    header("location: error.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>View Record</title>
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
                        <h1>View Record</h1>
                    </div>
                    
                    <div class="form-group">
                        <label>Name</label>
                        <p class="form-control-static"><?php echo $row["Name"]; ?></p>
                        <label>DOB</label>
                        <p class="form-control-static"><?php echo $row["DOB"]; ?></p>
                        <label>I/C No.</label>
                        <p class="form-control-static"><?php echo $row["IdentityCard"]; ?></p>
                        <label>Occupation</label>
                        <p class="form-control-static"><?php echo $row["Occupation"]; ?></p>
                        <label>Address</label>
                        <p class="form-control-static"><?php echo $row["Address"]; ?></p>
                        <label>Address Line 2</label>
                        <p class="form-control-static"><?php echo $row["Address2"]; ?></p>
                        <label>City</label>
                        <p class="form-control-static"><?php echo $row["City"]; ?></p>
                        <label>State</label>
                        <p class="form-control-static"><?php echo $row["State"]; ?></p>
                        <label>Zip</label>
                        <p class="form-control-static"><?php echo $row["Zip"]; ?></p>
                        <label>Contact Number</label>
                        <p class="form-control-static"><?php echo $row["ContactNumber"]; ?></p>
                        <label>Skills</label>
                        <p class="form-control-static"><?php echo $row["Skills"]; ?></p>
                        <label>How Help</label>
                        <p class="form-control-static"><?php echo $row["HowHelp"]; ?></p>
                        <label>Offences</label>
                        <p class="form-control-static"><?php echo $row["Offences"]; ?></p>
       
                        <label>Medic</label>
                        <p class="form-control-static"><?php echo $row["MedicalIssues"]; ?></p>
             
                 
                        <label>Risk</label>
                        <p class="form-control-static"><?php echo $row["Risk"]; ?></p>
                    </div>

                    
                    
                    
                    <p><a href="ViewList.php" class="btn btn-primary">Back</a></p>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>
