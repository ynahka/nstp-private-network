<script type="text/javascript">
$(function() {
    $(".fixTable").tableHeadFixer();

    $("#txtproductlistPageCount").val("1");
    $("#txtsearchproduct").keyup(function(e) {
        if ($('#txtsearchproduct').val() == "") {
            $("#txtproductlistPageCount").val("1");
            paymethodlist();
        } else {
            $("#txtproductlistPageCount").val("1");
            paymethodlist();
        }
    });
    paymethodlist();
    $(".contactnum").inputmask("+63 999-999-9999");

    $(".txtAmountFields").change(function() {
        var x = ($(this).val()).replace(/,/g, "");
        var v = parseFloat(x || 0);
        $(this).val(v.toFixed(2).replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,"));
    });

    $(".numonly").keydown(function(event) {
        if (event.keyCode == 46 || event.keyCode == 8 || event.keyCode == 190 || event.keyCode == 9 ||
            event.keyCode == 188) {

        } else {
            if (event.keyCode < 48 || event.keyCode > 57 || event.keyCode == 17) {
                event.preventDefault();
            }
        }
    });

    $(".focus").focus(function() {
        this.select();
    });
});

// DISPLAY PRODUCT
function paymethodlist() {
    var srchprod = $("#txtsearchproduct").val();
    var page = $("#txtproductlistPageCount").val();
    $.ajax({
        type: 'POST',
        url: 'paymentmethod/class.php',
        data: 'srchprod=' + srchprod + '&page=' + page + '&form=paymethodlist',
        success: function(data) {
            var arr = data.split("|");
            $("#tblpaymethodlist").html(arr[0]);
            $("#txttotproduct").text(arr[1]);
            loadproductlistPagination();
        }
    })
}

function loadproductlistPagination() {
    var srchprod = $("#txtsearchproduct").val();
    var page = $("#txtproductlistPageCount").val();
    $.ajax({
        type: 'POST',
        url: 'paymentmethod/class.php',
        data: 'srchprod=' + srchprod + '&page=' + page + '&form=loadproductlistPagination',
        success: function(data) {
            var arr = data.split("|");
            if (arr[1] != 1) {
                $("#upproductlistPageList").html(arr[0]);
            } else {
                $("#upproductlistPageList").html("");
            }
        }
    })
}

function productlistPageFunc(page, pagenums) {
    $(".pgnumproductlistPageFunc").removeClass("active");
    $("#pgproductlistPageFunc" + pagenums).addClass("active");
    $("#txtproductlistPageCount").val(page);
    paymethodlist();
}
// DISPLAY PRODUCT END

// ADD PRODUCT
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

function reqField2(classN) {
    var isValid = 1;
    $('.' + classN).each(function() {
        if ($(this).attr("value") == '') {
            $(this).css('border', '1px #a94442 solid');
            isValid = 0;
        } else {
            $(this).css('border', '');
        }
    });

    return isValid;
}

function openmdladdproduct() {
    $("#mdladdproduct").modal('show');
    $('#txtopenproductheader').text("New Payment Method");

    $(".btnprodsave").css("display", "block");
    $(".btnprodupdate").css("display", "none");

    $('.dropify-message').attr("style", "display:block");
    $('.dropify-preview').attr("style", "display:none");
    $('.dropify-clear').attr("style", "display:none");

    $('#appendprodimage').html(
        "<div class='col-md-12 mb-2'><input type='file' class='dropify clearinfo reqresinfo dropdropdrop' id='txtpaymethodImagefile1' name='txtpaymethodImagefile1' accept='image/*' data-height='220'></div><input type='hidden' class='form-control clearinfo' id='txtimageprodIDcount1' name='txtimageprodIDcount1' value='0'>"
    );
    $('#appendprodimage2').html("");
    $('.dropify').dropify();
    $('#hiddenwala').val(1);

    $('#hiddenwala2').val(1);
}

// APPEND IMAGE
function fncappendprodimage() {
    var texthiddenwala = $('#hiddenwala').val();
    $.ajax({
        type: 'POST',
        url: 'paymentmethod/class.php',
        data: 'texthiddenwala=' + texthiddenwala + '&form=addnum',
        success: function(data) {
            $('#hiddenwala').val(data);
            $('#appendprodimage2').append(
                "<div class='col-md-4 mb-2'><input type='file' class='dropify clearinfo reqresinfo dropdropdrop' id='txtpaymethodImagefile" +
                data + "' name='txtpaymethodImagefile" + data +
                "' accept='image/*' data-height='50'></div><input type='hidden' class='form-control clearinfo' id='txtimageprodIDcount" +
                data + "' name='txtimageprodIDcount" + data + "' value='0'>");
            $('.dropify').dropify();
        }
    })
}

function addproduct() {
    var textpaymethodImagefile = "";
    $.each($(".dropdropdrop"), function() {
        if ($(this).val() != "") {
            textpaymethodImagefile += "#" + $(this).val();
        } else {
            textpaymethodImagefile += "";
        }
    });

    var textseller_id = $("#txtseller_id").val();
    var textaddbankholdername = $("#txtaddbankholdername").val();
    var textaddbanknumber = $("#txtaddbanknumber").val();

    if (reqField1('reqresinfo') == 1) {
        $(".preloader").show().css('background', 'rgba(255,255,255,0.5)');
        $.ajax({
            type: 'POST',
            url: 'paymentmethod/class.php',
            data: 'textseller_id=' + textseller_id + '&textaddbankholdername=' + textaddbankholdername +
                '&textaddbanknumber=' + textaddbanknumber + '&form=addproduct',
            success: function(data) {
                console.log('Add product success:', data);
                $("#mdladdproduct").modal('hide');
                $(".preloader").hide().css('background', '');

                if (textpaymethodImagefile != "") {
                    uploadprodpicture(data);
                }

                Swal.fire(
                    'Success!',
                    'Payment Method successfully added.',
                    'success'
                );

                setTimeout(function() {
                    window.location.reload();
                }, 1000);
            },
            error: function(xhr, status, error) {
                console.error('AJAX Error: ' + status, error);
                $(".preloader").hide().css('background', '');
                Swal.fire(
                    'Error!',
                    'An error occurred while adding the product.',
                    'error'
                );
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


function uploadprodpicture(genid) {
    $("#txtpayimageID").val(genid);
    var data = new FormData($('#frmUploadPayPic')[0]);
    $.ajax({
        type: 'POST',
        url: 'paymentmethod/uploadpaymethodimage.php',
        data: data,
        mimeType: 'multipart/form-data',
        contentType: false,
        cache: false,
        processData: false,
        success: function(data) {}
    });
}
// ADD PRODUCT END

// Seller List Modal
function openmdlseller() {
    $("#mdllistofseller").modal('show');
    $("#txtpendingsellerlistPageCount").val("1");
    displaymdlappsellerlist();
}

function displaymdlappsellerlist() {
    var page = $("#txtpendingsellerlistPageCount").val();
    $.ajax({
        type: 'POST',
        url: 'paymentmethod/class.php',
        data: 'page=' + page + '&form=displaymdlappsellerlist',
        success: function(data) {
            $("#tblpendingsellerlist").html(data);
            loadmdlappselllistPagination();
        }
    })
}

function loadmdlappselllistPagination() {
    var page = $("#txtpendingsellerlistPageCount").val();
    $.ajax({
        type: 'POST',
        url: 'paymentmethod/class.php',
        data: 'page=' + page + '&form=loadmdlappselllistPagination',
        success: function(data) {
            var arr = data.split("|");
            if (arr[1] != 1) {
                $("#uppendingsellerlistPageList").html(arr[0]);
            } else {
                $("#uppendingsellerlistPageList").html("");
            }
        }
    })
}

function mdlappselllistPageFunc(page, pagenums) {
    $(".pgnummdlappselllistPageFunc").removeClass("active");
    $("#pgmdlappselllistPageFunc" + pagenums).addClass("active");
    $("#txtpendingsellerlistPageCount").val(page);
    displaymdlappsellerlist();
}
// Seller List Modal END

// OTHERS
function viewvalidIDphoto(payimg) {
    $("#mdlviewpaymentphoto").modal('show');
    $('#viewpaymentimg').attr("src", payimg);
}

function modalopencustprof(ID) {
    $("#mdlopencustprof").modal('show');
    $.ajax({
        type: 'POST',
        url: 'paymentmethod/class.php',
        data: 'ID=' + ID + '&form=fncdsplycustinfo',
        success: function(data) {
            var arr = data.split("|");
            $("#txtfullname").text(arr[0]);
            $("#txtcontactnum").text(arr[1]);
            $("#txtemail").text(arr[2]);
            $("#txtaddress").text(arr[3]);

            $("#imgvalidID").attr('src', arr[4]);
            $("#imgvalidID").attr("onclick", "viewvalidIDphoto('" + arr[4] + "')");

            $("#txtLat").val(arr[5]);
            $("#txtLong").val(arr[6]);

        },
        complete: function() {
            geocodesearching();
        }
    })
}

function geocodesearching() {
    var geocoder = new google.maps.Geocoder();
    if ($("#txtaddress").val() == "" || $("#txtaddress").val() == null) {
        var address = "";
    } else {
        var address = $("#txtaddress").val();
    }
    var lat = document.getElementById("txtLat").value;
    var lng = document.getElementById("txtLong").value;
    geocoder.geocode({
        'address': address
    }, function(results, status) {
        if (status == google.maps.GeocoderStatus.OK) {
            var latitude = results[0].geometry.location.lat();
            var longitude = results[0].geometry.location.lng();
            initialize(latitude, longitude);
            $("#txtLat").val(latitude);
            $("#txtLong").val(longitude);
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
        $("#txtLat").val(evt.latLng.lat());
        $("#txtLong").val(evt.latLng.lng());
    });

    google.maps.event.addListener(marker, 'drag', function(evt) {
        console.log("marker is being dragged");
    });
}

function getseller_id(seller_id, sellername) {
    $("#mdllistofseller").modal('hide');
    $("#txtseller_id").val(seller_id);
    $("#txtaddsellername").val(sellername);
}

function clearfieldvalues() {
    $(".clearinfo").val("");
    $(".clearinfo").css('border', '');
}
// OTHERS END

// EDIT PRODUCT
function modaleditproduct(paymeth_id) {
    $("#mdladdproduct").modal('show');
    $('#txtopenproductheader').text("Edit Payment Method");

    $(".btnprodsave").css("display", "none");
    $(".btnprodupdate").css("display", "block");

    $.ajax({
        type: 'POST',
        url: 'paymentmethod/class.php',
        data: 'paymeth_id=' + paymeth_id + '&form=modaleditproduct',
        success: function(data) {
            var show = data.split("|");
            $('#txtprodID').val(paymeth_id);
            $('#txtpayimageID').val(paymeth_id);

            $('#hiddenwala').val(show[0]);
            $('#appendprodimage').html(show[1]);
            $('#appendprodimage2').html(show[2]);
            $('.dropify').dropify();


            $('#txtseller_id').val(show[3]);
            $('#txtaddsellername').val(show[4]);

            $('#txtaddbankholdername').val(show[5]);
            $('#txtaddbanknumber').val(show[6]);

            $('#hiddenwala2').val(show[7]);

        }
    });
}

function editproduct() {
    var paymeth_id = $('#txtprodID').val();

    var textseller_id = $("#txtseller_id").val();
    var textaddbankholdername = $("#txtaddbankholdername").val();
    var textaddbanknumber = $("#txtaddbanknumber").val();


    if (reqField1('reqresinfo') == 1) {
        if (reqField2('reqresinfofofo') == 1) {
            $(".preloader").show().css('background', 'rgba(255,255,255,0.5)');
            $.ajax({
                type: 'POST',
                url: 'paymentmethod/class.php',
                data: 'textseller_id=' + textseller_id + '&textaddbankholdername=' + textaddbankholdername +
                    '&textaddbanknumber=' + textaddbanknumber + '&form=editproduct',
                success: function(data) {
                    $("#mdladdproduct").modal('hide');
                    setTimeout(function() {
                        $(".preloader").hide().css('background', '');

                        uploadprodpicture(paymeth_id);

                        Swal.fire(
                            'Success!',
                            'Payment Method successfully updated.',
                            'success'
                        )
                    }, 2000);

                    setTimeout(function() {
                        window.location.reload();
                    }, 3000);
                }
            });
        } else {
            Swal.fire(
                'ALERT',
                'Please review your entries. Ensure all required fields are filled out',
                'warning'
            )
        }
    } else {
        Swal.fire(
            'ALERT',
            'Please review your entries. Ensure all required fields are filled out',
            'warning'
        )
    }
}
// EDIT PRODUCT END

// DELETE PRODUCT
function deleteproduct(paymeth_id) {
    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, Delete it!'
    }).then((result) => {
        if (result.value) {
            $(".preloader").show().css('background', 'rgba(255,255,255,0.5)');
            $.ajax({
                type: 'POST',
                url: 'paymentmethod/class.php',
                data: 'paymeth_id=' + paymeth_id + '&form=deleteproduct',
                success: function(data) {
                    setTimeout(function() {
                        $(".preloader").hide().css('background', '');
                        Swal.fire(
                            'Success!',
                            'Payment Method successfully deleted.',
                            'success'
                        )
                        paymethodlist();
                    }, 1000);
                }
            })
        }
    })
}
// DELETE PRODUCT END
</script>