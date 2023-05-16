<?php
$con = mysqli_connect("localhost","root","","shoess");
$cp=$_POST['cp'];
$np=$_POST['np'];
$cnp=$_POST['cnp'];
if($np==$cnp)
{
//$encrpass= md5($np);
$sql="update auth set password='$np' where password='$cp'";
mysqli_query($con,$sql);
echo"<script>alert('Your Password Changed Successfully');window.location='index.php';</script>";
}
else
{
echo"<script>alert('Password Doesnot matched');window.location='chngp.php';</script>";
}
