<?php
include("connect.php");
session_start();

switch ($_POST['form']) {

	case 'loginuser':
		$sqllogin = "SELECT id, user_id, username, firstname, lastname, usertype, password, status FROM users_table WHERE username = '" . $_POST['txtusername'] . "' AND usertype = 'ADMIN' ";
		$reslogin = mysqli_query($connection, $sqllogin);
		$rowlogin = mysqli_fetch_array($reslogin);
		$numlogin = mysqli_num_rows($reslogin);

		if ($numlogin > 0) {
			$count = 1;
			$_SESSION['user_id'] = $rowlogin['user_id'];
			$_SESSION['username'] = $rowlogin['username'];
			$_SESSION['fullname'] = $rowlogin['firstname'] . " " . $rowlogin['lastname'];
			$_SESSION['firstname'] = $rowlogin['firstname'];
			$_SESSION['usertype'] = $rowlogin['usertype'];
		} else {
			$count = 2;
			$_SESSION['user_id'] = "";
			$_SESSION['username'] = "";
			$_SESSION['fullname'] = "";
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
}
