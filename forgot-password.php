<?php
   session_start();
   include('includes/config.php');
   error_reporting(0);
   if(isset($_POST['btnSubmit']))
   {
      $email=$_POST['email'];
       
       $password=md5($_POST['password']);
   $query=mysqli_query($con,"SELECT * FROM `userinfodb` WHERE email='$email'");
   $num=mysqli_fetch_array($query);
   if($num>0)
   {
   mysqli_query($con,"update userinfodb set password='$password' WHERE email='$email'");
   echo "<script>alert('Password change Successfully');</script>";
   }
   else
   {
   echo "<script>alert('Password not change');</script>";
   }
   }
   
   
   ?>
<!DOCTYPE html>
<html>
   <head>
      <title>Job Hunt | Feedback</title>
      <!-- Bootstrap core CSS -->
      <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
      <!-- Custom styles for this template -->
      <link href="css/modern-business.css" rel="stylesheet">
      <!-- Bootstrap core CSS -->
   <body>
      <?php include('includes/loginheder.php');?>
      <div class="container" style="margin-top: 6%">
         <form action=forgot-password.php method="post" enctype="multipart/form-data">
            <div class="jumbotron">
               <div class="row">
                  <div class="col-sm-6">
                     <!---Success Message--->  
                  </div>
               </div>
               <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
               <!-- div class="row" -->
               <!-- div class="col-sm-3"-->
               <div class="form-group">
                  <label for="email"><b>Enter Email</b></label>
                  <input class="form-control" type="text" id="email" name="email" required/>
               </div>
               <div class="form-group">
                  <label for="password"><b>Enter New Password</b></label>
                  <input class="form-control" type="password" id="password" name="password" required/>
               </div>
               <div align="center">
                  <input type="submit" value="Submit" name="btnSubmit" class="btn btn-success">
               </div>
         </form>
         </div> 
      </div>
      <?php include('includes/footer.php');?>
   </body>
</html>