<?php
session_start();
$con = mysqli_connect("localhost", "root", "", "shoes");
error_reporting(E_ERROR | E_PARSE);
$user = $_SESSION['usr_id'];
if ($user == null) {
    echo '<script>alert("Please login"); location.href = "login.php"</script>';
} else {
    $cart_ids = $_GET['id'];
    $a = $_SESSION['cart_id'];
    $sql = "SELECT * FROM cart WHERE `cart_id` ='$a' AND `pid`='$cart_ids' AND `id` = '$user'";
    $result = mysqli_query($con, $sql);
    if ($result) {
        if (mysqli_num_rows($result) > 0) {

            echo "<script>alert('Product already added');location.href = 'cart.php' </script>";
        } else {
            $sql = "INSERT INTO `cart`(`id`, `pid`,`quantity`,`status`) VALUES ('$user','$cart_ids','1','1')";
            mysqli_query($con, $sql);
            echo '<script>alert("Success");  location.href = "product.php"</script>';
        }
    }
}
