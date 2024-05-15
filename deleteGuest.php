<?php
session_start();
if(!isset($_POST['deleteGuest'])) {
    header("Location: index.php");
}

include "db.php";

$guestID = $_POST['guestid'];

// sql to delete a record
$sql = "DELETE FROM MyGuests WHERE id=$guestID";
// echo $sql; die;
if (mysqli_query($conn, $sql)) {
    $_SESSION['alertMessage'] = "guestDeleted";
    header("Location: index.php");
} else {
  echo "Error deleting record: " . mysqli_error($conn);
}

mysqli_close($conn);