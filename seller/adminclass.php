<?php
include("connect.php");
session_start();

switch ($_POST['form']) {

	case 'loginuser':
		$sqllogin = "SELECT id, user_id, username, firstname, lastname, usertype, status FROM users_table WHERE username = '" . $_POST['txtusername'] . "' AND password = '" . hash('sha256', $_POST['txtpassword']) . "' AND usertype = 'SELLER' ";
		$reslogin = mysqli_query($connection, $sqllogin);
		$rowlogin = mysqli_fetch_array($reslogin);
		$numlogin = mysqli_num_rows($reslogin);


		if ($numlogin > 0) {
			if ($rowlogin['status'] == "APPROVED") {
				$count = 1;
				$_SESSION['user_id'] = $rowlogin['user_id'];
				$_SESSION['username'] = $rowlogin['username'];
				$_SESSION['fullname'] = $rowlogin['firstname'] . " " . $rowlogin['lastname'];
				$_SESSION['firstname'] = $rowlogin['firstname'];
				$_SESSION['usertype'] = $rowlogin['usertype'];
			} else {
				$count = 3;
				$_SESSION['user_id'] = "";
				$_SESSION['username'] = "";
				$_SESSION['fullname'] = "";
				$_SESSION['firstname'] = "";
				$_SESSION['usertype'] = "";
			}
		} else {
			$count = 2;
			$_SESSION['user_id'] = "";
			$_SESSION['username'] = "";
			$_SESSION['fullname'] = "";
			$_SESSION['firstname'] = "";
			$_SESSION['usertype'] = "";
		}
		echo $count;
		break;

	case 'opensettingmod':
		$return_array = array();

		$getprofile = mysqli_fetch_array(mysqli_query($connection, "SELECT username, password FROM users_table WHERE user_id = '" . $_SESSION['user_id'] . "'"));

		$DateJoined = date('F d, Y', strtotime($Dateuserpharmacy[0]));
		array_push($return_array, $getprofile[0], $getprofile[1]);
		echo json_encode($return_array);
		break;

	case 'updateuser2':
		$ressavelog = mysqli_query($connection, "UPDATE users_table SET username = '" . $_POST['textsetemail'] . "', password = '" . $_POST['textsetpassword'] . "' WHERE user_id = '" . $_SESSION['user_id'] . "';");
		break;

	case 'registeruseraccount':

		$generateID = generateID($connection, 'user_id', 'users_table', 'user');
		// Hash the password
		$hashedPassword = hash('sha256', $_POST['textadduserconfirmpass']);
		$registeruser = mysqli_query($connection, "INSERT INTO users_table SET user_id = '" . $generateID . "', firstname = '" . $_POST['textregFname'] . "', middlename = '" . $_POST['textregMname'] . "', lastname = '" . $_POST['textregLname'] . "', username = '" . $_POST['textregusername'] . "', password = '" . $hashedPassword . "', status = 'PENDING', usertype = 'SELLER', date_added = '" . date("Y-m-d") . "';");
		$registeruser2 = mysqli_query($connection, "INSERT INTO user_details SET user_id = '" . $generateID . "', contactnum = '" . $_POST['textregcontactphone'] . "', email = '" . $_POST['textregemail'] . "', address = '" . $_POST['textregfulladdress'] . "', housenum = '" . $_POST['textreghousenum'] . "', street = '" . $_POST['textregstreet'] . "', subdivision = '" . $_POST['textregsubdi'] . "', barangay = '" . $_POST['textregbarangay'] . "', city = '" . $_POST['textregcity'] . "', zipnum = '" . $_POST['textregpostalcode'] . "', province = '" . $_POST['textregprovince'] . "', latitude = '" . $_POST['textreglat'] . "', longitude = '" . $_POST['textreglong'] . "', date_added = '" . date("Y-m-d") . "';");

		echo $generateID;
		break;
}
