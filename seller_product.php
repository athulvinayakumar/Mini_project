<?php
    session_start();
    $sid=$_SESSION['usr_id'];
?>
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
    <h4 style="text-align:center;">Edit Details</h4>
    <form action="#" method="POST">
        <table class="table table-dark table-striped">
            <tr>
                <!-- <th>Product Id</th> -->
                <th>Product Name</th>
                <th>Seller Name</th>
                <th>Product Quantity</th>
                <th>Product Price</th>
                <th>Product Discription</th>
                <th>Product Brand</th>
                <th>Product Image</th>
                <th>Action</th>
            </tr>
            <?php
            $con = mysqli_connect("localhost", "root", "", "shoess");
            $mysql = "SELECT * FROM `tbl_seller` WHERE `s_id` =$sid ";
            $result = mysqli_query($con, $mysql);
            while ($row = mysqli_fetch_array($result)) {
            ?>
                <tr>
                    <td><?= $row['s_name'] ?></td>
                    <td><?= $row['name'] ?></td>
                    <td><?= $row['s_qnt'] ?></td>
                    <td><?= $row['s_price'] ?></td>
                    <td><?= $row['s_drs'] ?></td>
                    <td><?= $row['s_brand'] ?></td>
                    <td><img class="product_img" src="./product_img/<?= $row['s_image'] ?>"></td>
                    <td><a href="seller_details.php?id=<?= $row['s_id'] ?>" class="btn btn-success">Edit</a></td>
                </tr>


                <!-- <?php
                        // if($row['status']==1){
                        //     echo '<p><a href="inactive.php?id='.$row['pid'].'$status=1">Disable</a></p>';
                        // }
                        // else{
                        //     echo '<p><a href="active.php?id='.$row['pid'].'$status=0">Enable</a></p>';
                        // }
                        // 
                        ?>
                    // </td>
                    // <td>
                    //     <a href="productedit.php?pid=<?php echo $row['pid'] ?>">EDIT</a></td>
                    //  </tr>";  <?php
                                    //                      $cnt++;   }
                                    //                   }     
                                    // else{
                                    //     echo "Query Error : " . "SELECT * FROM leaves WHERE status='Pending'" . "<br>" . mysqli_error($con);
                                    // }
                                    ?> -->

            <?php
            }
            ?>
        </table>
    </form>
    <div class="d-flex justify-content-md-center">
        <a href="./seller.php" class="btn btn-success">Back</a>
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