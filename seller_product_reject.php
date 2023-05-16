<?php
session_start();
$pid = $_GET['id'];
$con = mysqli_connect("localhost", "root", "", "shoess");
$sql = "UPDATE `tbl_seller` SET `status`=1 WHERE `s_id` = $pid";
mysqli_query($con, $sql);
echo "<script>alert('Rejected')</script>";
echo "<script>location.href='seller_products.php'</script>";
?>