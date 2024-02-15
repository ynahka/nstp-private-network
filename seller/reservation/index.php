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
                        <h3 class="mb-0 mt-0 headerfontfont text-themecolor" style="font-weight: 600;">RESERVATIONS</h3>
                    </div>
                    <div class="col-md-6 col-6 align-self-center" style="padding-right:10px;">
                        <ol class="breadcrumb float-right headerfontfont">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                            <li class="breadcrumb-item active">Reservation</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid" style="padding: 15px 15px; background-color: white; min-height: 540px; margin-top: 15px;">
    <h4 class="mb-0 headerfontfont2" style="color: #2c2b2e;font-weight: 500;">Reservation List</h4>
    <h6 class="mb-4 headerfontfont" style="font-weight: 300;font-size: 13px;">You have total of <span
            id="txttotorders"></span> Reservation</h6>

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
            <select class="form-control" id="filterselectorderstat" onchange="displayorderslist();"
                style="cursor: pointer; padding: .375rem .60rem;">
                <option value="">- Reservation Status -</option>
                <option value="PENDING">Pending</option>
                <option value="TOPAY">To Pay</option>
                <option value="TOSHIP">To Ship</option>
                <option value="TODELIVER">For Delivery</option>
                <option value="COMPLETED">Completed</option>
            </select>
        </div>

        <div class="col-md-2 coldashboardbox3" style="padding-right: 0px;">
            <input type="text" class="form-control date-picker searchinputorder" id="txtsearchfilterdatefrom"
                placeholder="Date From" readonly=""
                onchange="$('#txtsearchfilterdatefrom').datepicker('hide');displayorderslist();"
                style="cursor: pointer;background-color: white!important; color: black; border:1px solid #b9bec3;">
        </div>

        <div class="col-md-2 coldashboardbox3" style="padding-right: 0px;">
            <input type="text" class="form-control date-picker searchinputorder" id="txtsearchfilterdateto"
                placeholder="Date To" readonly=""
                onchange="$('#txtsearchfilterdateto').datepicker('hide');displayorderslist();"
                style="cursor: pointer;background-color: white!important; color: black; border:1px solid #b9bec3;">
        </div>

        <div class="col-md-2 coldashboardbox4">

        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="mb-3">
                <table data-height="350" class="table table-bordered fixTable table-hover" style="margin-bottom: 0px;">
                    <thead class="bg-success text-white">
                        <tr>
                            <th style="width: 2%;white-space: nowrap;text-align: center;"> # </th>
                            <th style="width: 8%;white-space: nowrap;"> Reservation Code </th>
                            <th style="width: 15%;white-space: nowrap;"> Customer </th>
                            <th style="width: 15%;white-space: nowrap;"> Seller </th>
                            <th style="width: 15%;white-space: nowrap;"> Product </th>
                            <th style="width: 8%;white-space: nowrap;"> Price </th>
                            <th style="width: 8%;white-space: nowrap;"> Total Amount </th>
                            <th style="width: 5%;white-space: nowrap;"> Reservation Stat </th>
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
<div class="d-flex justify-content-end mb-3">
    <button class="btn btn-primary mr-2" onclick="exportToExcel()">Export to Excel</button>
    <button class="btn btn-danger" onclick="exportToPDF()">Export to PDF</button>
</div>

<?php
include("reservation/modal.php");
include("reservation/script.php");
?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.15.6/xlsx.full.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.6/jspdf.plugin.autotable.min.js"></script>
<script src="https://unpkg.com/exceljs@4.2.1/dist/exceljs.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/FileSaver.js/2.0.2/FileSaver.min.js"></script>

<script>
async function exportToExcel() {
    // Get the table
    var table = document.querySelector(".table");

    // Create a new workbook and worksheet
    var workbook = new ExcelJS.Workbook();
    var worksheet = workbook.addWorksheet('My Sheet');

    // Add data to the worksheet
    var headers = Array.from(table.rows[0].cells).map((header) => header.innerText);
    // Remove the last column
    headers.pop();
    var rows = Array.from(table.rows).slice(1).map((row) => {
        return headers.reduce((obj, header, i) => {
            let cellValue = row.cells[i].innerText;
            if (header === 'Price' || header === 'Total Amount') {
                cellValue = Number(parseFloat(cellValue.replace(/,/g, '')));
            }
            obj[header] = cellValue;
            return obj;
        }, {});
    });

    worksheet.columns = headers.map((header) => ({
        header: header,
        key: header
    }));
    worksheet.addRows(rows);

    // Calculate the total
    var totalAmount = rows.reduce((sum, row) => sum + row['Total Amount'], 0);

    // Add the total to the worksheet
    var totalRowIndex = worksheet.rowCount + 1; // +1 because ExcelJS is 1-indexed
    var totalAmountColumnIndex = headers.indexOf('Total Amount') + 1; // +1 because ExcelJS is 1-indexed

    // Ensure 'Total Amount' is in the headers
    if (totalAmountColumnIndex > 0) {
        // Ensure the row exists before adding the cell
        var totalRow = worksheet.getRow(totalRowIndex);
        if (!totalRow) {
            totalRow = worksheet.addRow({});
        }

        // Add cells for each header
        headers.forEach((header, columnIndex) => {
            var cell = totalRow.getCell(columnIndex + 1); // +1 because ExcelJS is 1-indexed
            if (header === 'Total Amount') {
                cell.value = totalAmount;
                cell.numFmt = '#,##0.00'; // Format as number
            } else {
                // You may want to customize this part based on the data type of each column
                cell.value = ''; // You can set a default value or leave it empty
            }
        });
    } else {
        console.error("'Total Amount' not found in headers");
    }

    // Style the header
    worksheet.getRow(1).eachCell((cell) => {
        cell.fill = {
            type: 'pattern',
            pattern: 'solid',
            fgColor: {
                argb: 'AFE1AF'
            }
        };
    });

    // Format 'Price' and 'Total Amount' cells as numbers
    worksheet.columns.forEach((column) => {
        if (column.key === 'Price' || column.key === 'Total Amount') {
            column.eachCell((cell) => {
                cell.numFmt = '#,##0.00';
                cell.type = ExcelJS.ValueType.Number; // Set data type to Number
                if (typeof cell.value === 'string') {
                    cell.value = parseFloat(cell.value.replace(/,/g,
                        '')); // Convert string to number
                }
            });
        }
    });


    // Auto adjust the width of the cells
    autoWidth(worksheet);

    // Write the workbook to a file
    await workbook.xlsx.writeBuffer().then((buffer) => {
        saveAs(new Blob([buffer], {
            type: 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'
        }), 'reports.xlsx');
    });
}

// Function to auto adjust the width of the cells
function autoWidth(worksheet, minimalWidth = 10) {
    worksheet.columns.forEach((column) => {
        let maxColumnLength = 0;
        column.eachCell({
            includeEmpty: true
        }, (cell) => {
            maxColumnLength = Math.max(
                maxColumnLength,
                minimalWidth,
                cell.value ? cell.value.toString().length : 0
            );
        });
        column.width = maxColumnLength + 2;
    });
}


function exportToPDF() {
    // Get the table
    var table = document.querySelector(".table");

    // Create a new instance of jsPDF
    var doc = new jsPDF();

    // Use autoTable function
    doc.autoTable({
        html: table,
        startY: 10,
        styles: {
            cellPadding: 0.5,
            fontSize: 10
        },
        didDrawCell: function(data) {
            if (data.section === "head") {
                doc.setFontStyle("bold");
            }
        },
        columns: Array.from(table.rows[0].cells).slice(0, -1).map((cell) => ({
            title: cell.innerText
        }))
    });

    // Save the PDF
    doc.save("reports.pdf");
}
</script>