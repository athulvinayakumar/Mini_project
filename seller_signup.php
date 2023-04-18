<?php
require_once('./db.php')
?>

<?php
if (isset($_POST['submit'])) {
    $name = $_POST["name"];
    $username = $_POST["urnm"];
    $passrd = $_POST["pswd"];
    $number = $_POST["number"];
    $email = $_POST["mail"];
    $aadhar = $_FILES["file"]["name"];;
    $addr = $_POST["address"];
    $confirmPassword = $_POST["conpass"];
    $targetDir = "./product_file/";
    $targetFilePath = $targetDir . $aadhar;


    if (!empty($name) && !empty($username) && !empty($passrd) && !empty($number) && !empty($email) && !empty($aadhar) && !empty($addr)) {

         $sql = "INSERT INTO `tbl_seller_reg` VALUES (null,'$name','$username','$passrd','$number','$email','$aadhar','$addr',2)";
        if ($connection->query($sql) === TRUE) {
            echo "New record created successfully";
            header('Location: login.php');
        } else {
            echo "Error: " . $sqlquery . "<br>" . $connection->error;
        }
    }
}


?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="signup.css">
    <title>Vk Shoes</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="seller_signup.js"></script>


<body>

    <fieldset>
        <form method="POST" actiom="#" enctype="multipart/form-data"><br>
            <center>
                <h1>REGISTER</h1>
            </center><br>
            <div id="login_error"></div>
            <div id="msg1" style="color:red"></div>
            &emsp; <input type="text" class="text" id="first" size="60px" placeholder="ENTER NAME" autocomplete="off" onkeyup="unames()" name="name" require><br><br>
            <div id="msg5" style="color:red"></div>
            &emsp; <input type="text" class="text" id="fifth" size="60px" placeholder="ENTER USERNAME" autocomplete="off" onkeyup="users()" name="urnm"><br><br>
            <div id="msg6" style="color:red"></div>
            &emsp; <input type="password" class="text" id="sixth" size="60px" placeholder="ENTER PASSWORD" autocomplete="off" onkeyup="passs()" name="pswd"><br><br>
            <div id="msg7" style="color:red"></div>
            &emsp; <input type="password" class="text" id="seventh" size="60px" placeholder="CONFIRM PASSWORD" autocomplete="off" onkeyup=conpasss() name="conpass"><br><br>
            <div id="msg2" style="color:red"></div>
            &emsp; <input type="text" class="text" id="second" size="60px" placeholder="MOBILE NUMBER" maxlength="10" autocomplete="off" onkeyup="numbers()" name="number"><br><br>
            <div id="msg3" style="color:red"></div>
            &emsp; <input type="text" class="text" id="third" size="60px" placeholder="ENTER MAIL ID" onkeyup="mails()" autocomplete="off" name="mail"><br><br>
            &emsp; &emsp; <input type="file"  name="file" id="d"   onchange="un()" style="background-color: white;margin-left: 3%;"><br><br>
            <div id="msg4" style="color:red"></div>
            &emsp; <input type="text" class="text" id="fourth" size="60px" placeholder="ENTER ADDRESS" onkeyup="adds()" autocomplete="off" name="address"><br>
            <div id="msg8" style="color:red"></div><br>
            <center><input type="submit" value="REGISTER" class="button" name="submit"><br>
                <p id="paragraph1"><a href="login.php">Already have account</a></p>
            </center>
        </form>
    </fieldset>

</body>

</html>