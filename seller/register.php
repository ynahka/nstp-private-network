<!DOCTYPE html>
<html lang="en">

<head>
    <?php include('header.php'); ?>
    <link rel="stylesheet" href="css/register.css">
</head>

<body>
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" />
        </svg>
    </div>

    <div class="auth">
        <div class="auth-container">
            <div class="card">
                <header class="auth-header">
                    <a href="#" class="text-center db" style="padding-top: 5px;padding-bottom: 5px;"><img src="../admin/assets/images/single-logo.png" alt="Home" width="30%" height="auto" title="Homepage" />
                    </a>
                </header>
                <div class="card-body">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <p class="regtitle">Create an Account</p>
                                <p class="">Sell your fresh produce to a wide market!</p>
                            </div>

                            <div class="col-md-12 mb-2 mt-4">
                                <h4 class="text-info">Farmers Information</h4>
                            </div>

                            <div class="col-md-12">
                                <label for="txtregFname" style="margin-bottom: 0px; font-weight: 500;">Firstname</label>
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="text" class="form-control reqresinfo" name="txtregFname" id="txtregFname" style="height: 40px;">
                                    </div>
                                </div>

                                <label class="mt-2" for="txtregMname" style="margin-bottom: 0px; font-weight: 500;">Middlename</label>
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="text" class="form-control" name="txtregMname" id="txtregMname" style="height: 40px;">
                                    </div>
                                </div>

                                <label class="mt-2" for="txtregLname" style="margin-bottom: 0px; font-weight: 500;">Lastname</label>
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="text" class="form-control reqresinfo" name="txtregLname" id="txtregLname" style="height: 40px;">
                                    </div>
                                </div>

                                <label class="mt-2" for="txtregcontactphone" style="margin-bottom: 0px; font-weight: 500;">Contact No.</label>
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="text" class="form-control reqresinfo contactnum" name="txtregcontactphone" id="txtregcontactphone" style="height: 40px;">
                                    </div>
                                </div>

                                <label class="mt-2" for="txtregemail" style="margin-bottom: 0px; font-weight: 500;">Email <span style="text-transform: lowercase !important; color:var(--hovercolor)"> (optional)</span></label>
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="text" class="form-control" name="txtregemail" id="txtregemail" style="height: 40px;">
                                    </div>
                                </div>

                                <label class="mt-2" for="txtregfulladdress" style="margin-bottom: 0px; font-weight: 500;">Address</label>
                                <div class="row">
                                    <div class="col-md-12">
                                        <textarea class="form-control reqresinfo" name="txtregfulladdress" id="txtregfulladdress" rows="2" readonly style="cursor:pointer;" onclick="openmdlsearchaddress();"></textarea>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div id="map_canvas" style="height: 250px; width:100% !important; border-radius: 0px !important;">
                                        </div>
                                    </div>
                                </div>

                                <input type="hidden" id="txtreghousenum">
                                <input type="hidden" id="txtregstreet">
                                <input type="hidden" id="txtregsubdi">
                                <input type="hidden" id="txtregbarangay">
                                <input type="hidden" id="txtregcity">
                                <input type="hidden" id="txtregpostalcode">
                                <input type="hidden" id="txtregprovince">
                                <input type="hidden" id="txtreglat">
                                <input type="hidden" id="txtreglong">

                                <div class="row mb-2">
                                    <div class="col-md-12">
                                        <hr>
                                        <h4 class="text-info">Account Credentials</h4>
                                    </div>
                                </div>

                                <label class="" for="txtregusername" style="margin-bottom: 0px; font-weight: 500;">Username</label>
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="text" class="form-control reqresinfo" name="txtregusername" id="txtregusername" style="height: 40px;">
                                    </div>
                                </div>

                                <label class="mt-2" for="txtadduserconfirmpass" style="margin-bottom: 0px; font-weight: 500;">Password</label>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="input-group" style="margin-top: 0px;">
                                            <input type="Password" class="form-control reqresinfo" id="txtadduserconfirmpass" style="height: 40px;">
                                            <div class="input-group-prepend" style="cursor: pointer;" onclick="fncaddpassattribunHash2();" id="inputaddusereye2">
                                                <span class="input-group-text"><i class="fas fa-eye-slash" id="addusereye2"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-2">
                                    <div class="col-md-12">
                                        <hr>
                                        <h4 class="text-info">Valid ID</h4>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <form method="post" action="#" enctype="multipart/form-data" id="frmUploadvalidPic">
                                            <div class="row">
                                                <div class="col-md-12" style="display: none;">
                                                    <img src="assets/images/noimage5.png" class="img-thumbnail" width="200" height="250" style="border: 2px solid #bdc3c7; margin-bottom: 10px;" id="updatevalidImage"><br>
                                                </div>
                                                <div class="col-md-12">
                                                    <input type="file" class="dropify clearinfo reqresinfo" id="txtvalidImagefile" name="txtvalidImagefile" onchange="fncShowvalidPic();" accept="image/*" data-height="300">
                                                    <input type="hidden" class="clearinfo" name="txtvalidimageID" id="txtvalidimageID">
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>

                                <h4 class="text-info" style="margin-top: 30px; margin-bottom: 15px;">Profile Image / Logo <span style="text-transform: lowercase !important; color:var(--hovercolor)"> (optional)</span></h4>

                                <div class="row">
                                    <div class="col-md-12">
                                        <form method="post" action="#" enctype="multipart/form-data" id="frmUploadvalidPic2">
                                            <div class="row">
                                                <div class="col-md-12" style="display: none;">
                                                    <img src="assets/images/noimage5.png" class="img-thumbnail" width="200" height="250" style="border: 2px solid #bdc3c7; margin-bottom: 10px;" id="updatevalidImage2"><br>
                                                </div>
                                                <div class="col-md-12">
                                                    <input type="file" class="dropify clearinfo" id="txtvalidImagefile2" name="txtvalidImagefile2" onchange="fncShowvalidPic2();" accept="image/*" data-height="300">
                                                    <input type="hidden" class="clearinfo" name="txtvalidimageID2" id="txtvalidimageID2">
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group text-center mt-4">
                            <div class="col-xs-12">
                                <button class="btn btn-success btn-md btn-block text-uppercase waves-effect waves-light" onclick="registeruseraccount();" style="padding: 10px 10px; font-weight: 500; background-color: #4C644B; border: #4C644B 1px solid">Register</button>
                                <a href="login.php">Already have an account?</a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="mdlsearchaddress" class="modal" data-keyboard="false" data-backdrop="static">
        <div class="modal-dialog modal-dialog-centered modal-md" style="max-width: 400px;">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <div style="display: flex;justify-content: space-between !important;">
                                <h4 class="headerfontfont2" style="color: #2c2b2e;font-weight: 500;">Address</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true" onclick="clearsearchaddress()" style="padding: 1rem 1rem;margin: -1.6rem -1rem -1rem auto; border:0">×</button>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <label class="" for="txtreghousenum2" style="margin-bottom: 0px; font-weight: 500;">House
                                Number</label>
                            <div class="row">
                                <div class="col-md-12">
                                    <input type="text" class="form-control" name="txtreghousenum2" id="txtreghousenum2" style="height: 40px;">
                                </div>
                            </div>

                            <label class="mt-2" for="txtregstreet2" style="margin-bottom: 0px; font-weight: 500;">Street
                                Name</label>
                            <div class="row">
                                <div class="col-md-12">
                                    <input type="text" class="form-control reqresinfo2" name="txtregstreet2" id="txtregstreet2" style="height: 40px;">
                                </div>
                            </div>

                            <label class="mt-2" for="txtregsubdi2" style="margin-bottom: 0px; font-weight: 500;">Subdivision/Village</label>
                            <div class="row">
                                <div class="col-md-12">
                                    <input type="text" class="form-control" name="txtregsubdi2" id="txtregsubdi2" style="height: 40px;">
                                </div>
                            </div>
                            <label class="mt-2" for="txtregbarangay2" style="margin-bottom: 0px; font-weight: 500;">Barangay</label>
                            <div class="row">
                                <div class="col-md-12">
                                    <input type="text" class="form-control reqresinfo2" name="txtregbarangay2" id="txtregbarangay2" style="height: 40px;">
                                </div>
                            </div>

                            <label class="mt-2" for="txtregcity2" style="margin-bottom: 0px; font-weight: 500;">City/Municipality</label>
                            <div class="row">
                                <div class="col-md-12">
                                    <input type="text" class="form-control reqresinfo2" name="txtregcity2" id="txtregcity2" style="height: 40px;">
                                </div>
                            </div>

                            <label class="mt-2" for="txtregpostalcode2" style="margin-bottom: 0px; font-weight: 500;">Postal Code/Zip Code</label>
                            <div class="row">
                                <div class="col-md-12">
                                    <input type="text" class="form-control reqresinfo2" name="txtregpostalcode2" id="txtregpostalcode2" style="height: 40px;">
                                </div>
                            </div>

                            <label class="mt-2" for="txtregprovince2" style="margin-bottom: 0px; font-weight: 500;">Province</label>
                            <div class="row">
                                <div class="col-md-12">
                                    <input type="text" class="form-control reqresinfo2" name="txtregprovince2" id="txtregprovince2" style="height: 40px;">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer mt-2" style="padding: 10px 15px;">
                    <div class="row">
                        <div class="col-md-12">
                            <button type="button" class="btn waves-effect waves-light btn-secondary float-right buttonproduct" onclick="btnsearchaddress();" style="background-color: #4C644B !important; border: 1px solid #4C644B !important;">Search</button>
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
    $(function() {
        $(".contactnum").inputmask("+63 999-999-9999");

        $(".numonly").keydown(function(event) {
            if (event.keyCode == 46 || event.keyCode == 8 || event.keyCode == 190 || event.keyCode == 9 ||
                event.keyCode == 188) {

            } else {
                if (event.keyCode < 48 || event.keyCode > 57 || event.keyCode == 17) {
                    event.preventDefault();
                }
            }
        });

        $(".date-picker1").datepicker({
            autoHide: true,
            format: 'mm/dd/yyyy',
            todayHighlight: true
        });

        geocodesearching();
    });

    function reqField1(classN) {
        var isValid = 1;
        $('.' + classN).each(function() {
            if ($(this).val() == '') {
                $(this).css('border', '1px #a94442 solid');
                $(this).addClass('lala');
                isValid = 0;
            } else {
                $(this).css('border', '');
                $(this).removeClass('lala');
            }
        });

        return isValid;
    }

    function geocodesearching() {
        var geocoder = new google.maps.Geocoder();
        if ($("#txtregfulladdress").val() == "" || $("#txtregfulladdress").val() == null) {
            var address = "";
        } else {
            var address = $("#txtregfulladdress").val();
        }
        var lat = document.getElementById("txtreglat").value;
        var lng = document.getElementById("txtreglong").value;
        geocoder.geocode({
            'address': address
        }, function(results, status) {
            if (status == google.maps.GeocoderStatus.OK) {
                var latitude = results[0].geometry.location.lat();
                var longitude = results[0].geometry.location.lng();
                initialize(latitude, longitude);
                $("#txtreglat").val(latitude);
                $("#txtreglong").val(longitude);
            } else {
                initialize(lat, lng);
            }
        });
    }

    function initialize(latitude, longitude) {
        var latlng = new google.maps.LatLng(latitude, longitude);
        var myOptions = {
            zoom: 16,
            center: latlng,
            mapTypeId: google.maps.MapTypeId.ROADMAP,
            mapTypeControl: false
        };
        var map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);
        var marker = new google.maps.Marker({
            position: latlng,
            map: map,
            draggable: true
        });

        google.maps.event.addListener(marker, 'dragend', function(evt) {
            $("#txtreglat").val(evt.latLng.lat());
            $("#txtreglong").val(evt.latLng.lng());
        });

        google.maps.event.addListener(marker, 'drag', function(evt) {
            console.log("marker is being dragged");
        });
    }

    function openmdlsearchaddress() {
        $("#mdlsearchaddress").modal('show');

        var textreghousenum = $("#txtreghousenum").val();
        var textregstreet = $("#txtregstreet").val();
        var textregsubdi = $("#txtregsubdi").val();
        var textregbarangay = $("#txtregbarangay").val();
        var textregcity = $("#txtregcity").val();
        var textregpostalcode = $("#txtregpostalcode").val();
        var textregprovince = $("#txtregprovince").val();

        $("#txtreghousenum2").val(textreghousenum);
        $("#txtregstreet2").val(textregstreet);
        $("#txtregsubdi2").val(textregsubdi);
        $("#txtregbarangay2").val(textregbarangay);
        $("#txtregcity2").val(textregcity);
        $("#txtregpostalcode2").val(textregpostalcode);
        $("#txtregprovince2").val(textregprovince);
    }

    function btnsearchaddress() {
        if (reqField1('reqresinfo2') == 1) {
            var textreghousenum = $("#txtreghousenum2").val();
            var textregstreet = $("#txtregstreet2").val();
            var textregsubdi = $("#txtregsubdi2").val();
            var textregbarangay = $("#txtregbarangay2").val();
            var textregcity = $("#txtregcity2").val();
            var textregpostalcode = $("#txtregpostalcode2").val();
            var textregprovince = $("#txtregprovince2").val();
            var housenum = "";
            var subdivision = "";

            $("#txtreghousenum").val(textreghousenum);
            $("#txtregstreet").val(textregstreet);
            $("#txtregsubdi").val(textregsubdi);
            $("#txtregbarangay").val(textregbarangay);
            $("#txtregcity").val(textregcity);
            $("#txtregpostalcode").val(textregpostalcode);
            $("#txtregprovince").val(textregprovince);

            if (textreghousenum == "") {
                housenum = "";
            } else {
                housenum = textreghousenum + ", ";
            }

            if (textregsubdi == "") {
                subdivision = "";
            } else {
                subdivision = textregsubdi + ", ";
            }

            $("#txtregfulladdress").val(housenum + textregstreet + ", " + subdivision + textregbarangay + ", " +
                textregcity + ", " + textregpostalcode + ", " + textregprovince);

            geocodesearching();

            $("#mdlsearchaddress").modal('hide');
        } else {
            Swal.fire(
                'ALERT',
                'Please review your entries. Ensure all required fields are filled out',
                'warning'
            )
        }
    }

    function clearsearchaddress() {
        $('.reqresinfo2').css('border', '');
        $('.reqresinfo2').val("");
    }

    // function registeruseraccount() {
    //     var textregFname = $("#txtregFname").val();
    //     var textregMname = $("#txtregMname").val();
    //     var textregLname = $("#txtregLname").val();
    //     var textregcontactphone = $("#txtregcontactphone").val();
    //     var textregemail = $("#txtregemail").val();
    //     var textregfulladdress = $("#txtregfulladdress").val();
    //     var textreghousenum = $("#txtreghousenum").val();
    //     var textregstreet = $("#txtregstreet").val();
    //     var textregsubdi = $("#txtregsubdi").val();
    //     var textregbarangay = $("#txtregbarangay").val();
    //     var textregcity = $("#txtregcity").val();
    //     var textregpostalcode = $("#txtregpostalcode").val();
    //     var textregprovince = $("#txtregprovince").val();
    //     var textreglat = $("#txtreglat").val();
    //     var textreglong = $("#txtreglong").val();

    //     var textregusername = $("#txtregusername").val();
    //     var textadduserconfirmpass = $("#txtadduserconfirmpass").val();
    //     var textvalidImagefile = $("#txtvalidImagefile").val();


    //     if (reqField1('reqresinfo') == 1) {
    //         if (textvalidImagefile != "") {
    //             $(".preloader").show().css('background', 'rgba(255,255,255,0.5)');
    //             $.ajax({
    //                 type: 'POST',
    //                 url: 'adminclass.php',
    //                 data: 'textregFname=' + textregFname + '&textregMname=' + textregMname + '&textregLname=' +
    //                     textregLname + '&textregcontactphone=' + encodeURIComponent(textregcontactphone) +
    //                     '&textregemail=' + textregemail + '&textregfulladdress=' + textregfulladdress +
    //                     '&textreghousenum=' + textreghousenum + '&textregstreet=' + textregstreet +
    //                     '&textregsubdi=' + textregsubdi + '&textregbarangay=' + textregbarangay + '&textregcity=' +
    //                     textregcity + '&textregprovince=' + textregprovince + '&textreglat=' + textreglat +
    //                     '&textreglong=' + textreglong + '&textregpostalcode=' + textregpostalcode +
    //                     '&textregusername=' + textregusername + '&textadduserconfirmpass=' +
    //                     textadduserconfirmpass + '&form=registeruseraccount',
    //                 success: function(data) {
    //                     setTimeout(function() {
    //                         $(".preloader").hide().css('background', '');
    //                         Swal.fire({
    //                             title: "Success!",
    //                             text: "Successfully Registered. Please wait for admins approval upon checking your registration details. ",
    //                             type: "success",
    //                             icon: "success",
    //                             showCancelButton: false,
    //                             confirmButtonColor: "#00fb71",
    //                             confirmButtonText: "Okay",
    //                             closeOnConfirm: false
    //                         }).then((result) => {
    //                             if (result.value) {
    //                                 uploadvalidpicture2(data);
    //                                 uploadvalidpicture(data);
    //                             }
    //                         });
    //                     }, 500);
    //                 }
    //             })
    //         } else {
    //             Swal.fire(
    //                 'ALERT',
    //                 'Valid ID is required.',
    //                 'warning'
    //             )
    //         }
    //     } else {
    //         Swal.fire(
    //             'ALERT',
    //             'Please review your entries. Ensure all required fields are filled out',
    //             'warning'
    //         )
    //     }
    // }

    function registeruseraccount() {
        var textregFname = $("#txtregFname").val();
        var textregMname = $("#txtregMname").val();
        var textregLname = $("#txtregLname").val();
        var textregcontactphone = $("#txtregcontactphone").val();
        var textregfulladdress = $("#txtregfulladdress").val();
        var textreghousenum = $("#txtreghousenum").val();
        var textregstreet = $("#txtregstreet").val();
        var textregsubdi = $("#txtregsubdi").val();
        var textregbarangay = $("#txtregbarangay").val();
        var textregcity = $("#txtregcity").val();
        var textregpostalcode = $("#txtregpostalcode").val();
        var textregprovince = $("#txtregprovince").val();
        var textreglat = $("#txtreglat").val();
        var textreglong = $("#txtreglong").val();

        var textregusername = $("#txtregusername").val();
        var textadduserconfirmpass = $("#txtadduserconfirmpass").val();
        var textvalidImagefile = $("#txtvalidImagefile").val();

        if (reqField1('reqresinfo') == 1) {
            $(".preloader").show().css('background', 'rgba(255,255,255,0.5)');
            $.ajax({
                type: 'POST',
                url: 'adminclass.php',
                data: 'textregFname=' + textregFname + '&textregMname=' + textregMname + '&textregLname=' +
                    textregLname + '&textregcontactphone=' + encodeURIComponent(textregcontactphone) +
                    '&textregfulladdress=' + textregfulladdress +
                    '&textreghousenum=' + textreghousenum + '&textregstreet=' + textregstreet +
                    '&textregsubdi=' + textregsubdi + '&textregbarangay=' + textregbarangay + '&textregcity=' +
                    textregcity + '&textregprovince=' + textregprovince + '&textreglat=' + textreglat +
                    '&textreglong=' + textreglong + '&textregpostalcode=' + textregpostalcode +
                    '&textregusername=' + textregusername + '&textadduserconfirmpass=' +
                    textadduserconfirmpass + '&form=registeruseraccount',
                success: function(data) {
                    setTimeout(function() {
                        $(".preloader").hide().css('background', '');
                        Swal.fire({
                            title: "Success!",
                            text: "Successfully Registered. Please wait for admins approval upon checking your registration details. ",
                            type: "success",
                            icon: "success",
                            showCancelButton: false,
                            confirmButtonColor: "#00fb71",
                            confirmButtonText: "Okay",
                            closeOnConfirm: false
                        }).then((result) => {
                            if (result.value) {
                                if (textvalidImagefile) {
                                    uploadvalidpicture2(data);
                                }
                                uploadvalidpicture(data);
                            }
                        });
                    }, 500);
                }
            });
        } else {
            Swal.fire(
                'ALERT',
                'Please review your entries. Ensure all required fields are filled out',
                'warning'
            );
        }
    }

    function fncShowvalidPic() {
        var oFReader = new FileReader();
        oFReader.readAsDataURL(document.getElementById("txtvalidImagefile").files[0]);
        oFReader.onload = function(oFREvent) {
            document.getElementById("updatevalidImage").src = oFREvent.target.result;
        };
    }

    function uploadvalidpicture(genid) {
        $("#txtvalidimageID").val(genid);
        var data = new FormData($('#frmUploadvalidPic')[0]);
        $.ajax({
            type: 'POST',
            url: 'uploadvalidid.php',
            data: data,
            mimeType: 'multipart/form-data',
            contentType: false,
            cache: false,
            processData: false,
            success: function(data) {
                loginusers();
            }
        });
    }
    // Profile Image
    function fncShowvalidPic2() {
        var oFReader = new FileReader();
        oFReader.readAsDataURL(document.getElementById("txtvalidImagefile2").files[0]);
        oFReader.onload = function(oFREvent) {
            document.getElementById("updatevalidImage2").src = oFREvent.target.result;
        };
    }

    function uploadvalidpicture2(genid) {
        if (genid) {
            $("#txtvalidimageID2").val(genid);
            var data = new FormData($('#frmUploadvalidPic2')[0]);
            $.ajax({
                type: 'POST',
                url: 'uploadprofileImage.php',
                data: data,
                mimeType: 'multipart/form-data',
                contentType: false,
                cache: false,
                processData: false,
                success: function(data) {
                    loginusers();
                }
            });
        } else {
            // Handle the case where genid is not provided (optional logic)
            console.log("Optional logic for uploadvalidpicture2 when genid is not provided");
        }
    }


    function loginusers() {
        window.location = "login.php";
    }

    function fncaddpassattribHash2() {
        $("#txtadduserconfirmpass").attr("type", "password");
        $("#inputaddusereye2").attr("onclick", "fncaddpassattribunHash2()");
        $("#addusereye2").removeClass("fa-eye");
        $("#addusereye2").addClass("fa-eye-slash");
    }

    function fncaddpassattribunHash2() {
        $("#txtadduserconfirmpass").attr("type", "text");
        $("#inputaddusereye2").attr("onclick", "fncaddpassattribHash2()");
        $("#addusereye2").addClass("fa-eye");
        $("#addusereye2").removeClass("fa-eye-slash");
    }
</script>