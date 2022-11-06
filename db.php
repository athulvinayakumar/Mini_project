<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "shoes";

// create connection
$connection = new mysqli($servername, $username, $password, $database);

// check connection
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

// $con = mysqli_connect("localhost","root","","shoes");
// if (mysqli_connect_errno()){
// echo "Failed to connect to MySQL: " . mysqli_connect_error();
// die();
// }

// date_default_timezone_set('Asia/Karachi');
// $error="";