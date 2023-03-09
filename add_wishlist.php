<?php
    session_start();
    $con = mysqli_connect("localhost", "root", "", "shoes");
    error_reporting(E_ERROR | E_PARSE);
    $user = $_SESSION['usr_id'];
    if ($user == null) {
        echo '<script>alert("Pls login"); location.href = "login.php"</script>';
    } 
    else {
        $cart_ids = $_GET['id'];
        $sql = "SELECT * FROM `tbl_wishlist` WHERE `pid` =".$cart_ids."  AND `id` = ".$user;
        $result = mysqli_query($con, $sql);

        if($result){
            if(mysqli_num_rows($result) > 0){
                echo "<script>alert('Product Already added...');location.href = 'wishlist.php' </script>";
            }
            else {
                $sql = "INSERT INTO `tbl_wishlist`(`pid`,`id` , `status`) VALUES (' $cart_ids','$user','1')";
                mysqli_query($con, $sql);
                echo '<script>alert("Success");  location.href = "product.php"</script>';
            }
        }
    }
?>