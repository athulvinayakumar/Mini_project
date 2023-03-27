<?php
include('db.php');
?>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<html>
<head>
	<title>Product Sales Chart</title>
	
</head>
<body>
	<canvas id="myChart"></canvas>

	<script>
		// Fetch data from database
		const data = [
			<?php
			$sql = "SELECT prdnm,prqnt FROM `admins`";
			$result = $con->query($sql);

			if ($result->num_rows > 0) {
			  while($row = $result->fetch_assoc()) {
			    echo "{
			      product: '{$row['prdnm']}',
			      quantity: {$row['prqnt']}
			    },";
			  }
			}
			?>
		];

		// Calculate scores
		const products = {};
		const productQuantities = {};

		data.forEach((row) => {
			if (products[row.product]) {
				products[row.product]++;
			} else {
				products[row.product] = 1;
			}

			if (productQuantities[row.quantity]) {
				productQuantities[row.quantity]++;
			} else {
				productQuantities[row.quantity] = 1;
			}
		});

		// Create pie charts
		const productValues = Object.values(products);
		const productQuantityValues = Object.values(productQuantities);

		const productTotal = productValues.reduce((total, value) => total + value, 0);
		const productQuantityTotal = productQuantityValues.reduce((total, value) => total + value, 0);

		const productPercentages = productValues.map((value) => {
			return Math.round((value / productTotal) * 10000) / 100;
		});

		const productQuantityPercentages = productQuantityValues.map((value) => {
			return Math.round((value / productQuantityTotal) * 10000) / 100;
		});

		// Create pie chart
		const ctx = document.getElementById('myChart').getContext('2d');
		const myChart = new Chart(ctx, {
			type: 'pie',
			data: {
				datasets: [{
					data: productPercentages,
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
				labels: Object.keys(products)
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
</html>
