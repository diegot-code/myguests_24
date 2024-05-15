<?php
session_start();
include "db.php";

$sql = "SELECT * FROM MyGuests";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<!-- Latest compiled and minified CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>MyGuests</title>
</head>
<body>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h1>My Guests</h1>
        <?php 
        // MARK: Alert Messages
        if(isset($_SESSION['alertMessage'])) {
          if($_SESSION['alertMessage'] == 'guestAdded') {
            ?>
              <div class="alert alert-success">
                <strong>Guest Added!</strong> Guest has been added to MyGuest Table.
              </div>
            <?php
          }
          if($_SESSION['alertMessage'] == 'guestUpdated') {
            ?>
              <div class="alert alert-info">
                <strong>Guest Updated!</strong> Guest has been Updated to MyGuest Table.
              </div>
            <?php
          }
          if($_SESSION['alertMessage'] == 'guestDeleted') {
            ?>
              <div class="alert alert-warning">
                <strong>Guest Deleted!</strong> Guest has been Deleted from MyGuest Table.
              </div>
            <?php
          }
          unset($_SESSION['alertMessage']);
        }

        // MARK: Update Guest Form
        if(isset($_POST['editGuest'])) {
          ?>

          <form action="editGuest.php" method="POST">
          <input class="form-control" type="hidden" name="id" value="<?=$_POST['id']?>" required>
            First Name: <input class="form-control" type="text" name="firstname" value="<?=$_POST['firstname']?>" required>
            <br>
            Last Name: <input class="form-control" type="text" name="lastname" value="<?=$_POST['lastname']?>" required>
            <br>
            Email: <input class="form-control" type="email" name="email" value="<?=$_POST['lastname']?>" required>
            <br>
            <br>
            <button class="btn btn-info" type="submit" name="editGuest"> Update Guest </button>
          </form> 
          
          <?php

        } else {
          // MARK: Default Form
        ?>
          <form action="addGuest.php" method="POST">
            First Name: <input class="form-control" type="text" name="firstname" required>
            <br>
            Last Name: <input class="form-control" type="text" name="lastname" required>
            <br>
            Email: <input class="form-control" type="email" name="email" required>
            <br>
            <br>
            <button class="btn btn-primary" type="submit" name="addGuest"> Add Guest </button>
          </form>  
          <?php
          }
          ?>
          <br>          
    <table class="table table-hover table-striped">
        <thead>
          <td>Id</td>
          <td>FirstName</td>
          <td>Last Name</td>
          <td>Email</td>
          <td>Registration Date</td>
          <td>Update</td>
          <td>Delete</td>              
        </thead>
        <tbody>
    <?php
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        // output data of each row
    // MARK: Populate Rows
        while($row = mysqli_fetch_assoc($result)) {
            ?>
            <tr>
              <td><?=  $row["id"]?></td>
              <td><?=  $row["firstname"]?></td>
              <td><?=  $row["lastname"]?></td>
              <td><?=  $row["email"]?></td>
              <td><?=  $row["reg_date"]?></td>
              <td>
                <form action="index.php" method="POST">
                  <input type="hidden" name="id" value="<?=$row["id"]?>">
                  <input type="hidden" name="firstname" value="<?=$row["firstname"]?>">
                  <input type="hidden" name="lastname" value="<?=$row["lastname"]?>">
                  <input type="hidden" name="email" value="<?=$row["email"]?>">
                  <button type="submit" name="editGuest" class="btn btn-info">Edit</button>
                </form>
              </td>
              <td>
                <form action="deleteGuest.php" method="POST">
                  <input type="hidden" name="guestid" value="<?=$row["id"]?>">
                  <button type="submit" name="deleteGuest" class="btn btn-danger">X</button>
                </form>
              </td>
            </tr>

          <?php
        }
      } else {
        echo "0 results";
      }
      
mysqli_close($conn);
    ?>
    </tbody>    
</table>

      </div>
    </div>
  </div>
</body>

<!-- Latest compiled JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</html>









