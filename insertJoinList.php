<main style="padding-left: 10px">
	<?php
	include_once("includes/top.php");
	include_once("includes/connect_database.php");

	$pid = $_POST['pid'];
	$uid = $_SESSION['userID'];
	$uname = $_SESSION['username'];
	$pname = $_POST['pname'];

	$host = "localhost";
	$dbUsername = "root";
	$dbPassword = "";
	$dbname = "wif2003";

	$conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);

	if (mysqli_connect_error()) {
		die('Connect Error(' . mysqli_connect_errno() . ')' . mysqli_connect_error());
	}

	if (!empty($pid) || empty($uid)) {
		$INSERT = "INSERT Into joinlist(ProjectID,ProjectName,VolunteerID,VolunteerName) values(?,?,?,?)";

		$stmt = $conn->prepare($INSERT);
		$stmt->bind_param("isis", $pid, $pname, $uid, $uname);
		$stmt->execute();
		echo '<script>
				alert("New record inserted successfully")
				history.go(-1)
				</script>';
	}
	?>
</main>