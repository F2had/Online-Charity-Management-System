<?php
session_start();
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
    <link rel="stylesheet" href="./css/styles.css" />
    <link href="css/style2.css" rel="stylesheet" />
    <!-- Theme skin -->
    <link href="skins/default.css" rel="stylesheet" />
    <!-- boxed bg -->
    <!-- <link id="bodybg" href="bodybg/bg1.css" rel="stylesheet" type="text/css" /> -->
    <link rel="stylesheet" href="./css/login.css" />
    <!-- Line Awsome -->
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100&family=Roboto&family=Titillium+Web&family=Ubuntu:wght@300&display=swap" rel="stylesheet">
</head>

<body>

    
 
        <header>
            <?php
            if (isset($_SESSION['logged_in']) && $_SESSION['logged_in']) {
                header("Location: homepage.php");
            }
            ?>
            <nav class="navbar navbar-expand-md navbar-light bg-light ">
                <div class="container-fluid header">
                    <!-- container fluid is make use of 100% of the screen -->
                    <nav class="navbar navbar-light bg-light header">
                        <a class="navbar-brand header" href="homepage.php">

                            <img src="img/logo-filler.png" width="30" height="30" class="d-inline-block align-top" alt="">
                            Raise Reason
                        </a>
                    </nav>
                </div>
            </nav>
        </header>
        <!-- Navigation end -->

        <div class="container">
            <hr>
            <div class="login-register">

                <!-- Nav tap -->
                <ul class="nav nav-tabs nav-fill test" role="tablist">

                    <li class="nav-item">
                        <a class="nav-link login active" href="#login" role="tab" data-toggle="tab">LOGIN</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link register" href="#register" role="tab" data-toggle="tab">REGISTER</a>
                    </li>

                </ul>

                <!-- Tap content  -->
                <div class="tab-content">

                    <!-- Login form -->
                    <div role="tabpanel" class="tab-pane active container-fluid" id="login">

                        <h1 class="text-center mb-1 py-3">Welcome Back!</h1>

                        <form action="includes/login.inc.php" id="" method="POST">



                            <!-- Email input -->
                            <div class="form-group w-75 py-3 container-fluid">
                                <div class="input-group">
                                    <div class="input-group-text"><i class="las la-at"></i></div>

                                    <input type="text" name="uid" class="form-control" placeholder="Username or Email" />
                                </div>
                            </div>

                            <!-- Password input -->
                            <div class="form-group w-75 py-3 container-fluid">
                                <div class="input-group">
                                    <div class="input-group-text"><i class="las la-lock"></i></div>

                                    <input type="password" name="password" class="form-control" placeholder="Password" required />
                                </div>
                            </div>
                            <!-- Handle login errors  -->
                            <?php
                            if (isset($_GET['error'])) {
                                if ($_GET['error'] == 'empty') {
                                    echo "<div class='container text-center err-login mb-3'>All fields are required</div>";
                                }
                                // For secuity we will not show if the user is not registerd and will output inccorrect password in both cases
                                else if ($_GET['error'] == 'incorrectpass' || $_GET['error'] == 'notexist') {
                                    echo "<div class='container text-center err-login mb-3'>Incorrect username or password.</div>";
                                }
                            }
                            if (isset($_GET['login'])) {
                                if ($_GET['login'] == 'success') {
                                    // FIXME change to php later
                                    header("Location: homepage.php");
                                }
                            }
                            ?>

                            <!-- Login button -->
                            <div class="text-center"><input name="login-submit" type="submit" class="btn btn-success btn-custom btn-outline-light" value="Login" /></div>

                        </form>

                    </div>
                    <!-- Login form end -->

                    <!-- Register form -->
                    <div role="tabpanel" class="tap-pane container-fluid" id="register">

                        <h1 class="text-center py-3 mb-1 container-fluid">Join Us Today!</h1>
                        <form id="signup-form" method="POST" enctype="multipart/form-data">

                            <!-- Name -->
                            <div class="form-group w-75 py-3 container-fluid">
                                <div class="input-group">
                                    <div class="input-group-text"><i class="las la-signature"></i></div>
                                    <input id="name_input" name="name" type="text" class="form-control" placeholder="Name *"  />
                                </div>
                            </div>

                            <!-- Username input -->
                            <div class="form-group w-75 py-3 container-fluid">
                                <div class="input-group">
                                    <div class="input-group-text"><i class="las la-user"></i></div>

                                    <input type="text" id="usrname_input" name="username" class="form-control" placeholder="Username *"/>
                                </div>
                            </div>

                            <!-- Email -->
                            <div class="form-group w-75 py-3 container-fluid">
                                <div class="input-group">
                                    <div class="input-group-text"><i class="las la-at"></i></div>
                                    <input type="email" id="email_input" name="email" class="form-control" placeholder="Email *"/>
                                </div>
                            </div>

                            <!-- Profile picture -->
                            <div class="form-group w-75 py-3 container-fluid">
                                <div class="input-group">
                                    <div class="input-group-text"><i class="las la-portrait"></i></div>
                                    <input class="input-file" id="fileInput" type="file" name="file">
                                </div>
                            </div>
                            <!-- onfocus="this.type='file' -->
                            <!-- Password -->
                            <div class="form-group w-75 py-3 container-fluid">
                                <div class="input-group">
                                    <div class="input-group-text"><i class="las la-key"></i></div>
                                    <input id='ps1' type="password" name="pass1" class="form-control .pass" placeholder="Password *" required />
                                </div>
                            </div>

                            <!-- Repeat password -->
                            <div class="form-group w-75 py-3 container-fluid">
                                <div class="input-group">
                                    <div class="input-group-text"><i class="las la-key"></i></div>
                                    <input type="password" id='ps2' name="pass2" class="form-control" placeholder="Confirm your Password *" required />
                                </div>
                            </div>


                            <!-- Register button -->
                            <div class="text-center"> <input type="submit" id="submit-signup" name="submit-signup" class="btn btn-outline-light btn-custom" value="Register" /></div>

                        </form>

                    </div>
                    <!-- Register form end-->

                    <!-- success message -->
                    <div id="reg-suc" class='container'>

                    </div>

                </div>
                <!-- Tap content end -->

            </div>
                    <hr>
         
        </div>
        <!-- Contaienr end -->
        <div>
        
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
    <div id="sub-footer mt-2" class="sub-footer">
        <div class="container sub-footer">
        <hr>
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
                        <li><a href="#" data-placement="top" title="Facebook"><i class="la la-facebook"></i></a>
                        </li>
                        <li><a href="#" data-placement="top" title="Twitter"><i class="la la-twitter"></i></a>
                        </li>
                        <li><a href="#" data-placement="top" title="Linkedin"><i class="la la-linkedin"></i></a>
                        </li>
                        <li><a href="#" data-placement="top" title="Pinterest"><i class="la la-pinterest"></i></a></li>
                        <li><a href="#" data-placement="top" title="Google plus"><i class="la la-google-plus"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>
        </div>

        <!-- Bootsrap jQuery and JavaScript -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>


        <!-- jQuery code to show the clicked form and hide the rest && error handling -->
        <script src='js/login_register.js'></script>


</body>

</html>