<?php


 $host = 'localhost';
 $dbname = 'wif2003';
 $usrname = 'admin';
 $passwd = 'a';
$db = new mysqli($host, $usrname, $passwd, $dbname);

    if($db->error){
    
        die("Connection Failed ".  mysqli_connect_error());
    }



