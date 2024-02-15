<?php
include("connect.php");
session_start();

if (empty($_SESSION['user_id']) || $_SESSION['usertype'] !== 'SELLER') {
  echo "<script> window.location = 'login.php';</script>";
  exit(); // Add exit to stop further execution of the script
}
?>
<?php
if (isset($_SESSION['user_id'])) {
  // Escape the session variable
  $escapedUserId = mysqli_real_escape_string($connection, $_SESSION['user_id']);

  // Create the update query
  $updateLastActivityQuery = "UPDATE users_table SET last_activity_time = NOW() WHERE user_id = '$escapedUserId'";

  // Execute the query
  $updateResult = mysqli_query($connection, $updateLastActivityQuery);

  // Check for errors
  if (!$updateResult) {
    die("Error updating last_activity_time: " . mysqli_error($connection));
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php
  include('header.php');
  ?>
</head>

<body class="fix-header fix-sidebar card-no-border">

    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" />
        </svg>
    </div>

    <div id="main-wrapper">
        <?php include('topbar.php'); ?>
        <?php include('leftsidebar.php'); ?>

        <div class="page-wrapper">
            <div class="container-fluid containerfluidneed" style="padding: 20px 20px;">
                <?php
        if (!isset($_GET['url'])) {
          echo "<script>window.location='index.php?url=dashboard';</script>";
        } else {
          if ($_GET['url'] == "dashboard") {

            include "dashboard/index.php";
          }

          if ($_GET['url'] == "products") {
            include "products/index.php";
          }

          if ($_GET['url'] == "orders") {
            include "orders/index.php";
          }

          if ($_GET['url'] == "reservation") {
            include "reservation/index.php";
          }
          if ($_GET['url'] == "payments") {
            include "payments/index.php";
          }
          if ($_GET['url'] == "paymentmethod") {
            include "paymentmethod/index.php";
          }
          if ($_GET['url'] == "harvestingcal") {
            include "schedule.php";
          }
          if ($_GET['url'] == "community") {
            include "../viewers/community.php";
          }
          if ($_GET['url'] == "chats") {
            include "chat.php";
          }
        }
        ?>
            </div>

            <?php include('footer.php'); ?>
        </div>

    </div>

    <?php include('jscripts.php'); ?>
    <script src="schedule/js/script.js"></script>
</body>

</html>