<link rel="stylesheet" type="text/css" href="dashboard/dashboard.css" />

<div class="row" style="margin-top: -20px; margin-bottom: 50px;">

    <img src="../seller/image/2.svg" alt="banner" style="width:100%; height:100%; background-size: cover; background-position: center;">

</div>

<div class="row">
    <div class="col-md-12">
        <div class="row" style="justify-content: center;">
            <div class="col-xs-12 col-md-4 col-lg-3 col-xlg-3 coldashboardbox">
                <a href="index.php?url=seller">
                    <div class="card" style="margin-bottom: 15px;">
                        <div class="box bg-info">
                            <div class="box bg-info">
                                <h1 class="textdashboardboxes" id="txtTotsellers" style="color: #4C644B;">0</h1>
                                <h6 class="font-light textdashboardboxes2" style="color: #4C644B ;">Sellers</h6>
                                <div class="dboxicon">
                                    <i class="fas fa-users"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-xs-12 col-md-4 col-lg-3 col-xlg-3 coldashboardbox2">
                <a href="index.php?url=customer">
                    <div class="card" style="margin-bottom: 15px;">
                        <div class="box bg-info">
                            <div class="box bg-info">
                                <h1 class="textdashboardboxes" id="txtTotcustomer" style="color: #4C644B ;">0</h1>
                                <h6 class="font-light textdashboardboxes2" style="color: #4C644B ;">Buyers</h6>
                                <div class="dboxicon">
                                    <i class="fas fa-user-friends"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-xs-12 col-md-4 col-lg-3 col-xlg-3 coldashboardbox">
                <a href="index.php?url=products">
                    <div class="card" style="margin-bottom: 15px;">
                        <div class="box bg-info">
                            <div class="box bg-info">
                                <h1 class="textdashboardboxes" id="txtTotproduct" style="color:#4C644B ;">0</h1>
                                <h6 class="font-light textdashboardboxes2" style="color:#4C644B ;">Products</h6>
                                <div class="dboxicon">
                                    <i class="fas fa-boxes"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-xs-12 col-md-4 col-lg-3 col-xlg-3 coldashboardbox2">
                <a href="index.php?url=orders">
                    <div class="card" style="margin-bottom: 15px;">
                        <div class="box bg-info">
                            <div class="box bg-info">
                                <h1 class="textdashboardboxes" id="txtTotorders" style="color:#4C644B ;">0</h1>
                                <h6 class="font-light textdashboardboxes2" style="color:#4C644B ;">Orders</h6>
                                <div class="dboxicon">
                                    <i class="fas fa-shopping-cart"></i>
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
            <div class="card-body" style="margin-top: 20px;background-color: #E2EEE2;border-radius: 16px;">
                <select id="selectchart" class="card btn border" style="border: 1px solid #ededed !important; width: 185px; margin-left: auto; text-align: left; margin-bottom: -35px;margin-right: 30px;">
                    <option>Select</option>
                    <option value="weekly">Weekly</option>
                    <option value="monthly">Monthly</option>
                    <option value="yearly">Yearly</option>
                </select>
                <div class="monthly">
                    <h3 style="color: #4C644B; margin-left: 10px;">MONTHLY ORDERS</h3>
                    <canvas id="chart1" height="100"></canvas>
                </div>
                <div class="yearly">
                    <h3 style="color: #4C644B; margin-left: 10px;">YEARLY ORDERS</h3>
                    <canvas id="chart2" height="100"></canvas>
                </div>
                <div class="weekly">
                    <h3 style="color: #4C644B; margin-left: 10px;">WEEKLY ORDERS</h3>
                    <canvas id="chart3" height="100"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="assets/plugins/Chart.js/Chart.min.js"></script>
<?php
include("dashboard/modal.php");
include("dashboard/dashboardscript.php");
?>
<script>
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
</script>