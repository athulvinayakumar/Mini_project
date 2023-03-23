<?php
session_start();
include('db.php');
if(isset($_POST['amt']) && isset($_POST['name'])){
    $amt=$_POST['amt'];
    $name=$_POST['name'];
    $payment_status="pending";
    $added_on=date('Y-m-d h:i:s');
    mysqli_query($connection,"INSERT INTO `payment`(`name`, `amount`, `payment_status`,`added_on`) VALUES ('$name','$amt',' $payment_status','$added_on')");
    $_SESSION['OID']=mysqli_insert_id($connection);
}

if(isset($_POST['payment_id']) && isset($_SESSION['OID'])){
    echo "<script>alert('Added successfully')</script>";
    $payment_id=$_POST['payment_id'];
    mysqli_query($connection,"update payment set payment_status='complete',payment_id='$payment_id' where pay_id='".$_SESSION['OID']."'");
}
?>