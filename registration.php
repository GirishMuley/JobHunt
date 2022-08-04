<?php
include 'registrationLogic.php';
?>
<?php include('includes/header.php');?>
<!DOCTYPE html>
<html lang="en">
 <head>
 	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">


 	<title>User-registration | job hunt</title>
 	<!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="css/modern-business.css" rel="stylesheet">

    <!-- Bootstrap core CSS -->
  <!--   <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">-->

    <!-- Custom styles for this template -->
   <!--  <link href="css/modern-business.css" rel="stylesheet">-->
 	
 	
 </head>
 	<div>
  	 <body>
  	 <div class="container"  style="margin-top: 6%">
 	  <form action=registration.php method="post" enctype="multipart/form-data">
 	   <div class="jumbotron">
 	   
 	   	
        <h1>Registration</h1>
          <p>Fill all the details properly</p>
           <!--hr class="mb-3" -->
          	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
          	<!-- div class="row" -->
          	 <!-- div class="col-sm-3"-->
          	 	<div class="form-group">
				<label for="txtFirst"><b>Enter first name</b></label>
                <input class="form-control" type="text" id="firstid" name="txtFirst" required/>
                </div>
                <div class="form-group">
				<label for="txtLast"><b>Enter last name</b></label>
				<input class="form-control" type="text" id="lastid" name="txtLast" required/>
				</div class="form-group">
				<div>
				<label for="txtAddress"><b>Enter Address</b></label>
				<input class="form-control" type="text" id="addid" name="txtAddress" required/>
				</div>
				<div class="form-group">
				<label for="txtdob"><b>Date of Birth</b></label>
				<input class="form-control" type="date" id="dobid" name="txtdob" required/>
				</div>
				<div class="form-group">
				<label for="txtEmail"><b>Enter email</b></label>
				<input class="form-control" type="email" id="emailid" name="txtEmail" required/>
			    </div>
			    <div class="form-group">
				<label for="txtMobile"><b>Mobile number</b></label>
				<input class="form-control" type="number" id="mobileid" name="txtMobile" required/>
				</div>
				<div class="form-group">
				<label for="rdxGender"><b>Select gender</b></label><br>
                <input type = "Radio" id="genderid" name = "rdxGender" value = "male">Male</input>

                <input type = "Radio" id="genderid" name = "rdxGender" value = "female">Female</input>
                </div>
            	<div class="form-group">
				<label for="selPg"><b>Select your highest education here</b></label>
					<select name="selPg" id="Pgid">
						<option value="0" selected disabled></option>
						<option value="ssc">SSC</option>
						<option value="hcs">HSC</option>
						<option value="it">BCS</option>
						<option value="it">BCA</option>
						<option value="it">Bsc(CS)</option>
						<option value="it">MCS</option>
						<option value="it">MCA</option>
						<option value="it">Msc(CS)</option>
						<option value="commerce">B.Com</option>
						<option value="commerce">M.Com</option>		
  					</select><br>
				</div>
				<div class="custom-file">
				<label for="myfile" class="custom-file-label"><b>Resume</b></label>
				<input class="custom-file-input" type="file" id="myfileid" name="myfile">
				</div>
				<br>
				<br>
				<div class="form-group">
				 <a>Remeber that your firstname is your id name & this is your password create below</a><br>
				</div>
				<div class="form-group">
				<label for="txtPass"><b>Create your password</b></label>
                <input class="form-control" type="password" id="Passid" name="txtPass" required/>
                </div>
				<div class="form-group form-check">
				<input type = "Checkbox" id="agreeid" name = "rdxAgreement" value="agree" />
                 <a> I agreesd to the terms & conditions</a><br>
				</div><!--hr class="mb-3" -->
				<br>
				<div class="form-group">
				<input class="btn btn-primary" type="submit" id="registedid" name="Storedetails" value="Registed"/>
				</div>

			 </div>
		  </div>
		
		</div>
	</div>
	
	<?php include('includes/footer.php');?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script type="text/javascript">
</script>
</form>
</body>
</html>


















