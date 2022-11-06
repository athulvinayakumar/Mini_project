<?php
session_start();
include('db.php');
$id=$_REQUEST['id'];

$sql="UPDATE admins set status='0' where prdid='$id'";
if(mysqli_query($connection,$sql))
{
    echo("<script>alert('item activated successfully')</script>");
}
header("Location: edit_details.php");
?>