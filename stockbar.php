<?php
session_start();
include 'db.php';
if (!isset($_SESSION['Username'])) {
  header('location:login.php');
}

//Query the database to get product information
$sql = "SELECT prdnm, prqnt, prdpr FROM admins";
$result = $connection->query($sql);

//Create an empty array to store the product data
$data = array();

//Loop through each row of the result and add it to the data array
while ($row = $result->fetch_assoc()) {
    $data[] = $row;
}

//Close the database connection
$connection->close();

//Create a JSON string of the data array
$json_data = json_encode($data);

//Create a JavaScript variable to store the JSON data
echo "<script>";
echo "var product_data = " . $json_data . ";";
echo "</script>";

//Create the graph using Chart.js
?>

<!DOCTYPE html>
<html>
<head>
    <title>Product Stock Graph</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js"></script>
</head>
<body>
    <canvas id="product_graph"></canvas>

    <script>
        var ctx = document.getElementById('product_graph').getContext('2d');
        var chart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: [],
                datasets: [{
                    label: 'Product Stock',
                    data: [],
                    backgroundColor: []
                }]
            },
            options: {
                legend: {
                    display: false
                },
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });

        for (var i = 0; i < product_data.length; i++) {
            chart.data.labels.push(product_data[i].product_name);
            chart.data.datasets[0].data.push(product_data[i].product_stock);
            chart.data.datasets[0].backgroundColor.push('rgba(255, 99, 132, 0.2)');
        }

        chart.update();
    </script>
</body>
</html>
