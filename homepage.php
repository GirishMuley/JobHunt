<?php 
   session_start();
   include('includes/config.php');
   
   if ($_SESSION["firstname"]==true)
   {
     
   }
   else
   {
     header('location:login.php');
   }
   
   $uname = $_SESSION["firstname"];
   $sql = "SELECT * FROM `userinfodb` WHERE firstname='$uname'";
   if ($result1=mysqli_query($con,$sql))
   {
   
   }
   else
   {
     echo mysqli_error($con);
   }
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
                  if (isset($_GET['pageno'])) {
                         $pageno = $_GET['pageno'];
                     } else {
                         $pageno = 1;
                     }
                     $no_of_records_per_page = 8;
                     $offset = ($pageno-1) * $no_of_records_per_page;
                  
                  
                     $total_pages_sql = "SELECT COUNT(*) FROM tblposts";
                     $result = mysqli_query($con,$total_pages_sql);
                     $total_rows = mysqli_fetch_array($result)[0];
                     $total_pages = ceil($total_rows / $no_of_records_per_page);
                  
                  $row = mysqli_fetch_assoc($result1);
                  $educationid = $row["educationid"];
                  $query="SELECT tblposts.id as pid, tblposts.posttitle as posttitle, tblposts.postcategory as category,tblposts.postingDate as postingdate,tblposts.postimage as PostImage FROM `tblposts` WHERE (postcategory='$educationid' && Is_Active=1) order by tblposts.id desc  LIMIT $offset, $no_of_records_per_page";
                  if($result2 = mysqli_query($con,$query))
                  {
                  
                  }
                  else
                  {
                  echo mysqli_error($con);
                  }
                  while ($row=mysqli_fetch_array($result2)) {
                     ?>
               <div class="card mb-4">
                  <img class="card-img-top" src="admin/postimages/<?php echo htmlentities($row['PostImage']);?>" alt="<?php echo htmlentities($row['posttitle']);?>">
                  <div class="card-body">
                     <h2 class="card-title"><?php echo htmlentities($row['posttitle']);?></h2>
                     <p><b>Category : </b> <?php echo htmlentities($row['category']);?></a> </p>
                     <a href="fulldetails.php?nid=<?php echo htmlentities($row['pid'])?>" class="btn btn-primary">Read More &rarr;</a>
                  </div>
                  <div class="card-footer text-muted">
                     Posted on <?php echo htmlentities($row['postingdate']);?>
                  </div>
               </div>
               <?php } ?>
               <!-- Pagination -->
               <ul class="pagination justify-content-center mb-4">
                  <li class="page-item"><a href="?pageno=1"  class="page-link">First</a></li>
                  <li class="<?php if($pageno <= 1){ echo 'disabled'; } ?> page-item">
                     <a href="<?php if($pageno <= 1){ echo '#'; } else { echo "?pageno=".($pageno - 1); } ?>" class="page-link">Prev</a>
                  </li>
                  <li class="<?php if($pageno >= $total_pages){ echo 'disabled'; } ?> page-item">
                     <a href="<?php if($pageno >= $total_pages){ echo '#'; } else { echo "?pageno=".($pageno + 1); } ?> " class="page-link">Next</a>
                  </li>
                  <li class="page-item"><a href="?pageno=<?php echo $total_pages; ?>" class="page-link">Last</a></li>
               </ul>
            </div>
            <!-- Sidebar Widgets Column -->
            <?php include('includes/side.php');?>
         </div>
         <!-- /.row -->
      </div>
      <!-- /.container -->
      <!-- Footer -->
      <?php include('includes/footer.php');?>
      <!-- Bootstrap core JavaScript -->
      <script src="vendor/jquery/jquery.min.js"></script>
      <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
      </head>
   </body>
</html>