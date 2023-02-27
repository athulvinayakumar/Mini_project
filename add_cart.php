<?php
session_start();
$con = mysqli_connect("localhost", "root", "", "shoes");
error_reporting(E_ERROR | E_PARSE);
$user = $_SESSION['usr_id'];
if ($user == null) { ?>
    <script>
        alert("Pls login")
    </script>
    <script>
        location.href = "login.php"
    </script>
    <?php } else {

    $cart_ids = $_GET['id'];
    $sql = "SELECT * FROM `cart` WHERE `pid` =$cart_ids  AND `id` = $user";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_array($result);
    if ($row['quantity'] > 0) {
        $quantity = $row['quantity'] + 1;
        $sql = "UPDATE `cart` SET `quantity`= $quantity WHERE `pid` =$cart_ids  AND `id` = $user";
        mysqli_query($con, $sql);?>
        <script>
            alert("Success")
        </script>
        <script>
            location.href = "product.php"
        </script>
        <?php 
    } else {
        $sql = "INSERT INTO `cart`(`id`, `pid`) VALUES ('$user','$cart_ids')";
        mysqli_query($con, $sql); ?>
        <script>
            alert("Success")
        </script>
        <script>
            location.href = "product.php"
        </script>
<?php
    }
}
?>