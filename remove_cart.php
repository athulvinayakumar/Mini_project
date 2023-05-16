<?php
session_start();
$pid = $_GET['id'];
$uid = $_GET['uid'];
$con = mysqli_connect("localhost", "root", "", "shoess");
$sql = "DELETE from `cart` WHERE `id` = $uid AND `pid` = $pid";
mysqli_query($con, $sql);
echo "<script>alert('Successfully removed')</script>";
echo "<script>location.href='cart.php'</script>";
?>