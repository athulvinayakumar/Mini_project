<?php
session_start();
include 'db.php';
if (!isset($_SESSION['Username'])) {
    header('location:login.php');
}
$sid=$_SESSION['usr_id'];
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
    <title>STEPSOUT</title>
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
    <div class="row">
        <div class="col-md-2">
            <div class="side-pane">
                <div class="page-header">
                    <h1 style="color: white;">Seller</h1>
                </div>
                <table style="width: 100%;">
                    <tr>
                        <td><button id='Add-item' class="panel_btns"><i class="fa fa-plus-circle" aria-hidden="true"></i> Add Item</button></td>
                    </tr>
                    <tr>
                        <td> <button id='seller_product' class="panel_btns"><i class="fa fa-user-circle" aria-hidden="true"></i> Products</button></td>
                    </tr>
                    <tr>
                        <td><button id='sellerGraph' class="panel_btns"><i class="fa fa-chevron-right" aria-hidden="true"></i> Seller Graph</button></td>
                    </tr>
                    <tr>
                        <td><button id='order' class="panel_btns"><i class="fa fa-chevron-right" aria-hidden="true"></i> Orders</button></td>
                    </tr>
                    <tr>
                        <td> <button id='alert' class="panel_btns"><i class="fa fa-user-circle" aria-hidden="true"></i> Alerts</button></td>
                    </tr>
                    <tr>
                        <td><button id='smsgs' class="panel_btns"><i class="fa fa-chevron-right" aria-hidden="true"></i> Send Messages</button></td>
                    </tr>
                    <tr>
                        <td><button id='pro' class="panel_btns"><i class="fa fa-chevron-right" aria-hidden="true"></i>Profile</button></td>
                    </tr>
                    <tr>
                        <td><button id='logout' class="panel_btns"><i class="fa fa-chevron-right" aria-hidden="true"></i> Logout</button></td>
                    </tr>

                </table>
            </div>
        </div>


        <!-- add movies container -->

        <div class="col-md-6 " id="add-movies-container">
            <div class="p-5 bg-light">
                <div class="container">
                    <h1 class="display-3">Add new Items</h1>
                    </p>
                </div>
            </div>

            <form method="post" id="form" enctype="multipart/form-data">
                <div class="mb-3">
                    <h6>Product name</h6>
                    <label for="" class="form-label"></label>
                    <input type="text" class="form-control" name="vk" id="b" aria-describedby="helpId" onkeyup="product()" autocomplete="off">
                    <div id="message2"></div>
                </div>
                <div class="mb-3">
                    <h6>Seller name</h6>
                    <label for="" class="form-label"></label>
                    <input type="text" class="form-control" name="sk" id="d" aria-describedby="helpId" onkeyup="seller()" autocomplete="off">
                    <div id="message 1"></div>
                </div>
                <div class="mb-3">
                    <h6>Product Price</h6>
                    <label for="" class="form-label"></label>
                    <input type="text" class="form-control" name="ak" id="c" aria-describedby="helpId" onkeyup="pro_price()" autocomplete="off">
                    <div id="message3"></div>
                </div>
                <div class="mb-3">
                    <h6>Product Quantity</h6>
                    <label for="" class="form-label"></label>
                    <input type="text" class="form-control" name="fk" id="s" aria-describedby="helpId" onkeyup="quantity()" autocomplete="off">
                    <div id="message4"></div>
                </div>
                <div class="mb-3">
                    <h6>Product Description</h6>
                    <label for="" class="form-label"></label>
                    <textarea class="form-control" name="p_drs" id="a" rows="2" onkeyup="colour()" autocomplete="off"></textarea>
                    <div id="message5"></div>
                </div>
                <div class="mb-3">
                    <h6>Product Brand</h6>
                    <label for="" class="form-label"></label>
                    <select name="p_brand" class="form-control">
                        <?php
                        $sql = "SELECT * FROM `bands`";
                        $result = mysqli_query($connection, $sql);
                        while ($row = mysqli_fetch_array($result)) {
                        ?>
                            <option value="<?= $row['b_name'] ?>"><?= $row['b_name'] ?></option>
                        <?php
                        }
                        ?>
                    </select>
                </div>
                <div class="mb-3">
                    <h6>Product image</h6>
                    <label for="" class="form-label"></label>
                    <input type="file" class="form-control" name="img" id="e" aria-describedby="helpId" onchange="unames()" autocomplete="off">
                    <div id="message5"></div>
                </div>

                <button type="submit" name="submit" class="btn btn-primary" id="add-btn">Add</button>
                <button type="reset" class="btn btn-secondary">Reset</button>
        </div>
        </form>
        <?php
        include('db.php');
        if (isset($_POST['submit'])) {
            $pimage = $_FILES["img"]["name"];
            $pname = $_POST['vk'];
            $sname = $_POST['sk'];
            $quantity = $_POST['fk'];
            $descrption = $_POST['p_drs'];
            $brand = $_POST['p_brand'];
            $price = $_POST['ak'];
            $targetDir = "product_img/";
            $targetFilePath = $targetDir . $pimage;
            $sql = "INSERT INTO `tbl_seller`(`s_id`,`s_name`,`name`,`s_qnt`,`s_price`, `s_drs`, `s_brand`, `s_image`) VALUES ('$sid','$pname','$sname', '$quantity','$price','$descrption','$brand','$pimage')";
            $query = mysqli_query($connection, $sql);
            move_uploaded_file($_FILES["img"]["tmp_name"], $targetFilePath);
            if ($query) {
                echo "<script>alert('Item added successful!!')</script>";
                echo "<script> window.location='seller.php';</script>";
            }
        }
        ?>
    </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="seller.js"></script>
</body>


<script>
    $("#seller_product").click(function() {
        window.location.href = "seller_product.php";
    })
    $("#smsgs").click(function() {
        window.location.href = "seller_msgs.php";
    })
    $("#logout").click(function() {
        window.location.href = "logout.php";
    })
    $("#View").click(function() {
        window.location.href = "view_user.php";
    })
    $("#alert").click(function() {
        window.location.href = "notify.php";
    })
    $("#pro").click(function() {
        window.location.href = "seller_profile.php";
    })
    $("#sellerGraph").click(function() {
        window.location.href = "seller_graph.php";
    })
    $("#order").click(function() {
        window.location.href = "orders.php";
    })
</script>

</html>