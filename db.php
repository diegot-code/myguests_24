<?php
$servername = "localhost";
$username = "torres";
$password = "yUc7QJULT5bsJPH7";
$dbname = "torres";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

