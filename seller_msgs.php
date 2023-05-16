<?php
include 'db.php';
if (isset($_POST['submit'])) {
    $sname = $_POST['seller_name'];
    $semail = $_POST['seller_email'];
    $message = $_POST['message'];
    $sql = "INSERT INTO tbl_smsgs (seller_name,seller_email,message) VALUES ('$sname', '$semail','$message')";
    $res = mysqli_query($connection, $sql);
    if ($res) {
        echo "<script>alert('Messade sent successfully'); window.location='seller_msgs.php'; </script>";
    } else {
        echo "<script>alert('Cat not successfull')</script>";
    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" /> -->
    <script src="js/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>Seller panel</title>
    <link rel="stylesheet" href="css/admin.css">
    <style>
        .panel_btns {
            background-color: #4e73df !important;
        }
        .panel_btns:hover {
            background-color: blue !important;
        }

        .side-pane {
            background-color: #4e73df !important;
        }
    </style>

</head>

<body>  
    <div class="col-md-6 " id="add-movies-container">
            <div class="p-5 bg-light">
                <div class="container">
                    <h1 class="display-3">Send messages</h1>
                    </p>
                </div>
            </div>
    <form method="post" id="form"  action="">
    <div class="mb-3">
            <h6>Seller name</h6>
            <label for="" class="form-label"></label>
            <input type="text" class="form-control" name="seller_name" id="sname" aria-describedby="helpId" onkeyup="seller()" autocomplete="off">
            <div id="msg1"></div>
          </div>
          <div class="mb-3">
            <h6>Seller email</h6>
            <label for="" class="form-label"></label>
            <input type="text" class="form-control" name="seller_email" id="semail" aria-describedby="helpId" onkeyup="email()" autocomplete="off">
            <div id="msg2"></div>
          </div>
          <div class="mb-3">
            <h6>Message</h6>
            <label for="" class="form-label"></label>
            <textarea class="form-control" name="message"  id="msg" onkeyup="messge()" id="a" rows="2"></textarea>
            <div id="msg3"></div>
          </div>
        <button type="submit" name="submit" class="btn btn-primary" id="add-btn">Send</button>
        <button> <a href="seller.php" class="btn btn-success">Back</a></button>
    </div>
    </form>
   
</body>
<script>
$(document).ready(function () {
    $("form").submit(function (e) {
        if (flag1 != 1 || flag2 != 1 || flag3 != 1 ) {
            e.preventDefault();
        }

    });
})

flag1 = 0;
flag2 = 0;
flag3 = 0;
  

function seller() {

var name = document.getElementById("sname").value;
var letters = /[A-Z][a-z]* [A-Z][a-z]*/;
 if (!letters.test(name)) { 
    document.getElementById("msg1").innerHTML = "Firstname and Lastname should Start with capital Letter";
    flag1=0;
} else {
    document.getElementById("msg1").innerHTML = "";
    flag1=1;
}
}

function email() {

var mail = document.getElementById("semail").value;
var filter = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
if (!filter.test(mail)) {
    document.getElementById("msg2").innerHTML = "invalid Mail-id";
    flag2=0;

} else {
    document.getElementById("msg2").innerHTML = "";
    flag2=1;
   
}
}

function messge() {

var name = document.getElementById("msg").value;
var letters =  50;
 if (!letters.test(name)) { 
    document.getElementById("msg3").innerHTML = "Length less than 50";
    flag3=0;
} else {
    document.getElementById("msg3").innerHTML = "";
    flag3=1;
}
}

</script>

</html>