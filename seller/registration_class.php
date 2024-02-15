<?php
include("connect.php");

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require('../vendor/autoload.php');

session_start();

$code = uniqid(3);

switch ($_POST['form']) {
	case 'registeruseraccount':
		$generateID = generateID($connection, 'user_id', 'users_table', 'user');
		$password = $_POST['textadduserconfirmpass'];
		$hashed_password = password_hash($password, PASSWORD_DEFAULT);
		$registeruser = mysqli_query($connection, "INSERT INTO users_table SET user_id = '" . $generateID . "', firstname = '" . $_POST['textregFname'] . "', middlename = '" . $_POST['textregMname'] . "', lastname = '" . $_POST['textregLname'] . "', username = '" . $_POST['textregusername'] . "', password = '" . $hashed_password . "', status = 'VERIFY', usertype = 'CUSTOMER', date_added = '" . date("Y-m-d") . "',code = '" . $code . "';");
		$registeruser2 = mysqli_query($connection, "INSERT INTO user_details SET user_id = '" . $generateID . "', contactnum = '" . $_POST['textregcontactphone'] . "', email = '" . $_POST['textregemail'] . "', address = '" . $_POST['textregfulladdress'] . "', housenum = '" . $_POST['textreghousenum'] . "', street = '" . $_POST['textregstreet'] . "', subdivision = '" . $_POST['textregsubdi'] . "', barangay = '" . $_POST['textregbarangay'] . "', city = '" . $_POST['textregcity'] . "', zipnum = '" . $_POST['textregpostalcode'] . "', province = '" . $_POST['textregprovince'] . "', latitude = '" . $_POST['textreglat'] . "', longitude = '" . $_POST['textreglong'] . "', date_added = '" . date("Y-m-d") . "';");
		// Retrieve email and name from the form or database
		$email = $_POST['textregemail'];
		$name = $_POST['textregusername'];

		$mail = new PHPMailer();

		$mail->SMTPDebug = 0;                    //Enable verbose debug output
		$mail->isSMTP();                                         //Send using SMTP
		$mail->Host      = 'smtp.gmail.com';                   //Set the SMTP server to send through
		$mail->SMTPAuth  = true;                                //Enable SMTP authentication
		$mail->Username  = 'omaangatagrimarket@gmail.com';                   //SMTP username
		$mail->Password  = 'aknqqpasyqdxhlsf';                             //SMTP password
		$mail->SMTPSecure = 'tls';           //Enable implicit TLS encryption
		$mail->Port      = 25;                                 //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

		//Recipients
		$mail->setFrom("omaangatagrimarket@gmail.com", "Oma-Angat Agri Market");
		$mail->addAddress($email, $name);
		//Content
		$mail->isHTML(true);                               //Set email format to HTML
		$mail->Subject = 'Oma-Angat Agri-Market: Account Verification';
		$mail->Body   = '<h3>Dear ' . $_POST['textregusername'] . ',</h3>
			<p>Thank you for signing up for Oma-Angat Agri-Market! Were excited to have you on board as a seller of our community.To complete your registration and verify your email address, please click on the following link:</p>
			<a href="http://localhost/oma-angat/index.php?url=home&code=' . $code . '">"http://localhost/oma-angat/index.php?url=home&code=' . $code . '"</a>
			<p>By verifying your email, you will gain access to all the features and benefits of Oma-Angat Virtual Agri-Market,
			including the ability to connect with local market and to prote and sell your fresh produce.</p>
			<p>If you did not sign up for Oma-Angat Agri-Market, please disregard this email. Its possible that someone entered your email address by mistake.
			<br>Thank you and welcome to Oma-Angat Agri-Market, Happy Selling!</p>
			<p></p>
			<p></p>
			<p>Best regards,</p>
			<p style="font-weight: Bold;">The Oma-Angat Agri-Market Team</p>';

		$mail->send();

		if (!$mail->send()) {
			echo "Mailer Error: " . $mail->ErrorInfo;
		} else {
			echo $generateID . " Message sent successfully!";
		}
		break;
}
