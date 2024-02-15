<?php
	include("../connect.php");
	session_start();

	switch ($_POST['form']) {


		case 'deleteblog':
			$deleteproduct1 = mysqli_query($connection, "DELETE FROM blog WHERE id = '".$_POST['id']."'");
		break;

		
	}
?>