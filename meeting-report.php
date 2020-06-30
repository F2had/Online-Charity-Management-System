<?php include_once "includes/connect_database.php" ?>
<?php include_once('includes/top.php') ?>


<h1 class="text-light text-center p-4 my-3" style="background-color: #e8d2b0 ;font-size: 60px; font-weight: 700 ; height: 150px ">Awesome Charity</h1>

<?php
echo '<a href="add_report.php">
				<button class="tn btn-outline-secondary text-dark my-3 "> Add Report <i class="fas fa-file-alt"></i> </button>
				</a>';
?>

<div class="table-responsive my-3">
	<table class="table table-light table-striped" id="report-table">
		<thead class="text-primary">
			<th>Report Id</th>
			<th>Report Title</th>
			<th>Report Date</th>
			<th>Present</th>
			<th>Location</th>
			<th>Project</th>
			<th>Perform Action</th>
		</thead>

		<tbody id="table-body">
			<?php
			if (isset($_GET['project'])) {

				$project = $_GET['project'];

				$sql = "SELECT reports.ID,reports.Title,reports.Date,reports.StartTime,
							reports.EndTime,reports.Location,reports.Participants,reports.Contact,reports.Agenda,
							reports.Imag,reports.Status,project.nameproject,users.username
							FROM ((reports 
							INNER JOIN project ON reports.idproject=project.idproject )
							INNER JOIN users ON users.userID=project.userID)
							WHERE $project=reports.idproject
							ORDER BY reports.Date ASC";
			} else {

				$sql = "SELECT reports.ID,reports.Title,reports.Date,reports.StartTime,
							reports.EndTime,reports.Location,reports.Participants,reports.Contact,reports.Agenda,
							reports.Imag,reports.Status,project.nameproject,users.username
							FROM ((reports 
							INNER JOIN project ON reports.idproject=project.idproject )
							INNER JOIN users ON users.userID=project.userID)
							ORDER BY reports.ID ASC";
			}


			$result = mysqli_query($conn, $sql);
			$resultCheck = mysqli_num_rows($result);

			if ($resultCheck > 0) {

				while ($row = mysqli_fetch_assoc($result)) {
					echo '                                              
                                    <tr>
                                        <td>' . $row["ID"] . '</td>
                                        <td> ' . $row["Title"] . ' </td>
										<td> ' . $row["Date"] . ' </td>
										<td> ' . $row["Participants"] . ' </td>
										<td> ' . $row["Location"] . ' </td>			
										<td> ' . $row["nameproject"] . ' </td>
									

                                        <td class="btn-group" id="table-action">
                                            <a class="btn btn-outline-warning" href="add_report.php?update=' . $row["ID"] . '" >Update</a>
                                            <a class="btn btn-outline-danger" href="includes/report.inc.php?delete=' . $row["ID"] . '"><i class="fa fa-trash"></i></a>
                                        </td>
                                    </tr>                            
                                        ';
				}
			} else {
				echo '                        
                                    <tr>
                                        <td colspan="4">No report found</td>                              
                                    </tr>
                                    ';
			}
			?>
		</tbody>
	</table>
</div>



<?php include_once('includes/footer.php') ?>


<!--<script type="text/javascript "src="js/report.js"></script>-->