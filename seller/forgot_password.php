<!DOCTYPE html>
<html lang="en">

<head>
    <?php include('header.php'); ?>
    <style type="text/css">
        .auth {
            position: absolute;
            width: 100%;
            height: 100%;
            left: 0;
            background-color: #4C644B;
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
            background-color: #CFE2CE;
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
                    <a href="/index.php" class="text-center db" style="padding-top: 5px;padding-bottom: 5px;"><img src="../admin/assets/images/single-logo.png" alt="Home" width="30%" height="auto" title="Homepage" />
                    </a>
                </header>
                <div class="card-body cardbodylogin" style="padding: 1.25rem 1.8rem;">
                    <div class="form-horizontal form-material">
                        <div class="form-group row" style="margin-bottom: 5px;">
                            <div class="col-md-12">
                                <p class="text-center" style="margin-bottom: 5px; font-weight: 400; font-size: 1rem">
                                    FORGOT PASSWORD?</p>
                            </div>
                        </div>

                        <label class="mt-3" for="email" style="margin-bottom: 0px; font-weight: 500">Email</label>
                        <div class="form-group row">
                            <span class="text-danger"></span>
                            <div class="col-md-11" style="flex: 0 0 98.2%; max-width: 98.2%;">
                                <input type="email" class="form-control underlined" name="txtemail" id="txtemail" placeholder="Enter your email" required style="height: 40px;">
                            </div>
                        </div>
                        <div class="form-group mt-4">
                            <div class="col-xs-12">
                                <button class="btn btn-success btn-md btn-block text-uppercase waves-effect waves-light" onclick="forgotpassword();" style="padding: 10px 10px; font-weight: 500; background-color: #4C644B; border: #4C644B 1px solid">Submit</button>
                                <span style="font-size: 16px; margin-top:14px; display:block;">Remembered your
                                    password?<a href="login.php"> Login here.</a></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
<?php include('jscripts.php'); ?>

<script type="text/javascript">
    function forgotpassword() {
        var txtemail = $("#txtemail").val();
        $(".preloader").show().css('background', 'rgba(255,255,255,0.5)');
        $.ajax({
            type: 'POST',
            url: 'forgotpassword_class.php',
            data: 'txtemail=' + txtemail,
            success: function(data) {
                setTimeout(function() {
                    $(".preloader").hide().css('background', '');
                    if (data == 1) {
                        Swal.fire(
                            'SUCCESS',
                            'Please check your email for password reset instructions.',
                            'success'
                        )
                    } else {
                        Swal.fire(
                            'ERROR',
                            'Your email is not associated with any account.',
                            'warning'
                        )
                    }
                }, 1000);
            }
        })
    }
</script>