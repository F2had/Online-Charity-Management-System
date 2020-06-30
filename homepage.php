<?php include_once('includes/top.php') ?>
<?php include_once "includes/connect_database.php" ?>

<?php
// $currUser = $_SESSION['userID'];

// $result = $conn->query("SELECT * FROM project WHERE userID=$currUser");

// if ($result->num_rows >= 1) {
// 	while ($row = $result->fetch_assoc()) {
// 		echo $row['edate'];
// 	}
// }


if (isset($_GET['page_no']) && $_GET['page_no'] != "") {
	$page_no = $_GET['page_no'];
} else {
	$page_no = 1;
}
// change here for the record shown
$total_records_per_page = 4;

$offset = ($page_no - 1) * $total_records_per_page;
$previous_page = $page_no - 1;
$next_page = $page_no + 1;
$adjacents = "2";

$sortby = 'orderproject';
$datetoday = date('Y-m-d');

if (isset($_GET['sortby'])) {
	$sortby = $_GET['sortby'];
	// echo '<Script>alert("' . $sortby . '")</Script>';
	$result_count = mysqli_query(
		$conn,
		"SELECT COUNT(*) As total_records FROM project INNER JOIN users ON project.userID = users.userID WHERE project.edate>'$datetoday' ORDER BY $sortby "
	);
	// echo "<script type='text/javascript'>alert('$sortby');</script>";
} else {
	// $sql = "SELECT * FROM `project` LIMIT $offset, $total_records_per_page";
	$result_count = mysqli_query(
		$conn,
		"SELECT COUNT(*) As total_records FROM project INNER JOIN users ON project.userID = users.userID WHERE project.edate>'$datetoday'"
	);
}


$total_records = mysqli_fetch_array($result_count);
$total_records = $total_records['total_records'];
$total_no_of_pages = ceil($total_records / $total_records_per_page);
$second_last = $total_no_of_pages - 1; // total pages minus 1


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
			<h3>Get started</h3>
			<ul>

				<li>
					<h6>Anyone can contribute by lending a helping hand by becoming one of
						project volunteers</h6>
				</li>
				<li>
					<h6>Sign in is required to add or manage charity project</h6>
				</li>
			</ul>

		</div>

		<div class="row" style="position:relative;">
			<div class="col-md-6">
				<h1 class="my-4">EXPLORE
					<small></small>
				</h1>
			</div>
			<div class="col-md-6">
				<div style="position:absolute; bottom:0; right:20px; ">
					<div class="btn-group">
						<div class="btn-group dropright">
							<button type="button" class="btn btn-secondary dropdown-toggle" style="opacity: 0.7;" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								Sort by
							</button>
							<div class="dropdown-menu">
								<a class="dropdown-item" href="homepage.php?sortby=nameproject">Charity Name</a>
								<a class="dropdown-item" href="homepage.php?sortby=idproject">Date Created Ascending</a>
								<a class="dropdown-item" href="homepage.php?sortby=idproject DESC">Date Created Descending</a>
								<a class="dropdown-item" href="homepage.php?sortby=username">User</a>
							</div>
						</div>
					</div>
				</div>

			</div>

		</div>
		<hr>
		<br>


		<?php

		if (isset($_GET['sortby'])) {
			$sortby = $_GET['sortby'];
			$sql = "SELECT * FROM project INNER JOIN users ON project.userID = users.userID WHERE project.edate>'$datetoday' ORDER BY $sortby LIMIT $offset, $total_records_per_page";
			// echo "<script type='text/javascript'>alert('$sortby');</script>";
		} else {
			$sql = "SELECT * FROM project INNER JOIN users ON project.userID = users.userID WHERE project.edate>'$datetoday' LIMIT $offset, $total_records_per_page";
		}

		$result = mysqli_query($conn, $sql);
		$resultCheck = mysqli_num_rows($result);


		?>

		<?php if ($resultCheck > 0) : ?>
			<?php while ($row = mysqli_fetch_assoc($result)) : if (date('Y-m-d') < $row['edate']) : ?>
					<div class="row">
						<div class="col-md-4">
							<div class="cours2">
								<a href="#" data-toggle="modal" data-target="#project_description1<?php echo  $row["nameproject"] ?>">
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
									<?php echo '<h3><a href="#" style="color: #4D4D4D; font-weight:800; top: 10%;" data-toggle="modal" data-target="#project_description1' . $row['nameproject'] . '">' . $row['nameproject'] . '</a></h3>' ?>
									<span class="tooltiptext2">Click to view more</span>
								</div>
								<?php echo '<p>by<a href="#"><strong style="color: #999999;"> ' . $row['username'] . ' </strong></a></p>' ?>

							</div>
						</div>

						<!-- MODAL PROJECT 1 -->
						<?php echo '<div class="modal fade" id="project_description1' . $row['nameproject'] . '" tabindex="-1" role="dialog" aria-labelledby="project_description1" aria-hidden="true">' ?>
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
									<?php
									$thisone = $row['idproject'];
									$sql_a = "SELECT * FROM ((project INNER JOIN users ON project.userID = users.userID) INNER JOIN joinlist ON joinlist.ProjectID=project.idproject) WHERE project.idproject= $thisone;";

									$result_a = mysqli_query($conn, $sql_a);
									$resultCheck_a = mysqli_num_rows($result_a);
									$amount = $row['amountvolunteer'];
									$howmany = ($resultCheck_a / $amount) * 100;

									$width = $howmany . "%";

									?>
									<div class="progress-bar progress-bar-striped" role="progressbar" style="width: <?php echo $width ?>" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
								</div>
							</div>

						</div>

						<!-- DONATED AMOUNT, GOAL AMOUNT -->
						<div class="row">
							<div class="col-md-12">
								<h4 class="heading">Current: <?php echo $resultCheck_a ?></h4>
								<p class="text-muted"> Looking for: <?php echo $row['amountvolunteer'] ?> volunteers </p>
								<p class="text-muted"> Available until: <?php echo $row['edate'] ?> </p>
							</div>
						</div>

						<div class="row mt-2">
							<!-- //////////////////////////////////////////////volunteerslist///////////////////////////////////////////////////// -->
							<div class="col-md-4 col-4 text-center">
								<div class="containerDonate">


									<a href="#" data-toggle="modal" data-target="#volunteerproject1<?php echo  $row["nameproject"] ?>"><img class="img-fluid mb-3 mb-md-0 volunteerIcon btn-4" width="70" height="70" src="img\voluunteer bg trans.png" alt="DONATE"></a>

									<div class="modal fade" id="volunteerproject1<?php echo  $row["nameproject"] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

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

													<?php $i = 1;
													if ($resultCheck_a > 0) : ?>
														<table class="table table-hover">
															<thead>
																<tr>
																	<th>#</th>
																	<th>Name</th>
																</tr>
															</thead>
															<tbody>
																<?php while ($row2 = mysqli_fetch_assoc($result_a)) : ?>
																	<tr>
																		<th scope="row"><?php echo $i; ?></th>
																		<td><?php echo $row2['VolunteerName'] ?></td>
																	</tr>
																	<?php $i++; ?>
																<?php endwhile; ?>
															</tbody>
														</table>
													<?php endif; ?>



												</div>
												<!--Footer-->
												<div class="modal-footer">
													<a href="assignVolunteer.php?currID=<?php echo $row['idproject'] ?>" class="btn btn-outline-warning">Join</a>
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
										<?php $_SESSION['idproject'] = $row['idproject']; ?>
										<?php
										echo '<a href="meeting-report.php?project=' . $_SESSION['idproject'] . '"><img class="img-fluid rounded mb-3 mb-md-0 share " width="70" height="70" src="img\report.png" alt="Reports"></a>';
										?>
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
<?php endif; ?>
<?php endwhile; ?>
<?php endif; ?>



<!-- hereinsert -->

<!-- Pagination -->
<ul class="pagination justify-content-end">
	<!-- <li class="page-item disabled">
				<a class="page-link" href="#">Previous</a>
			</li>
			<li class="page-item">
				<a class="page-link" href="#">Next</a>
			</li> -->
	<?php if ($page_no > 1) {
		echo "<li class='page-item'><a class='page-link' href='homepage.php?&page_no=1&sortby=" . $sortby . "'>First Page</a></li>";
	} ?>
	<li <?php if ($page_no <= 1) {
			echo 'class="page-item disabled"';
		} else {
			echo 'class="page-item"';
		} ?>>
		<a <?php echo " class='page-link'href='homepage.php?&page_no=" . $previous_page . "&sortby=" . $sortby . "'"; ?>>Previous</a>
	</li>

	<li <?php if ($page_no >= $total_no_of_pages) {
			echo 'class="page-item disabled"';
		} else {
			echo 'class="page-item"';
		} ?>>
		<a <?php echo " class='page-link'href='homepage.php?page_no=" . $next_page . "&sortby=" . $sortby . "'"; ?>>Next</a>
	</li>
	<?php if ($page_no < $total_no_of_pages) {
		echo "<li class='page-item'><a class='page-link' href='homepage.php?page_no=" . $total_no_of_pages . "&sortby=" . $sortby . "'>Last &rsaquo;&rsaquo;</a></li>";
	} ?>
</ul>



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