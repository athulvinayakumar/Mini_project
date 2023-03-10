<!DOCTYPE html>
<html lang="en">

<head>
    <title>Update Items</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>

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
    <h3 style="text-align: center;">Update</h3>

    <form action="#" method="POST" enctype="multipart/form-data">
        <table>
            <tr>
                <th>Product Name</th>
                <td><input class="form-control" id="first" name="product" onkeyup="us()" type="text" value="<?php echo $row['prdnm']; ?>"></td>
                <td><div id="message1"></div></td>
            </tr>
            <tr>
                <th>Product quantity</th>
                <td><input class="form-control" id="third" name="product_quantity" onkeyup="cl()" type="text" value="<?php echo $row['prqnt']; ?>"></td>
                <td><div id="message3"></div></td>
            </tr>
            <tr>
                <th>Product Price</th>
                <td><input class="form-control" id="second" name="product_price" onkeyup="pp()" type="text" value="<?php echo $row['prdpr']; ?>"></td>
                <td><div id="message2"></div></td>
            </tr>
           
            <tr>
                <th>Product discription</th>
                <td><textarea class="form-control" id="four" name="product_discription" type="text" onkeyup="ps()" value="<?php echo $row['discription']; ?>"></textarea></td>
                <td><div id="message4"></div></td> 
            </tr>
            <tr>
                <th>Product Image</th>
                <td><input class="form-control" id="inputfileupload" name="product_img" type="file" onchange="fileValidation()" accept="image/x-png,image/gif,image/jpeg"></td>
            </tr>
            <tr>
                <td><input type="submit" class="form-control" name="sub" id="btn" value="Update"></td>
            </tr>
        </table>
    </form>
</body>
<?php
$val = $_GET['id'];
if (isset($_POST['sub'])) {

    // $product_id = $_POST['product_id'];
    $product_name = $_POST['product'];
    $product_quantity = $_POST["product_quantity"];
    $product_price = $_POST['product_price'];
    $product_discription = $_POST['product_discription'];
    $product_img = $_FILES['product_img']['name'];
    if($product_img == null){
        $product_img=$row['image'];
    }
    if ( $product_name == null || $product_price == null ||  $product_discription == null || $product_quantity == null || $product_img == null) {
        echo ("<script>alert('Enter Valid details')</script>");
    } else {
        $con = mysqli_connect("localhost", "root", "", "shoes");
        $mysql = "UPDATE `admins` SET `prdnm`='$product_name',`prqnt`='$product_quantity',`prdpr`='$product_price',`discription`='$product_discription',`image`='$product_img' WHERE prdid='$val'";
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

    <script>
        $(document).ready(function() {
            var check = 0;
            var check1 = 0;
            var check2 = 0;
            var check3 =0;
            // var check4 =0;
            $("#first").keyup(function() {
                var name = document.getElementById("first").value
                var c_name = /^[a-z ]{3,20}$/i;
                var r_name = c_name.test(name)
                if (r_name == false) {
                    $("#message1").text("*Enter a valid Name");
                    check=1;
                } else {
                    check=0;
                    $("#btn").prop('disabled',false);
                    $("#message1").text("");

                }
            })
            $("#second").keyup(function() {
                var mobile = document.getElementById("second").value
                var c_mobile = /^[0-9]{3,4}$/;
                var r_mobile = c_mobile.test(mobile)
                if (r_mobile == false) {
                    $("#message2").text("*Enter a number");
                   check2=1;
                } else {
                    check2=0;
                    $("#btn").prop('disabled',false);
                    $("#message2").text("");


                }
            })
            $("#third").keyup(function() {
                var name = document.getElementById("third").value
                var c_name = /^[a-z ]{3,20}$/i;
                var r_name = c_name.test(name)
                if (r_name == false) {
                    $("#message3").text("*Enter a valid color");
                    check3=1;
                } else {
                    check3=0;
                    $("#btn").prop('disabled',false);
                    $("#message3").text("");

                }
            })
            // $("#four").keyup(function() {
            //     var name = document.getElementById("four").value
            //     if(name<=11){
            //     var c_name =/^[1-9]{1,2}$/;
            //     var r_name = c_name.test(name)
            //     if (r_name == false) {
            //         $("#message4").text("*Enter details");
            //         check4=1;
            //     } else {
            //         check4=0;
            //         $("#btn").prop('disabled',false);
            //         $("#message4").text("");

            //     }
            // }else{
            //     $("#message4").text("*Enter a valid size");
            // }

            })
            $("#btn").click(function() {
                var mobile = document.getElementById("first").value
                var name = document.getElementById("second").value
                var email = document.getElementById("third").value
                var pass = document.getElementById("four").value
                if (mobile.length == 0) {
                    alert("Please fill all the fields");
                    $("#btn").prop('disabled',true);
                } else if (name.length == 0) {
                    alert("Please fill all the fields");
                    $("#btn").prop('disabled',true);
                  
                } else if (email.length == 0) {
                    alert("Please fill all the fields");
                    $("#btn").prop('disabled',true);
                }else if(pass.length==0){
                    alert("Please fill all the fields");
                    $("#btn").prop('disabled',true);
                } else {
                }
                if (check == 1 || check2 == 1|| check3 == 1 ) {
                    alert("please fill all field correctly");
                    $("#btn").prop('disabled',true);
                } else {
                    $("#btn").prop('disabled',false);
                }
            })
        })
    </script>
    <script>
         function fileValidation() {
            var fileInput =
                document.getElementById('inputfileupload');
            var filePath = fileInput.value;
            // Allowing file type
            var allowedExtensions =
                /(\.jpg|\.jpeg|\.png|\.gif)$/i;
            if (!allowedExtensions.exec(filePath)) {
                $("#btn").prop('disabled',true);
                alert('Invalid file type');
                fileInput.value = '';
                return false;
            } else {
                $("#btn").prop('disabled',false);
            }
        }
    </script>
</html>