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
        $sql = "SELECT * FROM `cart` WHERE `pid` =".$cart_ids."  AND `id` = ".$user;
        $result = mysqli_query($con, $sql);

        if($result){
            if(mysqli_num_rows($result) > 0){
                // echo "<script>alert('Product Already added...');location.href = 'cart.php' </script>";
                $row = mysqli_fetch_array($result);
                $quantity=$row['quantity'];
                $sql = "UPDATE `cart` SET `quantity`= $quantity,`status`=1 WHERE `pid` =$cart_ids  AND `id` = $user ";
                if(mysqli_query($con, $sql)){
                    echo"<script>alert('Success');location.href = 'cart.php' </script>";
                } 
                else{
                    echo"<script>alert('Unable to add to cart !! Please try again...');location.href = 'cart.php' </script>";
                }
            }
            else {
                $sql = "INSERT INTO `cart`(`id`, `pid`) VALUES ('$user','$cart_ids')";
                mysqli_query($con, $sql);
                echo '<script>alert("Success");  location.href = "product.php"</script>';
            }
        }
    }
?>