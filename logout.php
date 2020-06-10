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
			} else {
                session_destroy();
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
            <li class="nav-item" > <a class="nav-link" href="login.php">Login <i class="la la-user-circle la-lg" ></i></a>
						</ul>
          </div>
          

				</div>
			</nav>		
      </header>
      <!-- Navigation end -->
      <div class="container">
         <hr>
            <div>
              <h2 class="text-center">You have been logged out successfully</h2>
              <p class="text-center demo">You will be redircted to the Home Page in <strong><span id="seconds"></span></strong>s</p>
            </div>

      </div>
          <hr>
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
  <script>

      var counter = 6;
let countDown = new Date('Sep 30, 2020 00:00:00').getTime(),
    x = setInterval(function() {    
       counter--;
      $("#seconds").text(counter);
      
      if(counter < 1){
        window.location.replace("homepage.php");
      }

    }, 1000)
  </script>
  

  </body>
</html>