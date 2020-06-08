<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<title>Profile</title>
		<!-- Bootstrap -->
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous" />
		<!-- CSS -->
		<link rel="stylesheet" href="./css/styles.css" />
		<link rel="stylesheet" href="./css/login.css" />
		<!-- Line Awsome -->
		<link rel="stylesheet"
          href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css" />
		<!-- Google Fonts -->
		<link href="https://fonts.googleapis.com/css?family=Roboto|Lexend+Tera|Montserrat:wght|Titillium+Web&display=swap" rel="stylesheet">
		</head>
		<body>

			<!-- Navigation -->
			<div id="wrapper">
				<!-- /////////////////////////////////////////////////////////////start header////////////////////////////////////////////////////////// -->
				<header>
					<?php
		    	if(!$_SESSION['logged_in']){
	    		header("Location: login.php");
	      		}
	      	?>
        <nav class="navbar navbar-expand-md navbar-light bg-light">
				<div class="container-fluid"> <!-- container fluid is make use of 100% of the screen -->
					<a class="navbar-brand" href="homepage.php">
						<img src="img/logo-filler.png" width="30" height="30" class="d-inline-block align-top" alt="">
															   Raise Reason
					   </a>

					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target=#navbarResponsive>
						<span class="navbar-toggler-icon"></span>
					</button>


					<div class="collapse navbar-collapse" id="navbarResponsive">
						<ul class="navbar-nav ml-auto"><!-- push our notification to right hand side -->
							<li class="nav-item" > <a class="nav-link" href="homepage.php">Home</a> </li>
							
							<li class="nav-item dropdown">
								<a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown">Volunteer</a>
								<div class="dropdown-menu " aria-labelledby="navbarDropdownMenuLink">
									<a class="dropdown-item" href="Volunteer.html">Volunteer Registration</a>
									<a class="dropdown-item" href="ProjectRegisterationForm.html">Volunteer project registration</a>
									
								</div>
							</li>
							<li class="nav-item" > <a class="nav-link" href="meeting-report.html">Reports</a></li>
			
           <li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown"><?php echo $_SESSION['name']?> <i class="la la-user-circle la-lg" ></i></a>
						<div class="dropdown-menu " aria-labelledby="navbarDropdownMenuLink">
			  		<a class="dropdown-item" href="profile.php">Profile</a>
						<a class="dropdown-item" href="logout.php">Logout</a>
						</div>
						</li>
						</ul>
          </div>
          

				</div>
			</nav>			

					</header>
					<!-- Navigation end -->

					<div class="container text-white" style="background-color:#4c5962;">
						<div class="mt-5">
							<div id="message" class="alert alert-info alert-dismissable "><a class="panel-close close " data-dismiss="alert">×</a><i class="fa fa-coffee"></i>
              Profile updated
              </div>
						</div>
						<form method="POST" action="includes/edit-profile.inc.php">
							<div class="container" style="background-color:#4c5962;">
								<div class="row">
									<div class="col-md-10">
										<div class="py-3 ">
											<h5>
                   	 Welcome, 
												<?php
			                			echo $_SESSION['name'];
			            		 ?>
											</h5>
										</div>
									</div>
									<div class="col-sm-2">
										<input type="submit" id="submit-edit" class="edit-profile btn btn-outline-dark mt-3"  value="Edit Profile"/>
									</div>
								</div>
							</div>
							<hr>
								<div class="col-md-8">
									<div class="row">
										<div class="col-md-6">
											<label>User Id
                         </label>
										</div>
										<div class="col-md-6">
											<div>
												<?php echo $_SESSION['userID'];?>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-6">
											<label>Username
                </label>
										</div>
										<div class="col-md-6">
                    <div>
												<?php echo $_SESSION['username'];?>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-6">
											<label>Name
                </label>
										</div>
										<div class="col-md-6">
											<input name="name" type="text" value="<?php echo $_SESSION['name'];?>">
										</div>
									</div>
									<div class="row">
										<div class="col-md-6">
											<label>Email
                </label>
										</div>
										<div class="col-md-6">
                    <input name="email" type="text" value="<?php echo $_SESSION['email'];?>">
										</div>
									</div>
									<div class="row">
										<div class="col-md-6">
											<label>New Password
                </label>
										</div>
										<div class="col-md-6">
											<input type="password" id="pass1" name="pass1" class="edit" >
											</div>
											<div class="col-md-6">
												<label>Repeat Password
                </label>
											</div>
											<div class="col-md-6">
												<input type="password" id="pass2" name="pass2" class="edit" >
												</div>
												<div class="col-md-6">
													<label>Current Password
                </label>
												</div>
												<div  class="col-md-6">
													<input type="password" id="cpass"name="pass" class="edit" required >
													</div>
												</div>
											</div>
										</div>
									</form>
								</div>
								<!-- Contaienr end -->
								<!-- Bootsrap jQuery and JavaScript -->
								<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
								<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
            integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
            crossorigin="anonymous"></script>
								<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
            integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
            crossorigin="anonymous"></script>
								<!-- <script>
    $(document).ready(function(event){
       
      $('#submit-edit').click(function(event){
            event.preventDefault();
        

        let sess_email =  '<?php echo $_SESSION["email"]?>';
        let sess_username = '<?php echo $_SESSION["username"]?>';
        let sess_name =  '<?php echo $_SESSION["name"]?>';
        if(username == sess_username && email == sess_email && sess_name == name) return ;
        rmAll();

     
       

    });

    $('#submit-password').click(function(event){
        event.preventDefault();
         rmAll();
        let pass1 = $("#pass1").val();
        let pass2 = $("#pass2").val();
        let cpass = $("#cpass").val();
        if(pass1 != pass2){
       
            $('#pass1').addClass('error');
            $('form').after('<span class="text-center err"> Password does not match. </span>');
            $('#pass2').addClass('error');
          return;
        }
        let method = "submit-password";
        let data=  "pass1=" + pass1 +"&pass2=" + pass2 + "&cpass=" +cpass+ "&method=" +method;
  
        $.ajax({
            method: "POST",
            url: "includes/edit-profile.inc.php?",
            data: data,
            dataType: "JSON",
            success: function (response) {
              console.log(response);

              if(response.password_changed){
                  $('#message').show();
              }
           }
           });

    });

    function rmAll(){
      $('#pass1').removeClass('error');
      $('form + span').remove();
      $('#pass2').removeClass('error');
      $('#message').hide();
      $('form + span').remove();
      $('#cpass').removeClass('error');
      $('#cpass').remove('error');
      $('form + span').remove();

      
      $('#name').removeClass('error');
      $('#name + span').remove();
      $('#email').removeClass('error');
      $('#email').remove();
      $('#pass1').removeClass('error');
      $('#pass1 + span').remove();
      $('#pass2').removeClass('error');
      $('#pass2 + span').remove();
      $('#usrname_input').removeClass('error');
      $('#usrname_input + span').remove();
      $('#name_input').removeClass('error');
      $('#name_input + span').remove();
    }
  });
  
  </script> -->
							</body>
						</html>