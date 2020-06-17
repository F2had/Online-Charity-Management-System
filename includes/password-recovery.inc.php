<?php
require_once('config.inc.php');

if (isset($_GET['email']) && isset($_GET['token'])) 
{
    $email = mysqli_real_escape_string($db, $_GET['email']);
    $token = mysqli_real_escape_string($db, $_GET['token']);
    //Check if the token valid and its not expired 
    $sql = $db->query("SELECT userID FROM users WHERE email = '$email' AND token='$token' AND token<>'' AND tokenExpire > NOW() ");
    //if we found a match we will generate a new random password and the user can change it later 
    if($sql->num_rows > 0){
        $bytes = 5;
        $passwrod = bin2hex(openssl_random_pseudo_bytes($bytes));
        $encPassword = password_hash($passwrod, PASSWORD_BCRYPT);
        //Reset the token and date value
        $db->query("UPDATE users SET token='', password = '$encPassword', tokenExpire = '0000-00-00 00:00:00' WHERE email = '$email'");
        
    }
    else {
        //redirect to the home page if not match found 
        header("Location: ../homepage.php?nomatch=true");
        die();
    }
} 
else
{
     //redirect to the home page if get values not set
    header("Location: ../homepage.php?get=false");
    die();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous" />
    <!-- CSS -->
    <link rel="stylesheet" href="../css/loader.css" />
    <link rel="stylesheet" href="../css/styles.css" />
    <link href="css/style2.css" rel="stylesheet" />
    <!-- Theme skin -->
    <link href="skins/default.css" rel="stylesheet" />
    <!-- boxed bg -->
    <!-- <link id="bodybg" href="bodybg/bg1.css" rel="stylesheet" type="text/css" /> -->
    <link rel="stylesheet" href="../css/login.css" />
    <!-- Line Awsome -->
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100&family=Roboto&family=Titillium+Web&family=Ubuntu:wght@300&display=swap" rel="stylesheet">

</head>

<body>


    <? include_once("loader.inc.php") ?>

    <header>
        <?php
       
        ?>
        <nav class="navbar navbar-expand-md navbar-light bg-light ">
            <div class="container-fluid header">
                <!-- container fluid is make use of 100% of the screen -->
                <nav class="navbar navbar-light bg-light header">
                    <a class="navbar-brand header" href="homepage.php">

                        <img src="../img/logo-filler.png" width="30" height="30" class="d-inline-block align-top" alt="">
                        Raise Reason
                    </a>
                </nav>

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target=#navbarResponsive>
            <span class="navbar-toggler-icon"></span>
          </button>


          <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
              <!-- push our notification to right hand side -->
              <li class="nav-item"> <a class="nav-link" href="../login.php">Login <i class="la la-user-circle la-lg"></i></a>
            </ul>
          </div>
            </div>
        </nav>
    </header>
    <!-- Navigation end -->

    <div class="container">
        <hr>
            <!-- Print the new password  -->
        <div>
            <h3>Your new Password is: <? echo $passwrod?></h3>

        </div>

        <hr>
    <!-- Contaienr end -->
   

    <!-- Bootsrap jQuery and JavaScript -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>


    <!-- jQuery code to show the clicked form and hide the rest && error handling -->
    <script src='js/login_register.js'></script>


</body>

</html>