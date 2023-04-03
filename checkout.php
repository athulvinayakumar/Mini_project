<?php
session_start();
$i = 0;
$usr_name = $_SESSION['Username'];
$con = mysqli_connect("localhost", "root", "", "shoes");
$sql = "SELECT * FROM `auth` where username ='$usr_name'";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_array($result);
$pr = $row['id'];
// $sql = "SELECT * FROM `cart` WHERE `id` =$pr and status='1'";
// $result1 = mysqli_query($con, $sql);
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
                            <form class="needs-validation" method="post" action="" novalidate="">

                                <div class="row">
                                    <div class="mb-3">
                                        <label for="firstName">Name</label>
                                        <input type="text" class="form-control" name="name" id="name" value="<?= $row['name'] ?>" disabled required="">
                                    </div>
                                    <div class="mb-3">
                                        <label for="email">Email </label>
                                        <input type="email" class="form-control" id="email" value="<?= $row['email'] ?>" disabled>
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
                                            <label for="country">State</label>
                                            <select class="custom-select d-block w-100 form-control" id="country" required autocomplete="off">
                                                <option value="">Choose...</option>
                                                <option>Kerala</option>
                                            </select>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label for="state">District</label>
                                            <select class="custom-select d-block w-100 form-control" id="state" required autocomplete="off">
                                                <option value="">Choose...</option>
                                                <option>Kannur</option>
                                                <option>Kottayam</option>
                                                <option>Kozhikode</option>
                                            </select>
                                        </div>
                                        <div class="col-md-3 mb-3">
                                            <label for="zip">Zip</label>
                                            <input type="text" class="form-control" id="zip" placeholder="" required autocomplete="off">
                                        </div>
                                        <div class="mb-3">
                                            <label for="address">Total Amount</label>
                                            <input type="text" name="amt" id="amt" class="form-control" value=<?= $_SESSION['total_amount'] ?> disabled />
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
                                    <center>
                                        <input type="submit" name="checkout" class="btn btn-primary btn-lg " value="checkout">
                                        <button type="button" class="btn btn-danger  btn-lg" onclick="location.href='cart.php'">
                                            Cancel
                                        </button>
                                    </center>
                                </div>
                        </div>

                    </div>
                </div>
                <!-- Button trigger modal -->
                <button type="button" id="successBtn" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" style="display:none"></button>

                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Payment</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <h5>Price : <?= $_SESSION['total_amount'] ?></h5>
                            </div>
                            <div class="modal-footer">
                                <a class="btn btn-secondary" href="checkout.php">Close</a>
                                <a type="submit" name="checkout" id="rzp-button1" value="pay now" onclick="pay_now()" class="btn btn-primary">Pay Now</a>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                if (isset($_POST['checkout'])) {
                    $address = $_POST['address'];
                    $count = 0;
                    $address1 = $_POST['address1'];
                    $product_ids = $_POST['product'];
                    $product_price = $_POST['price'];
                    $product_quantity = $_POST['quantity'];
                    $_SESSION['order_details'] = $product_ids;
                    $price = $_SESSION['total_amount'];
                    $ord_id = [];
                    foreach ($product_ids as $prdid) {
                        $prod_price = $product_price[$count];
                        $prod_qty = $product_quantity[$count];
                        $sql = "INSERT INTO `tbl_order`(`id`,`product`,`address`, `address2`, `price`) VALUES('$pr','$prdid','$address','$address1','$price')";
                        $res = mysqli_query($con, $sql);
                        $ord_id = mysqli_insert_id($con);
                        $sql_1 = mysqli_query($con, "UPDATE  `tbl_order` SET product_price='$prod_price' WHERE oid='$ord_id' ");
                        $sql_2 = mysqli_query($con, "UPDATE  `tbl_order` SET quantity='$prod_qty' WHERE oid='$ord_id' ");
                        
                        $sql_3 = mysqli_query($con, "UPDATE  `admins` SET prqnt=prqnt-'$prod_qty' WHERE prdid='$prdid' ");
                        $count = $count + 1;
                    }

                    $_SESSION['order_details'] = $ord_id;
                    if ($res && $sql_1 && $sql_2) {
                        // echo "<script>alert('Added successfully')</script>";
                        echo ("<script>document.getElementById('successBtn').click()</script>");
                        // echo "<script> window.location='checkout.php';</script>";
                    }
                }
                ?>
                <div class="col-4">
                    <div class="row">
                        <?php
                        // while ($row1 = mysqli_fetch_array($result1)) {
                            // $prdid = $row1['pid'];
                            $SS = "SELECT a.image as image,a.prdid as py ,a.discription as dp,a.prdnm as pname,a.prdpr as pprice,c.quantity as qty, c.cart_id as id from cart c LEFT JOIN admins a ON a.prdid=c.pid  WHERE c.id='$pr' and c.status='1'";
                            $result2 = mysqli_query($con, $SS);
                            while ($row2 = mysqli_fetch_array($result2)) {
                        ?>
                            <div class="col-12" style="margin-bottom: 47%;">
                                <div class="details shadow">
                                    <div class="details__item">
                                        <div class="item__image">
                                            <img class="iphone" src="./product_img/<?= $row2['image'] ?>" alt="">
                                        </div>
                                        <div class="item__details">
                                            <div class="item__title">
                                                <b><?= $row2['pname'] ?></b>
                                            </div>
                                           
                                            <div class="item__price">
                                                <b>$<?= $row2['pprice'] ?></b>
                                                <input type="hidden" id="price" name="price[]" value="<?php echo $row2['pprice']; ?>">
                                            </div>
                                            <div class="item__quantity"><br>
                                                Quantity:<b><?php echo $row2['qty']; ?></b>
                                                <input type="hidden" id="quantity" name="quantity[]" value="<?php echo $row2['qty']; ?>">

                                            </div>
                                            <div class="item__description">
                                                <?= $row2['dp'] ?>
                                            </div>
                                            <input type="hidden" value="<?php echo $row2['py']; ?>" name="product[]" id="product">
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
        </form>
        <!-- Button trigger modal -->

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
                        // console.log(result)
                        window.location.href = "thank_you.php?payment_id=" + response.razorpay_payment_id;
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

<!-- <button type="button" class="btn btn-primary btn-sm me-1 mb-2" data-mdb-toggle="tooltip" aria-label="Remove item" data-mdb-original-title="Remove item" style="">
                    <i class="fas fa-trash"></i>
                  </button>

                  <button type="button" class="btn btn-danger btn-sm mb-2" data-mdb-toggle="tooltip" aria-label="Move to the wish list" data-mdb-original-title="Move to the wish list" style="">
                    <i class="fas fa-heart"></i>
                  </button> -->