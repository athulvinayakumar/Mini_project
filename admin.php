<?php
include('db.php');
if (isset($_POST['submit'])) {
  $pimage = $_FILES["img"]["name"];
  $pname = $_POST['vk'];
  $color = $_POST['p_color'];
  $brand = $_POST['p_brand'];
  $price = $_POST['ak'];
  $size = $_POST['siz'];
  $targetDir = "product_img/";
  $targetFilePath = $targetDir . $pimage;
  $sql = "INSERT INTO `admins`(`prdnm`, `prdpr`, `color`, `brand`, `prdsiz`, `image`, `status`) VALUES('$pname','$price',' $color','$brand','$size','$pimage','0')";
  $query = mysqli_query($connection, $sql);
  move_uploaded_file($_FILES["img"]["tmp_name"], $targetFilePath);
  if ($query) {
    echo "<script>alert('Item added successful!!')</script>";
    echo "<script> window.location='adminpanel.php';</script>";
  }
}
?>