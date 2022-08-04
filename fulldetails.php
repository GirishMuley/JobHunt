<?php 
   session_start();
   include('includes/config.php');
   if(strlen($_SESSION['login'])==0)
     { 
   header('location:index.php');
   }
   ?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <meta name="description" content="">
      <meta name="author" content="">
      <title>Job Hunt | News Details</title>
      <!-- Bootstrap core CSS -->
      <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
      <!-- Custom styles for this template -->
      <link href="css/modern-business.css" rel="stylesheet">
   </head>
   <body>
      <!-- Navigation -->
      <?php include('includes/homeheader.php');?>
      <!-- Page Content -->
      <div class="container">
         <div class="row" style="margin-top: 8%">
            <!-- Blog Entries Column -->
            <div class="col-md-8">
               <!-- Blog Post -->
               <?php
                  $pid=intval($_GET['nid']);
                   $query=mysqli_query($con,"select tblposts.posttitle as posttitle,tblposts.postimage as PostImage,tblposts.postcategory as category,tblposts.postsubcategory as subcategory,tblposts.location as loc,tblposts.postdescription as postdetails,tblposts.postingDate as postingdate FROM tblposts where tblposts.id='$pid'");
                  while ($row=mysqli_fetch_array($query)) {
                  ?>
               <div class="card mb-4">
                  <div class="card-body">
                     <h2 class="card-title"><?php echo htmlentities($row['posttitle']);?></h2>
                     <p><b>Category : </b> <?php echo htmlentities($row['category']);?></a> |
                        <b>Job Post : </b><?php echo htmlentities($row['subcategory']);?> <b>Job location : </b><?php echo htmlentities($row['loc']);?><b> Posted on </b><?php echo htmlentities($row['postingdate']);?> 
                     </p>
                     <hr />
                     <img class="img-fluid rounded" src="admin/postimages/<?php echo htmlentities($row['PostImage']);?>" alt="<?php echo htmlentities($row['posttitle']);?>">
                     <p class="card-text"><?php 
                        $pt=$row['postdetails'];
                                      echo  (substr($pt,0));?></p>
                     <a href="homepage.php" class="btn btn-primary">Back</a>          
                  </div>
                  <div class="card-footer text-muted">
                  </div>
               </div>
               <?php } ?>
            </div>
            <!-- Sidebar Widgets Column -->
            <?php include('includes/side.php');?>
         </div>
      </div>
      <?php include('includes/footer.php');?>
   </body>
</html>