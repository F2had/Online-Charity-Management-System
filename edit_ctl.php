<?php
require_once "includes/config.inc.php";
extract($_REQUEST);
$query="update VOLUNTEER set Name='$t1',DOB='$t2',Email='$t3' ,IdentityCard='$t4',Occupation='$t5',Address='$t6',Address2='$t7',City='$t8',State='$t9',Zip='$t10',ContactNumber='$t11',Skills='$t12',HowHelp='$t13',Offences='$t14',Medicalissues='$t15'where id='$id'";
$result=mysqli_query($db,$query) or die(mysqli_error($db));
echo'Your Data SucessFulyy Update';
header("location:ViewList.php");
exit;

?>