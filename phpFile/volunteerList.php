<!DOCTYPE html>
<html>
<head>
    <title>Voluteer List</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- css -->
    <!-- <link href="css/bootstrap.min.css" rel="stylesheet" /> -->
    

    <link href="plugins/flexslider/flexslider.css" rel="stylesheet" media="screen" />
    <link href="css/cubeportfolio.min.css" rel="stylesheet" />

    <link href="css/style2.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


    <!-- Theme skin -->
    <link id="t-colors" href="skins/default.css" rel="stylesheet" />

    <!-- boxed bg -->
    <link id="bodybg" href="bodybg/bg1.css" rel="stylesheet" type="text/css" />
</head>
<body>
    <div id="wrapper">
        <!-- start header -->
        <header>
            <nav class="navbar navbar-expand-md navbar-light bg-light">
                <div class="container-fluid"> <!-- container fluid is make use of 100% of the screen -->
                    <a class="navbar-brand " href="#"><img style="width: 25%; height: 25%;" src="img/logo-filler.png"><lo>Raise reason</lo></a>

                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target=#navbarResponsive>
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarResponsive">
                        <ul class="navbar-nav ml-auto"><!-- push our notification to right hand side -->
                            <li class="nav-item" > <a class="nav-link" href="charityProjectPage.html">Home</a> </li>
                            
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown">Volunteer</a>
                                <div class="dropdown-menu " aria-labelledby="navbarDropdownMenuLink">
                                    <a class="dropdown-item" href="Volunteer.html">Volunteer Registration</a>
                                    <a class="dropdown-item" href="ProjectRegisterationForm.php">Volunteer project registration</a>
                                    
                                </div>
                            </li>
                            <li class="nav-item" > <a class="nav-link" href="#">Reports</a></li>

                            <li class="nav-item">
                                <div id="sb-search" class="sb-search">
                                    <form>
                                        <input class="sb-search-input" placeholder="Enter your search term..." type="text" value="" name="search" id="search">
                                        <input class="sb-search-submit" type="submit" value="">
                                        <span class="sb-icon-search" title="Click to start searching"></span>
                                    </form>
                                </div>
                            </li>

                            <li class="nav-item" > <a class="nav-link" href="login.html">User <i class="fa fa-user-circle fa-lg" ></i></a>                                                              
                            </li>                           
                        </ul>
                    </div>
                </div>
            </nav>              
        </header>
        <br><br>
        <?php
            $username = "root";
            $password = "";
            $database = "charityproject";
            $mysqli = new mysqli("localhost", $username, $password, $database);
    
            $query = "SELECT * FROM volunteerform";
            echo "<b> <center><h1>Project Name</h1></center> </b> <br> <br>";
 
            if ($result = $mysqli->query($query)) {
    
                while ($row = $result->fetch_assoc()) {
                    $field1name = $row["ID"];
                    $field2name = $row["Username"];
                    $field3name = $row["Password"];
                    $field4name = $row["FirstName"];
                    $field5name = $row["LastName"];
                    $field6name = $row["Gender"];
                    $field7name = $row["Email"];
                    $field8name = $row["PhoneCode"];
                    $field9name = $row["Phone"];
                    $field10name = $row["ProjectParticipate"];

                    echo"
                    <center>
                        <table>
                            <tr>
                                <td>FirstName</td>
                                <td>LastName</td>
                                <td>Gender</td>
                                <td>Email</td>
                                <td>PhoneCode</td>
                                <td>Phone</td>
                            </tr>
                           <tr>
                                <td>$field4name</td>
                                <td>$field5name</td>
                                <td>$field6name</td>
                                <td>$field7name</td>
                                <td>$field8name</td>
                                <td>$field9name</td>
                            </tr>
                        </table>
                    </center>";
                }   
            $result->free();
            }
        ?>
        <br><br>
        <footer>
            <div class="container">
                <div class="row">
                    <div class="col-sm-3 col-lg-6">
                        <div class="widget">
                            <h4>Get in touch with us</h4>
                            <address>
                                <strong>TheProcrastinators company Inc</strong><br>
                                TheProcrastinators suite room V124, DB 91<br>
                            Someplace 457648 Earth 
                        </address>
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
    </div>
</body>
</html>