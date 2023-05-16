<?php
// Set up your database connection
include 'db.php';

// Define your SQL query
$sql = "SELECT admins.prdnm, tbl_order.Date, SUM(tbl_order.product_price * tbl_order.quantity) AS total_sales, SUM(tbl_order.quantity) AS total_quantity_sold
        FROM tbl_order
        JOIN admins ON tbl_order.product = admins.prdid
        GROUP BY admins.prdnm, YEAR(tbl_order.Date), WEEK(tbl_order.Date)";

// Execute the query and store the results
$result = mysqli_query($connection, $sql);

// Initialize an array to hold the shoe sales data
$shoeSales = [];

// Check if any results were returned
if (mysqli_num_rows($result) > 0) {
    // Store the shoe sales data in the array
    while($row = mysqli_fetch_assoc($result)) {
        $productName = $row['prdnm'];
        $year = date('Y', strtotime($row['Date']));
        $week = date('W', strtotime($row['Date']));
        $totalSales = $row['total_sales'];
        $totalQuantitySold = $row['total_quantity_sold'];

        if (!isset($shoeSales[$productName])) {
            $shoeSales[$productName] = [];
        }
        if (!isset($shoeSales[$productName][$year])) {
            $shoeSales[$productName][$year] = [];
        }
        if (!isset($shoeSales[$productName][$year][$week])) {
            $shoeSales[$productName][$year][$week] = [
                'total_sales' => 0,
                'total_quantity_sold' => 0,
            ];
        }

        $shoeSales[$productName][$year][$week]['total_sales'] += $totalSales;
        $shoeSales[$productName][$year][$week]['total_quantity_sold'] += $totalQuantitySold;
    }

    // Output the shoe sales report in a table
    echo "<table class='sales-table'><tr><th>Product Name</th><th>Year</th><th>Week</th><th>Total Quantity Sold</th><th>Total Sales</th></tr>";
    foreach ($shoeSales as $productName => $yearData) {
        foreach ($yearData as $year => $weekData) {
            for ($week = 1; $week <= 52; $week++) {
                $totalSales = isset($weekData[$week]) ? $weekData[$week]['total_sales'] : 0;
                $totalQuantitySold = isset($weekData[$week]) ? $weekData[$week]['total_quantity_sold'] : 0;

                echo "<tr><td>" . $productName . "</td><td>" . $year . "</td><td>" . $week . "</td><td>" . $totalQuantitySold . "</td><td>$" . number_format($totalSales, 2) . "</td></tr>";
            }
        }
    }
    echo "</table>";
} else {
    echo "No results found.";
}

// Close the database connection
mysqli_close($connection);
?>
<style>
.sales-table {
  border-collapse: collapse;
  width: 100%;
  border: 2px solid #ddd;
  margin:center;
}

.sales-table th, .sales-table td {
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

  .sales-table th, .sales-table td {
    padding: 8px;
  }

  .sales-table th {
    font-size: 16px;
  }
}
</style>
