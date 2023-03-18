<?php
session_start();
$usr_name = $_SESSION['Username'];
$con = mysqli_connect("localhost", "root", "", "shoes");
$sql = "SELECT * FROM `auth` where username ='$usr_name'";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_array($result);
$prdid = $row['id'];
$sql = "SELECT * FROM `cart` WHERE `id` =$prdid";
$result1 = mysqli_query($con, $sql);
?>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>STEPSOUT</title>
    <style>
        .container {
            max-width: 960px;
        }

        .lh-condensed {
            line-height: 1.25;
        }
    </style>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <link rel="stylesheet" href="checkout.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.1.js"></script>
    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
    <style>

    </style>
</head>

<body>
    <section class="content" style="margin-top: 20%;">
        <div class="container-fluid">
            <div class="row">
                <div class="col-8" style="margin-top: -21%;">
                    <div class="card-body p-4">
                        <div class="row">
                            <center>
                                <h2>Complete Your Purchase</h2>
                            </center>
                            <p class="lead"></p>
                        </div>
                        <div class="col-md-8 order-md-1">
                            <h4 class="mb-3">Billing address</h4>
                            <form class="needs-validation"  method="post"  action="" novalidate="">
                            
                                <div class="row">
                                    <div class="mb-3">
                                        <label for="firstName">Name</label>
                                        <input type="text" class="form-control" id="firstName"  value="<?= $row['name'] ?>" required="">
                                    </div>
                                    <div class="mb-3">
                                        <label for="email">Email </label>
                                        <input type="email" class="form-control" id="email"  value="<?= $row['email'] ?>">
                                    </div>
                                    <div class="mb-3">
                                        <label for="address">Address</label>
                                        <textarea class="form-control" name="address" id="address" onkeyup="address()" required autocomplete="off"></textarea>
                                        <div id="m1"></div>

                                    </div>
                                    <div class="mb-3">
                                        <label for="address2">Address 2</label>
                                        <textarea class="form-control" name="address1" id="address2" onkeyup="address2()" required autocomplete="off"></textarea>
                                        <div id="m2"></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-5 mb-3">
                                            <label for="country">Country</label>
                                            <select class="custom-select d-block w-100 form-control" id="country" required autocomplete="off">
                                                <option value="">Choose...</option>
                                                <option>India</option>
                                            </select>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label for="state">State</label>
                                            <select class="custom-select d-block w-100 form-control" id="state" required autocomplete="off">
                                                <option value="">Choose...</option>
                                                <option>Kerala</option>
                                            </select>
                                        </div>
                                        <div class="col-md-3 mb-3">
                                            <label for="zip">Zip</label>
                                            <input type="text" class="form-control" id="zip" placeholder="" required autocomplete="off">
                                        </div>
                                        <div class="mb-3">
                                        <label for="address">Total Amount</label>
                                            <input type="text" name="amt" id="amt" class="form-control" value=<?= $_SESSION['total_amount'] ?>  disabled />
                                        </div>
                                        <br> <br> <br> <br> <br>
                                        

                                    </div>
                                    <hr class="mb-4">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="same-address">
                                        <label class="custom-control-label" for="same-address" autocomplete="off">Above Address is true</label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="save-info">
                                        <label class="custom-control-label" for="save-info" autocomplete="off">Save this information for next time</label>
                                    </div><br><br>
                                    <center> <button type="submit" name="checkout" class="btn btn-primary btn-lg " id="rzp-button1" value="pay now" onclick="pay_now()">
                                            Checkout
                                        </button>
                                        <button type="button" class="btn btn-danger  btn-lg" onclick="location.href='cart.php'">
                                            Cancel
                                        </button>
                                    </center>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <?php
                if (isset($_POST['checkout'])) {
                    $address = $_POST['address'];
                    $address1 = $_POST['address1'];  
                    $price =$_SESSION['total_amount'];
                    $sql = "INSERT INTO `tbl_order`(`id`,`address`, `address2`, `price`) VALUES('$prdid','$address','$address1','$price')";
                    mysqli_query($con, $sql);
                    echo "<script>alert('Added successfully')</script>";
                    echo "<script> window.location='checkout.php';</script>";
                }
                ?>
                <div class="col-4">
                    <div class="row">
                        <?php

                        while ($row1 = mysqli_fetch_array($result1)) {
                            $prdid = $row1['pid'];
                            $sql = "SELECT * FROM `admins` WHERE `prdid` = $prdid ";
                            $result2 = mysqli_query($con, $sql);
                            $row = mysqli_fetch_array($result2);

                        ?>
                            <div class="col-12" style="margin-bottom: 47%;">
                                <div class="details shadow">
                                    <div class="details__item">
                                        <div class="item__image">
                                            <img class="iphone" src="./product_img/<?= $row['image'] ?>" alt="">
                                        </div>
                                        <div class="item__details">
                                            <div class="item__title">
                                                <b> <?= $row['prdnm'] ?></b>
                                            </div>
                                            <div class="item__price">
                                                <b> $<?= $row['prdpr'] ?></b>
                                            </div>
                                            <div class="item__quantity">
                                                Quantity: <b><?= $row['prqnt'] ?></b>
                                            </div>
                                            <div class="item__description">
                                                <?= $row['discription'] ?>
                                            </div>

                                        </div>
                                    </div>

                                </div>

                            </div>
                        <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>

        <div class="discount"></div>

        <div class="container-fluid">
        </div>
    </section>
</body>
<script>
    (function() {
        'use strict'

        window.addEventListener('load', function() {
            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.getElementsByClassName('needs-validation')

            // Loop over them and prevent submission
            Array.prototype.filter.call(forms, function(form) {
                form.addEventListener('submit', function(event) {
                    if (form.checkValidity() === false) {
                        event.preventDefault()
                        event.stopPropagation()
                    }
                    form.classList.add('was-validated')
                }, false)
            })
        }, false)
    }())
</script>
<script>
    function pay_now() {
        var name = jQuery('#name').val();
        var amt = jQuery('#amt').val();
        var options = {
            "key": "rzp_test_memh6ACSKYdCkR",
            "amount": amt * 100,
            "currency": "INR",
            "name": "VK",
            "description": "Test Transaction",
            "image": "https://drive.google.com/file/d/1FJCNPPMhML96z3s4IrR8-yGU4A6HLm2X/view?usp=share_link",
            "handler": function(response) {
                console.log(response);
                jQuery.ajax({
                    type: 'POST',
                    url: 'payment.php',
                    data: "payment_id=" + response.razorpay_payment_id + "&amt=" + amt + "&name=" + name,
                    success: function(result) {
                        window.location.href = "thank_you.php";
                    }

                })

            }
        };

        var rzp1 = new Razorpay(options);
        document.getElementById('rzp-button1').onclick = function(e) {
            rzp1.open();
            e.preventDefault();
        }

    }
</script>
</html>