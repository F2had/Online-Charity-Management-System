<?php
   session_start();
   ?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1.0" />
      <title>Profile
      </title>
      <!-- Bootstrap -->
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous" />
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
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
      <!-- Bootsrap jQuery and JavaScript -->
   </head>
   <body>
      <header>
         <?php
            if(!$_SESSION['logged_in']){
            header("Location: login.php");
            		}
            	?>
         <nav class="navbar navbar-expand-md navbar-light bg-light">
            <div class="container-fluid">
               <!-- container fluid is make use of 100% of the screen -->
               <a class="navbar-brand" href="homepage.php">
               <img src="img/logo-filler.png" width="30" height="30" class="d-inline-block align-top" alt="">
               Raise Reason
               </a>
               <button class="navbar-toggler" type="button" data-toggle="collapse" data-target=#navbarResponsive>
               <span class="navbar-toggler-icon"></span>
               </button>
               <div class="collapse navbar-collapse" id="navbarResponsive">
                  <ul class="navbar-nav ml-auto">
                     <!-- push our notification to right hand side -->
                     <li class="nav-item"> <a class="nav-link" href="homepage.php">Home</a> </li>
                     <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown">Volunteer</a>
                        <div class="dropdown-menu " aria-labelledby="navbarDropdownMenuLink">
                           <a class="dropdown-item" href="Volunteer.html">Volunteer Registration</a>
                           <a class="dropdown-item" href="ProjectRegisterationForm.html">Volunteer project registration</a>
                        </div>
                     </li>
                     <li class="nav-item"> <a class="nav-link" href="meeting-report.html">Reports</a></li>
                     <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown"><?php echo $_SESSION['name']?> <i class="la la-user-circle la-lg"></i></a>
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
      <div class="container">
         <hr>
         <div class="container emp-profile">
         <form action="includes/edit-profile.inc.php" method="POST" enctype="multipart/form-data">
            <div class="row">
            
               <div class="col-md-4">
                  <div class="profile-img">
                     <img src="<? echo $_SESSION['img']; ?>" width:20px; height:20px; alt="profile" />
                     <div class="file btn btn-lg btn-primary">
                        <label for="file" >Change Photo</label>
                        <input type="file" name="img"/>
                     </div>
                  </div>
               </div>


               <div class="col-md-6">
                  <div class="profile-head">
                     <h5>
                        Welcome, 
                        <?echo $_SESSION['name']?>
                     </h5>
                     <h6>
                        Web Developer and Designer
                     </h6>

                     <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                           <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" >Info
                           </a>
                        </li>

                        <li class="nav-item">
                           <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" >Edit
                           </a>
                        </li>

                        <li class="nav-item">
                           <a class="nav-link" id="password-tab" data-toggle="tab" href="#password" role="tab">Change Password
                           </a>
                        </li>

                        <li class="nav-item">
                           <a class="nav-link" style="color:red;" id="delete-tab" data-toggle="tab" href="#delete" role="tab">Delete account
                           </a>
                        </li>

                     </ul>

                  </div>
               </div>
            </div>


            <div class="row">

               <div class="col-md-8" id="home">
                  <div class="tab-content profile-tab" id="myTabContent">
                     <div class="tab-pane  show active" role="tabpanel" aria-labelledby="home-tab">
                        <div class="row">
                           <div class="col-md-6 ">
                              <label>User Id
                              </label>
                           </div>
                           <div class="col-md-6">
                              <p>
                                 <?echo $_SESSION['userID']?>
                              </p>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-md-6">
                              <label>Username
                              </label>
                           </div>
                           <div class="col-md-6">
                              <p>
                                 <?echo $_SESSION['username']?>
                              </p>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-md-6">
                              <label>Name
                              </label>
                           </div>
                           <div class="col-md-6">
                              <p>
                                 <?echo $_SESSION['name']?>
                              </p>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-md-6">
                              <label>Email
                              </label>
                           </div>
                           <div class="col-md-6">
                              <p>
                                 <?echo $_SESSION['email']?>
                              </p>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-md-6">
                              <label>Phone
                              </label>
                           </div>
                           <div class="col-md-6">
                              <p>123 456 7890
                              </p>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-md-6">
                              <label>Profession
                              </label>
                           </div>
                           <div class="col-md-6">
                              <p>Web Developer and Designer
                              </p>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>

               <div  class="col-md-8" id="profile">
               <div class=" profile-tab" id="myTabContent">
                     <div class="tab-pane" role="tabpanel" aria-labelledby="profile-tab">
                      
                        <div class="row">
                           <div class="col-md-6">
                              <label>Name
                              </label>
                           </div>
                           <div class="col-md-6">
                              
                             <input class="edit" name="name" value="<?echo $_SESSION['name']?>">
                           </div>
                        </div>

                        <div class="row">
                           <div class="col-md-6">
                              <label>Email
                              </label>
                           </div>
                           <div class="col-md-6">
                           <input class="edit" name="email" value="<?echo $_SESSION['email']?>">
                           </div>
                        </div>

                        <div class="row">
                           <div class="col-md-6">
                              <label>Phone
                              </label>
                           </div>
                           <div class="col-md-6">
                              <input class="edit" valus="123 456 789">
                           </div>
                           </div>
                        </div>
                        
                        <div class="row">
                           <div class="col-md-6">
                              <label>Current Password
                              </label>
                           </div>
                           <div class="col-md-6">
                              <input name="cpass" type="password" class="edit">
                           </div>
                        </div>

                                                
                        <div class="row">
                           <div class="col-md-6">
                              <input name="update" type="submit" class="edit">
                           </div>
                        </div>

                     </div>
                  </div>
               </div>

               </form>


               <div  class="col-md-8" id="password">
                  <div class=" profile-tab" id="myTabContent">
                  <form action="includes/edit-profile.inc.php" method="POST" enctype="multipart/form-data">
                     <div class="tab-pane" role="tabpanel" aria-labelledby="profile-tab">
                      

                       <div class="row">
                         
                           <div class="col-md-6">
                              <label> New Password
                              </label>
                           </div>
                           <div class="col-md-6">
                           <input type="password" class="edit" name="pass1">
                           </div>
                        </div>

                        <div class="row">
                           <div class="col-md-6">
                              <label>Repeat Password
                              </label>
                           </div>
                           <div class="col-md-6">
                           <input type="password" class="edit" name="pass2">
                           </div>
                        </div>

                        
                        <div class="row">
                           <div class="col-md-6">
                              <label>Current Password
                              </label>
                           </div>
                           <div class="col-md-6">
                              <input name="cpass" type="password" class="edit">
                           </div>
                        </div>

                        <input type="submit" name="reset" id="">
                        
                       
                     </div>
                  </div>
                  </form>
               </div>

               <div  class="col-md-8" id="delete">
               <form action="includes/edit-profile.inc.php" method="POST" enctype="multipart/form-data">
               <div class=" profile-tab" id="myTabContent">
                     <div class="tab-pane" role="tabpanel" aria-labelledby="profile-tab">
                       

                        <div class="row">
                           <div class="col-md-6">
                              <label>Current Password
                              </label>
                           </div>
                           <div class="col-md-6">
                              <input name="cpass" type="password" class="edit">
                           </div>
                        </div>

                        <div class="col-md-6">
                              <input name="delete" type="submit" class="edit">
                           </div>
                        </div>

                     </div>
                  </div>
                  </form>
               </div>



               


              



            </div>
           
         </div>
        
      </div>
      <hr>
      <!-- Contaienr end -->
      <div>
         <footer>
            <div class="container">
               <div class="row">
                  <div class="col-sm-3 col-lg-6">
                     <div class="widget">
                        <h4>Get in touch with us
                        </h4>
                        <address>
                           <strong>TheProcrastinators company Inc
                           </strong>
                           <br>
                           TheProcrastinators suite room V124, DB 91
                           <br>
                           Someplace 457648 Earth 
                        </address>
                        <p>
                           <i class="icon-phone">
                           </i> (123) 456-7890
                           <br>
                           <i class="icon-envelope-alt">
                           </i> email@domainname.com
                        </p>
                     </div>
                  </div>
                  <div class="col-sm-3 col-lg-6">
                     <div class="widget">
                        <h4>Information
                        </h4>
                        <ul class="link-list">
                           <li>
                              <a href="#">Terms and conditions
                              </a>
                           </li>
                           <li>
                              <a href="#">Contact us
                              </a>
                           </li>
                        </ul>
                     </div>
                  </div>
                  <div class="col-sm-3 col-lg-3">
                  </div>
               </div>
            </div>
            <div id="sub-footer mt-2">
               <div class="container">
                  <hr>
                  <div class="row">
                     <div class="col-lg-6">
                        <div class="copyright">
                           <p>&copy;All Right Reserved
                           </p>
                           <div class="credits">
                              Designed by 
                              <a href="">TheProcrastinators
                              </a>
                           </div>
                        </div>
                     </div>
                     <div class="col-lg-6">
                        <ul class="social-network">
                           <li>
                              <a href="#" data-placement="top" title="Facebook">
                              <i class="la la-facebook">
                              </i>
                              </a>
                           </li>
                           <li>
                              <a href="#" data-placement="top" title="Twitter">
                              <i class="la la-twitter">
                              </i>
                              </a>
                           </li>
                           <li>
                              <a href="#" data-placement="top" title="Linkedin">
                              <i class="la la-linkedin">
                              </i>
                              </a>
                           </li>
                           <li>
                              <a href="#" data-placement="top" title="Pinterest">
                              <i class="la la-pinterest">
                              </i>
                              </a>
                           </li>
                           <li>
                              <a href="#" data-placement="top" title="Google plus">
                              <i class="la la-google-plus">
                              </i>
                              </a>
                           </li>
                        </ul>
                     </div>
                  </div>
               </div>
            </div>
         </footer>
      </div>
      <!-- jQuery code to show the clicked form and hide the rest && error handling -->
      <script src='js/login_register.js'></script>
   </body>
</html>