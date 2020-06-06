<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login</title>


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
            <nav class="navbar navbar-expand-md navbar-light bg-light ">
                <div class="container-fluid">
                    <!-- container fluid is make use of 100% of the screen -->
                    <nav class="navbar navbar-light bg-light">
                        <a class="navbar-brand" href="homepage.html">

                         <img src="img/logo-filler.png" width="30" height="30" class="d-inline-block align-top" alt="">
                                                              Raise Reason
                        </a>
                    </nav> 
                </div>
            </nav>
        </header>
        <!-- Navigation end -->

        <div class="container">

            <div class="login-register">

                <!-- Nav tap -->
                <ul class="nav nav-tabs nav-fill" role="tablist">

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

                                    <input type="text" name="uid" class="form-control" placeholder="Username or Email"/>
                                </div>
                            </div>

                            <!-- Password input -->
                            <div class="form-group w-75 py-3 container-fluid">
                                <div class="input-group">
                                    <div class="input-group-text"><i class="las la-lock"></i></div>

                                    <input type="password" name="password" class="form-control" placeholder="Password" required/>
                                </div>
                            </div>
                            <!-- Handle login errors  -->
                            <?php
                                   if(isset($_GET['error'])){
                                        if($_GET['error'] == 'empty'){
                                            echo "<div class='container text-center err-login'>All fields are required</div>";
                                        } 
                                        // For secuity we will not show if the user is not registerd and will output inccorrect password in both cases
                                        else if ($_GET['error'] == 'incorrectpass' || $_GET['error'] == 'notexist'){
                                            echo "<div class='container text-center err-login'>Incorrect username or password.</div>";
                                        }
                                   }
                                   if(isset($_GET['login'])){
                                    if($_GET['login'] == 'success'){
                                        // FIXME change to php later
                                        header("Location: homepage.html");
                                    } 
                               }
                                   ?>
                            <!-- Remember me and forget password -->
                            <div class="form-group w-75 py-3 container-fluid">
                                <input type="checkbox" id="rememberMe" />
                                <label class="text-white" for="rememberMe">Remember me</label>
                                <a href="#" id="resetpass" class="float-right">Forgot password?</a>
                            </div>

                            <!-- Login button -->
                            <div class="text-center"><input name="login-submit" type="submit"
                                    class="btn btn-success btn-custom btn-outline-light" value="Login" /></div>

                        </form>

                    </div>
                    <!-- Login form end -->

                    <!-- Register form -->
                    <div role="tabpanel" class="tap-pane container-fluid" id="register">

                        <h1 class="text-center py-3 mb-1 container-fluid">Join Us Today!</h1>
                        <form action="includes/signup.inc.php" id="signup-form" method="POST">

                            <!-- Name -->
                            <div class="form-group w-75 py-3 container-fluid">
                                <div class="input-group">
                                    <div class="input-group-text"><i class="las la-signature"></i></div>
                                    <input id="name_input" name="name" type="text" class="form-control" placeholder="Name *" required />
                                </div>
                            </div>

                            <!-- Username input -->
                            <div class="form-group w-75 py-3 container-fluid">
                                <div class="input-group">
                                    <div class="input-group-text"><i class="las la-user"></i></div>

                                    <input type="text" id="usrname_input" name="username" class="form-control" placeholder="Username *"
                                        required />
                                </div>
                            </div>

                            <!-- Email -->
                            <div class="form-group w-75 py-3 container-fluid">
                                <div class="input-group">
                                    <div class="input-group-text"><i class="las la-at"></i></div>
                                    <input type="email" id="email_input" name="email" class="form-control" placeholder="Email *" required />
                                </div>
                            </div>

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
                                    <input type="password" id='ps2' name="pass2" class="form-control" placeholder="Confirm your Password *"
                                        required />
                                </div>
                            </div>
                           

                            <!-- Register button -->
                            <div class="text-center"> <input type="submit" id="submit-signup" name="submit-signup" class="btn btn-outline-light btn-custom"
                                    value="Register" /></div>

                        </form>

                    </div>
                    <!-- Register form end-->

                    <!-- success message -->
                    <div id="reg-suc" class='container'>
                    
                    </div>

                </div>
                <!-- Tap content end -->

            </div>

            <!-- Reset password form -->
            <div id="passform" class="container-fluid">
                <form action="includes/reset.inc.php" method="POST">
                    <h1 class="text-center pt-3 mb-1 container">Reset Password</h1>

                    <!-- Name -->
                    <div class="form-group w-75 py-4 container-fluid">
                        <div class="input-group">
                            <div class="input-group-text"><i class="las la-at"></i></div>
                            <input type="email" class="form-control" placeholder="Email" required />
                        </div>
                    </div>

                    <!-- Reset password button -->
                    <div class="text-center"> <input name="reset-submit" type="submit" class="btn btn-custom btn-outline-light"
                            value="Reset" /></div>
                </form>
            </div>
            <!-- Reset password form end-->

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


        <!-- jQuery code to show the clicked form and hide the rest && error handling -->
        <script src='js/login_register.js'></script>


</body>

</html>