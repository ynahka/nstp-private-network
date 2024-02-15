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
        padding-left: 5px;
        margin-bottom: 10px;
    }
</style>

<div class="row">
    <div class="col-12">
        <div class="card" style="margin-bottom: 0px;">
            <div class="card-body" style="padding-top: .5rem; padding-bottom: .5rem;">
                <div class="row page-titles rowpageheaderpadd" style="padding-bottom: 0px;">
                    <div class="col-md-6 col-6 align-self-center" style="padding-left:10px;">
                        <h3 class="mb-0 mt-0 headerfontfont text-themecolor" style="font-weight: 600;">PAYMENT METHODS
                        </h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid" style="padding: 15px 15px; background-color: white; min-height: 540px; margin-top: 15px;">
    <h4 class="mb-0 headerfontfont2" style="color: #2c2b2e;font-weight: 500;">Payment List</h4>
    <h6 class="mb-4 headerfontfont" style="font-weight: 300;font-size: 13px;">You have total of <span id="txttotproduct">0</span> Payment Method</h6>

    <div class="row" style="margin-bottom: .5rem;">
        <div class="col-md-4 coldashboardbox3" style="margin-bottom: 10px; padding-right: 0px;">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text searchinputorder"><i class="fas fa-search"></i></span>
                </div>
                <input type="text" class="form-control searchinputorder" id="txtsearchproduct" placeholder="Search . . .">
            </div>
        </div>

        <div class="col-md-8 coldashboardbox4">
            <button type="button" class="btn waves-effect waves-light btn-secondary float-right buttonproduct" onclick="openmdladdproduct();" style="background-color: #4C644B !important; border: 1px solid #4C644B !important;"><i class="fas fa-plus"></i> New Payment Method</button>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="mb-3">
                <table data-height="350" class="table table-bordered fixTable table-hover" style="margin-bottom: 0px;">
                    <thead class="bg-success text-white">
                        <tr>
                            <th style="width: 2%;white-space: nowrap;text-align: center;"> # </th>
                            <th style="width: 5%;white-space: nowrap;"> Image/QR Code </th>
                            <th style="width: 20%;white-space: nowrap;">GCASH Name </th>
                            <th style="width: 15%;white-space: nowrap;"> GCASH Number </th>
                            <th style="width: 6%;white-space: nowrap; text-align: center;"> Option </th>
                        </tr>
                    </thead>
                    <tbody id="tblpaymethodlist"></tbody>
                </table>
            </div>

            <input id="txtproductlistPageCount" type="hidden">
            <ul id="upproductlistPageList" class="pagination float-right"></ul>
        </div>
    </div>
</div>

<?php
include("paymentmethod/modal.php");
include("paymentmethod/script.php");
?>