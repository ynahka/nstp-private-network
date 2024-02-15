<?php include 'connect2.php'; ?>

<?php
$res = mysqli_query($connection, "SELECT * FROM post WHERE id = '".$_POST['id']."'");
$row = mysqli_fetch_array($res);
?>
<div class="col-md-12 mb-2">
    <span style="font-weight:400">Image</span>
    <input type="file" class="form-control" style="font-size: .9rem;">
</div>
<div class="col-md-12 mb-2">
    <span style="font-weight:400">Post Title</span>
    <input type="text" class="form-control" value="<?php echo $row['posttitle'] ?>" style="font-size: .9rem;">
</div>
<div class="col-md-12 mb-2">
    <span style="font-weight:400">Post Description</span>
    <input type="text" class="form-control" style="font-size: .9rem;">
</div>

