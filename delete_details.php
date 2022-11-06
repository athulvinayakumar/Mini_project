<?php
$val = $_GET['id'];
    $con = mysqli_connect("localhost", "root", "", "shoes");
    // $mysql = "DELETE FROM `admins` WHERE prdid=$val";
    $mysql = "UPDATE admins SET status=true WHERE prdid=$val";
    // mysqli_query($con, $mysql);
    // echo("<script>alert('Success')</script>");
    
    if(mysqli_query($con, $mysql)){
        echo("<script>alert('Are you sure want to delete this data?');</script>");
    }
    else
        echo("<script>alert('Success ');</script>");
    echo("<script>location.href='edit_details.php'</script>");
?>
