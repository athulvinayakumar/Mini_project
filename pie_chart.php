<?php
include('db.php');
$con = mysqli_connect("localhost", "root", "", "shoes");
$sql = "SELECT prdnm,prqnt FROM `admins`";
$result = mysqli_query($con, $sql);
$data = array();
$data[] = array('Product Name', 'Quantity');
while ($row = mysqli_fetch_array($result)) {
    $data[] = array($row['prdnm'], (int) $row['prqnt']);
}
?>
<html>
<head>
	<title>Pie Chart</title>
	<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
	<script type="text/javascript">
		google.charts.load('current', {'packages':['corechart']});
		google.charts.setOnLoadCallback(drawChart);

		function drawChart() {
      var data = google.visualization.arrayToDataTable(<?php echo json_encode($data); ?>);

			var options = {
				title: 'Product Quantities',
				is3D: true,
				legend: 'none'
			};

			var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
			chart.draw(data, options);
		}
	</script>
</head>
<body>
	<div id="piechart_3d" style="width: 900px; height: 500px;"></div>
</body>
</html>
<?php
// Close database connection
mysqli_close($con);
?>