<?php
session_start();
include 'db.php';
if (!isset($_SESSION['Username'])) {
  header('location:login.php');
}
?>
<!--//skycons-icons-->
<script src="js/Chart.min.js"></script>
<!--pop up strat here-->
<script src="js/jquery.magnific-popup.js" type="text/javascript"></script>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>






<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    

<div class="col-md-4 price-grid">
                    <div class="price-block">
                        <div class="price-gd-top pric-clr1">
                            <h4>Sales Chart</h4>
                            
                        </div>
                        <div class="price-gd-bottom">
                            <div class="price-list">
                                <ul>
                                <div id="chartContainer" style="height: 370px; width: 100%;">
<?php

include "db.php";

// Query to join the tables and retrieve the required attributes
$query = "SELECT c.price, c.product, c.quantity, p.added_on
FROM tbl_order c
JOIN payment p
ON c.pay_id = p.pay_id
WHERE p.added_on >= DATE_SUB(NOW(), INTERVAL 1 YEAR)";

// Execute the query
$result = mysqli_query($connection, $query);

// Initialize an array to store data points for the chart
$dataPoints = array();

// Initialize variables to store highest and lowest sales
$highestSales = 0;
$lowestSales = PHP_INT_MAX;
$highestSalesProduct = '';
$lowestSalesProduct = '';

// Loop through the query results and add data points to the array
while ($row = mysqli_fetch_assoc($result)) {
$quarter = ceil(date('n', strtotime($row['added_on'])) / 3); // Calculate the quarter of the year
// echo ("<script>console.log('$productName')</script>");
$proIds=$row['product'];
$proArr=mysqli_fetch_array(mysqli_query($connection,"SELECT * FROM `admins` WHERE `prdid` = $proIds"));
$productName = $proArr['prdnm'] .' - Q'.$quarter;

$price = $row["price"];
$brand = $row["quantity"];
// Update highest and lowest sales if necessary
if ($price > $highestSales) {
    $highestSales = $price;
    $highestSalesProduct = $productName;
}
if ($price < $lowestSales) {
    $lowestSales = $price;
    $lowestSalesProduct = $productName;
}

$dataPoints[] = array(
    "label" => $productName,
    "y" => $price,
    "brand" => $brand
);
}

// Add data points for highest and lowest sales to the chart
$dataPoints[] = array(
"label" => "Product with highest sales",
"y" => $highestSales,
"brand" => $highestSalesProduct
);
$dataPoints[] = array(
"label" => "Product with lowest sales",
"y" => $lowestSales,
"brand" => $lowestSalesProduct
);

// Encode the data points array as JSON
$dataPoints = json_encode($dataPoints, JSON_NUMERIC_CHECK);
// HTML code for the chart container
echo '<div id="chartContainer" style="height: 370px; width: 100%;"></div>';

// JavaScript code to render the chart
echo '<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>';
echo '<script>';
echo 'window.onload = function () {';
echo ' var chart = new CanvasJS.Chart("chartContainer", {';
echo ' animationEnabled: true,';
echo ' exportEnabled: true,';
echo ' theme: "light1",';
echo ' title:{';
echo ' text: "Sales Chart"';
echo ' },';
echo ' axisX:{';
echo ' title: "Product Name and Quarter"';
echo ' },';
echo ' axisY:{';
echo ' title: "Price",';
echo ' includeZero: true';
echo ' },';
echo ' data: [{';
echo ' type: "column",';
echo ' dataPoints: ' . $dataPoints . '';
echo ' }]';
echo ' });';
echo ' chart.render();';
echo '}';
echo '</script>';

mysqli_close($connection);
?>


                                    <li>10Gb Bandwidth Monthly</li>
                                    <li>2 Email Account</li>
                                    <li>Unlimited Sub Domains</li>
                                </ul>
                            </div>
                        </div>
                        <div class="price-selet pric-clr1">
                             <a class="popup-with-zoom-anim" href="#small-dialog">Select Plan</a>
                        </div>
                    </div>
</div>
</body>
</html>
