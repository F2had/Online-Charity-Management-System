<!DOCTYPE html>
<html>

<head>
	<title>Join the Project</title>
</head>

<body>
	<div id="wrapper">
		<main>
			<?php
			include_once("includes/top.php");
			include_once("includes/connect_database.php");

			$host = "localhost";
			$dbUsername = "root";
			$dbPassword = "";
			$dbname = "wif2003";
			$pname = "";

			$conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);

			if (mysqli_connect_error()) {
				die('Connect Error(' . mysqli_connect_errno() . ')' . mysqli_connect_error());
			}

			$idproject = $_GET['currID'];

			$sql = "SELECT * FROM project WHERE idproject=$idproject";
			$result = mysqli_query($conn, $sql);

			$resultCheck = mysqli_num_rows($result);


			if ($resultCheck > 0) {
				while ($row = mysqli_fetch_assoc($result)) {
					echo '<img src="uploaded_img/' . $row['imguniqname'] . '" class="img-fluid hover" style="height:50%; width:50%; padding-left:10px;">';
					echo '<p style="padding-left:10px;">Project Name:  ' . $row['nameproject'] . '</p>';
					$pname = $row['nameproject'];
					echo '<p style="padding-left:10px;">Description: <br> ' . $row['desproject'] . '</p>';
					echo '<p style="padding-left:10px;">Volunteer needed:  ' . $row['amountvolunteer'] . '</p>';
					echo '<p style="padding-left:10px;">Start Date:  ' . $row['sdate'] . '</p>';
					echo '<p style="padding-left:10px;">End Name:  ' . $row['edate'] . '</p>';
				}
			} else {
				echo "no data found";
			}
			?>
			<form action="insertJoinList.php" method="POST" style="padding-left: 10px;">
				<?php
				$sql = "SELECT * FROM ((joinlist INNER JOIN users ON joinlist.VolunteerID = users.userID)  INNER JOIN project ON joinlist.ProjectID=project.idproject);";

				$result = mysqli_query($conn, $sql);
				?>
				<table>
					<tr>
						<td>
							*<input type="checkbox" name="T&C" required><a href="#">Terms & Conditions</a>
							<input type="hidden" name="pid" value="<?php echo $_GET['currID'] ?>">
							<input type="hidden" name="pname" value="<?php echo $pname ?>">

						</td>
					</tr>
					<tr>
						<td>
							<input type="submit" name="submit"></input>
						</td>
					</tr>
				</table>
			</form>
		</main>

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
</body>

</html>