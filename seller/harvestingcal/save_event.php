<?php
include("../connect.php");
session_start();

switch ($_POST['form']) {

    case 'saveEvent':
        $generateID = generateID($connection, 'harvest_id', 'harvestsched', 'harvest');

        // Sanitize and prepare variables to prevent SQL injection
        $title = mysqli_real_escape_string($connection, $_POST['title']);
        $prodHarvest = mysqli_real_escape_string($connection, $_POST['prodHarvest']);
        $prodQuantity = mysqli_real_escape_string($connection, $_POST['prodQuanti']); // Correct case
        $prodPrice = mysqli_real_escape_string($connection, $_POST['prodprice']); // Correct case
        $startDate = mysqli_real_escape_string($connection, $_POST['startDate']);
        $endDate = mysqli_real_escape_string($connection, $_POST['endDate']);
        $userID = $_SESSION['user_id']; // Ensure this is properly validated and sanitized

        $submitpost = mysqli_query($connection, "INSERT INTO harvestsched 
            SET harvest_id = '$generateID',
            seller_id = '$userID',
            title = '$title',
            prodHarvest = '$prodHarvest',
            ProdQuanti = '$prodQuantity',
            ProdPrice = '$prodPrice',
            starting_date = '$startDate',
            end_date = '$endDate',
            date_added = '" . date("Y-m-d") . "'");

        if ($submitpost) {
            echo $generateID;
        } else {
            echo "Error: " . mysqli_error($connection);
        }
        break;
}
