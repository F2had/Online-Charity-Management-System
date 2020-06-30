<?php include_once('includes/top.php') ?>
<?php include_once "includes/connect_database.php" ?>

<?php

?>

<div class="container2">
    <img src="img/bodybg/bg1.png" height="200x">
    <div class="centered">
        <!-- <y style="text-transform: uppercase;font-size: 60px;font-weight: 700; line-height: 1em; letter-spacing: -1px;">Awesome Charity
				</y> -->
        <y style="text-transform: uppercase;font-size: 60px;font-weight: 700; line-height: 1em; letter-spacing: -1px;">
            Awesome Charity
        </y>
    </div>
</div>

<section id="content">
    <!-- Page Content -->
    <div class="container">
        <!-- Page Heading -->
        <div class="mb-lg-5">
            <h3>Expired Charity Project</h3>
            <ul>
                <li>
                    <h6>Managing info is no longer possible</h6>

                </li>
                <li>
                    <h6>Please contact admin for date extension</h6>
                </li>
            </ul>

        </div>


        <hr>
        <br>


        <?php
        if (!empty(isset($_GET['view']))) :
            $viewID = $_GET['view'];
            $userID = $_SESSION['userID'];

            $sql = "SELECT * FROM project INNER JOIN users ON project.userID = users.userID WHERE project.idproject = $viewID AND project.userID = $userID";

            $result = mysqli_query($conn, $sql);
            $resultCheck = mysqli_num_rows($result);


        ?>
            <?php if ($resultCheck > 0) : ?>
                <?php while ($row = mysqli_fetch_assoc($result)) :  ?>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="cours2">
                                <a href="#" data-toggle="modal" data-target="#project_description1">
                                    <?php echo '<img class="img-fluid hover" src="uploaded_img/' . $row['imguniqname'] . '">' ?>
                                    <div class="cours4 text-center">
                                        <button class="cou">View More</button>
                                    </div>
                                </a>
                            </div>

                        </div>

                        <div class="col-md-5">
                            <div class="middle-left">
                                <div class="tooltip2">
                                    <?php echo '<h3><a href="#" style="color: #4D4D4D; font-weight:800; top: 10%;" data-toggle="modal" data-target="#project_description1">' . $row['nameproject'] . '</a></h3>' ?>
                                    <span class="tooltiptext2">Click to view more</span>
                                </div>
                                <?php echo '<p>by<a href="#"><strong style="color: #999999;"> ' . $row['username'] . ' </strong></a></p>' ?>

                            </div>
                        </div>

                        <!-- MODAL PROJECT 1 -->
                        <div class="modal fade" id="project_description1" tabindex="-1" role="dialog" aria-labelledby="project_description1" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h3 class="modal-title" id="exampleModalCenterTitle"><strong>DESCRIPTION</strong>
                                        </h3>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">

                                        <h6><strong>The Story:</strong></h6>
                                        <?php echo '<p>' . $row['desproject'] . '</p>' ?>

                                        <!-- <h6><strong>Problem:</strong></h6>
									<p>...</p>

									<h6><strong>Solution:</strong></h6>
									<p>...</p> -->

                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- PROGRESS BAR SECTION -->
                        <div class="col-md-3">
                            <!-- PROGRESS BAR -->
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-striped" role="progressbar" style="width: 10%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>

                            </div>

                            <!-- DONATED AMOUNT, GOAL AMOUNT -->
                            <div class="row">
                                <div class="col-md-12">
                                    <h4 class="heading">Current: </h4>
                                    <p class="text-muted"> Looking for: <?php echo $row['amountvolunteer'] ?> volunteers </p>
                                    <p class="text-muted"> Available from: <?php echo $row['sdate'] ?> </p>
                                    <p class="text-muted"> Available until: <?php echo $row['edate'] ?> </p>
                                </div>
                            </div>

                            <div class="row mt-2">
                                <!-- //////////////////////////////////////////////volunteerslist///////////////////////////////////////////////////// -->
                                <div class="col-md-4 col-4 text-center">
                                    <div class="containerDonate">

                                        <a href="#" data-toggle="modal" data-target="#volunteerproject1"><img class="img-fluid mb-3 mb-md-0 volunteerIcon btn-4" width="70" height="70" src="img\voluunteer bg trans.png" alt="DONATE"></a>

                                        <div class="modal fade" id="volunteerproject1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <!--Header-->
                                                    <div class="modal-header">
                                                        <h4 class="modal-title" id="myModalLabel">Volunteers List</h4>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">×</span>
                                                        </button>
                                                    </div>
                                                    <!--Body-->
                                                    <div class="modal-body">

                                                        <table class="table table-hover">
                                                            <thead>
                                                                <tr>
                                                                    <th>#</th>
                                                                    <th>Name</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <th scope="row">1</th>
                                                                    <td>Adam</td>


                                                                </tr>
                                                                <tr>
                                                                    <th scope="row">2</th>
                                                                    <td>Gabriel</td>


                                                                </tr>
                                                                <tr>
                                                                    <th scope="row">3</th>
                                                                    <td>Baogang</td>

                                                                </tr>
                                                                <tr>
                                                                    <th scope="row">4</th>
                                                                    <td>Elwin</td>

                                                                </tr>
                                                            </tbody>
                                                        </table>

                                                    </div>
                                                    <!--Footer-->
                                                    <div class="modal-footer">
                                                        <a href="ProjectVolunteer.php" class="btn btn-outline-warning">Join</a>
                                                        <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Close</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                    </div>

                                    <p class="text-center">Volunteers</p>
                                </div>
                                <div class="col-md-4 col-4 text-center">
                                    <div class="containerDonate">

                                        <div class="dissapear">
                                            <a href="meeting-report.php"><img class="img-fluid rounded mb-3 mb-md-0 share " width="70" height="70" src="img\report.png" alt="Reports"></a>
                                        </div>
                                    </div>

                                    <p>Reports</p>
                                </div>

                                <!-- //////////////////////////////////////////////volunteerslist///////////////////////////////////////////////////// -->
                            </div>
                        </div>
                    </div>

                    <br>
                    <hr>
                    <br>

                <?php endwhile; ?>
            <?php else : ?>
                <div class="alert alert-info" role="alert">
                    <p>No expire project</p>
                </div>
            <?php endif; ?>
        <?php else : ?>
            <div class="alert alert-info" role="alert">
                <p>Only logged in and authorized can access this page.</p>
            </div>
        <?php endif; ?>



        <!-- hereinsert -->





    </div>
    <!-- /.container -->
</section>

<?php include_once('includes/footer.php') ?>

<!-- add poject button -->


<div class="modal fade" id="modalcreateproject" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div id="quoteMain" class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header text-left bg-warning text-uppercase">
                <h4 class="modal-title w-100 font-weight-bold">Create Charity Project</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body mx-3">
                <div class="md-form mb-4 text-left ">
                    <label data-error="wrong" data-success="right" for="charityName">Charity Name:</label>
                    <input type="name" id="charityName" class="form-control validate" placeholder="Enter charity name here">
                </div>

                <div class="md-form mb-4  text-left ">
                    <label data-error="wrong" data-success="right" for="charitydescription">Charity
                        Description:</label>
                    <textarea class="form-control" id="charitydescription" rows="4" placeholder="Enter description here"></textarea>
                </div>

                <div class="md-form mb-4 pb-3  text-left ">
                    <label data-error="wrong" data-success="right" for="charityRaise">Amount to Raise:</label>
                    <input class="form-control" id="charityRaise" placeholder="Enter amount here"></input>
                </div>

                <div class="md-form mb-4 text-left ">
                    <div class="input-group ">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="charityImg">
                            <label class="custom-file-label" for="inputGroupFile01">Choose Image</label>
                        </div>
                    </div>
                    <small class="form-text text-muted">Image provide more context to the audience, helping them
                        gain a better understanding of a charity's mission.</small>
                </div>



            </div>
            <div class="modal-footer d-flex justify-content-center">
                <button class="btn btn-outline-primary">SUBMIT</button>
            </div>

        </div>
    </div>
</div>

<?php if (!empty($_SESSION['username'])) : ?>
    <div class="scrollup2">
        <a href="manageCharity.php">
            <button class="btn btn-circle btn-xl btn-1 volunteerIcon">
                <i class="fa fa-tasks fa-l" g></i>
            </button>
        </a>
        <span class="scrolluptext">Click to add/manage charity</span>
    </div>

<?php endif ?>