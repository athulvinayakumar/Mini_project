<?php
include('db.php');
?>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Chart.js Example</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  </head>
  <body>
    <canvas id="myChart"></canvas>
    <script>
      // Define data and labels for pie chart
      var productData = [20, 30, 50];
      var productLabels = ['Product A', 'Product B', 'Product C'];

      // Create pie chart
      var ctx = document.getElementById('myChart').getContext('2d');
      var myChart = new Chart(ctx, {
        type: 'pie',
        data: {
          datasets: [{
            data: productData,
            backgroundColor: [
              'rgba(255, 99, 132, 0.2)',
              'rgba(54, 162, 235, 0.2)',
              'rgba(255, 206, 86, 0.2)'
            ],
            borderColor: [
              'rgba(255, 99, 132, 1)',
              'rgba(54, 162, 235, 1)',
              'rgba(255, 206, 86, 1)'
            ],
            borderWidth: 1
          }],
          labels: productLabels
        },
        options: {
          responsive: true,
          maintainAspectRatio: true,
          legend: {
            display: true,
            position: 'bottom'
          }
        }
      });
    </script>
  </body>
