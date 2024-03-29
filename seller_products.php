<!DOCTYPE html>
<html lang="en">

<head>
    <title>Update</title>
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
    <h4 style="text-align:center;">Seller Products</h4>
    <form action="#" method="POST">
        <table class="table table-dark table-striped">
            <tr>
                <!-- <th>Product Id</th> -->
                <th>Product Name</th>
                <th>Product Price</th>
                <th>Product Discription</th>
                <th>Product Brand</th>
                <th>Product Image</th>
                <th>Action</th>
                <th>Action</th>
            </tr>
            <?php
            $con = mysqli_connect("localhost", "root", "", "shoess");
            $mysql = "SELECT * FROM `tbl_seller` WHERE `status` ='pending'";
            $result = mysqli_query($con, $mysql);
            while ($row = mysqli_fetch_array($result)) {
            ?>
                <tr>
                    <td><?= $row['s_name'] ?></td>
                    <td><?= $row['s_price'] ?></td>
                    <td><?= $row['s_drs'] ?></td>
                    <td><?= $row['s_brand'] ?></td>
                    <td><img class="product_img" src="./product_img/<?= $row['s_image'] ?>"></td>
                    <td><a href="seller_product_approve.php?id=<?= $row['s_id'] ?>" class="btn btn-primary status_btn">Approve</a></td>
                    <td><a href="seller_product_reject.php?id=<?= $row['s_id'] ?>" class="btn btn-danger status_btn">Reject</a></td>
    

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