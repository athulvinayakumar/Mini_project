<?php
session_start();
$pid = $_GET['id'];
$con = mysqli_connect("localhost", "root", "", "shoes");
$sql = "UPDATE `tbl_seller` SET `status`=0 WHERE `s_id` = $pid";
mysqli_query($con, $sql);
echo "<script>alert('Approved')</script>";
echo "<script>location.href='seller_products.php'</script>";
?>