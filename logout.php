<?php
include 'login.php';
session_destroy();
// $_SESSION['Username'] = null;
echo "<script> window.location='index.php';</script>";

// header('location: LOGIN.php');
// header('location: http://localhost/shoes/login.php?name=login');
?>