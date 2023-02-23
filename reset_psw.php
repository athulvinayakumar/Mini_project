<?php session_start() ;
//include('DatabaseCon.php');
include('db.php');
?>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

    <link rel="stylesheet" href="assets/css/resetstyle.css">

    <link rel="icon" href="Favicon.png">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />

    <title>Login Form</title>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light navbar-laravel">
    <div class="container">
        <a class="navbar-brand" href="#">Password Reset Form</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
    </div>
</nav>

<main class="login-form">
    <div class="cotainer">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Reset Your Password</div>
                    <div class="card-body">
                        <form action="reset_psw.php" method="POST" name="login">

                            <div class="form-group row">
                                <label for="password" class="col-md-0 col-form-label text-md-right">New Password</label>
                                <div class="col-md-12">
                                    <input type="password" id="password" onkeyup='passwordValidation(this)' class="form-control" name="password" required autofocus>
                                    <span id="pass1" class="new"  style="color:red;"></span>
                                </div>
                                    <i class="bi bi-eye-slash" id="togglePassword"></i>
                                </div>
                                <label for="password" class="col-md-0 col-form-label text-md-right">Confirm Password</label>
                                <div class="col-md-12">
                                    <input type="password" id="repass" onkeyup='cpasswordValidation(this)' class="form-control" name="password" required autofocus>
                                    <span id="pass2" class="new"  style="color:red;"></span>
                                </div>
                                    <i class="bi bi-eye-slash" id="togglePassword"></i>
                            </div>

                            <div class="col-md-6 offset-md-4">
                                <input type="submit" value="Reset" name="reset">
                            </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>

</main>
</body>
</html>


<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "shoes";
$connection = new mysqli($servername, $username, $password, $database);
    if(!$connection){
        die("Database not connected !!");
    }

    // include('DatabaseCon.php');

    if(isset($_POST["reset"])){
        $email= $_SESSION['email'];
        $token= $_SESSION['token'];
        $psw = $_POST["password"];

        $sql =  mysqli_query($connection, "UPDATE auth SET password='$psw' WHERE email='$email' AND reset_code='$token'");
        if($sql){
            echo "<script>alert('your password has been succesful reset');window.location.replace('index.php');</script>";
            // header("Location : signin.php");
        }else{
            echo "<script>alert('Please try again');</script>";
        }
    }
    else{
        $_SESSION['email']= $_GET['email'];
        $_SESSION['token']= $_GET['token'];
    }

?>
<script>
    const toggle = document.getElementById('togglePassword');
    const password = document.getElementById('password');

    toggle.addEventListener('click', function(){
        if(password.type === "password"){
            password.type = 'text';
        }else{
            password.type = 'password';
        }
        this.classList.toggle('bi-eye');
    });
    function passwordValidation(inputTxt){
    
    var regx = /(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{5,}/;
    var textField = document.getElementById("pass1");
        
    if(inputTxt.value != '' ){
            if(inputTxt.value.match(regx)){
                textField.textContent = '';
                textField.style.color = "green";
                    
            }else{
                textField.textContent = 'Must contain at least one number and one uppercase and lowercase letter and aleast 5 characters';
                textField.style.color = "red";
            }    
    }else{
        textField.textContent = 'your are not allowed  to leave a field  empty';
        textField.style.color = "red";
    }
}
function cpasswordValidation(inputTxt){
    
    var regx =  document.getElementById("password").value;
    var regy =  document.getElementById("repass").value;
    var textField = document.getElementById("pass2");
    var textField1 = document.getElementById("pass1");
        
    if(inputTxt.value != '' ){    
            if(regx == regy){
                textField.textContent = '';
                textField.style.color = "green";
                    
            }else{
                textField.textContent = 'Entered to passwords are not same!!';
                textField.style.color = "red";
            }  
        }else{
            textField.textContent = '';
            textField.style.color = "red";
        }  
}
</script>