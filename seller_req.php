<!DOCTYPE html>
<html lang="en">

<head>
    <title>ADMIN</title>
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
    <h4 style="text-align:center;"><P>PENDING REQUEST</P></h4>
    <form action="#" method="POST">
        <table class="table table-dark table-striped">
            <tr>
                <th>Seller Name</th>
                <th>Seller Email</th>
                <th>Phone Number</th>
                <th>Details</th>
                <th>Address</th>
                <th>Action</th>
                <th>Action</th>  
            </tr>
            <?php
            $con = mysqli_connect("localhost", "root", "", "shoess");
            $mysql = "SELECT * FROM `tbl_seller_reg` ";
            $result = mysqli_query($con, $mysql);
            while ($row = mysqli_fetch_array($result)) {
            ?>
                <tr>
                    <td><?= $row['name'] ?></td>
                    <td><?= $row['email'] ?></td>
                    <td><?= $row['phn_number'] ?></td>
                    <td><a href="./product_file/<?= $row['aadhar_card'] ?>" target="_blank"><?= $row['aadhar_card'] ?></a></td>
                    <td><?= $row['address'] ?></td>
                    <td><a href="seller_req_approve.php?id=<?= $row['sid'] ?>" class="btn btn-primary">Approve</a></td>
                    <td><a href="seller_req_reject.php?id=<?= $row['sid'] ?>" class="btn btn-danger">Reject</a></td>            
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