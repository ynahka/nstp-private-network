<?php
require_once('connect.php');
session_start(); // Start the session if it's not already started

if ($_SERVER['REQUEST_METHOD'] != 'POST') {
    echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@9'></script>";
    echo "<script>
   window.onload = function() {
       Swal.fire({
           icon: 'error',
           title: 'Oops...',
           text: 'No data to save',
           confirmButtonText: 'OK'
       }).then((result) => {
           if (result.isConfirmed) {
               location.replace('index.php?url=harvestingcal');
           }
       });
   }
 </script>";
    $connection->close();
    exit;
}
extract($_POST);
$allday = isset($allday);

// Get the user_id from the session
$user_id = $_SESSION['user_id'];

// Check if user_id is set and exists in users_table
if (!isset($user_id)) {
    echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@9'></script>";
    echo "<script>
   window.onload = function() {
       Swal.fire({
           icon: 'error',
           title: 'Oops...',
           text: 'Log in first',
           confirmButtonText: 'OK'
       }).then((result) => {
           if (result.isConfirmed) {
               location.replace('index.php?url=harvestingcal');
           }
       });
   }
 </script>";
    $connection->close();
    exit;
}
$result = $connection->query("SELECT * FROM users_table WHERE user_id = '$user_id'");
if ($result->num_rows == 0) {
    echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@9'></script>";
    echo "<script>
   window.onload = function() {
       Swal.fire({
           icon: 'error',
           title: 'Oops...',
           text: 'User ID does not exist',
           confirmButtonText: 'OK'
       }).then((result) => {
           if (result.isConfirmed) {
               location.replace('index.php?url=harvestingcal');
           }
       });
   }
 </script>";
    $connection->close();
    exit;
}

if (empty($id)) {
    $generateID = generateID($connection, 'harvest_id', 'harvestsched', 'harv');
    $sql = "INSERT INTO `harvestsched` (`harvest_id`,`title`,`description`,`quantity`,`price`, `unit`,`start_datetime`,`end_datetime`,`date_added`,`DATETIME_LOG`, `seller_id`) VALUES ('$generateID','$title','$description','$quantity','$price', '$unit', '$start_datetime','$end_datetime',CURDATE(),CURRENT_TIMESTAMP(), '$user_id')";
} else {
    $sql = "UPDATE `harvestsched` set `title` = '{$title}', `description` = '{$description}', `quantity` = '{$quantity}', `price` = '{$price}', `unit` = '{$unit}', `start_datetime` = '{$start_datetime}', `end_datetime` = '{$end_datetime}', `date_added` = CURDATE(), `DATETIME_LOG` = CURRENT_TIMESTAMP(), `seller_id` = '$user_id' where `id` = '{$id}'";
}
$save = $connection->query($sql);
if ($save) {
    echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@9'></script>";
    echo "<script> 
      window.onload = function() {
       Swal.fire({
           icon: 'success',
           title: 'Success',
           text: 'Schedule is successfully saved.',
           confirmButtonText: 'OK'
       }).then((result) => {
           if (result.isConfirmed) {
               location.replace('index.php?url=harvestingcal');
           }
       });
   }
   </script>";
} else {
    echo "<pre>";
    echo "An Error occured.<br>";
    echo "Error: " . $connection->error . "<br>";
    echo "SQL: " . $sql . "<br>";
    echo "</pre>";
}
$connection->close();
