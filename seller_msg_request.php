<!DOCTYPE html>
<html lang="en">

<head>
    <title>Seller Messages</title>
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
    <h4 style="text-align:center;">User Messages</h4>
    <form action="#" method="POST">
        <table class="table table-dark table-striped">
            <tr>
                <th>Seller name</th>
                <th>Seller Email</th>
                <th>Message</th>
              
                <!-- <th colspan="2"></th> -->
            </tr>
            <?php
            $con = mysqli_connect("localhost", "root", "", "shoess");
            $mysql = "SELECT * FROM `tbl_smsgs` ";
            $result = mysqli_query($con, $mysql);
            while ($row = mysqli_fetch_array($result)) {
            ?>
                <tr>
                    <td><?= $row['seller_name'] ?></td>
                    <td><?= $row['seller_email'] ?></td>
                    <td><?= $row['message'] ?></td>
                    
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


</html>