<?php
session_start();
$cart_id = $_GET['id'];
// $values = $_SESSION['cart_btn_id'];
$values = $_COOKIE["cart"];
$cart_ids = explode(" ", $values);
$cart_ids[array_search("$cart_id", $cart_ids)] = "";
$cart = implode(" ", $cart_ids);
// $_SESSION['cart_btn_id'] = $cart;
setcookie("cart", $cart);
echo "<script>alert('Successfully removed')</script>";
echo "<script>location.href='cart.php'</script>";
?>