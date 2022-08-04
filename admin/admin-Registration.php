
<?php 
session_start();
include('includes/config.php');
 
if (isset($_post["btnSubmit"])) 
{
	
	$username=$_post['username'];
	$email=$_post['email'];
	$password=$_post['password'];
	$status=1;
	$hash = password_hash($password, PASSWORD_DEFAULT);
	
	$sql= "INSERT INTO tbladmin(AdminUserName,AdminPassword,AdminEmailId,is_Active) VALUES ('$username','$hash','$email','$status')";
   $result = mysqli_query($con, $sql);
   echo mysqli_error($sql);
		if($result)
		{
			echo "Registration successfully";
		}
	}

   

?>

<!DOCTYPE html>
<html>
<head>
	<title>Registration</title>
</head>
<body>
<form method="post">
	<fieldset>
		<table>
			<tr>
				<td>Enter name</td>
				<td><input type="text" name="username"/></td>
			</tr>
			<tr>
				<td>Enter email</td>
				<td><input type="text" name="email"/></td>
			</tr>
			<tr>
				<td>Enter password</td>
				<td><input type="text" name="password"/></td>
			</tr>
			<tr>
				
				<td align="center"><input type="submit" name="btnSubmit"/></td>
			</tr>
		</table>
	</fieldset>
</form>
</body>
</html>
