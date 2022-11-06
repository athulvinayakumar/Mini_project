<?php
session_start();
include('db.php');
$id=$_REQUEST['id'];

$sql="UPDATE admins set status='1' where prdid='$id'";
if(mysqli_query($connection,$sql))
{
    echo("<script>alert('Item deactivated successfully')</script>");
}
header("Location: edit_details.php");
?>