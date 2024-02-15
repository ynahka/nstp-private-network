<?php
include "../connect.php";

$Target_dir = "../../OmaangatImages/Paymethod/";
$pre = strtotime(date('Y-m-d H:i:s')) . "_";

$num = trim($_REQUEST['hiddenwala']);
$count = 0;
for ($x = 1; $x <= $num; $x++) {
    $count++;
    $prodname = basename($_FILES["txtpaymethodImagefile" . $count]["name"]); //Payment Method IMAGE FILE NAME
    $Filename = trim($_REQUEST['txtpayimageID']) . $pre . $prodname; //WHOLE FILE NAME
    $Target_file = $Target_dir . $Filename; // WHOLE PATH

    $prodname2 = $_FILES["txtpaymethodImagefile" . $count]["tmp_name"];
    $imagefilename = "OmaangatImages/Paymethod/" . $Filename;

    $getID = trim($_REQUEST["txtimageprodIDcount" . $count]);
    if ($getID == 0) {
        mkdir("../../OmaangatImages/Paymethod/", 0777, true);
        move_uploaded_file($prodname2, $Target_file);
        $updateimage = mysqli_query($connection, "INSERT INTO paymethod_image SET paymeth_id = '" . trim($_REQUEST['txtpayimageID']) . "', image = '" . $imagefilename . "', imagename = '" . $Filename . "', date_added = '" . date("Y-m-d") . "';");
    } else {
        if ($prodname != "") {
            mkdir("../../OmaangatImages/Paymethod/", 0777, true);
            move_uploaded_file($prodname2, $Target_file);
            $updateimage = mysqli_query($connection, "UPDATE paymethod_image SET image = '" . $imagefilename . "', imagename = '" . $Filename . "' WHERE id = '" . $getID . "';");
        } else {
        }
    }
}
