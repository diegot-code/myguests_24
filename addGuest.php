<?php
session_start();
if (!isset($_POST['addGuest'])) {
    header("Location: index.php");
}

include "db.php";

$firstname = $_POST["firstname"];
$lastname = $_POST["lastname"];
$email = $_POST["email"];

$sql = "INSERT INTO MyGuests (firstname, lastname, email)
VALUES ('$firstname', '$lastname', '$email')";
// echo $sql; die;
if (mysqli_query($conn, $sql)) {
  $_SESSION['alertMessage'] = "guestAdded";
  header("Location: index.php");
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>