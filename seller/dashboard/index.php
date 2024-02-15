<link rel="stylesheet" type="text/css" href="dashboard/dashboard.css" />


<!-- <div class="row">
    <div class="col-12">
        <div class="card" style="margin-bottom: 15px;">
            <div class="card-body paddingbreadcard" style="padding-top: 25px; padding-bottom: 25px;">
                <div class="row page-titles" style="padding-bottom: 0px;">
                    <div class="col-md-6 align-self-center">
                        <h3 class="mb-0 mt-0 textdashboardbread3"><span style="text-transform: uppercase;">Welcome, </span> <span class="text-themecolor textdashboardbread3" style="font-weight: 500; font-size: 22px;" id="txtuserFname"></span></h3>
                    </div>
                    <div class="col-md-6 align-self-center">
                        <h4 class="mb-0 mt-0 float-right textdashboardbread textdashboardbread2" style="font-weight: 400; color: #5f5f5f;"><span class="textdashboardbread" id="txtdatex"></span></h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> -->

<div class="row" style="margin-top: -20px; margin-bottom: 50px;">

    <img src="image/1.svg" alt="banner" style="width:100%; height:100%; background-size: cover; background-position: center;">

</div>

<div class="row">
    <div class="col-md-12">
        <div class="row" style="justify-content: center;">
            <div class="col-xs-12 col-md-4 col-lg-3 col-xlg-3 coldashboardbox2">
                <a href="index.php?url=products">
                    <div class="card text-white" style="margin-bottom: 15px;">
                        <div class="box bg-info">
                            <div class="box bg-info">
                                <h1 class="text-white textdashboardboxes" id="txtTotproduct" style="color: #4a8670;">0
                                </h1>
                                <h6 class="font-light text-white textdashboardboxes2" style="color: #4a8670;">Products
                                </h6>
                                <div class="dboxicon">
                                    <i class="fas fa-boxes"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-xs-12 col-md-4 col-lg-3 col-xlg-3 coldashboardbox">
                <a href="index.php?url=orders">
                    <div class="card text-white" style="margin-bottom: 15px;">
                        <div class="box bg-info">
                            <div class="box bg-info">
                                <h1 class="text-white textdashboardboxes" id="txtTotorders" style="color: #4a8670;">0
                                </h1>
                                <h6 class="font-light text-white textdashboardboxes2" style="color: #4a8670;">Orders
                                </h6>
                                <div class="dboxicon">
                                    <i class="fas fa-shopping-cart"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-xs-12 col-md-4 col-lg-3 col-xlg-3 coldashboardbox">
                <a href="index.php?url=reservation">
                    <div class="card text-white" style="margin-bottom: 15px;">
                        <div class="box bg-info">
                            <div class="box bg-info">

                                <!-- pa edit ako nito mhieee, yung number of reservation (Ok na mhie HAHAHA) -->
                                <h1 class=" text-white textdashboardboxes" id="txtToreservation" style="color: #4a8670;">0
                                </h1>
                                <h6 class="font-light text-white textdashboardboxes2" style="color: #4a8670;">
                                    Reservation</h6>
                                <div class="dboxicon">
                                    <i class="fas fa-address-book"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-xs-12 col-md-4 col-lg-3 col-xlg-3 coldashboardbox">
                <a href="index.php?url=harvestingcal">
                    <div class="card text-white" style="margin-bottom: 15px;">
                        <div class="box bg-info">
                            <div class="box bg-info">
                                <h1 class=" text-white textdashboardboxes" id="txtTotcustomer" style="color: #4a8670; font-size: 30px !important;">View
                                </h1>
                                <h6 class="font-light text-white textdashboardboxes2" style="color: #4a8670;">Harvesting
                                    Calendar</h6>
                                <div class="dboxicon">
                                    <i class="far fa-calendar-alt"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
    <style>
        .yearly,
        .weekly {
            display: none;
        }
    </style>
    <div class="col-md-12">
        <div class="card" style="min-height: 450px;margin-bottom: 0px;">
            <div class="card-body report">
                <select id="selectchart" class="card btn border" style="border: 1px solid #ededed !important;width: 185px;margin-left: auto;text-align: left;margin-bottom: -35px;margin-right: 30px;">
                    <option>Select</option>
                    <option value="weekly">Weekly</option>
                    <option value="monthly">Monthly</option>
                    <option value="yearly">Yearly</option>
                </select>
                <div class="monthly">
                    <h3 style="color: #4C644B; margin-left:10px;">MONTHLY ORDERS</h3>
                    <canvas id="chart1" height="100"></canvas>
                </div>
                <div class="yearly">
                    <h3 style="color: #4C644B; margin-left:10px;">YEARLY ORDERS</h3>
                    <canvas id="chart2" height="100"></canvas>
                </div>
                <div class="weekly">
                    <h3 style="color: #4C644B; margin-left:10px;">WEEKLY ORDERS</h3>
                    <canvas id="chart3" height="100"></canvas>
                </div>
                <div class="d-flex justify-content-end mb-3">
                    <button class="btn btn-primary mr-2" onclick="exportToImage()" id="export-image"><i class="fas fa-file"></i> Export Now</button>
                </div>
            </div>

        </div>
    </div>
</div>

<!-- Add these script tags for html2canvas and jsPDF libraries -->
<script src="https://html2canvas.hertzen.com/dist/html2canvas.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>

<script src="../admin/assets/plugins/Chart.js/Chart.min.js"></script>
<?php
include("dashboard/modal.php");
include("dashboard/dashboardscript.php");
?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.6/jspdf.plugin.autotable.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/FileSaver.js/2.0.2/FileSaver.min.js"></script>

<script>
    var tableSales = document.getElementById("tblmdlitemoutlist");

    $('#selectchart').change(function() {
        if ($(this).val() == 'weekly') {
            $('.weekly').css('display', 'block')
            $('.monthly').css('display', 'none')
            $('.yearly').css('display', 'none')
        } else if ($(this).val() == 'monthly') {
            $('.monthly').css('display', 'block')
            $('.weekly').css('display', 'none')
            $('.yearly').css('display', 'none')
        } else if ($(this).val() == 'yearly') {
            $('.yearly').css('display', 'block')
            $('.weekly').css('display', 'none')
            $('.monthly').css('display', 'none')
        }
    })

    function exportToImage() {
        var chartElement = document.getElementById('chart1'); // Replace 'chart1' with the ID of your chart canvas
        html2canvas(chartElement, {
            useCORS: true
        }).then(function(canvas) {
            var imgData = canvas.toDataURL('image/png');
            var link = document.createElement('a');
            link.href = imgData;
            link.download = 'reports.png'; // Ensure the file extension matches the MIME type
            link.click();
        });
    }



    // var totalSales = 0;
    // var completedOrders = 0;
    // for (var i = 0; i < tableSales.rows.length; i++) {
    //     var orderStatus = tableSales.rows[i].cells[tableSales.rows[i].cells.length - 3].innerText;
    //     if (orderStatus === 'Completed') {
    //         var salesAmount = parseFloat(tableSales.rows[i].cells[tableSales.rows[i].cells.length - 4].innerText.replace(/,/g, ''));
    //         totalSales += salesAmount;
    //         completedOrders++;
    //     }
    // }

    // window.exportToPdf = function() {
    //     var doc = new jsPDF();
    //     var chartElementId = '';

    //     // Get the selected option from the dropdown
    //     var selectedOption = $('#selectchart').val();

    //     // Determine the ID of the chart canvas based on the selected option
    //     switch (selectedOption) {
    //         case 'weekly':
    //             chartElementId = 'chart3';
    //             break;
    //         case 'monthly':
    //             chartElementId = 'chart1';
    //             break;
    //         case 'yearly':
    //             chartElementId = 'chart2';
    //             break;
    //     }

    //     // Get the chart canvas element
    //     var chartElement = document.getElementById(chartElementId);

    //     // Adjust the scale of the canvas to fit the width
    //     var originalWidth = chartElement.offsetWidth;
    //     var originalHeight = chartElement.offsetHeight;
    //     var scale = 1;
    //     while ((originalWidth * scale / 2) > 200) { // Set the maximum width of the image in the PDF to 500
    //         scale -= 0.1;
    //     }

    //     // Convert the chart canvas to an image and add it to the PDF
    //     html2canvas(chartElement).then(function(canvas) {
    //         var imgData = canvas.toDataURL('image/png');
    //         doc.addImage(imgData, 'PNG', 10, 20);
    //         doc.save("chart_image.pdf");
    //     });
    // }
</script>