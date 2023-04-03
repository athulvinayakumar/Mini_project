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
    <h4 style="text-align:center;"><P>PAYMENTS</P></h4>
    <form action="#" method="POST">
        <table class="table table-dark table-striped">
            <tr>
                <th>User Name</th>
                <th>Amount</th>
                <th>Payment Status</th>
                <th>Payment id</th>
                <th>Date</th>
               
               
            </tr>
            <?php
            $con = mysqli_connect("localhost", "root", "", "shoes");
            $mysql = "SELECT * FROM `payment` ";
            $result = mysqli_query($con, $mysql);
            while ($row = mysqli_fetch_array($result)) {
            ?>
                <tr>
                    <td><?= $row['name'] ?></td>
                    <td><?= $row['amount'] ?></td>
                    <td><?= $row['payment_status'] ?></td>
                    <td><?= $row['payment_id'] ?></td>
                    <td><?= $row['added_on'] ?></td>
            
                </tr>



            <?php
            }
            ?>
        </table>
    </form>
    <div class="d-flex justify-content-md-center">
        <a href="./adminpanel.php" class="btn btn-success">Back</a>
        <a href="payment_pdf.php" name="btn_pdf" id="btn_pdf" class="btn btn-primary" style="margin-left: 10px;">Print The Report</a>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</html>