<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "shoess";

// create connection
$connection = new mysqli($servername, $username, $password, $database);

// check connection
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}