<?php
include('db.php');
if (isset($_POST['submit'])) {
  $pimage = $_FILES["img"]["name"];
  $pname = $_POST['vk'];
  $discription = $_POST['discription'];
  $brand = $_POST['p_brand'];
  $price = $_POST['ak'];
  $targetDir = "product_img/";
  $targetFilePath = $targetDir . $pimage;
  $sql = "INSERT INTO `admins`(`prdnm`, `prdpr`, `discription`, `brand`, `image`, `status`) VALUES('$pname','$price',' $discription','$brand','$pimage','0')";
  $query = mysqli_query($connection, $sql);
  move_uploaded_file($_FILES["img"]["tmp_name"], $targetFilePath);
  if ($query) {
    echo "<script>alert('Item added successfully!!')</script>";
    echo "<script> window.location='adminpanel.php';</script>";
  }
}
?>