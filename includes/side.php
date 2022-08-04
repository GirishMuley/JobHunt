<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
     <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
     <link href="css/modern-business.css" rel="stylesheet"><link href="includes/style.css" rel="stylesheet">
<div class="padding">
 <div class="col-md-4 col-sm-4 col-4">
 <!-- Column -->
 <?php
 $firstname=$_SESSION["firstname"];
$query=mysqli_query($con,"SELECT id,firstname FROM `userinfodb` WHERE
firstname='$firstname'");
while ($row=mysqli_fetch_array($query)) {
?>
 <div class="card mb-4" style="width: 380%"> <img class="card-img-top"
src="https://res.cloudinary.com/dxfq3iotg/image/upload/v1559285236/profile-bg.jpg"
alt="Card image cap" >
 <div class="card-body little-profile text-center">
 <div class="pro-img"><img src="images/profile_logo.png" alt="user"></div>
 <h3 class="m-b-0"><?php echo htmlentities($row['firstname']);?></h3>
 <p>Update your profile here</p> <a href="user-profile-update.php?uid=<?php
echo htmlentities($row['id'])?>" class="m-t-10 waves-effect waves-dark btn btn-primary btnmd btn-rounded" data-abc="true">Settings</a>
 <div class="row text-center m-t-20">
 <?php } ?>
 </div>
 </div>
 </div>
 </div>
</div>