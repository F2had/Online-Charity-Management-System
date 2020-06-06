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
    <link href="https://fonts.googleapis.com/css?family=Roboto|Montserrat:wght|Titillium+Web&display=swap" rel="stylesheet">
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
        <nav class="navbar navbar-expand-md navbar-light bg-light ">
          <div class="container-fluid">
            <!-- container fluid is make use of 100% of the screen -->
            <nav class="navbar navbar-light bg-light">
              <a class="navbar-brand" href="homepage.html">
                <img src="img/logo-filler.png" width="30" height="30" class="d-inline-block align-top" alt=""> Raise Reason 
              </a>
            </nav> 
          </div>
        </nav>
      </header>
      <!-- Navigation end -->
      <div class="container text-white" style="background-color:#4c5962;">
			<div class="mt-5">
		  <div class="alert alert-info alert-dismissable ">
    	      <a class="panel-close close " data-dismiss="alert">×</a> 
    	      <i class="fa fa-coffee"></i>
				Profile updated
			</div>
		</div>
        <form method="POST">
          <div class="container" style="background-color:#4c5962;">
            <div class="row">
              <div class="col-md-6">
                <div class="py-3 ">
                  <h5>
                   	 Welcome, 
                   	 <?php
						echo $_SESSION['name'];
					 ?>
                  </h5>
                </div>
              </div>
              <div class="col-md-6 py-3">
                <input type="submit" id="submit-edit" class="edit-profile float-right btn btn-outline-dark" name="btnAddMore" value="Edit Profile"/>
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
			  <div class="edit" id="username" contenteditable="true" >
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
                <div class="edit" id="name" contenteditable="true" >
				<?php echo $_SESSION['name'];?>
				</div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <label>Email
                </label>
              </div>
              <div class="col-md-6">
			  <div class="edit" id="email" contenteditable="true" >
				<?php echo $_SESSION['email'];?>
				</div>
              </div>
			</div>
			
			<div class="row">
              <div class="col-md-6">
                <label>New Password
                </label>
              </div>
              <div class="col-md-6">
                <input id="pass1" name="pass1" class="edit" >
			  </div>
			  <div class="col-md-6">
                <label>Repeat Password
                </label>
              </div>
              <div class="col-md-6">
                <input id="pass2" name="pass2" class="edit" >
			  </div>
			  <div class="col-md-6">
                <label>Current Password
                </label>
              </div>
              <div class="col-md-6">
                <input id="cpass"name="pass" class="edit" >
              </div>
			</div>
			
          </div>
          </div>
        </form>   
    </div>
		<!-- Contaienr end -->
		
    	<!-- Bootsrap jQuery and JavaScript -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
            integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
            crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
            integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
            crossorigin="anonymous">
	</script>

  </body>
</html>