<div class="col-md-4" style="margin-top: -2%">
 <div class="card my-4">
 <h5 class="card-header">Companys</h5>
 <div class="card-body">
 <div class="row justify-content-center">
 <?php
$query=mysqli_query($con,"SELECT cmpImage,cmpLink FROM `tblcompany` WHERE
Is_Active='1'");
while ($row=mysqli_fetch_array($query)) {
?>
<!-- companys-->
 <!-- <div class="col-lg-6"> -->
 <a  href="<?php echo htmlentities($row['cmpLink']);?>" target="_blank"><img
src="admin/cmpimages/<?php echo htmlentities($row['cmpImage']);?>" height="70px"
width="130px"/></a>
 <?php } ?>
</div>
 </div>
 </div>
</div>