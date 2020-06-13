<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">

</html>

<head>
    <meta charset="utf-8">
    <title>Charity Page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- css -->
    <!-- <link href="css/bootstrap.min.css" rel="stylesheet" /> -->


    <!-- <link href="plugins/flexslider/flexslider.css" rel="stylesheet" media="screen" /> -->
    <!-- <link href="css/cubeportfolio.min.css" rel="stylesheet" /> -->
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <!-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="./css/loader.css" />
    <link href="css/style2.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!-- Theme skin -->
    <link href="skins/default.css" rel="stylesheet" />

    <!-- boxed bg -->
    <link id="bodybg" href="bodybg/bg1.css" rel="stylesheet" type="text/css" />



</head>

<body>
<? include_once("includes/loader.inc.php") ?>
    <div id="wrapper">
        <header>
            <nav class="navbar navbar-expand-md navbar-light bg-light">
                <div class="container-fluid">
                    <!-- container fluid is make use of 100% of the screen -->
                    <a class="navbar-brand " href="homepage.php"><img style="width: 25%; height: 25%;" src="img/logo-filler.png">
                        <lo>Raise reason</lo>
                    </a>

                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target=#navbarResponsive>
                        <span class="navbar-toggler-icon"></span>
                    </button>


                    <div class="collapse navbar-collapse" id="navbarResponsive">
                        <ul class="navbar-nav ml-auto">
                            <!-- push our notification to right hand side -->
                            <li class="nav-item"> <a class="nav-link" href="homepage.php">Home</a> </li>

                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="Volunteer.html" id="navbarDropdownMenuLink" data-toggle="dropdown">Volunteer</a>
                                <div class="dropdown-menu " aria-labelledby="navbarDropdownMenuLink">
                                    <a class="dropdown-item" href="Volunteer.php">Volunteer Registration</a>
                                    <a class="dropdown-item" href="ProjectRegisterationForm.html">Volunteer project
                                        registration</a>

                                </div>
                            </li>
                            <li class="nav-item"> <a class="nav-link" href="meeting-report.html">Reports</a></li>

                            <?php if (!empty($_SESSION['username'])) : ?>
                                <li class="nav-item dropdown"> <a class="nav-link" data-toggle="dropdown" href="#"><?php echo $_SESSION['username'] ?> <i class="fa fa-user-circle fa-lg"></i></a>
                                    <div class="dropdown-menu " aria-labelledby="navbarDropdownMenuLink">
                                        <a class="dropdown-item" href="profile.php">Profile</a>
                                        <a class="dropdown-item" href="logout.php">Logout</a>
                                    </div>
                                </li>
                            <?php else : ?>
                                <li class="nav-item"> <a class="nav-link" href="login.php">Login|Signup <i class="fa fa-user-circle fa-lg"></i></a>
                                </li>
                            <?php endif ?>
                        </ul>
                    </div>

                </div>
            </nav>
        </header>