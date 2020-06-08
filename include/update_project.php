<?php
include_once "connect_database.php";

$nameproject = '';
$desproject = '';
$amountproject = '';
$imgproject = '';
$username = '';

if (isset($_GET['manage'])) {
    $idproject = $_GET['manage'];
    $sql2 = "SELECT * FROM project WHERE idproject=$idproject";
    $result2 = mysqli_query($conn, $sql2);
    $resultCheck2 = mysqli_num_rows($result2);

    if ($resultCheck2 > 0) {
        $row = mysqli_fetch_assoc($result2);
        $nameproject = $row['nameproject'];
        $desproject = $row['desproject'];
        $amountproject = $row['amountproject'];
        $imgproject = $row['imgproject'];
        $username = $row['username'];
        echo '<script> alert("hi u success") </script>';
    }
}
