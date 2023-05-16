<!DOCTYPE html>
<html>
<head>
	<title>STEPSOUT</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<style>
		body {
	background-color: #f5f5f5;
	background-image: url("https://www.transparenttextures.com/patterns/dark-stripes.png");
	font-family: 'Montserrat', sans-serif;
}

.container {
	display: flex;
	flex-direction: column;
	align-items: center;
	justify-content: center;
	height: 100vh;
	padding: 10px;
	box-sizing: border-box;
}

.form {
	display: flex;
	flex-direction: column;
	align-items: center;
	justify-content: center;
	background-color: #fff;
	border-radius: 10px;
	padding: 20px;
	box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
	max-width: 80%;
	width: 300px;
}

h2 {
	margin-top: 0;
	font-size: 32px;
	color: #333;
	text-align: center;
	text-transform: uppercase;
	letter-spacing: 2px;
	font-weight: bold;
}

button {
	background-color: #00bcd4;
	color: #fff;
	padding: 10px 20px;
	border: none;
	border-radius: 50px;
	margin-top: 10px;
	cursor: pointer;
	font-size: 18px;
	transition: all 0.3s ease;
	min-width: 150px;
	text-transform: uppercase;
	letter-spacing: 1px;
	position: relative;
	overflow: hidden;
}
		input[type="text"] {
			padding: 10px;
			border: none;
			border-radius: 5px;
			margin-top: 10px;
			font-size: 16px;
			width: 100%;
			box-sizing: border-box;
		}
		button {
			background-color: #00bcd4;
			color: #fff;
			padding: 10px 20px;
			border: none;
			border-radius: 50px;
			margin-top: 10px;
			cursor: pointer;
			font-size: 18px;
			transition: all 0.3s ease;
			min-width: 150px;
			text-transform: uppercase;
			letter-spacing: 1px;
			position: relative;
			overflow: hidden;
			width: 100%;
		}
		button:hover {
			background-color: #0097a7;
		}
		button::before {
			content: "";
			position: absolute;
			top: 0;
			left: 0;
			width: 100%;
			height: 100%;
			background-color: rgba(255, 255, 255, 0.2);
			z-index: -1;
			transform: scale(0);
			transition: transform 0.3s ease;
		}
		button:hover::before {
			transform: scale(1);
		}
		button i {
			font-size: 18px;
			margin-right: 10px;
		}
		@media screen and (max-width: 600px) {
			.form {
				max-width: 100%;
				width: 100%;
			}
		}
	</style>
</head>
<body>

	<div class="container">
		<form method="post" action="" class="form">
			<h2>View Overall Sales</h2>	
			<button type="submit" class="btn btn-success" name="button1">View</button>
		</form>
	</div>

</body>
</html>


<?php
if (isset($_POST['button1'])) {
	header("Location: http://127.0.0.1:5000");
	exit;
}
?>
