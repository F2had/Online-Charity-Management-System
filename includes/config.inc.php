<?php


$host = 'localhost';
$dbname = 'wif2003';
$usrname = 'root';
$passwd = '';
$db = new mysqli($host, $usrname, $passwd, $dbname);

if ($db->error) {

    die("Connection Failed " .  mysqli_connect_error());
}
