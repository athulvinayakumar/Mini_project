<?php
session_start();
$sid = $_GET['id'];
$con = mysqli_connect("localhost", "root", "", "shoess");
$sql = "SELECT * FROM `tbl_seller_reg` WHERE `sid` = $sid";
$sellerData=mysqli_query($con, $sql);
$row=mysqli_fetch_array($sellerData);
$name = $row['name'];
$username = $row['username'];
$password = $row['password'];
$phn_number = $row['phn_number'];
$email = $row['email'];
$address = $row['address'];
$query="INSERT INTO `auth`(`name`, `username`, `password`, `mobile_number`, `email`, `address`, `role`)
 VALUES ('$name','$username','$password','$phn_number','$email','$address','2')";
 mysqli_query($con,$query);
 mysqli_query($con,"DELETE FROM `tbl_seller_reg` WHERE `sid` =$sid");
echo "<script>alert('Approved')</script>";
echo "<script>location.href='./seller_req.php'</script>";
?>