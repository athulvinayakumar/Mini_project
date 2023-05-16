<?php
session_start();
$sid = $_GET['id'];
$con = mysqli_connect("localhost", "root", "", "shoess");
mysqli_query($con,"DELETE FROM `tbl_seller_reg` WHERE `sid` =$sid");
echo "<script>alert('Rejected')</script>";
echo "<script>location.href='seller_req.php'</script>";
?>