<!DOCTYPE html>
<html lang="en">

<head>
    <title>Update Items</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<?php

if (isset($_GET['id'])) {
    $id = $_GET['id'];
} else {
    $id = 0;
}
$con = mysqli_connect("localhost", "root", "", "shoes");
$mysql = "SELECT * FROM `admins` where prdid=" . $id;
$result = mysqli_query($con, $mysql);
$row = mysqli_fetch_array($result);
?>

<body>
    <h3 style="text-align: center;">Update User</h3>

    <form action="#" method="POST" enctype="multipart/form-data">
        <table>
            <!-- <tr>
                <th>Product Id</th>
                <td><input class="form-control" name="product_id" type="text" value="<?php echo $row['prdid']; ?>"></td>
            </tr> -->
            <tr>
                <th>Product Name</th>
                <td><input class="form-control" name="product" type="text" value="<?php echo $row['prdnm']; ?>"></td>
            </tr>
            <tr>
                <th>Product Price</th>
                <td><input class="form-control" name="product_price" type="password" value="<?php echo $row['prdpr']; ?>"></td>
            </tr>
            <tr>
                <th>Product size</th>
                <td><input class="form-control" name="product_size" type="text" value="<?php echo $row['prdsiz']; ?>"></td>
            </tr>
            <tr>
                <th>Product Image</th>
                <td><input class="form-control" name="product_img" type="file"></td>
            </tr>
            <tr>
                <td><input type="submit" class="form-control" name="sub" value="Update"></td>
            </tr>
        </table>
    </form>
</body>
<?php
$val = $_GET['id'];
if (isset($_POST['sub'])) {

    // $product_id = $_POST['product_id'];
    $product_name = $_POST['product'];
    $product_price = $_POST['product_price'];
    $product_size = $_POST['product_size'];
    $product_img = $_FILES['product_img']['name'];
    if($product_img == null){
        $product_img=$row['image'];
    }
    if ( $product_name == null || $product_price == null || $product_size == null || $product_img == null) {
        echo ("<script>alert('Enter Valid details')</script>");
    } else {
        $con = mysqli_connect("localhost", "root", "", "shoes");
        $mysql = "UPDATE `admins` SET `prdnm`='$product_name',`prdpr`='$product_price',`prdsiz`='$product_size',`image`='$product_img' WHERE prdid='$val'";
        mysqli_query($con, $mysql);
        $targetDir = "product_img/";

        $targetFilePath = $targetDir . $product_img;
        move_uploaded_file($_FILES["product_img"]["tmp_name"], $targetFilePath);


        echo ("<script>alert('Success')</script>");
        echo ("<script>location.href='edit_details.php'</script>");
    }
}
?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>

</html>