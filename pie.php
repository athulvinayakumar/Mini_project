
<?php
include('db.php');



// Initialize image
$image_width = 500;
$image_height = 500;
$image = imagecreatetruecolor($image_width, $image_height);

// Define colors
$background_color = imagecolorallocate($image, 255, 255, 255);
$border_color = imagecolorallocate($image, 0, 0, 0);

// Fill background color
imagefilledrectangle($image, 0, 0, $image_width, $image_height, $background_color);

// Fetch data from database
$sql = "SELECT prdnm,prqnt FROM `admins`";
$result = $con->query($sql);

// Calculate scores
$products = array();
$product_quantities = array();

if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
    if (array_key_exists($row['prdnm'], $products)) {
      $products[$row['prdnm']]++;
    } else {
      $products[$row['prdnm']] = 1;
    }
    
    if (array_key_exists($row['prqnt'], $product_quantities)) {
      $product_quantities[$row['prqnt']]++;
    } else {
      $product_quantities[$row['prqnt']] = 1;
    }
  }
}

// Create pie charts
$product_values = array_values($products);
$product_quantity_values = array_values($product_quantities);

$product_total = array_sum($product_values);
$product_quantity_total = array_sum($product_quantity_values);

$product_percentages = array_map(function($value) use ($product_total) {
  return round(($value / $product_total) * 100, 2);
}, $product_values);

$product_quantity_percentages = array_map(function($value) use ($product_quantity_total) {
  return round(($value / $product_quantity_total) * 100, 2);
}, $product_quantity_values);
?>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<canvas id="myChart"></canvas>
<script>
// Define data and labels for pie chart
var productData = <?php echo json_encode($product_percentages); ?>;
var productQuantityData = <?php echo json_encode($product_quantity_percentages); ?>;

var productLabels = <?php echo json_encode(array_keys($products)); ?>;
var productQuantityLabels = <?php echo json_encode(array_keys($product_quantities)); ?>;

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
    responsive: true,
    maintainAspectRatio: true,
    width: 100,
    height: 200,
    legend: {
      display: true,
      position: 'bottom'
    }
  }
});

var ctx
