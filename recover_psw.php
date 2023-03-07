<!DOCTYPE html>
<html lang="en">
<!--<?php echo md5("admin"); ?>-->

<head>
  <script type="text/javascript">
    function preventBack() {
      window.history.forward();
    }

    setTimeout("preventBack()", 0);

    window.onunload = function() {
      null
    };
  </script>


  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>STEPSOUT</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <!-- endinject -->
  <!-- Layout styles -->
  <link rel="stylesheet" href="assets/css/style.css">
  <!-- End layout styles -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

  <link rel="shortcut icon" href="assets/images/favicon.ico" />
  <script src="https://www.google.com/recaptcha/api.js" async defer>
  </script>
</head>

<body>
<div class="container py-5">
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                
                <div class="col-md-6 offset-md-3">
                    <span class="anchor" id="formResetPassword"></span>
                    <!-- form card reset password -->
                    <div class="card card-outline-secondary">
                        <div class="card-header">
                            <h3 class="mb-0">Password Reset</h3>
                        </div>
                        <div class="card-body">
                        <form name="f1" class="pt-3" action="" method="post" >
                                <div class="form-group">
                                    <label for="inputResetPasswordEmail">Email</label>
                                    <input type="text" class="form-control form-control-lg" id="email_address" onkeyup='emailValidation(this)' name="email" placeholder="Enter Email address" autocomplete="off"  required autofocus>
                                    <span id="mail" class="new"  style="color:red;"></span> 
                                </div>
                                <div class="form-group">
                                    <input type="submit" name="recover" class="btn btn-success mt-3 btn-lg float-right" value="Reset">
                                    <a href="index.php" class="btn btn-danger mt-3 btn-lg float-right">Cancel</a>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- /form card reset password -->

                </div>
        </div>
        <!--/col-->
    </div>
    
</div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="assets/vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="assets/js/off-canvas.js"></script>
  <script src="assets/js/hoverable-collapse.js"></script>
  <script src="assets/js/misc.js"></script>
  <!-- endinject -->


  <!-- <script language="javascript">

      function validation(){
        var un = document.getElementById('exampleInputEmail1').value;
        var up = document.getElementById('exampleInputPassword1').value;


        if(un == ""){
          document.getElementById('username').innerHTML ="**Please fill the username field";
          return false;
        }

        if(up == ""){
          document.getElementById('password').innerHTML ="**please enter your password";
          return false;
        }

      }
      </script> -->

</body>

</html>

<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "shoes";
$connection = new mysqli($servername, $username, $password, $database);
if (!$connection) {
  die("Database not connected !!");
}

if (isset($_POST["recover"])) {
  include('db.php');
  //$db=new db();
  $email = $_POST["email"];

  $sql = "SELECT * FROM auth WHERE email='$email'";
  // $query = mysqli_num_rows($sql);
  // $fetch = mysqli_fetch_assoc($sql);
  //$sql="select * from tbl_login where username='$email'";
  //$query = mysqli_num_rows($sql);
  //$fetch = mysqli_fetch_assoc($sql);

  // $rt=$db->selectQuery($sql);
  $rs = mysqli_query($connection, $sql);
  $row = mysqli_fetch_array($rs);

  if (mysqli_num_rows($rs) <= 0) {
?>
    <script>
      alert("<?php echo "Sorry, no emails exists " ?>");
    </script>
  <?php
  } else if ($row["status"] == false) {
  ?>
    <script>
      alert("Sorry, your account must verify first, before you recover your password !");
      window.location.replace("index.php");
    </script>
    <?php
  } else {
    // generate token by binaryhexa 
    $token = bin2hex(random_bytes(5));


    $token_sql = "UPDATE auth SET reset_code='$token' WHERE email='$email'";
    //session_start ();
    // $_SESSION['token'] = $token;
    // $_SESSION['user_email'] = $email;
    if (mysqli_query($connection, $token_sql)) {
      require "../Mail/phpmailer/PHPMailerAutoload.php";
      $mail = new PHPMailer;

      $mail->isSMTP();
      $mail->Host = 'smtp.gmail.com';
      $mail->Port = 587;
      $mail->SMTPAuth = true;
      $mail->SMTPSecure = 'tls';

      // h-hotel account
      $mail->Username = 'athulvinayakumar2023b@mca.ajce.in';
      $mail->Password = '';

      // send by h-hotel email
      $mail->setFrom('athulvinayakumar2023b@mca.ajce.in', 'Password Reset');
      // get email from input
      $mail->addAddress($_POST["email"]);
      //$mail->addReplyTo('lamkaizhe16@gmail.com');

      // HTML body
      $mail->isHTML(true);
      $mail->Subject = "Recover your password";
      $mail->Body = "<b>Dear User</b>
                <h3>We received a request to reset your password.</h3>
                <p>Kindly click the below link to reset your password</p>
                http://localhost/shoes/reset_psw.php?email=$email&token=$token
                <br><br>
                <p>With regrads,</p>
                <b>SHOES</b>";

      if (!$mail->send()) {
    ?>
        <script>
          alert("<?php echo " Invalid Email " ?>");
        </script>
      <?php
      } else {
      ?>
        <script>
          window.alert("Email send out !  Kindly check your email inbox.");
          window.location.replace("index.php");
        </script>
<?php
      }
    } else {
      echo "<script>alert('Unable to generate token !! Please try later.');</script>";
    }
  }
}


?>
<script>
  function emailValidation(inputTxt) {
    // ^([a-zA-Z0-9_\-\.]+)@([a-zA-Z0-9_\-\.]+)\.([a-zA-Z]{2,5})$
    var regx = /^([a-zA-Z0-9_\-\.]+)@([a-zA-Z0-9_\-\.]+)\.([a-zA-Z]{2,5})$/;
    var textField = document.getElementById("mail");

    if (inputTxt.value != '') {
      if (inputTxt.value.match(regx)) {
        textField.textContent = '';
        textField.style.color = "green";
      } else {
        textField.textContent = 'email id  is not valid!!! please insert a valid one';
        textField.style.color = "red";
      }
    } else {
      textField.textContent = 'your are not allowed  to leave a field  empty';
      textField.style.color = "red";
    }
  }
</script>