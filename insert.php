<?php
	$username=$_POST['Username'];
	$password=$_POST['Password'];
	$firstName=$_POST['FirstName'];
	$lastName=$_POST['LastName'];
	$gender=$_POST['Gender'];
	$email=$_POST['Email'];
	$phoneCode=$_POST['PhoneCode'];
	$phone=$_POST['Phone'];

	if(!empty($username)||!empty($password)||!empty($firstName)||!empty($lastName)||!empty($gender)||!empty($email)||!empty($phoneCode)||!empty($phone))
	{
		$host="localhost";
		$dbUsername="root";
		$dbPassword="";
		$dbname="charityprojectmember";

		$conn=new mysqli($host,$dbUsername,$dbPassword,$dbname);

		if(mysqli_connect_error())
		{
			die('Connect Error('.mysqli_connect_errno().')'.mysqli_connect_error());
		}else
		{
			$SELECT="SELECT Email From charityform Where Email=? Limit 1";
			$INSERT="INSERT Into charityform(Username,Password,FirstName,LastName,Gender,Email,PhoneCode,Phone) values(?,?,?,?,?,?,?,?)";

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
				$stmt->bind_param("ssssssii",$username,$password,$firstName,$lastName,$gender,$email,$phoneCode,$phone);
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