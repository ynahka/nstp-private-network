<!DOCTYPE html>
<html lang="en">
<?php
session_start();
include("connect.php");

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require('../vendor/autoload.php');

if (isset($_POST['change'])) {
    if (isset($_GET['code'])) {
        $code = $_GET['code'];
        $newpass = mysqli_real_escape_string($connection, $_POST['npass']);
        $cnfrmpass = mysqli_real_escape_string($connection, $_POST['cpass']);
        $newpass = md5($newpass);
        $cnfrmpass = md5($cnfrmpass);
        if ($newpass == $cnfrmpass) {
            $updatequery = "update users_table set password='" . $newpass . "'where code='$code'";
            $iquery = mysqli_query($connection, $updatequery);
            if ($iquery) {
                echo "Password has been updated";
            } else {
                echo "Your password is not updated";
            }
        } else {
            echo "Password does not match";
        }
    } else {
        echo "No user found";
    }
}
?>

<head>
    <?php include('header.php'); ?>
    <style type="text/css">
    .auth {
        position: absolute;
        width: 100%;
        height: 100%;
        left: 0;
        background-color: #bebebe;
        overflow-x: hidden;
        overflow-y: auto;
    }

    .auth-container {
        width: 450px;
        min-height: 330px;
        position: absolute;
        top: 50%;
        left: 50%;
        -webkit-transform: translateY(-50%) translateX(-50%);
        transform: translateY(-50%) translateX(-50%);
    }

    .card {
        background-color: #fff;
        -webkit-box-shadow: 1px 1px 5px rgb(126 142 159);
        box-shadow: 1px 1px 5px rgb(126 142 159);
        margin-bottom: 10px;
        border-radius: 0.50em;
        border: none;
    }

    .auth-container .auth-header {
        text-align: center;
        margin-top: 30px;
    }
    </style>
</head>

<body>
    <div class="auth">
        <div class="auth-container">
            <div class="card">
                <header class="auth-header">
                    <a href="/index.php" class="text-center db" style="padding-top: 5px;padding-bottom: 5px;"><img
                            src="../admin/assets/images/single-logo.png" alt="Home" width="30%" height="auto"
                            title="Homepage" />
                    </a>
                </header>
                <form method="post">
                    <div class="card-body cardbodylogin" style="padding: 1.25rem 1.8rem;">
                        <div class="form-horizontal form-material">
                            <div class="form-group row" style="margin-bottom: 5px;">
                                <div class="col-md-12">
                                    <p class="text-center"
                                        style="margin-bottom: 5px; font-weight: 400; font-size: 1rem">
                                        Enter New Password</p>
                                </div>
                            </div>

                            <label class="mt-3" for="npass" style="margin-bottom: 0px; font-weight: 500">New
                                Password</label>
                            <div class="form-group row">
                                <span class="text-danger"></span>
                                <div class="col-md-11" style="flex: 0 0 98.2%; max-width: 98.2%;">
                                    <input type="password" class="form-control underlined" name="npass" id="npass"
                                        placeholder="Enter your email" required style="height: 40px;">
                                </div>
                            </div>
                            <label class="mt-3" for="cpass" style="margin-bottom: 0px; font-weight: 500">Confirm
                                Password</label>
                            <div class="form-group row">
                                <span class="text-danger"></span>
                                <div class="col-md-11" style="flex: 0 0 98.2%; max-width: 98.2%;">
                                    <input type="password" class="form-control underlined" name="cpass" id="cpass"
                                        placeholder="Enter your email" required style="height: 40px;">
                                </div>
                            </div>
                            <div class="form-group mt-4">
                                <div class="col-xs-12">
                                    <button type="submit" name="change"
                                        class="btn btn-success btn-md btn-block text-uppercase waves-effect waves-light"
                                        style="padding: 10px 10px; font-weight: 500; background-color: #79c78d; border: #79a206 1px solid">Change
                                        Password</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>