<?php include_once 'includes/top.php' ?>
<style>
	.brk-btn {
		position: relative;
		background: none;
		color: #007bff;
		text-transform: uppercase;
		text-decoration: none;
		border: 0.2em solid #03adfc;
		padding: 0.5em 1em;
	}

	.alert {
		margin-bottom: 0rem !important;
	}

	.brk-btn::before {
		content: '';
		display: block;
		position: absolute;
		width: 10%;
		background: whitesmoke;
		height: 0.3em;
		right: 20%;
		top: -0.21em;
		transform: skewX(-45deg);
		-webkit-transition: all 0.45s cubic-bezier(0.86, 0, 0.07, 1);
		transition: all 0.45s cubic-bezier(0.86, 0, 0.07, 1);
	}

	.brk-btn::after {
		content: '';
		display: block;
		position: absolute;
		width: 10%;
		background: whitesmoke;
		height: 0.3em;
		left: 20%;
		bottom: -0.25em;
		transform: skewX(45deg);
		-webkit-transition: all 0.45 cubic-bezier(0.86, 0, 0.07, 1);
		transition: all 0.45s cubic-bezier(0.86, 0, 0.07, 1);
	}

	.brk-btn:hover::before {
		right: 80%;
	}

	.brk-btn:hover::after {
		left: 80%;
	}

	.inlinec {
		overflow: hidden;
		text-align: center;
		text-transform: uppercase;
	}

	.inlinec h2:before,
	.inlinec h2:after {
		background-color: #000;
		content: "";
		display: inline-block;
		height: 1px;
		position: relative;
		vertical-align: middle;
		width: 50%;
	}

	.inlinec h2:before {
		/* right: 0.5em; */
		margin-left: -50%;
	}

	.inlinec h2:after {
		/* left: 0.5em; */
		margin-right: -50%;
	}
</style>

<?php

if (!empty($_SESSION['userID'])) {
	$user = $_SESSION['userID'];
}
if (!empty($_GET['upload'])) {

	$uploadstatus = $_GET['upload'];
	// echo '<script>alert("' . $uploadstatus . '")</script>';
	if ($uploadstatus == 'success') {
		echo '
		<div class="alert alert-success alert-dismissible fade show" role="alert">
			<strong>Created succesfully!</strong> Your charity project will be available for others to see until period ends.
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
		</div>
		';
	}
	if ($uploadstatus == 'empty') {
		echo '
		<div class="alert alert-danger alert-dismissible fade show" role="alert">
			<strong>Please enter all the fields</strong>
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
		</div>
		';
	}
	if ($uploadstatus == 'imgtoobig') {
		echo '
		<div class="alert alert-danger alert-dismissible fade show" role="alert">
			<strong>Image size is enormous!</strong> Please choose another smaller size image.
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
		</div>
		';
	}
	if ($uploadstatus == 'imgerror') {
		echo '
		<div class="alert alert-danger alert-dismissible fade show" role="alert">
			<strong>Image type error!</strong> Please choose image.
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
		</div>
		';
	}
}

if (!empty($_GET['user'])) {
	echo '
		<div class="alert alert-danger alert-dismissible fade show" role="alert">
			<strong>User not found!</strong>
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
		</div>
		';
}


if (!empty($_GET['delete'])) {
	$delstatus = $_GET['delete'];
	if ($delstatus == 'success') {
		echo '
		<div class="alert alert-danger alert-dismissible fade show" role="alert">
			<strong>Removed succesfully!</strong>
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
		</div>
		';
	}
}

if (!empty($_GET['update'])) {
	$upstatus = $_GET['update'];
	if ($upstatus == 'success') {
		echo '
		<div class="alert alert-warning alert-dismissible fade show" role="alert">
			<strong>Update succesfully!</strong> Changes has been made
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
		</div>
		';
	}
	if ($upstatus == 'empty') {
		echo '
		<div class="alert alert-danger alert-dismissible fade show" role="alert">
			<strong>Please enter all the fields</strong>
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
		</div>
		';
	}
	if ($upstatus == 'imgtoobig') {
		echo '
		<div class="alert alert-danger alert-dismissible fade show" role="alert">
			<strong>Image size is enormous!</strong> Please choose another smaller size image.
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
		</div>
		';
	}
	if ($upstatus == 'imgerror') {
		echo '
		<div class="alert alert-danger alert-dismissible fade show" role="alert">
			<strong>Image type error!</strong> Please choose image.
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
		</div>
		';
	}
}
if (!empty($_GET['invalid'])) {
	echo '<script>alert("HI, if u see this, means you are doing things which are not allowed")</script>';
	$manstatus = $_GET['invalid'];
	if ($manstatus == 'hacknotgood') {
		echo '
		<div class="alert alert-danger alert-dismissible fade show" role="alert">
			<strong>Hacking is not good</strong> Please be a good citizen of this website
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
		</div>
		';
	}
}
if (!empty(isset($_GET['volunteer']))) {
	echo '<script>alert("invalid format")</script>';
}

$admin = 1;
include_once 'includes/process_E.php';
// $admin = 1;


?>
<section id="content">
	<!-- Page Content -->
	<div class="container">
		<h2>Add or manage charity project</h2>
		<p>Click on the buttons below to start:</p>


		<button class="brk-btn" onclick="location.href='manageCharity.php'"> Create Charity Project </button>
		<button class="brk-btn" data-toggle="modal" data-target="#checkproject_user">Manage Charity Project </button>

		<hr>
		<br>
		<div class="inlinec">
			<h2 style="color: #646769;"> <?php echo $title ?> </h2>
		</div>
		<br>
		<!-- data-toggle="modal" data-target="#checkproject_user" -->

		<?php if (!empty($_SESSION['userID'])) : ?>
			<form action="includes/process_E.php" method="POST" enctype="multipart/form-data">
				<input type="hidden" name="id" value="<?php echo $id; ?>">
				<div class="form-group">
					<label for="nameproject">Charity Name:</label>
					<input type="name" name="nameproject" class="form-control validate" placeholder="Enter charity name here" value="<?php echo $nameproject ?>" required>
				</div>

				<div class="form-group">
					<label for="desproject">Charity Description:</label>
					<textarea class="form-control" name="desproject" rows="4" placeholder="Enter description here" required><?php echo $desproject ?></textarea>
				</div>

				<div class="form-group">
					<label for="amountvolunteer">Number of Volunteers:</label>
					<input class="form-control" name="amountvolunteer" placeholder="Enter amount here" value="<?php echo $amountvolunteer ?>" required></input>
				</div>

				<div class="form-group">
					<label>Choose Image:</label>
					<div class="custom-file">
						<input type="file" class="custom-file-input" id="inputGroupFile02" name="imgproject">
						<label class="custom-file-label" for="inputGroupFile02"><?php echo $imgproject ?></label>

					</div>

					<small class="form-text text-muted">Image provide more context to the audience, helping them gain a
						better understanding of a charity's mission.</small>
					<output id="list"></output>
				</div>

				<div class="row">
					<?php
					if (!empty(isset($_GET['date']))) {
						echo '<script>alert("invalid date duration")</script>';
					}
					?>
					<div class="form-group col-sm-6">
						<label>Choose Start Date: (YY-MM-DD) </label>
						<input id="datepicker" placeholder="Year-Month-Day" autocomplete="off" name="sdate" value="<?php echo $sdate ?>" required>
					</div>

					<div class=" form-group col-sm-6">
						<label>Choose end Date: (YY-MM-DD) </label>
						<input id="datepicker2" placeholder="Year-Month-Day" autocomplete="off" name="edate" value="<?php echo $edate ?>" required>
					</div>

				</div>


				<?php if ($username == "" && $_SESSION["userID"] == $admin) : ?>
					<?php
					$checkuserID = [];
					$sql = "SELECT userID FROM users";
					$result = mysqli_query($conn, $sql);
					$resultCheck = mysqli_num_rows($result);

					// echo '<script>alert("' . print_r($resultCheck) . '")</script>';
					// echo '<script> alert("' .  $username . '") </script>';

					echo
						'<br>
				<div class="form-group">
					<label for="userID">User ID:</label>
					<input class="form-control" list="userID" name="userID" placeholder="Enter user ID here" required>	
					<datalist id="userID" >
					';

					if ($resultCheck > 0) {
						while ($row = mysqli_fetch_array($result)) {
							echo "<option value=\"" . $row['userID'] . "\">";
						}
					}
					echo '</datalist></div>';

					?>

				<?php else : ?>


					<div class=" form-group">
						<?php if ($_SESSION["userID"] == $admin) : ?>
							<label for="userID">User ID:</label>
							<input class="form-control" name="" placeholder="Enter user name here" <?php if ($_SESSION["userID"] == $admin) {
																										echo 'value="' . $userID . '" disabled';
																									} else {
																										echo 'value="' . $_SESSION["userID"] . '" disabled';
																									} ?>>

							<input type="hidden" name="userID" <?php if ($_SESSION["userID"] == $admin) {
																	echo 'value="' . $userID . '" ';
																} else {
																	echo 'value="' . $_SESSION["userID"] . '" ';
																} ?>>
						<?php else : ?>
							<input type="hidden" name="userID" <?php if ($_SESSION["userID"] == $admin) {
																	echo 'value="' . $userID . '" ';
																} else {
																	echo 'value="' . $_SESSION["userID"] . '" ';
																} ?>>

						<?php endif ?>
					</div>
					<div class="form-group">
						<label for="username">User Name:</label>
						<input class="form-control" name="" placeholder="Enter user name here" <?php if ($_SESSION["userID"] == $admin) {
																									echo 'value="' . $username . '" disabled';
																								} else {
																									echo 'value="' . $_SESSION["username"] . '" disabled';
																								} ?>>
						<input type="hidden" name="username" <?php if ($_SESSION["userID"] == $admin) {
																	echo 'value="' . $username . '" ';
																} else {
																	echo 'value="' . $_SESSION["username"] . '" ';
																} ?>>
					</div>


				<?php endif ?>

				<br>

				<?php
				if ($update == false) {
					echo '<button class="btn btn-outline-info" name="submit">SUBMIT</button>';
				} else {
					echo '<button class="btn btn-outline-primary" name="update">UPDATE</button>';
				}

				?>
			</form>

			<!-- modal -->
			<div class="modal fade" id="checkproject_user" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
				<div class="modal-dialog modal-lg modal-dialog-centered" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLongTitle">Charity title</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>

						<div class="modal-body">

							<p>Input field to search for Name, Description, User and status :</p>
							<input class="form-control" id="myInput" autocomplete="off" type="text" placeholder="Search..">

							<table class="table table-light table-striped" id="report-table">
								<thead class="text-primary">
									<th>Name</th>
									<th>Description</th>
									<?php if ($_SESSION["userID"] == $admin) : ?>
										<th>ProjectID</th>
										<th>UserID</th>
										<th>User</th>

									<?php else : ?>
										<th>User</th>
									<?php endif; ?>
									<th>Perform Action</th>
									<th>Status</th>
								</thead>
								<tbody id="myTable">
									<?php include_once "includes/connect_database.php";

									if ($_SESSION["userID"] == $admin) {
										$sql = "SELECT * FROM project INNER JOIN users ON project.userID = users.userID";
									} else {
										$sql = "SELECT * FROM project INNER JOIN users ON project.userID = users.userID WHERE project.userID = $user";
									}

									$result = mysqli_query($conn, $sql);
									$resultCheck = mysqli_num_rows($result);

									if ($resultCheck > 0) {

										while ($row = mysqli_fetch_assoc($result)) {
											echo '                                              
                                        <tr>
                                            <td>' . $row["nameproject"] . '</td>
											<td> ' . $row["desproject"] . ' </td>';
											if ($_SESSION["userID"] == $admin) {
												echo '<td> ' . $row["idproject"] . ' </td>';
												echo '<td> ' . $row["userID"] . ' </td>';
												echo '<td> ' . $row["username"] . ' </td>';
											} else {
												echo '<td> ' . $row["username"] . ' </td>';
											}


											if (date('Y-m-d') < $row['edate'] || $_SESSION["userID"] == $admin) {
												echo '	
                                            <td class="btn-group" id="table-action">
                                                <a class="btn btn-outline-warning" href="manageCharity.php?manage=' . $row["idproject"] . '" >Manage</a>
                                                
												<a class="btn btn-outline-danger" onclick="return confirm(\'Are you sure?\')" href="includes/process_E.php?delete=' . $row["idproject"] . '"><i class="fa fa-trash"></i></a>
											</td>
												';
												if (date('Y-m-d') < $row['edate']) {
													echo '<td> Active </td>';
												} else {
													echo '<td> <strong>Expired</strong>  </td>';
												}
											} else {
												echo '	
                                            <td class="btn-group" id="table-action">
                                                <a class="btn btn-outline-info" href="viewCharity.php?view=' . $row["idproject"] . '" >View</a>
                                                
												<a class="btn btn-outline-danger" onclick="return confirm(\'Are you sure?\')" href="includes/process_E.php?delete=' . $row["idproject"] . '"><i class="fa fa-trash"></i></a>
											</td>
												';
												echo '<td> <strong>Expired</strong> </td>';
											}

											echo '</tr>  ';
										}
									} else {
										echo '                        
                                    <tr>
                                        <td colspan="4">No project found</td>                              
                                    </tr>
                                    ';
									}
									?>
								</tbody>
							</table>

						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						</div>

					</div>

				</div>
			</div>

		<?php else : ?>
			<div class="alert alert-info" role="alert">
				<p>Only logged in and authorized can access this page.</p>

			</div>
		<?php endif ?>
	</div>
</section>

<!-- //////////////////////////////////////////////////////////////////////// -->


<?php include_once 'includes/footer.php' ?>

<div class="scrollup2">
	<a href="homepage.php">
		<button class="btn btn-1 btn-circle btn-xl volunteerIcon">
			<i class="fa fa-list fa-l" g></i>
		</button>
	</a>
	<span class="scrolluptext">Click to view charity list</span>
</div>

<script>
	$('#inputGroupFile02').on('change', function() {
		//get the file name
		var fileName = $(this).val().replace('C:\\fakepath\\', " ");;
		// alert('hi');
		$(this).next('.custom-file-label').html(fileName);
	})

	// $("input").change(function(e) {

	//     for (var i = 0; i < e.originalEvent.srcElement.files.length; i++) {

	//         var file = e.originalEvent.srcElement.files[i];

	//         var img = document.createElement("img");
	//         var reader = new FileReader();
	//         reader.onloadend = function() {
	//             img.src = reader.result;
	//         }
	//         reader.readAsDataURL(file);
	//         $("input").after(img);
	//     }
	// });
	function confirmdelete() {
		var txt;
		var r = confirm('Are you sure want to delete?');
		if (r == true) {
			txt = "You pressed OK!";
		}
	}
</script>