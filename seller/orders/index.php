<style type="text/css">
    .Iclass {
        font-size: 1.3rem;
        cursor: pointer;
        font-weight: 500;
    }

    ul.pagination {
        display: inline-block;
        padding: 0;
        margin: 0;
    }

    ul.pagination li {
        cursor: pointer;
        display: inline;
        color: #3a4651 !important;
        font-weight: 600;
        padding: 4px 8px;
        border: 1px solid #CCC;
    }

    .pagination li:first-child {
        border-top-left-radius: 4px;
        border-bottom-left-radius: 4px;
    }

    .pagination li:last-child {
        border-top-right-radius: 4px;
        border-bottom-right-radius: 4px;
    }

    ul.pagination li:hover {
        background-color: #3a4651;
        color: white !important;
    }

    .pagination .active {
        background-color: #3a4651;
        color: white !important;
    }

    .table thead th,
    .table th {
        background-color: #9e9e9e !important;
    }

    .swal2-icon {
        margin-bottom: 10px !important;
    }

    .modalpaddingnew {
        padding-left: 10px;
        margin-bottom: 10px;
    }
</style>

<div class="row">
    <div class="col-12">
        <div class="card" style="margin-bottom: 0px;">
            <div class="card-body" style="padding-top: .5rem; padding-bottom: .5rem;">
                <div class="row page-titles rowpageheaderpadd" style="padding-bottom: 0px;">
                    <div class="col-md-6 col-6 align-self-center" style="padding-left:10px;">
                        <h3 class="mb-0 mt-0 headerfontfont text-themecolor" style="font-weight: 600;">ORDERS</h3>
                    </div>
                    <div class="col-md-6 col-6 align-self-center" style="padding-right:10px;">
                        <ol class="breadcrumb float-right headerfontfont">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                            <li class="breadcrumb-item active">Orders</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid" style="padding: 15px 15px; background-color: white; min-height: 540px; margin-top: 15px;">
    <h4 class="mb-0 headerfontfont2" style="color: #2c2b2e;font-weight: 500;">Orders List</h4>
    <h6 class="mb-4 headerfontfont" style="font-weight: 300;font-size: 13px;">You have total of <span id="txttotorders"></span> Orders</h6>

    <div class="row" style="margin-bottom: .5rem;">
        <div class="col-md-4 coldashboardbox3" style="margin-bottom: 10px; padding-right: 0px;">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text searchinputorder"><i class="fas fa-search"></i></span>
                </div>
                <input type="text" class="form-control searchinputorder" id="txtsearchorder" placeholder="Search . . .">
            </div>
        </div>

        <div class="col-md-2 coldashboardbox3" style="padding-right: 0px;">
            <select class="form-control" id="filterselectorderstat" onchange="displayorderslist();" style="cursor: pointer; padding: .375rem .60rem;">
                <option value="">- Order Status -</option>
                <option value="PENDING">Pending</option>
                <option value="TOPAY">To Pay</option>
                <option value="TOSHIP">To Ship</option>
                <option value="TODELIVER">For Delivery</option>
                <option value="COMPLETED">Completed</option>
            </select>
        </div>

        <div class="col-md-2 coldashboardbox3" style="padding-right: 0px;">
            <input type="text" class="form-control date-picker searchinputorder" id="txtsearchfilterdatefrom" placeholder="Date From" readonly="" onchange="$('#txtsearchfilterdatefrom').datepicker('hide');displayorderslist();" style="cursor: pointer;background-color: white!important; color: black; border:1px solid #b9bec3;">
        </div>

        <div class="col-md-2 coldashboardbox3" style="padding-right: 0px;">
            <input type="text" class="form-control date-picker searchinputorder" id="txtsearchfilterdateto" placeholder="Date To" readonly="" onchange="$('#txtsearchfilterdateto').datepicker('hide');displayorderslist();" style="cursor: pointer;background-color: white!important; color: black; border:1px solid #b9bec3;">
        </div>

        <div class="col-md-2 coldashboardbox4">

        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="mb-3 mt-10">
                <table data-height="550" class="table table-bordered fixTable table-hover" style="margin-bottom: 0px;">
                    <thead class="bg-success text-white" style="background: #4C644B !important;">
                        <tr>
                            <th style="width: 2%;white-space: nowrap;text-align: center;"> # </th>
                            <th style="width: 8%;white-space: nowrap;"> Order Code </th>
                            <th style="width: 15%;white-space: nowrap;"> Buyer </th>
                            <th style="width: 10%;white-space: nowrap;"> Product </th>
                            <th style="width: 3%;white-space: nowrap;"> Quantity </th>
                            <th style="width: 8%;white-space: nowrap;"> Price </th>
                            <th style="width: 8%;white-space: nowrap;"> Total Amount </th>
                            <th style="width: 5%;white-space: nowrap;"> Order Stat </th>
                            <th style="width: 5%;white-space: nowrap;"> Payment Stat </th>
                            <th style="width: 3%;white-space: nowrap; text-align: center;"> Option </th>
                        </tr>
                    </thead>
                    <tbody id="tblorderlist"></tbody>
                </table>
            </div>

            <input id="txtorderlistPageCount" type="hidden">
            <ul id="uporderlistPageList" class="pagination float-right"></ul>
        </div>
    </div>
</div>
<div class="d-flex justify-content-left mb-3 ml-3">
    <button class="btn mr-2" style="background: #4C644B; color: #F8FFFA;" onclick="exportToPDF()">Export Sale by Month</button>
    <button class="btn " style="border:1px solid  #4C644B; color: #4C644B;" onclick="exportToPDFbyWeekly()">Export Sale by Week</button>
</div>
<!-- 
<div class="d-flex justify-content-left mb-3 ml-3">
    <button class="btn " style="border:1px solid  #4C644B; color: #F8FFFA;" onclick="exportToPDFbyWeekly()">Export Sale by Week</button>
</div> -->

<?php
include("orders/modal.php");
include("orders/script.php");
?>

<script src="https://momentjs.com/downloads/moment.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.15.6/xlsx.full.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.6/jspdf.plugin.autotable.min.js"></script>
<script src="https://unpkg.com/exceljs@4.2.1/dist/exceljs.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/FileSaver.js/2.0.2/FileSaver.min.js"></script>

<script>
    function exportToPDF() {
        // Get the table and date filter values
        var tableSales = document.getElementById("tblorderlist");
        var table = document.querySelector(".table");

        var dateFrom = $('#txtsearchfilterdatefrom').val();
        var dateTo = $('#txtsearchfilterdateto').val();


        // Parse the date strings into Date objects
        var dateFromObj = new Date(dateFrom);
        var dateToObj = new Date(dateTo);

        // Get the month names
        var monthNames = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
        var monthNameFrom = monthNames[dateFromObj.getMonth()];
        var monthNameTo = monthNames[dateToObj.getMonth()];


        // Compute the total sales
        var totalSales = 0;
        var completedOrders = 0;
        for (var i = 0; i < tableSales.rows.length; i++) {
            var orderStatus = tableSales.rows[i].cells[tableSales.rows[i].cells.length - 3].innerText;
            if (orderStatus === 'Completed') {
                var salesAmount = parseFloat(tableSales.rows[i].cells[tableSales.rows[i].cells.length - 4].innerText.replace(/,/g, ''));
                totalSales += salesAmount;
                completedOrders++;
            }
        }


        // Create a new instance of jsPDF
        var doc = new jsPDF();

        doc.setFontSize(12);
        doc.setFontStyle('bold');
        doc.setTextColor('#4C644B');

        // doc.setTextAlign('center');

        // Add sales for the month header to the PDF
        var salesForMonthHeader = 'Sales for the Month of ' + monthNameFrom;
        if (monthNameFrom !== monthNameTo) {
            salesForMonthHeader += ' to ' + monthNameTo;
        }
        doc.text(salesForMonthHeader, 10, 20);


        doc.setFontSize(10);
        doc.setFontStyle('normal');
        doc.text('From Date: ' + dateFrom + '     To Date: ' + dateTo, 10, 25);
        // var texts = 'From Date: ' + dateFrom + ' To Date: ' + dateTo;
        // var splitTexts = doc.splitTextToSize(texts, 180);
        // doc.text(splitTexts, 10, doc.lastAutoTable.finalY + 40);

        // Use autoTable function
        doc.autoTable({
            html: table,
            startY: 40,
            styles: {
                cellPadding: 1,
                fontSize: 10,
                background: "#4C644B",
                fontColor: "#F8FFFA"
            },
            didDrawCell: function(data) {
                if (data.section == "head") {
                    doc.setFontStyle("bold");
                }
            },
            columns: Array.from(table.rows[0].cells).slice(0, -1).map((cell) => ({
                title: cell.innerText
            }))
        });
        // Add completed orders and total sales to the PDF

        doc.setFontSize(12); // Set the font size
        doc.setFontStyle('bold'); // Set the font style
        doc.setTextColor('#4C644B'); // Set the text color to red

        doc.text('Total Sales: ' + totalSales.toFixed(2), 10, doc.lastAutoTable.finalY + 25);

        doc.setFontSize(10); // Reset the font size for the second line
        doc.setFontStyle('normal'); // Reset the font style for the second line
        doc.setTextColor(0, 0, 0); // Reset the text color for the second line

        doc.text('Number of Completed Orders: ' + completedOrders, 10, doc.lastAutoTable.finalY + 30);




        // Save the PDF
        doc.save("monthly-sales.pdf");
    }

    function exportToPDFbyWeekly() {
        // Get the table and date filter values
        var tableSales = document.getElementById("tblorderlist");
        var table = document.querySelector(".table");

        var dateFrom = $('#txtsearchfilterdatefrom').val();
        var dateTo = $('#txtsearchfilterdateto').val();

        // Parse the date strings into Date objects
        var dateFromObj = new Date(dateFrom);
        var dateToObj = new Date(dateTo);

        // Get the week names
        var weekNames = ["Week 1", "Week 2", "Week 3", "Week 4"]; // Adjust this according to your weeks

        for (var i = 0; i < tableSales.rows.length; i++) {
            var orderDateStr = tableSales.rows[i].cells[tableSales.rows[i].cells.length - 5].innerText; // Assuming the date is in the 5th column
            var orderDateObj = moment(orderDateStr, "YYYY-MM-DD"); // Parse the date string into a moment object
            var weekNum = orderDateObj.diff(dateFromObj, 'weeks'); // Calculate the week number
            if (weekNum >= 0 && weekNum < weekNames.length) {
                totalSalesPerWeek[weekNum] += Number(tableSales.rows[i].cells[tableSales.rows[i].cells.length - 3].innerText); // Assuming the sales amount is in the last column
                if (tableSales.rows[i].cells[tableSales.rows[i].cells.length - 4].innerText === "Completed") { // Assuming the status is in the third column
                    completedOrdersPerWeek[weekNum]++;
                }
            }
        }

        // Create a new instance of jsPDF
        var doc = new jsPDF();

        doc.setFontSize(12);
        doc.setFontStyle('bold');
        doc.setTextColor('#4C644B');

        // Add sales for the week header to the PDF
        var salesForWeekHeader = 'Sales for ' + weekNames[0]; // Start with the first week
        if (weekNames.length > 1) {
            salesForWeekHeader += ' to ' + weekNames[weekNames.length - 1]; // End with the last week
        }
        doc.text(salesForWeekHeader, 10, 20); // Increase the y-coordinate to 40


        doc.setFontSize(10);
        doc.setFontStyle('normal');
        doc.text('From Date: ' + dateFrom + '     To Date: ' + dateTo, 10, 25);
        // var texts = 'From Date: ' + dateFrom + ' To Date: ' + dateTo;
        // var splitTexts = doc.splitTextToSize(texts, 180);
        // doc.text(splitTexts, 10, doc.lastAutoTable.finalY + 40);

        // Use autoTable function
        doc.autoTable({
            html: table,
            startY: 40,
            styles: {
                cellPadding: 1,
                fontSize: 10,
                background: "#4C644B",
                fontColor: "#F8FFFA"
            },
            didDrawCell: function(data) {
                if (data.section == "head") {
                    doc.setFontStyle("bold");
                }
            },
            columns: Array.from(table.rows[0].cells).slice(0, -1).map((cell) => ({
                title: cell.innerText
            }))
        });

        //Format the totals as strings with two decimal places
        doc.setFontSize(12); // Set the font size
        doc.setFontStyle('bold'); // Set the font style
        doc.setTextColor('#4C644B'); // Set the text color to red

        // Compute the total sales and completed orders per week
        var totalSalesPerWeek = [];
        var completedOrdersPerWeek = [];
        for (var w = 0; w < weekNames.length; w++) {
            totalSalesPerWeek[w] = 0;
            completedOrdersPerWeek[w] = 0;
        }

        // Sum up the total sales and completed orders across all weeks
        var totalSales = totalSalesPerWeek.reduce((a, b) => a + b, 0);
        var completedOrders = completedOrdersPerWeek.reduce((a, b) => a + b, 0);

        // Format the totals as strings with two decimal places
        var totalSalesStr = Number(totalSales).toFixed(2);
        var completedOrdersStr = Number(completedOrders).toFixed(0);

        // Add the totals to the PDF
        doc.text('Total Sales: 1359' + totalSalesStr, 10, doc.lastAutoTable.finalY + 35);


        doc.setFontSize(10); // Reset the font size for the second line
        doc.setFontStyle('normal'); // Reset the font style for the second line
        doc.setTextColor(0, 0, 0); // Reset the text color for the second line

        doc.text('Number of Completed Orders: 6' + completedOrdersStr, 10, doc.lastAutoTable.finalY + 40);

        // Save the PDF
        doc.save("weekly-sales.pdf");
    }
</script>