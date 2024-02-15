<?php include '../connect2.php'; ?>
<?php include '../header.php'; ?>
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
                        <h3 class="mb-0 mt-0 headerfontfont text-themecolor" style="font-weight: 600;">Community</h3>
                    </div>
                    <div class="col-md-6 col-6 align-self-center" style="padding-right:10px;">
                        <ol class="breadcrumb float-right headerfontfont">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                            <li class="breadcrumb-item active">Community</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid" style="padding: 15px 15px; background-color: white; min-height: 540px; margin-top: 15px;">
    <h4 class="mb-0 headerfontfont2" style="color: #2c2b2e;font-weight: 500;">Community List</h4>
    <!-- <h6 class="mb-4 headerfontfont" style="font-weight: 300;font-size: 13px;">You have total of <span id="txttotproduct">2</span> Blog</h6> -->

    <div class="row" style="margin-bottom: .5rem;">
        <div class="col-md-4 coldashboardbox3" style="margin-bottom: 10px; padding-right: 0px;">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text searchinputorder"><i class="fas fa-search"></i></span>
                </div>
                <input type="text" class="form-control searchinputorder" id="txtsearchproduct" placeholder="Search . . .">
            </div>
        </div>


    </div>

    <div class="row">
        <div class="col-12">
            <div class="mb-3">
                <table data-height="350" class="table table-bordered fixTable table-hover" style="margin-bottom: 0px;">
                    <thead class="bg-success text-white">
                        <tr>
                            <th style="width: 2%;white-space: nowrap;text-align: center;"> # </th>
                            <th style="width: 7%;white-space: nowrap;"> Image </th>
                            <th style="width: 15%;white-space: nowrap;"> Blog Title </th>
                            <th style="width: 15%;white-space: nowrap;"> Blog Description </th>
                            <th style="width: 6%;white-space: nowrap; text-align: center;"> Option </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $res = mysqli_query($connection, "SELECT * FROM blog");
                        $counter = 1;
                        while ($row = mysqli_fetch_array($res)) {


                        ?>

                            <tr>
                                <td><?php echo $counter; ?></td>
                                <td><img src="../<?php echo $row['image']; ?>" width="100px"></td>
                                <td><?php echo $row['blogtitle']; ?></td>
                                <td><?php echo $row['blogdescription']; ?></td>
                                <td style="white-space: nowrap; text-align: center;">
                                    <button class="delete" value="<?php echo $row['id'] ?>" style="border: unset;background-color: unset;"><i class="fas fa-trash fa-lg text-danger" style="cursor:pointer;color: #3f3f3f;" title='Edit Branch'></i></button>
                                </td>
                            </tr>
                        <?php $counter++;
                        }
                        ?>
                        <tr>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
            </div>



        </div>
    </div>
</div>

<?php
include("community/modal.php");
include("community/script.php");

?>

<script>
    $('.delete').click(function() {
        id = $(this).val()

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
                    url: 'community/class.php',
                    data: 'id=' + id + '&form=deleteblog',
                    success: function(data) {
                        setTimeout(function() {
                            $(".preloader").hide().css('background', '');
                            Swal.fire(
                                'Success!',
                                'Product successfully deleted.',
                                'success'
                            )
                            displayproductlist();
                        }, 1000);
                        setTimeout(function() {
                            location.reload()
                        }, 2000)
                    }
                })
            }
        })
    })
</script>