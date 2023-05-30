<?php
session_start();
include 'db.php';
if (!isset($_SESSION['Username'])) {
  header('location:login.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>STEPSOUTS</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            background-color: #f2f2f2;
        }

        table {
            border-collapse: collapse;
            width: 80%;
            margin: auto;
            margin-top: 50px;
        }

        th,
        td {
            text-align: left;
            padding: 12px;
            border: 1px solid #ddd;
        }

        th {
            background-color: #4CAF50;
            color: white;
        }

        h1 {
            text-align: center;
            margin-top: 50px;
        }

        .no-orders {
            text-align: center;
            margin-top: 50px;
            font-size: 20px;
            font-weight: bold;
        }
    </style>
</head>

<body>

    <?php
    // Database connection credentials
    include "db.php";

    date_default_timezone_set('Asia/Kolkata'); // change according timezone
    $CURDATE = date('Y-m-d');

    // Create connection

    // Check connection
    if ($connection->connect_error) {
        die("Connection failed: " . $connection->connect_error);
    }

    // Retrieve today's order list from the database
    $sql = "SELECT * FROM tbl_order WHERE status='pending'";
    $result = $connection->query($sql);

    // Display the order list in a table
    if ($result->num_rows > 0) {
        echo "<h1>Pending Orders</h1>";
        echo "<table>";
        echo "<tr><th>Order ID</th>
            <th>Customer Name</th>
            <th>Product</th>
            <th>Total Amount</th>
            <th>Order Date</th>
            <th>Order Time</th>
            <th>Order Details</th>
            <th>Action</th></tr>";
        while ($row = $result->fetch_assoc()) {
            $usrIds=$row['id'];
            $proIds=$row['product'];
            $ordId=$row['oid'];
            $usrArr=mysqli_fetch_array(mysqli_query($connection,"SELECT * FROM `auth` WHERE `id` =$usrIds"));
            $proArr=mysqli_fetch_array(mysqli_query($connection,"SELECT * FROM `admins` WHERE `prdid` = $proIds"));
            echo "<tr><td>" . $row["oid"] . "</td><td>" . $usrArr['name'] . "</td><td>" . $proArr['prdnm'] ."</td><td>" . $row["price"] ."</td><td>" . $row["Date"] . "</td><td>" . $row["time"] . "</td><td>" . $row["status"] . "</td>
            <td><a href='updateOrder1.php?id=$ordId' class='btn btn-primary'>Edit</a></td>
            </tr>";
        }
        echo "</table>";
    } else {
        echo "<div class='no-orders'>No pending orders</div>";
    }

    // Close connection
    $connection->close();
    ?><br>
    <center> <a href="adminpanel.php" class="btn btn-success">Back</a></center>
</body>

</html>