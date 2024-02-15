<?php
include("../connect.php");
session_start();
error_reporting(E_ALL);
ini_set('display_errors', '1');


switch ($_POST['form']) {

	case 'paymethodlist':
		if ($_POST['srchprod'] != '') {
			$searchuseracc = "AND (a.bankholdername LIKE '%" . $_POST['srchprod'] . "%' OR CASE WHEN b.middlename = '' OR b.middlename IS NULL THEN CONCAT(b.lastname, ', ', b.firstname) ELSE CONCAT(b.lastname, ', ', b.firstname, ' ', LEFT(b.middlename, '1'), '.') END LIKE '%" . $_POST['srchprod'] . "%')";
		} else {
			$searchuseracc = "";
		}

		$counter = 0;
		$page = $_POST["page"];
		$limit = ($page - 1) * 10;
		$res = mysqli_query($connection, "SELECT a.paymeth_id, a.bankholdername, a.banknumber, CASE WHEN b.middlename = '' OR b.middlename IS NULL THEN CONCAT(b.lastname, ', ', b.firstname) ELSE CONCAT(b.lastname, ', ', b.firstname, ' ', LEFT(b.middlename, '1'), '.') END, a.id FROM paymethod AS a LEFT JOIN users_table AS b ON a.seller_id = b.user_id WHERE a.seller_id = '" . $_SESSION['user_id'] . "' " . $searchuseracc . " ORDER BY a.paymeth_id ASC LIMIT " . $limit . ",10");
		$numrows = mysqli_num_rows($res);

		$imagedisplay = ""; // Initialize the variable before the loop

		if ($numrows == TRUE) {
			while ($row = mysqli_fetch_array($res)) {
				$counter++;

				if ($row[4] == "PENDING") {
					$status = "<span class='label label-light-danger'>Pending</span>";
				} else {
					$status = "<span class='label label-light-success'>Approved</span>";
				}

				$res2 = mysqli_query($connection, "SELECT image, imagename, id FROM paymethod_image WHERE paymeth_id = '" . $row[0] . "' ORDER BY id ASC LIMIT 1");
				while ($row2 = mysqli_fetch_array($res2)) {
					$img = "../" . $row2[0];
					$imagedisplay = "<img class='card-img-top img-responsive' src='../" . $row2[0] . "' style='width:50px;cursor:pointer;' onclick='viewvalidIDphoto(\"" . $img . "\");'>";
				}

				echo "<tr style='cursor:pointer; vertical-align: middle;'>
                    <td style='white-space: nowrap; text-align: center;'>" . $counter . "</td>
                    <td>" . $imagedisplay . "</td>
                    <td style='white-space: nowrap;'>" . $row[1] . "</td>
                    <td style='white-space: nowrap;'>" . $row[2] . "</td>
                    <td style='white-space: nowrap; text-align: center;'>
                        <i class='fas fa-edit fa-lg text-success' style='cursor:pointer;color: #3f3f3f;' onclick='modaleditproduct(\"" . $row[0] . "\")' title='Edit Branch'></i>
                        <i class='fas fa-trash fa-lg text-danger' style='cursor:pointer;color: #3f3f3f;' onclick='deleteproduct(\"" . $row[1] . "\")' title='Edit Branch'></i>
                    </td>
                </tr>";
			}
			echo "|" . $counter;
		} else {
			echo "<tr><td  colspan='12' style='text-align:center'>No Record Found . . .</td></tr>";
		}

		break;

	case "loadproductlistPagination":
		if ($_POST['srchprod'] != '') {
			$searchuseracc = "AND (a.bankholdername LIKE '%" . $_POST['srchprod'] . "%' OR CASE WHEN b.middlename = '' OR b.middlename IS NULL THEN CONCAT(b.lastname, ', ', b.firstname) ELSE CONCAT(b.lastname, ', ', b.firstname, ' ', LEFT(b.middlename, '1'), '.') END LIKE '%" . $_POST['srchprod'] . "%')";
		} else {
			$searchuseracc = "";
		}

		$page = $_POST["page"];
		$rowCount = mysqli_fetch_row(mysqli_query($connection, "SELECT COUNT(a.id) FROM paymethod AS a LEFT JOIN users_table AS b ON a.seller_id = b.user_id WHERE a.seller_id = '" . $_SESSION['user_id'] . "' " . $searchuseracc . ";"));
		$rowsperpage = 10;
		$range = 1;
		$totalpages = ceil($rowCount[0] / $rowsperpage);
		$prevpage;
		$nextpage;
		if ($page > 1) {
			echo "<li style='width:50px !important;' onclick='productlistPageFunc(1)'><< </li>";
			$prevpage = $page - 1;
			echo "<li style='width:70px !important;' onclick='productlistPageFunc(" . $prevpage . ")'>< </li>";
		}
		$ex = 0;
		for ($x = ($page - $range); $x < (($page + $range) + 1); $x++) {
			if (($x > 0) && ($x <= $totalpages)) {
				if ($x == $page) {
					echo "<li id='pgproductlistPageFunc" . $x . "' class='pgnumproductlistPageFunc active' onclick='productlistPageFunc(" . $x . "," . $x . ")'>" . $x . "</li>";
					$ex = $x;
				} else {
					echo "<li id='pgproductlistPageFunc" . $x . "' class='pgnumproductlistPageFunc' onclick='productlistPageFunc(" . $x . "," . $x . ")'>" . $x . "</li>";
					$ex = $x;
				}
			}
		}
		if ($page < ($totalpages - $range)) {
			echo "<li>...</li>";
		}
		if ($page != $totalpages && $rowCount[0] != 0) {
			$nextpage = $page + 1;
			echo "<li style='width:50px !important;' onclick='productlistPageFunc(" . $nextpage . ", " . $nextpage . ")'> ></li>";
			echo "<li style='width:50px !important;' onclick='productlistPageFunc(" . $totalpages . ", " . $totalpages . ")'> >></li>";
		}
		echo "|" . $ex;
		break;
	case 'addnum':
		$num = $_POST['texthiddenwala'] + 1;
		echo $num;
		break;

	case 'addproduct':
		$generateID = generateID($connection, 'paymeth_id', 'paymethod', 'paymeth');
		$addproduct = mysqli_query($connection, "INSERT INTO paymethod SET paymeth_id = '" . $generateID . "', seller_id = '" . $_SESSION['user_id'] . "', bankholdername = '" . $_POST['textaddbankholdername'] . "', banknumber = '" . $_POST['textaddbanknumber'] . "', date_added = '" . date("Y-m-d") . "';") or die(mysqli_error($connection));
		echo $generateID;
		break;

	case 'displaymdlappsellerlist':
		$counter = 0;
		$page = $_POST["page"];
		$limit = ($page - 1) * 10;
		$res = mysqli_query($connection, "SELECT a.user_id, CASE WHEN a.middlename = '' OR a.middlename IS NULL THEN CONCAT(a.lastname, ', ', a.firstname) ELSE CONCAT(a.lastname, ', ', a.firstname, ' ', LEFT(a.middlename, '1'), '.') END, b.contactnum, b.address, a.status, b.image, a.id, b.email FROM users_table AS a LEFT JOIN user_details AS b ON a.user_id = b.user_id WHERE a.usertype = 'SELLER' AND a.status = 'APPROVED' ORDER BY a.user_id ASC LIMIT " . $limit . ",10");
		$numrows = mysqli_num_rows($res);
		if ($numrows == TRUE) {
			while ($row = mysqli_fetch_array($res)) {

				$counter++;

				if ($row[5] == "") {
					$img = "assets/images/noimage5.png";
				} else {
					$img = $row[5];
				}

				echo "<tr style='cursor:pointer;' onclick='getseller_id(\"" . $row[0] . "\", \"" . $row[1] . "\")'>
							<td style='white-space: nowrap; text-align: center;'>" . $counter . "</td>
	                        <td style='white-space: nowrap;'><img class='card-img-top img-responsive' src='" . $img . "' style='width:40px;cursor:pointer;' onclick='viewvalidIDphoto(\"" . $img . "\");'></td>
	                        <td style='white-space: nowrap;'>" . $row[1] . "</td>
	                        <td style='white-space: nowrap;'>" . $row[2] . "</td>
	                        <td style='white-space: nowrap;'>" . $row[7] . "</td>
	                    </tr>";
			}
		} else {
			echo "<tr><td  colspan='12' style='text-align:center'>No Record Found . . .</td></tr>";
		}
		break;

	case "loadmdlappselllistPagination":
		$page = $_POST["page"];
		$rowCount = mysqli_fetch_row(mysqli_query($connection, "SELECT COUNT(a.id) FROM users_table AS a LEFT JOIN user_details AS b ON a.user_id = b.user_id WHERE a.usertype = 'SELLER' AND a.status = 'APPROVED';"));
		$rowsperpage = 10;
		$range = 1;
		$totalpages = ceil($rowCount[0] / $rowsperpage);
		$prevpage;
		$nextpage;
		if ($page > 1) {
			echo "<li style='width:50px !important;' onclick='mdlappselllistPageFunc(1)'><< </li>";
			$prevpage = $page - 1;
			echo "<li style='width:70px !important;' onclick='mdlappselllistPageFunc(" . $prevpage . ")'>< </li>";
		}
		for ($x = ($page - $range); $x < (($page + $range) + 1); $x++) {
			if (($x > 0) && ($x <= $totalpages)) {
				if ($x == $page) {
					echo "<li id='pgmdlappselllistPageFunc" . $x . "' class='pgnummdlappselllistPageFunc active' onclick='mdlappselllistPageFunc(" . $x . "," . $x . ")'>" . $x . "</li>";
					$ex = $x;
				} else {
					echo "<li id='pgmdlappselllistPageFunc" . $x . "' class='pgnummdlappselllistPageFunc' onclick='mdlappselllistPageFunc(" . $x . "," . $x . ")'>" . $x . "</li>";
					$ex = $x;
				}
			}
		}
		if ($page < ($totalpages - $range)) {
			echo "<li>...</li>";
		}
		if ($page != $totalpages && $rowCount[0] != 0) {
			$nextpage = $page + 1;
			echo "<li style='width:50px !important;' onclick='mdlappselllistPageFunc(" . $nextpage . ", " . $nextpage . ")'> ></li>";
			echo "<li style='width:50px !important;' onclick='mdlappselllistPageFunc(" . $totalpages . ", " . $totalpages . ")'> >></li>";
		}
		echo "|" . $ex;
		break;

	case 'fncdsplycustinfo':
		$custdet = mysqli_fetch_array(mysqli_query($connection, "SELECT CASE WHEN a.middlename = '' OR a.middlename IS NULL THEN CONCAT(a.lastname, ', ', a.firstname) ELSE CONCAT(a.lastname, ', ', a.firstname, ' ', LEFT(a.middlename, '1'), '.') END, b.contactnum, b.email, b.address, b.image, b.latitude, b.longitude FROM users_table AS a LEFT JOIN user_details AS b ON a.user_id = b.user_id WHERE a.id = '" . $_POST['ID'] . "';"));

		if ($custdet[4] == "") {
			$img = "assets/images/noimage5.png";
		} else {
			$img = $custdet[4];
		}

		echo $custdet[0] . "|" . $custdet[1] . "|" . $custdet[2] . "|" . $custdet[3] . "|" . $img . "|" . $custdet[5] . "|" . $custdet[6];
		break;

	case 'modaleditproduct':
		$count = 0;
		$res = mysqli_query($connection, "SELECT image, imagename, id FROM paymethod_image WHERE paymeth_id = '" . $_POST['paymeth_id'] . "';");
		$numrows = mysqli_num_rows($res);
		echo $numrows . "|";
		while ($row = mysqli_fetch_array($res)) {
			$count++;
			if ($count == 1) {
				echo "<div class='col-md-12 mb-2'>
               				<input type='file' class='dropify clearinfo reqresinfofofo dropdropdrop' id='txtpaymethodImagefile1' name='txtpaymethodImagefile1' accept='image/*' data-height='220' data-default-file='../" . $row[0] . "' value='" . $row[1] . "'>
               				</div><input type='hidden' class='form-control clearinfo' id='txtimageprodIDcount1' name='txtimageprodIDcount1' value='" . $row[2] . "'>|";
			} else {
				echo "<div class='col-md-4 mb-2'>
               		<input type='file' class='dropify clearinfo reqresinfofofo dropdropdrop' id='txtpaymethodImagefile" . $count . "' name='txtpaymethodImagefile" . $count . "' accept='image/*' data-height='50' data-default-file='../" . $row[0] . "' value='" . $row[1] . "'>
               		</div><input type='hidden' class='form-control clearinfo' id='txtimageprodIDcount" . $count . "' name='txtimageprodIDcount" . $count . "' value='" . $row[2] . "'>";
			}
		}

		$paymethodet = mysqli_fetch_array(mysqli_query($connection, "SELECT a.seller_id, CASE WHEN b.middlename = '' OR b.middlename IS NULL THEN CONCAT(b.lastname, ', ', b.firstname) ELSE CONCAT(b.lastname, ', ', b.firstname, ' ', LEFT(b.middlename, '1'), '.') END, a.bankholdername, a.banknumber FROM paymethod AS a LEFT JOIN users_table AS b ON a.seller_id = b.user_id WHERE a.paymeth_id = '" . $_POST['paymeth_id'] . "';"));

		echo "|" . $paymethodet[0] . "|" . $paymethodet[1] . "|" . $paymethodet[2] . "|" . $paymethodet[3] . "|";

		break;

	case 'editproduct':
		$editproduct = mysqli_query($connection, "UPDATE paymethod SET seller_id = '" . $_SESSION['user_id'] . "', bankholdername = '" . $_POST['textaddbankholdername'] . "', banknumber = '" . $_POST['textaddbanknumber'] . "' WHERE paymeth_id = '" . $_POST['paymeth_id'] . "';");
		break;
	case 'deleteproduct':
		$deleteproduct2 = mysqli_query($connection, "DELETE FROM paymethod_image WHERE paymeth_id = '" . $_POST['paymeth_id'] . "'");
		$deleteproduct3 = mysqli_query($connection, "DELETE FROM paymethod WHERE paymeth_id = '" . $_POST['paymeth_id'] . "'");
		break;
}
