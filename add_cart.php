<?php
$cart_ids=$_GET['id'];
session_start();
error_reporting(E_ERROR | E_PARSE);
// $values = $_SESSION['cart_btn_id'];
// setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day
$values=$_COOKIE["cart"];
$carts = explode(" ", $values);
foreach ($carts as $cart_id) {
    if ($cart_ids == $cart_id) {
        $temp = 1;
    }
}
if ($temp == 1) {
    echo ("<script>alert('Already added')</script>");
} else {
    $_SESSION['cart_btn_id'] = $_SESSION['cart_btn_id'] . " " . $cart_ids;
    $test=$_SESSION['cart_btn_id'];
    setcookie("cart", $test);

    echo ("<script>alert('successfully added')</script>");
}
echo ("<script>location.href='product.php'</script>");

?>