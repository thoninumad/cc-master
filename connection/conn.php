<?php
//Koneksi ke Database
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "cc_bankjatim";
// Create connection
$con = mysqli_connect($dbhost, $dbuser, $dbpass,$dbname);

if (!$con) die('Could not connect: ' . mysqli_error());


?>