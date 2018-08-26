<?php
$host = "localhost:3306";
$username = "root";
$password = "adminwamp";
$dbname = "kranti";
$conn = mysqli_connect($host, $username, $password, $dbname);
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  die();
  } 
?>