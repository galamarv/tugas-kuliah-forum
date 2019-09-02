<?php
$namahost = "localhost";
$username = "root";
$password = "pass"; //password MySQL anda
$database = "Forum"; //database anda
$koneksi=mysql_connect($namahost,$username,$password) or die("Failed");
mysql_select_db($database) or die("Database not exist");
?>
