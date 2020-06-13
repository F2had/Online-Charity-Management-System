<?php include_once 'include/top2.php' ?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<title></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
	<!-- css -->
	<!-- <link href="css/bootstrap.min.css" rel="stylesheet" /> -->
	



	<link href="css/style2_2.css" rel="stylesheet" />
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


	<!-- Theme skin -->
	<link id="t-colors" href="skins/default.css" rel="stylesheet" />

	<!-- boxed bg -->
	<link id="bodybg" href="bodybg/bg1.css" rel="stylesheet" type="text/css" />


</head>

    
<body>
	

		<!-- end header -->
	
		<section id="content">
			<div class="container">
                      
                
                <div class="wrappers">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md">
                    <div class="page-header clearfix">
                        <h2 class="pull-left" class="alignit">People who want to Volunteer</h2>
                          <a href="create.html" class="btn btn-success pull-right">Add A VOLUNTEER</a>
                        
                    </div>
                    <?php
                    // Include config file
                   require_once "includes/config.inc.php";
                    $admin = 1;
                    $user = $_SESSION['userID'];
                    // Attempt select query execution
                    $sql = "SELECT * FROM VOLUNTEER";
                    if($result = mysqli_query($db, $sql)){
                        if(mysqli_num_rows($result) > 0){
                            echo "<table class='table table-bordered table-striped td'>";
                            
                                echo "<thead>";
                                    echo "<tr>";
                                        echo "<th>Name</th>";
                                        echo "<th>DOB</th>";
                                        echo "<th>Email</th>";
                                        echo "<th>I/C No.</th>";
                                        echo "<th>Occupation</th>";
                                        echo "<th>Address Line 1</th>";
                                        echo "<th>Address Line 2</th>";
                                        echo "<th>City</th>";
                                        echo "<th>State</th>";
                                        echo "<th>Zip</th>";
                                        echo "<th>Contact Number</th>";
                                        echo "<th>Skills</th>";
                                        echo "<th>How Can you Help?</th>";
                                        echo "<th>Any Offences</th>";
                                        echo "<th>Medical Issues</th>";
                                        echo "<th>Risk</th>";
                                        echo "<th>Action</th>";
                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                            
                                while($row = mysqli_fetch_array($result)){
                                    echo "<tr>";
                                        echo "<td>" . $row['Name'] . "</td>";
                                        echo "<td>" . $row['DOB'] . "</td>";
                                        echo "<td>" . $row['Email'] . "</td>";
                                        echo "<td>" . $row['IdentityCard'] . "</td>";
                                        echo "<td>" . $row['Occupation'] . "</td>";
                                        echo "<td>" . $row['Address'] . "</td>";
                                        echo "<td>" . $row['Address2'] . "</td>";
                                        echo "<td>" . $row['City'] . "</td>";
                                        echo "<td>" . $row['State'] . "</td>";
                                        echo "<td>" . $row['Zip'] . "</td>";
                                        echo "<td>" . $row['ContactNumber'] . "</td>";
                                        echo "<td>" . $row['Skills'] . "</td>";
                                        echo "<td>" . $row['HowHelp'] . "</td>";
                                        echo "<td>" . $row['Offences'] . "</td>";
                                        echo "<td>" . $row['MedicalIssues'] . "</td>";
                                        echo "<td>" . $row['Risk'] . "</td>";
                                    
                                    
                                        echo "<td>";
                                       echo "<a href='read.php?id=". $row['id'] ."' title='Read Volunteer Data' data-toggle='tooltip'><span class='glyphicon glyphicon-eye-open'></span></a>";
                                        echo "<a href='update.php?id=". $row['id'] ."' title='Edit Volunteer Information' data-toggle='tooltip'><span class='glyphicon glyphicon-pencil'></span></a>";
                                        echo "<a href='delete.php?id=". $row['id'] ."' title='Delete Volunteer Information' data-toggle='tooltip'><span class='glyphicon glyphicon-trash'></span></a>";
                                        echo "</td>";
                                    echo "</tr>";
                                }
                                echo "</tbody>";                            
                            echo "</table>";
                            // Free result set
                            mysqli_free_result($result);
                        } else{
                            echo "<p class='lead'><em>No records were found.</em></p>";
                        }
                    } else{
                        echo "ERROR: Could not able to execute $sql. " . mysqli_error($db);
                    }
 
                    // Close connection
                    mysqli_close($db);
                    ?>
     
                </div>
            </div>
                    </div>
                </div>
			</div>
		</section>

		


        
        
        
        
        
		<footer>
	<div class="container">
		<div class="row">
			<div class="col-sm-3 col-lg-6">
				<div class="widget">
					<h4>Get in touch with us</h4>
					<address>
						<strong>TheProcrastinators company Inc</strong><br>
						TheProcrastinators suite room V124, DB 91<br>
						Someplace 457648 Earth </address>
					<p>
						<i class="icon-phone"></i> (123) 456-7890<br>
						<i class="icon-envelope-alt"></i> email@domainname.com
					</p>
				</div>
			</div>
			<div class="col-sm-3 col-lg-6">
				<div class="widget">
					<h4>Information</h4>
					<ul class="link-list">
						<li><a href="#">Terms and conditions</a></li>
						<li><a href="#">Contact us</a></li>
					</ul>
				</div>

			</div>
		
			<div class="col-sm-3 col-lg-3">
			</div>
		</div>
	</div>
	<div id="sub-footer">
		<div class="container">
			<div class="row">
				<div class="col-lg-6">
					<div class="copyright">
						<p>&copy;All Right Reserved</p>
						<div class="credits">
					
                Designed by <a href="">TheProcrastinators</a>
            </div>
        </div>
    </div>
    <div class="col-lg-6">
    	<ul class="social-network">
    		<li><a href="#" data-placement="top" title="Facebook"><i class="fa fa-facebook"></i></a></li>
    		<li><a href="#" data-placement="top" title="Twitter"><i class="fa fa-twitter"></i></a></li>
    		<li><a href="#" data-placement="top" title="Linkedin"><i class="fa fa-linkedin"></i></a></li>
    		<li><a href="#" data-placement="top" title="Pinterest"><i class="fa fa-pinterest"></i></a></li>
    		<li><a href="#" data-placement="top" title="Google plus"><i class="fa fa-google-plus"></i></a></li>
    	</ul>
    </div>
</div>
</div>
</div>
</footer>


	<a href="#" class="scrollup"><i class="fa fa-angle-up active"></i></a>

	<!-- Placed at the end of the document so the pages load faster -->

	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>


	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.appear.js"></script>
	<script src="js/classie.js"></script>
	<script src="js/uisearch.js"></script>
	<script src="js/custom.js"></script>

			<script>

var form = document.getElementById('f');
function myFunction() {
  if (form.checkValidity()) {
    alert("Thanks For Applying We will get back to You Soon!");
  }
}

</script>


</body>

</html>
