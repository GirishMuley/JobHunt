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
if (isset($_POST['Update'])) { // if save button on the form is clicked
    // name of the uploaded file
    $firstname = $_POST['txtFirst'];
    $lastname = $_POST['txtLast'];
    $address  = $_POST['txtAddress'];
    $dob      = $_POST['txtdob'];
    $email    = $_POST['txtEmail'];
    $mobile   = $_POST['txtMobile'];
    $gender   = $_POST['rdxGender'];
    $selPg    = $_POST['selPg'];
    
    
    
    $filename = $_FILES['myfile']['name'];

    // destination of the file on the server
    $destination = 'uploads/' . $filename;

    // get the file extension
    $extension = pathinfo($filename, PATHINFO_EXTENSION);

    // the physical file on a temporary uploads directory on the server
    $file = $_FILES['myfile']['tmp_name'];
    $size = $_FILES['myfile']['size'];

    if (!in_array($extension, ['zip', 'pdf', 'docx'])) {
        echo "You file extension must be .zip, .pdf or .docx";
    } elseif ($_FILES['myfile']['size'] > 1000000) { // file shouldn't be larger than 1Megabyte
        echo "File too large!";
    } else {
        // move the uploaded (temporary) file to the specified destination
        if (move_uploaded_file($file, $destination)) {
            $Is_Active='1';
            $firstname=$_SESSION["firstname"];
            $sql = "update userinfodb set firstname='$firstname',lastname='$lastname',address='$address',dob='$dob',email='$email',mobile='$mobile',gender='$gender',educationid='$selPg',resume='$filename',size='$size',Is_Active='$Is_Active' where firstname='$firstname'";
            if (mysqli_query($con, $sql)) {
               echo "<script>alert('Profile update  successfully');</script>";
            }
        } else {
            echo "<script>alert('OOPS changes not apply....');</script>";
            echo mysqli_error($con);
        }
    }
}

?>
 <?php include('includes/homeheader.php');?>

<!DOCTYPE html>
<html lang="en">
 <head>
 	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">


 	<title>User-Profile-Update | job hunt</title>
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
 	  <form action=user-profile-update.php method="post" enctype="multipart/form-data">
 	   <div class="jumbotron">
 	   
 	   	
        <h1>User profile update</h1>
          <p>Fill all the details properly</p>
           <!--hr class="mb-3" -->
          	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
          	<!-- div class="row" -->
          	 <!-- div class="col-sm-3"-->
          	 <?php
 $firstname=$_SESSION["firstname"];
$query=mysqli_query($con,"SELECT firstname,lastname,address,dob,email,mobile,gender,educationid,resume FROM `userinfodb` WHERE firstname='$firstname'");
while($row=mysqli_fetch_array($query))
{
?>
          	 	<div class="form-group">
				<label for="txtFirst"><b>Enter first name</b></label>
                <input class="form-control" type="text" id="firstid" name="txtFirst" value="<?php echo htmlentities($row['firstname']);?>" required/>
                </div>
                <div class="form-group">
				<label for="txtLast"><b>Enter last name</b></label>
				<input class="form-control" type="text" id="lastid" name="txtLast" value="<?php echo htmlentities($row['lastname']);?>" required/>
				</div class="form-group">
				<div>
				<label for="txtAddress"><b>Enter Address</b></label>
				<input class="form-control" type="text" id="addid" name="txtAddress" value="<?php echo htmlentities($row['address']);?>" required/>
				</div>
				<div class="form-group">
				<label for="txtdob"><b>Date of Birth</b></label>
				<input class="form-control" type="date" id="dobid" name="txtdob" value="<?php echo htmlentities($row['dob']);?>" required/>
				</div>
				<div class="form-group">
				<label for="txtEmail"><b>Enter email</b></label>
				<input class="form-control" type="email" id="emailid" name="txtEmail" value="<?php echo htmlentities($row['email']);?>" required/>
			    </div>
			    <div class="form-group">
				<label for="txtMobile"><b>Mobile number</b></label>
				<input class="form-control" type="number" id="mobileid" name="txtMobile" value="<?php echo htmlentities($row['mobile']);?>" required/>
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
				
<?php } ?>

				<br>
				<br>
				
				<br>
				<div class="form-group">
				<input class="btn btn-primary" type="submit" id="registedid" name="Update" value="Update"/>
				<a href="homepage.php" class="btn btn-primary">Back</a>
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


















