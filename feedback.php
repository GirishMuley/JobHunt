<?php 
   session_start();
   include('includes/config.php');
   error_reporting(0);
   // For adding post  
   if(isset($_POST['submit']))
   {
   $Firstname=$_POST['txtFirst'];
   $Lastname=$_POST['txtlast'];
   $City=$_POST['txtcity'];
   $Comment=$_POST['txtComment'];
   
   $status=1;
   $query=mysqli_query($con,"insert into tblfeedback(Firstname,Lastname,City,Comment,Is_Active) values('$Firstname','$Lastname','$City','$Comment','$status')");
   if($query)
   {
   $msg="Comment successfully added ";
   }
   else{
   $error="Something went wrong . Please try again.";    
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
      <?php include('includes/header.php');?>
      <div class="container" style="margin-top: 6%">
         <form action=feedback.php method="post" enctype="multipart/form-data">
            <div class="jumbotron">
               <div class="row">
                  <div class="col-sm-6">
                     <!---Success Message--->  
                     <?php if($msg){ ?>
                     <div class="alert alert-success" role="alert">
                        <strong>Well done!</strong><?php echo htmlentities($msg);?> 
                     </div>
                     <?php } ?>
                     <!---Error Message--->
                     <?php if($error){ ?>
                     <div class="alert alert-danger" role="alert">
                        <strong>Oh snap!</strong><?php echo htmlentities($error);?> 
                     </div>
                     <?php } ?>
                  </div>
               </div>
               <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
               <!-- div class="row" -->
               <!-- div class="col-sm-3"-->
               <div class="form-group">
                  <label for="txtFirst"><b>Enter first name</b></label>
                  <input class="form-control" type="text" id="firstid" name="txtFirst" required/>
               </div>
               <div class="form-group">
                  <label for="txtlast"><b>Enter last name</b></label>
                  <input class="form-control" type="text" id="lastid" name="txtlast" required/>
               </div>
               <div class="form-group">
                  <label for="txtcity"><b>Enter City</b></label>
                  <input class="form-control" type="text" id="Cityid" name="txtcity" required/>
               </div>
               <div class="form-group">
                  <label for="comment"><b>Comment:</b></label>
                  <textarea class="form-control" rows="5" id="comment" name="txtComment"></textarea>
               </div>
               <div align="center">
                  <input type="submit" value="Submit" name="submit" class="btn btn-success">
               </div>
         </form>
         </div> 
      </div>
      <?php include('includes/footer.php');?>
   </body>
</html>