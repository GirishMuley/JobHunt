<?php
// connect to the database
$conn = mysqli_connect('localhost', 'root', '', 'jobhunt');

// Uploads files
if (isset($_POST['Storedetails'])) { // if save button on the form is clicked
    // name of the uploaded file
    $firstname = $_POST['txtFirst'];
    $lastname = $_POST['txtLast'];
    $address  = $_POST['txtAddress'];
    $dob      = $_POST['txtdob'];
    $email    = $_POST['txtEmail'];
    $mobile   = $_POST['txtMobile'];
    $gender   = $_POST['rdxGender'];
    $selPg    = $_POST['selPg'];
    $pass     =md5($_POST['txtPass']);
    
    $agreement= $_POST['rdxAgreement'];
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
            $sql = "INSERT INTO userinfodb (firstname,lastname,address,dob,email,mobile,gender,educationid,resume,password,size,agreement,Is_Active) VALUES ('$firstname','$lastname','$address','$dob','$email','$mobile','$gender','$selPg','$filename','$pass','$size','$agreement','$Is_Active')";
            if (mysqli_query($conn, $sql)) {
               echo "<script>alert('Registration successfully');</script>";
            }
        } else {
            echo "<script>alert('Registration Failed....');</script>";
        }
    }
}
