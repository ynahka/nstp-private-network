<?php
require_once('connect.php');
if (!isset($_GET['id'])) {
    echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@9'></script>";
    echo "<script>
   window.onload = function() {
       Swal.fire({
           icon: 'error',
           title: 'Oops...',
           text: 'Undefined Schedule ID.',
           confirmButtonText: 'OK'
       }).then((result) => {
           if (result.isConfirmed) {
               location.replace('index.php?url=harvestingcal');
           }
       });
   }
 </script>";
    $connection->close();
    exit;
}

$delete = $connection->query("DELETE FROM `harvestsched` where id = '{$_GET['id']}'");
if ($delete) {
    echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@9'></script>";
    echo "<script>
   window.onload = function() {
       Swal.fire({
           icon: 'success',
           title: 'Success',
           text: 'Schedule has deleted successfully.',
           confirmButtonText: 'OK'
       }).then((result) => {
           if (result.isConfirmed) {
               location.replace('index.php?url=harvestingcal');
           }
       });
   }
 </script>";
} else {
    echo "<pre>";
    echo "An Error occured.<br>";
    echo "Error: " . $connection->error . "<br>";
    echo "SQL: " . $sql . "<br>";
    echo "</pre>";
}
$connection->close();
