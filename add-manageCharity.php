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

<?php include_once 'includes/process_E.php';
$admin = 1;
$user = $_SESSION['userID'];
?>
<section id="content">
	<!-- Page Content -->
	<div class="container">
		<h2>Add or manage charity project</h2>
		<p>Click on the buttons below to start:</p>

		<a href="add-manageCharity.php">
			<button class="brk-btn"> Create Charity Project </button>
		</a>
		<button class="brk-btn" data-toggle="modal" data-target="#checkproject_user"> Manage Charity Project </button>

		<hr>
		<br>
		<div class="inlinec">
			<h2 style="color: #646769;"> <?php echo $title ?> </h2>
		</div>
		<br>
		<!-- data-toggle="modal" data-target="#checkproject_user" -->


		<form action="includes/process_E.php" method="POST" enctype="multipart/form-data">
			<input type="hidden" name="id" value="<?php echo $id; ?>">
			<div class="form-group">
				<label for="nameproject">Charity Name:</label>
				<input type="name" name="nameproject" class="form-control validate" placeholder="Enter charity name here" value="<?php echo $nameproject ?>">
			</div>

			<div class="form-group">
				<label for="desproject">Charity Description:</label>
				<textarea class="form-control" name="desproject" rows="4" placeholder="Enter description here"><?php echo $desproject ?></textarea>
			</div>

			<div class="form-group">
				<label for="amountvolunteer">Number of Volunteers:</label>
				<input class="form-control" name="amountvolunteer" placeholder="Enter amount here" value="<?php echo $amountvolunteer ?>"></input>
			</div>

			<div class="form-group">
				<label>Choose Image:</label>
				<div class="custom-file">
					<input type="file" class="custom-file-input" id="inputGroupFile02" name="imgproject" onchange="">
					<label class="custom-file-label" for="inputGroupFile02"><?php echo $imgproject ?></label>

				</div>

				<small class="form-text text-muted">Image provide more context to the audience, helping them gain a
					better understanding of a charity's mission.</small>
				<output id="list"></output>

			</div>


			<?php if ($username == "" && $_SESSION["userID"] == $admin) : ?>
				<div class="form-group">
					<label for="userID">User ID:</label>
					<input class="form-control" name="userID" placeholder="Enter user ID here">
				</div>
			<?php else : ?>
				<div class="form-group">
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
			<div class="modal-dialog modal-dialog-centered" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLongTitle">Charity title</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>

					<div class="modal-body">
						<table class="table table-light table-striped" id="report-table">
							<thead class="text-primary">
								<th>Name</th>
								<th>Description</th>
								<th>User</th>
								<th>Perform Action</th>
							</thead>
							<tbody id="table-body">
								<?php include_once "includes/connect_database.php";

								if ($_SESSION["userID"] == $admin) {
									$sql = "SELECT * FROM `project`";
								} else {
									$sql = "SELECT * FROM `project` WHERE userID = $user";
								}

								$result = mysqli_query($conn, $sql);
								$resultCheck = mysqli_num_rows($result);

								if ($resultCheck > 0) {
									while ($row = mysqli_fetch_assoc($result)) {
										echo '                                              
                                        <tr>
                                            <td>' . $row["nameproject"] . '</td>
                                            <td> ' . $row["desproject"] . ' </td>
                                            <td> ' . $row["userID"] . ' </td>

                                            <td class="btn-group" id="table-action">
                                                <a class="btn btn-outline-warning" href="add-manageCharity.php?manage=' . $row["idproject"] . '" >Manage</a>
                                                
                                                <a class="btn btn-outline-danger" href="includes/process_E.php?delete=' . $row["idproject"] . '"><i class="fa fa-trash"></i></a>
                                            </td>
                                        </tr>                            
                                        ';
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
</script>