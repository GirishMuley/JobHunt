<?php 
   session_start();
   include('includes/config.php');
   
   ?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <meta name="description" content="">
      <meta name="author" content="">
      <title>Job Hunt | Home Page</title>
      <!-- Bootstrap core CSS -->
      <!-- CSS only -->
      <!-- CSS only -->
      <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
      <!-- Custom styles for this template -->
      <link href="css/modern-business.css" rel="stylesheet">
   </head>
   <body>
      <!-- Navigation -->
      <?php include('includes/header.php');?>
      <div class="p-3 my-3 bg-primary text-white">
         <div class="row" style="margin-top: 4%" >
            <div class="col-md-12" >
               <center >
                  <h4 align="center" >New to Job Hunt</h4>
                  <a align="center"  href="registration.php" class="btn btn-warning">Register with us</a>
                  <h4 align="center" >Upload CV</h4>
                  <h4 align="center" >Max 2MB doc.doxx.pdf</h4>
                  <p align="center" >Get best match jobs on your E-mail daily NEWS and JOB ALERTS</p>
               </center>
            </div>
         </div>
      </div>
      <!-- Page Content -->
      <div class="container">
         <div class="row" style="margin-top: 8%">
            <!-- Blog Entries Column -->
            <div class="col-md-8">
               <!-- Blog Post -->
               <?php
                  $query=mysqli_query($con,"SELECT Posttitle,PostDescription,PostingDate FROM `tbldetail` WHERE Is_Active=1");
                  while ($row=mysqli_fetch_array($query)) {
                  ?>
               <div class="card mb-4">
                  <div class="card-body">
                     <h2 class="card-title"><?php echo htmlentities($row['Posttitle']);?></h2>
                     <hr />
                     <p class="card-text"><?php 
                        $pt=$row['PostDescription'];
                                      echo  (substr($pt,0));?></p>
                  </div>
                  <div class="card-footer text-muted">
                     Posted on <?php echo htmlentities($row['PostingDate']);?>
                  </div>
               </div>
               <?php } ?>
            </div>
            <!-- Sidebar Widgets Column -->
            <?php include('includes/sidebar.php');?> 
         </div>
      </div>
      <?php include('includes/footer.php');?>
      <script src="vendor/jquery/jquery.min.js"></script>
      <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
   </body>
</html>