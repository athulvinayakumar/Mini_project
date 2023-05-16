<?php
session_start();
$con = mysqli_connect("localhost", "root", "", "shoess");

if (isset($_POST['id'])) {
    $value = $_POST['id'];
    $prdid = $_POST['prid'];
    $usr_id = $_POST['usr_id'];

    $sql = "SELECT * FROM `admins` WHERE `pid` =$prdid";
    $result = mysqli_query($con, $sql);
    $row1=mysqli_fetch_array($result);
    if($row1['quantity']<$value){
        $val=1;
    }else{
        $val=-1;
    }

    $sql = "UPDATE `cart` SET `quantity`=$value WHERE `pid` =$prdid AND `id`=$usr_id";
    $result = mysqli_query($con, $sql);

    $sql = "UPDATE `admins` SET prqnt=prqnt-$val WHERE `prdid` =$prdid";
    $result = mysqli_query($con, $sql);
    
    $total_product_pr=0;
    $sql = "SELECT * FROM `cart` WHERE `id` =$usr_id";
    $result = mysqli_query($con, $sql);
    while ($row = mysqli_fetch_array($result)) {
        $prdid = $row['pid'];
        $sql = "SELECT * FROM `admins` WHERE `prdid` = $prdid ";
        $result1 = mysqli_query($con, $sql);
        $row1 = mysqli_fetch_array($result1);
        $prdpr=$row1['prdpr'];
        $prdqa=$row['quantity'];
        $total_product_pr=$total_product_pr+$prdqa*$prdpr;
    }
    $_SESSION['amount']=$total_product_pr;
    echo($total_product_pr);
}
