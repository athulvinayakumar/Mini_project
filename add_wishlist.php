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
    $sql = "SELECT * FROM `tbl_wishlist` WHERE `pid` =' $cart_ids'  AND `id` = '$user'";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_array($result);
    ?>
        
        <?php 
     {
        $sql = "INSERT INTO `tbl_wishlist`(`pid`,`id` , `status`) VALUES (' $cart_ids','$user','1')";
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