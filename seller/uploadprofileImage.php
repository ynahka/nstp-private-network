<?php
$Target_dir = "../OmaangatImages/ProfileImage/";

// Check if a file is provided
if (!empty($_FILES["txtvalidImagefile2"]["name"])) {
    $pre = strtotime(date('Y-m-d H:i:s')) . "_";
    $Filename = trim($_REQUEST['txtvalidimageID2']) . $pre . basename($_FILES["txtvalidImagefile2"]["name"]);
    $Target_file = $Target_dir . $Filename;

    $imagefilename = $Filename;

    include "connect.php";
    mkdir("../OmaangatImages/ProfileImage/", 0777, true);
    move_uploaded_file($_FILES["txtvalidImagefile2"]["tmp_name"], $Target_file);

    // Update the database only if a file is provided
    $addimage = mysqli_query($connection, "UPDATE user_details SET profileimage = '" . $imagefilename . "', profileimagename = '" . $Filename . "' WHERE user_id = '" . trim($_REQUEST['txtvalidimageID2']) . "';");
} else {
    // Handle the case where no file is provided (optional)
    echo "No file provided for upload.";
}
