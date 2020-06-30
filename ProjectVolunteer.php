<!DOCTYPE html>
<html>

<head>
	<title>List of Volunteer in Project</title>
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

			if (!empty($_GET['del'])) {
				$del = $_GET['del'];
				$sql = "DELETE FROM joinList WHERE ID=$del";

				mysqli_query($conn, $sql);
			}


			if (mysqli_connect_error()) {
				die('Connect Error(' . mysqli_connect_errno() . ')' . mysqli_connect_error());
			}

			$sql = "SELECT * FROM joinList";
			$result = mysqli_query($conn, $sql);

			$resultCheck = mysqli_num_rows($result);

			if ($resultCheck > 0) {
				echo '<table>
        					<tr>
        						<td style="padding:10px;">
        							<strong>No.</strong>
        						</td>
        						<td style="padding:10px;">
        							<strong>Project Assigned</strong>
        						</td>
        						<td style="padding:10px;">
        							<strong>Volunteer Name</strong>
        						</td>
        						<td style="padding:10px;">
        							<strong>Deletion</strong>
        						</td>
        					</tr>
        				';
				$i = 1;

				while ($row = mysqli_fetch_assoc($result)) {
					echo '
        					<tr>
        						<td style="padding:10px;">
        							' . $i . '
        						</td>
        						<td style="padding:10px;">
        							' . $row['ProjectName'] . '
        						</td>
        						<td style="padding:10px;">
        							' . $row['VolunteerName'] . '
        						</td>
        						<td style="padding:10px;">
        							<a href = ProjectVolunteer.php?del=' . $row['ID'] . '>delete</a>
        						
        						</td>
        					</tr>';
					$i++;
				}
				echo '</table>';
			} else {
				echo "no data found";
			}
			?>
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