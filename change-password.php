<?php include('includes/header.php');?>
<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <meta name="description" content="">
      <meta name="author" content="">
      <title>Job hunt | User Change password</title>
      <!-- Bootstrap core CSS -->
      <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
      <!-- Custom styles for this template -->
      <link href="css/modern-business.css" rel="stylesheet">
   </head>
   <body>
      <div class="container h-100" style="margin-top: 6%">
         <div class="d-flex justify-content-center h-100">
            <div class="user_card">
               <div class="d-flex justify-content-center">
                  <div class="brand_logo_container">
                     <img src="img/profilelogo.png" class="brand_logo" alt="Job hunt logo">
                  </div>
               </div>
               <div class="d-flex justify-content-center form_container">
                  <form>
                     <div class="input-group mb-3">
                        <div class="input-group-append">
                           <span class="input-group-text"><i class="fas fa-user"></i></span>
                        </div>
                        <input type="text" name="username" id="username" class="form-control input_user" placeholder="Enter a email" required>
                     </div>
                     <div class="input-group mb-3">
                        <div class="input-group-append">
                           <span class="input-group-text"><i class="fas fa-key"></i></span>
                        </div>
                        <input type="password" name="password" id="password" class="form-control input_pass" placeholder="New password" required>
                     </div>
                     <div class="input-group mb-3">
                        <div class="input-group-append">
                           <span class="input-group-text"><i class="fas fa-key"></i></span>
                        </div>
                        <input type="password" name="password" id="password" class="form-control input_pass" placeholder="Confirm password" required>
                     </div>
                  </form>
               </div>
               <div class="d-flex justify-content-center mt-3 login-container">
                  <button type="button" name="button" id="changepassword" class="btn login_btn">Change password</button>
               </div>
            </div>
         </div>
      </div>
      </div>
      <?php include('includes/footer.php');?>
      <script
         src="https://code.jquery.com/jquery-3.4.1.min.js"
         integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
         crossorigin="anonymous"></script>
      <script type="text/javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
   </body>
</html>