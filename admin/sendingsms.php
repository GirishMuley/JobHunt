<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
      <meta name="author" content="Coderthemes">
      <title>Job hunt | Sending SMS</title>
      <!-- Summernote css -->
      <link href="../plugins/summernote/summernote.css" rel="stylesheet" />
      <!-- Select2 -->
      <link href="../plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
      <!-- Jquery filer css -->
      <link href="../plugins/jquery.filer/css/jquery.filer.css" rel="stylesheet" />
      <link href="../plugins/jquery.filer/css/themes/jquery.filer-dragdropbox-theme.css" rel="stylesheet" />
      <!-- App css -->
      <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
      <link href="assets/css/core.css" rel="stylesheet" type="text/css" />
      <link href="assets/css/components.css" rel="stylesheet" type="text/css" />
      <link href="assets/css/icons.css" rel="stylesheet" type="text/css" />
      <link href="assets/css/pages.css" rel="stylesheet" type="text/css" />
      <link href="assets/css/menu.css" rel="stylesheet" type="text/css" />
      <link href="assets/css/responsive.css" rel="stylesheet" type="text/css" />
      <link rel="stylesheet" href="../plugins/switchery/switchery.min.css">
      <script src="assets/js/modernizr.min.js"></script>
   </head>
   <?php
      session_start();
      include('includes/config.php');
       $query=mysqli_query($con,"select firstname,email from userinfodb");
      
      // These must be at the top of your script, not inside a function
      use PHPMailer\PHPMailer\PHPMailer;
      use PHPMailer\PHPMailer\SMTP;
      use PHPMailer\PHPMailer\Exception;
      require 'PHPMailer-master/src/PHPMailer.php';
      require 'PHPMailer-master/src/SMTP.php';
      require 'PHPMailer-master/src/Exception.php';
      // Load Composer's autoloader
      require 'PHPMailer-master/src/OAuth.php';
      
      
      if(isset($_POST['submit']))
      {
       while ($row=mysqli_fetch_array($query)) 
        {
      
      /*$to_id = $_POST['toid'];*/
      $subject =  $_POST['subject'];
      $message = $_POST['postdescription'];
      $image = $_FILES['image']['tmp_name'];
      $mail = new PHPMailer(true);
      $mail->isSMTP();
      $mail->Host = 'smtp.gmail.com';
      $mail->SMTPAuth = true;
      $mail->Username = '********';//Enter email here
      $mail->Password = '********';//Enter password here
      $mail->SMTPSecure = 'tls';  
      $mail->Port = 587;
      $mail->setFrom('girish.muley007@gmail.com', 'Job hunt');
      $mail->addAddress($row["email"]);
      $mail->Subject = $subject;
      $mail->Body = $message;
      $mail->addAttachment($image,".pdf");       // Add attachments
          
      
      if(!$mail->send())
      {
      $error = "Mailer Error: " .$mail->ErrorInfo;
      echo "<div class=display> '.$error.'  </div>";
      }
      else
      {
      echo " <div class=display> Message Sent </div>";
      }
      }
      }
      else
      {
      echo "<div class=display> Please Enter Valid Data </div>  ";
      }
      
      ?>
   <form action="" method="post" enctype="multipart/form-data">
      <body class="fixed-left">
         <!-- Begin page -->
         <div id="wrapper">
            <!-- Top Bar Start -->
            <?php include('includes/topheader.php');?>
            <!-- Top Bar End -->
            <!-- ========== Left Sidebar Start ========== -->
            <?php include('includes/leftsidebar.php');?>
            <!-- Left Sidebar End -->
            <div class="content-page">
               <!-- Start content -->
               <div class="content">
                  <div class="container">
                     <div class="row">
                        <div class="col-xs-12">
                           <div class="page-title-box">
                              <h4 class="page-title">Sending SMS</h4>
                              <ol class="breadcrumb p-0 m-0">
                                 <li>
                                    <a href="#">Admin</a>
                                 </li>
                                 <li>
                                    <a href="#">SMS</a>
                                 </li>
                                 <li class="active">
                                    Sending SMS
                                 </li>
                              </ol>
                              <div class="clearfix"></div>
                           </div>
                        </div>
                     </div>
                     <!-- end row -->
                     <div class="row">
                        <div class="col-sm-12">
                           <div class="card-box">
                              <h4 class="m-t-0 header-title"><b>Sending SMS </b></h4>
                              <hr />
                              <div class="row">
                                 <div class="col-sm-6">
                                    <!---Success Message--->  
                                 </div>
                              </div>
                              <!--<div class="form-group m-b-20">
                                 <label for="exampleInputEmail1">To:</label>
                                 <input type="text" class="form-control" id="category" name="toid" placeholder="User Email" required>
                                 </div>-->
                              <div class="form-group m-b-20">
                                 <label for="exampleInputEmail1">Subject</label>
                                 <input type="text" class="form-control" id="category" name="subject" placeholder="subject" required>
                              </div>
                              <div class="row">
                                 <div class="col-sm-12">
                                    <div class="card-box">
                                       <h4 class="m-b-30 m-t-0 header-title"><b>Messasge</b></h4>
                                       <textarea  name="postdescription" rows="20" cols="100" required></textarea>
                                    </div>
                                 </div>
                              </div>
                              <div class="row">
                                 <div class="col-sm-12">
                                    <div class="card-box">
                                       <h4 class="m-b-30 m-t-0 header-title"><b>Choose file</b></h4>
                                       <input type="file" class="form-control" class="file" id="postimage" name="image"  required>
                                    </div>
                                 </div>
                              </div>
                              <div class="form-group">
                                 <label class="col-md-2 control-label">&nbsp;</label>
                                 <div class="col-md-10">
                                    <input type="submit" name="submit" value="send" />
                                 </div>
                              </div>
   </form>
   </div>
   </div>
   </div>
   </div>
   </div>
   <!-- end row -->
   </div> <!-- container -->
   </div> <!-- content -->
   <?php include('includes/footer.php');?>
   </div>
   </div>
   <script>
      var resizefunc = [];
   </script>
   <!-- jQuery  -->
   <script src="assets/js/jquery.min.js"></script>
   <script src="assets/js/bootstrap.min.js"></script>
   <script src="assets/js/detect.js"></script>
   <script src="assets/js/fastclick.js"></script>
   <script src="assets/js/jquery.blockUI.js"></script>
   <script src="assets/js/waves.js"></script>
   <script src="assets/js/jquery.slimscroll.js"></script>
   <script src="assets/js/jquery.scrollTo.min.js"></script>
   <script src="../plugins/switchery/switchery.min.js"></script>
   <!--Summernote js-->
   <script src="../plugins/summernote/summernote.min.js"></script>
   <!-- Select 2 -->
   <script src="../plugins/select2/js/select2.min.js"></script>
   <!-- Jquery filer js -->
   <script src="../plugins/jquery.filer/js/jquery.filer.min.js"></script>
   <!-- page specific js -->
   <script src="assets/pages/jquery.blog-add.init.js"></script>
   <!-- App js -->
   <script src="assets/js/jquery.core.js"></script>
   <script src="assets/js/jquery.app.js"></script>
   <script>
      jQuery(document).ready(function(){
      
          $('.summernote').summernote({
              height: 240,                 // set editor height
              minHeight: null,             // set minimum height of editor
              maxHeight: null,             // set maximum height of editor
              focus: false                 // set focus to editable area after initializing summernote
          });
          // Select2
          $(".select2").select2();
      
          $(".select2-limiting").select2({
              maximumSelectionLength: 2
          });
      });
   </script>
   <script src="../plugins/switchery/switchery.min.js"></script>
   <!--Summernote js-->
   <script src="../plugins/summernote/summernote.min.js"></script>
   </form>
   </body>
</html>