<?php

$serverName = "localhost";
$userName = "root";
$password = "";
$dbName = "reservify";

// Create connection
$conn = mysqli_connect($serverName, $userName, $password, $dbName);

//check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully";

?>