<!DOCTYPE html>
<?php error_reporting(E_ERROR | E_PARSE); ?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>STEPSOUT</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <?php
    // Set up your database connection
    include 'db.php';

    // Define your SQL queries
    $monthlyRevenueSQL = "SELECT MONTH(Date) AS month, SUM(product_price * quantity) AS revenue
                     FROM tbl_order
                     GROUP BY MONTH(Date)";
    // $productSalesSQL = "SELECT admins.prdnm,tbl_order.product,tbl_order.oid, SUM(tbl_order.product_price * tbl_order.quantity) AS total_sales, SUM(tbl_order.quantity) AS total_quantity_sold
    //                 FROM tbl_order
    //                 JOIN admins ON tbl_order.product = admins.prdid
    //                 GROUP BY admins.prdnm";

    // Execute the queries and store the results
    $monthlyRevenueResult = mysqli_query($connection, $monthlyRevenueSQL);
    // $productSalesResult = mysqli_query($connection, $productSalesSQL);

    // Initialize an array to hold the monthly revenue data
    $monthlyRevenue = [];

    // Check if any monthly revenue results were returned
    if (mysqli_num_rows($monthlyRevenueResult) > 0) {
        // Store the monthly revenue data in the array
        while ($row = mysqli_fetch_assoc($monthlyRevenueResult)) {
            $monthlyRevenue[$row['month']] = $row['revenue'];
        }
    }
    ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-6">
                <?php
                // Output the revenue report in a table
                echo "<h2>Monthly Revenue Report</h2>";
                echo "<table class='revenue-table'><tr><th>Month</th><th>Revenue</th></tr>";
                for ($i = 1; $i <= 12; $i++) {
                    $monthName = date('F', mktime(0, 0, 0, $i, 1));
                    $revenue = isset($monthlyRevenue[$i]) ? $monthlyRevenue[$i] : 0;
                    echo "<tr><td>" . $monthName . "</td><td>$" . number_format($revenue, 2) . "</td></tr>";
                }
                echo "</table>"; ?><br>
                <div style="text-align: center;"><a href="adminpanel.php" class="btn btn-primary">Back</a></div>
            </div>
            <div class="col-6">
                <h2>Product Sales Report</h2><br>
                <form action="#" method="POST">
                    <input type="date" name="date1" id="a" class="form-control">
                    to
                    <input type="date" name="date2" id="b" class="form-control"><br>
                    <input type="submit" class="form-control" id="c" name="subBtn">
                </form>
                <?php
                if (isset($_POST['subBtn'])) {
                    $date1 = $_POST['date1'];
                    $date2 = $_POST['date2'];

                    $productSalesSQL = "SELECT admins.prdnm, tbl_order.product, tbl_order.oid, SUM(tbl_order.product_price * tbl_order.quantity) AS total_sales, SUM(tbl_order.quantity) AS total_quantity_sold
                    FROM tbl_order
                    JOIN admins ON tbl_order.product = admins.prdid
                    WHERE Date BETWEEN '$date1' AND '$date2'
                    GROUP BY admins.prdnm";
                    $productSalesResult = mysqli_query($connection, $productSalesSQL);
                    // Initialize a variable to hold the total amount
                    $totalAmount = 0;
                    // Check if any product sales results were returned
                    if (mysqli_num_rows($productSalesResult) > 0) {
                        // $date1=$_POST['date'];
                        // $date2=$_POST['date2'];
                        // Output the results in a table
                        echo "<h2>Product Sales Report</h2>";
                        echo "<table class='sales-table'><tr><th>Order ID</th><th>Product ID</th><th>Product Name</th><th>Total Quantity Sold</th><th>Total Sales</th></tr>";
                        while ($row = mysqli_fetch_assoc($productSalesResult)) {
                            echo "<tr><td>" . $row["oid"] . "</td><td>" . $row["product"] . "</td><td>" . $row["prdnm"] . "</td><td>" . $row["total_quantity_sold"] . "</td><td>$" . number_format($row["total_sales"], 2) . "</td></tr>";

                            // Add the total sales to the total amount variable
                            $totalAmount += $row["total_sales"];
                        }
                        echo "<tr class='total-row'><td><strong>Total Amount:</strong></td><td></td><td></td><td></td><td><strong>$" . number_format($totalAmount, 2) . "</strong></td></tr>";
                        echo "</table>";
                    } else {
                        echo "No product sales results found.";
                    }

                    // Close the database connection
                    mysqli_close($connection);
                }
                ?>
                <br>
                <div style="text-align: center;"><button class="btn btn-flat btn-success" type="button" id="print" onclick="printWithoutElement('p1')">Print</button>
                </div>
            </div>
        </div>


        <style>
            .revenue-table {
                border-collapse: collapse;
                width: 100%;
            }

            .revenue-table th,
            .revenue-table td {
                text-align: center;
                padding: 10px;
                border: 1px solid #ddd;
            }

            .revenue-table th {
                background-color: #fff;
                color: #333;
                font-weight: bold;
                font-size: 18px;
                text-transform: uppercase;
            }

            .revenue-table td {
                font-size: 16px;
                color: #666;
            }

            .revenue-table tr:nth-child(even) {
                background-color: #f2f2f2;
            }

            @media only screen and (max-width: 600px) {
                .revenue-table {
                    font-size: 12px;
                }

                .revenue-table th,
                .revenue-table td {
                    padding: 8px;
                }

                .revenue-table th {
                    font-size: 14px;
                }
            }
        </style>
        <style>
            .sales-table {
                border-collapse: collapse;
                width: 100%;
                border: 2px solid #ddd;
            }

            .sales-table th,
            .sales-table td {
                text-align: center;
                padding: 10px;
            }

            .sales-table th {
                background-color: #4285f4;
                color: #fff;
                font-weight: bold;
                font-size: 20px;
                text-transform: uppercase;
            }

            .sales-table td {
                font-size: 18px;
                color: #333;
            }

            .sales-table tr:nth-child(even) {
                background-color: #f2f2f2;
            }

            .sales-table tr:hover {
                background-color: #ddd;
            }

            .sales-table .total-row td {
                font-weight: bold;
                font-size: 20px;
            }

            @media only screen and (max-width: 600px) {
                .sales-table {
                    font-size: 14px;
                }

                .sales-table th,
                .sales-table td {
                    padding: 8px;
                }

                .sales-table th {
                    font-size: 16px;
                }
            }
        </style>
        <script>
            function printWithoutElement(print) {
                
                window.print();
            }
        </script>
</body>

</html>