<?php
if(!isset($_POST['editGuest'])) {
    header("Location: index.php");
}

session_start();
include "db.php";

$guestID = $_POST['id'];
$firstname = $_POST["firstname"];
$lastname = $_POST["lastname"];
$email = $_POST["email"];

$sql = "UPDATE MyGuests SET firstname='$firstname', lastname='$lastname', email='$email' WHERE id=$guestID";
// echo $sql;die;
if (mysqli_query($conn, $sql)) {
    $_SESSION['alertMessage'] = "guestUpdated";
    header("Location: index.php");
} else {
  echo "Error updating record: " . mysqli_error($conn);
}

mysqli_close($conn);
?>