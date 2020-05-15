<?php
	$username=$_POST['Username'];
	$password=$_POST['Password'];
	$firstName=$_POST['FirstName'];
	$lastName=$_POST['LastName'];
	$gender=$_POST['Gender'];
	$email=$_POST['Email'];
	$phoneCode=$_POST['PhoneCode'];
	$phone=$_POST['Phone'];
	$project=$_POST['ProjectParticipate'];

	if(!empty($username)||!empty($password)||!empty($firstName)||!empty($lastName)||!empty($gender)||!empty($email)||!empty($phoneCode)||!empty($phone)||!empty($project))
	{
		$host="localhost";
		$dbUsername="root";
		$dbPassword="";
		$dbname="charityproject";

		$conn=new mysqli($host,$dbUsername,$dbPassword,$dbname);

		if(mysqli_connect_error())
		{
			die('Connect Error('.mysqli_connect_errno().')'.mysqli_connect_error());
		}else
		{
			$SELECT="SELECT Email From volunteerform Where Email=? Limit 1";
			$INSERT="INSERT Into volunteerform(Username,Password,FirstName,LastName,Gender,Email,PhoneCode,Phone,ProjectParticipate) values(?,?,?,?,?,?,?,?,?)";

			$stmt=$conn->prepare($SELECT);
			$stmt->bind_param("s",$email);
			$stmt->execute();
			$stmt->bind_result($email);
			$stmt->store_result();
			$rnum=$stmt->num_rows;

			if($rnum==0)
			{
				$stmt->close();
				$stmt=$conn->prepare($INSERT);
				$stmt->bind_param("ssssssiis",$username,$password,$firstName,$lastName,$gender,$email,$phoneCode,$phone,$project);
				$stmt->execute();
				echo'<script>
				alert("New record inserted successfully")
				history.go(-1)
				</script>';
			}else
			{
				echo"Someone already register using this email";
				
			}
			$stmt->close();
			$conn->close();
		}
	}else
	{
		echo "All field are required";
		die();
	}
?>