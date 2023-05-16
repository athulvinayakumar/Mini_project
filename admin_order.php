<!DOCTYPE html>
<html lang="en">

<head>
    <title>Order list</title>
    <!-- CSS only -->
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .product_img {
            width: 20%;
            height: 20%;
        }

        body {
            margin-left: 3%;
            margin-right: 3%;
        }
    </style>

</head>

<body>
    <h4 style="text-align:center;">Order list</h4>
    <form action="#" method="POST">
        <table class="table table-dark table-striped">
            <tr>
                <th>Order id</th>
                <!-- <th>Name</th> -->
                <th>Product id</th>
                <th>Address</th>
                <th>Total Price</th>  
                <th>Product price</th>  
                <th>Quantity</th>  
                <th>Date and Time</th>  
                <!-- <th colspan="2"></th> -->
            </tr>
            <?php

            $con = mysqli_connect("localhost", "root", "", "shoess");
            $mysql = "SELECT * FROM tbl_order";
            $result = mysqli_query($con, $mysql);
            while ($row = mysqli_fetch_array($result)) {
            ?>
                <tr>
                    <td><?= $row['oid'] ?></td>
                    <!-- <td><?= $user ?></td> -->
                    <td><?= $row['product'] ?></td>
                    <td><?= $row['address'] ?></td>
                    <td><?= $row['price'] ?></td>
                    <td><?= $row['product_price'] ?></td>
                    <td><?= $row['quantity'] ?></td>
                    <td><?= $row['Date'] ?></td>
                    <!-- <td><a class="btn btn-success">Approve</a></td>

                    <td><a class="btn btn-danger status_btn">Reject</a></td> -->

                </tr>


               

            <?php
            }
            ?>
        </table>
    </form>
    <div class="d-flex justify-content-md-center">
        <a href="./adminpanel.php" class="btn btn-success">Back</a>
    </div>
</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<!-- <script>
    $(".disable_btn").show();
    $(".enable_btn").hide();
    $(".disable_btn").click(function() {
        // window.location.href = "inactive.php";
        $(".disable_btn").hide();
        $(".enable_btn").show();
    })
    $(".enable_btn").click(function() {
        // window.location.href = "inactive.php";
        $(".disable_btn").show();
        $(".enable_btn").hide();
    })
</script> -->

</html>