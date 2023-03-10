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
    <h4 style="text-align:center;">User Details</h4>
    <form action="#" method="POST">
        <table class="table table-dark table-striped">
            <tr>
                <!-- <th>Product Id</th> -->
                <th>Name</th>
                <th>Username</th>
                <th>Phone</th>
                <th>Email</th>
                <th>Address</th>
                <th>Role</th>
            </tr>
            <?php
            $con = mysqli_connect("localhost", "root", "", "shoes");
            $mysql = "SELECT * FROM `auth` ";
            $result = mysqli_query($con, $mysql);
            while ($row = mysqli_fetch_array($result)) {
            ?>
                <tr>
                    <td><?= $row['name'] ?></td>
                    <td><?= $row['username'] ?></td>
                    <td><?= $row['mobile number'] ?></td>
                    <td><?= $row['email'] ?></td>
                    <td><?= $row['address'] ?></td>
                    <?php
                    if ($row['role'] == 1) {
                    ?>
                        <td><span>Admin</span></td>
                    <?php
                    } elseif ($row['role'] == 0) {
                    ?>
                        <td><span>Normal</span></td>
                    <?php
                    }else{?>
<td><span>Seller</span></td>
                  <?php  }
                    ?>

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
        <a href="./adminpanel.php" class="btn btn-success">Back</a>
        <input type="button" name="btn_pdf" id="btn_pdf" onclick="window.location.href = 'user_pdf.php'"  value="Print The Report"/>

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