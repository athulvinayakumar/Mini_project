<?php
require_once('./db.php')
?>

<?php
if (isset($_POST['submit'])) {
    $name = $_POST["name"];
    $usrnm = $_POST["urnm"];
    $pssrd = $_POST["pswd"];
    $nmbr = $_POST["number"];
    $eml = $_POST["mail"];
    $addr = $_POST["address"];
    $confirmPassword = $_POST["conpass"];


    if (!empty($name) && !empty($usrnm) && !empty($pssrd) && !empty($nmbr) && !empty($eml) && !empty($addr)) {

        $sqlquery = "INSERT INTO auth VALUES (null,'$name','$usrnm','$pssrd','$nmbr','$eml','$addr',0)";
        if ($connection->query($sqlquery) === TRUE) {
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
</head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="signup.js"></script>


<body>

    <fieldset>
        <form method="POST" actiom="#"><br>
            <center>
                <h1>REGISTER</h1>
            </center><br>
            <div id="login_error"></div>
            <div id="message1"></div>
            &emsp; <input type="text" class="text" id="first" size="60px" placeholder="ENTER NAME" autocomplete="off" onkeyup="unames()" name="name" require><br>
            <div id="message5"></div>
            &emsp; <input type="text" class="text" id="fifth" size="60px" placeholder="ENTER USERNAME" autocomplete="off" onkeyup="users()" name="urnm"><br>
            <div id="message6"></div>
            &emsp; <input type="password" class="text" id="sixth" size="60px" placeholder="ENTER PASSWORD" autocomplete="off" onkeyup="passs()" name="pswd"><br>
            <div id="message7"></div>
            &emsp; <input type="password" class="text" id="seventh" size="60px" placeholder="CONFIRM PASSWORD" autocomplete="off" onkeyup=conpasss() name="conpass"><br>
            <div id="message2"></div>
            &emsp; <input type="text" class="text" id="second" size="60px" placeholder="MOBILE NUMBER" maxlength="10" autocomplete="off" onkeyup="numbers()" name="number"><br>
            <div id="message3"></div>
            &emsp; <input type="text" class="text" id="third" size="60px" placeholder="ENTER MAIL ID" onkeyup="mails()" autocomplete="off" name="mail"><br>
            <div id="message4"></div>
            &emsp; <input type="text" class="text" id="fourth" size="60px" placeholder="ENTER ADDRESS" onkeyup="adds()" autocomplete="off" name="address"><br>
            <div id="message8"></div><br>
            <center><input type="submit" value="REGISTER" class="button" name="submit"><br>
                <p id="paragraph1"><a href="login.php">Already have account</a></p>
            </center>
        </form>
    </fieldset>

</body>

</html>