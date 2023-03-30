<?php
include 'db.php';
// echo"hi";
if(isset($_POST['decrem-btn'])){
    $cart_id = $_POST['cart_id'];
    $slct_qury = "SELECT a.prdid, a.prqnt, a.prdpr, b.quantity FROM admins a INNER JOIN cart b ON a.prdid = b.pid AND b.cart_id = '$cart_id'";
    $slct_qury_run = mysqli_query($connection, $slct_qury);
    
    $quntycheck = mysqli_fetch_array($slct_qury_run);
    $query = "UPDATE cart SET quantity=quantity-1 WHERE cart_id='$cart_id' AND quantity > 1";
    $query_run = mysqli_query($connection, $query);
  
    // echo("success");
    $newqnty = $quntycheck['quantity'] - 1;
    if($newqnty==0){

    }else{
    $newprice = $quntycheck['prdpr'] * $newqnty;
    echo json_encode(array("status" => "success", "newprice" => $newprice));
    }
}

if(isset($_POST['increm-btn'])){
    $cart_id = $_POST['cart_id'];
    $slct_qury = "SELECT a.prdid, a.prqnt, a.prdpr, b.quantity FROM admins a INNER JOIN cart b ON a.prdid = b.pid AND b.cart_id = '$cart_id'";
    $slct_qury_run = mysqli_query($connection, $slct_qury);
    // foreach($slct_qury_run as $proid)
    $quntycheck = mysqli_fetch_array($slct_qury_run);
    $maxqnty = $quntycheck['prqnt'];
    if ($quntycheck['quantity'] >= $maxqnty) {
        // echo '<script>alert("reached");</script>';
        echo 'qty';
    } else{

    
    $query = "UPDATE cart SET quantity=quantity+1 WHERE cart_id='$cart_id'";
    $query_run = mysqli_query($connection, $query);
  
    // echo("success");
    $newqnty = $quntycheck['quantity'] + 1;
    $newprice = $quntycheck['prdpr'] * $newqnty;
    echo json_encode(array("status" => "success", "newprice" => $newprice));
    // echo '<script>window.location="cart.php";</script>';
    // header('location:cart.php');
}
}

?>