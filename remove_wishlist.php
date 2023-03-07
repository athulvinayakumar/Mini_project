<?php
session_start();
$pid = $_GET['id'];
$uid = $_GET['uid'];
$con = mysqli_connect("localhost", "root", "", "shoes");
$sql = "UPDATE `tbl_wishlist` SET `status`=0 WHERE `id` = $uid AND `pid` = $pid";
mysqli_query($con, $sql);
echo "<script>alert('Successfully removed')</script>";
echo "<script>location.href='wishlist.php'</script>";
?>