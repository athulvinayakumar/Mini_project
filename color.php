<?php
    session_start();
    include 'db.php';
    if (!isset($_SESSION['Username'])) {
        header('location:login.php');
    }

    if (isset($_POST['submit'])) {
        $color = $_POST['color'];
        $sql = "INSERT INTO tbl_color VALUES (null,'".$color."')";
        $res= mysqli_query($connection, $sql); 
        if($res){
            echo "<script>alert('Color added successfull'); window.location='color.php'; </script>";
        }
        else{
            echo "<script>alert('Color not successfull')</script>";
        }
            
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" /> -->
    <script src="js/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>Admin panel</title>
    <link rel="stylesheet" href="css/admin.css">

</head>

<body>
    <div class="row">
        <div class="col-md-2">
            <div class="side-pane">
                <div class="page-header">
                    <h1 style="color: white;">Admin</h1>
                </div>
                <table style="width: 100%;">
                    <tr>
                        <td><button id='Add-item' class="panel_btns"><i class="fa fa-plus-circle" aria-hidden="true"></i> Add Item</button></td>
                    </tr>
                    <tr>
                        <td><button id='Add-colour' class="panel_btns"><i class="fa fa-plus-circle" aria-hidden="true"></i> Add color</button></td>
                    </tr>
                    <tr>
                        <td><button id='Add-special' class="panel_btns"><i class="fa fa-plus-circle" aria-hidden="true"></i> Add Special Offers</button></td>
                    </tr>
                    <tr>
                        <td> <button id='Product' class="panel_btns"><i class="fa fa-user-circle" aria-hidden="true"></i> Products</button></td>
                    </tr>
                    <tr>
                        <td><button id='View' class="panel_btns"><i class="fa fa-opencart" aria-hidden="true"></i> View Users</button></td>
                    </tr>
                    <tr>
                        <td><button id='usr_msg' class="panel_btns"><i class="fa fa-opencart" aria-hidden="true"></i> User Review</button></td>
                    </tr>

                    <tr>
                        <td><button id='home-page' class="panel_btns"><i class="fa fa-home" aria-hidden="true"></i> Home Page</button></td>
                    </tr>
                    <tr>
                        <td><button id='logout' class="panel_btns"><i class="fa fa-chevron-right" aria-hidden="true"></i> Logout</button></td>
                    </tr>

                </table>
            </div>
        </div>

        <div class="col-md-6 " id="add-movies-container">
            <div class="p-5 bg-light">
                <div class="container">
                    <h1 class="display-3">Add Colour</h1>
                    </p>
                </div>
            </div>

            <form method="POST" id="form" action="">
                <div class="mb-3">
                    <h6>Product Color</h6>
                    <label for="" class="form-label"></label>
                    <input type="text" class="form-control" name="color" id="color" aria-describedby="helpId" onkeyup="Color()" autocomplete="off">
                    <div id="a"></div>
                </div>
                <button type="submit" name="submit" class="btn btn-primary" id="add-btn">Add</button>
                <button type="reset" class="btn btn-secondary">Reset</button>
        </div>
        </form>
    </div> 
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</body>
<script>
    $("#Product").click(function() {
        window.location.href = "edit_details.php";
    })
    $("#Add-item").click(function() {
        window.location.href = "adminpanel.php";
    })
    $("#home-page").click(function() {
        window.location.href = "index.php";
    })
    $("#logout").click(function() {
        window.location.href = "logout.php";
    })
    $("#View").click(function() {
        window.location.href = "view_user.php";
    })
    $("#usr_msg").click(function() {
        window.location.href = "usr_msg.php";
    })
</script>
<script>
$(document).ready(function () {
    $("form").submit(function (e) {
        if (flag1 != 1) {
            e.preventDefault();
        }

    });
})

flag1 = 0;


function Color() {
    var user = document.getElementById("color").value;
    var letters = /^[A-Za-z]+$/;

    if (!letters.test(user)) {
        document.getElementById("a").innerHTML = "Color Alphabet characters at least 10";
        flag1 = 0;
    } else {
        document.getElementById("a").innerHTML = "";
        flag1 = 1;
    }

}
</script>

</html>