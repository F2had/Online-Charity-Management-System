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
            <div class="text-center">
              <h2>Logged out successfully</h2>
            </div>
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