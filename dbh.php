<?php
$dbhost="localhost";
$dbuser="root";
$dbpwd="";
$dbname="webchat";
$conn=mysqli_connect($dbhost,$dbuser,$dbpwd,$dbname);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
//echo "connection established";
?>