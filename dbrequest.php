<?php
include('db.php');
if(isset($_POST['submit']))
{
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$address = $_POST['address'];
$pincode1 = $_POST['pincode'];
$pincode = "IN/" .$pincode1;
$targetDir = "product_img/";
$targetFilePath = $targetDir . $pimage;
$image=$_FILES['img']['name'];
move_uploaded_file($_FILES["img"]["tmp_name"], $targetFilePath);
$sql5=mysqli_query($connection,"INSERT INTO tbl_dbrequest(db_name,db_email,db_phone,db_image,db_address,db_pincode,db_password,db_status) VALUES('$name','$email','$phone','$image','$address','$pincode','null',0)");
}
?>
<!DOCTYPE html>
<html>
<head>
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f1f1f1;
    }

    .registration-form {
        width: 100%;
        max-width: 500px;
        margin: 50px auto;
        padding: 20px;
        background-color: #fff;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    h2 {
        text-align: center;
        margin-bottom: 30px;
        color: #333;
        font-size: 24px;
    }

    label {
        display: block;
        margin-bottom: 10px;
        font-weight: bold;
        color: #555;
    }

    input[type="text"],
    input[type="email"],
    input[type="tel"],
    input[type="file"] {
        width: 94%;
        padding: 10px;
        margin-bottom: 20px;
        border: none;
        border-radius: 5px;
        background-color: #f9f9f9;
        box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
        font-size: 16px;
    }

    input[type="submit"] {
        width: 100%;
        padding: 10px;
        background-color: #4CAF50;
        color: #fff;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        font-size: 16px;
        transition: background-color 0.3s ease;
    }

    input[type="submit"]:hover {
        background-color: #45a049;
    }

    @media (max-width: 600px) {
        .registration-form {
            padding: 10px;
        }
    }

</style>
 
<script>
function validateForm() {
var name = document.getElementById("name").value.trim();
var email = document.getElementById("email").value.trim();
var password = document.getElementById("password").value;
var confirmPassword = document.getElementById("confirm-password").value;

if (name == "") {
alert("Name must be filled out");
return false;
}

if (email == "") {
alert("Email must be filled out");
return false;
}

if (password == "") {
alert("Password must be filled out");
return false;
}

if (password != confirmPassword) {
alert("Passwords do not match");
return false;
}

return true;
}
        </script>
<title>Delivery Boy Request</title>
<link rel="stylesheet" type="text/css" href="style.css">
<script type="text/javascript" src="validation.js"></script>
</head>
<body>
<div class="registration-form">
<h2>REQUEST FORM</h2>
<form action="dbrequest.php" method="POST" enctype="multipart/form-data" onsubmit="return validateForm()">
<label for="name">Name:</label>
<input type="text" id="name" name="name">

<label for="email">Email:</label>
<input type="email" id="email" name="email">

<label for="phone">Phone:</label>
<input type="tel" id="phone" name="phone">

<label>Image <span class="required-color">*</span></label>
<input type="file" name="img" id="e" onchange="unames()" required/>

<label for="address">Address:</label>
<input type="text" id="address" name="address">

<label for="pincode">Pincode:</label>
<input type="text" id="pincode" name="pincode">

<input type="submit" value="Register"name="submit">
</form>
</div>
<script>
const phoneInput = document.getElementById("phone");
const phoneRegex = /^\d{10}$/;

phoneInput.addEventListener("input", function() {
  if (!phoneRegex.test(phoneInput.value)) {
    phoneInput.setCustomValidity("Please enter a valid 10-digit phone number");
  } else {
    phoneInput.setCustomValidity("");
  }
});
</script>
<script>
function unames() {
    var fileInput =
        document.getElementById('e');
    var filePath = fileInput.value;
    // Allowing file type
    var allowedExtensions =
        /(\.jpg|\.jpeg|\.png|\.gif)$/i;

    if (!allowedExtensions.exec(filePath)) {
        // $('#Update').attr("disabled", true);
        alert('only image files allowed');
        fileInput.value = '';
        return false;
    } else {
        // $('#Update').attr("disabled", false);
    }
}
</script>
</body>

</html>