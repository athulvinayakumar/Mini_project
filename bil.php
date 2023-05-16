<?php
session_start();
// error_reporting(E_ERROR | E_PARSE);
$idsss = $_SESSION['order_details'];
// foreach ($idsss as $u) {
//     echo $u;
// }
$user = $_SESSION['usr_id'];
$pro_ids = $_SESSION['order_details'];
$cRiD = $_SESSION['cartId'];
// echo("<script>alert('$cRiD[0]')</script>");

// include 'db.php';
$con = mysqli_connect("localhost", "root", "", "shoess");
$sql = "SELECT * FROM `cart` WHERE id= $user AND `status` = '1'";
$result = mysqli_query($con, $sql);
while ($row = mysqli_fetch_assoc($result)) {
    $prdid = $row['id'];
    $v = $_SESSION['cart_id'];
    $sql = "SELECT * FROM `auth` WHERE `id` = $prdid ";
    $result1 = mysqli_query($con, $sql);
    $row1 = mysqli_fetch_array($result1);
}
$sql = "SELECT * FROM `tbl_order` WHERE `id` =$prdid";
$result1 = mysqli_query($con, $sql);
while ($ordertb = mysqli_fetch_array($result1)) {
    $address = $ordertb['address'];
    $address2 = $ordertb['address2'];
}

$pay_id = $_SESSION['OID'];
$result = mysqli_query($con, "SELECT * FROM `payment` WHERE `pay_id` = $pay_id ");
$paytb = mysqli_fetch_array($result);
?>
<?php
if (isset($_POST['bill'])) {
    $cart = $_SESSION['cart'];
    $product_names = $cart['cart_id'];
    $cartid = $_POST['bill'];
    $_SESSION['cart_id'] = $cartid;
    $updatestatus = mysqli_query($con, "UPDATE tbl_order SET status = 'paid' WHERE oid='$cartid'");
    foreach ($product_names as $cart_id) {
        $display_value = $cart_id;
        $sml = mysqli_query($con, "UPDATE `cart` SET `status`='0' WHERE cart_id='$display_value'");
    }
}


?>
<html>

<title>STEPSOUT-BILLING</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
<link href="bill.css" rel="stylesheet">

</head>

<body>
    <div class="receipt-content">
        <div class="container bootstrap snippets bootdey">
            <div class="row">
                <div class="col-md-12">
                    <div class="invoice-wrapper">
                        <div class="intro">
                            Hi <strong><?= $row1['name'] ?></strong>,
                            <br>
                            This is the receipt for a payment of <strong></strong> (USD) for your works
                        </div>
                        <div class="payment-info">
                            <div class="row">
                                <div class="col-sm-6">
                                    <span>Payment No.</span>
                                    <strong><?= $paytb['payment_id'] ?></strong>
                                </div>
                                <div class="col-sm-6 text-right">
                                    <span>Payment Date</span>
                                    <strong><?= $paytb['added_on'] ?></strong>
                                </div>
                            </div>
                        </div>
                        <div class="payment-details">
                            <div class="row">
                                <div class="col-sm-6">
                                    <span>Client</span>
                                    <p><?= $address ?>
                                    </p>
                                </div>
                                <div class="col-sm-6 text-right">
                                    <span>Payment To</span>
                                    <strong>
                                        VK
                                    </strong>
                                    <p>SOUTH BAZAR<br> KANNUR<br>9525302595<br>vk@gmail.com</p>

                                </div>
                            </div>
                        </div>
                        <div class="line-items">
                            <div class="headers clearfix">
                                <div class="row">
                                    <div class="col-xs-4">Description</div>
                                    <div class="col-xs-3">Quantity</div>
                                    <div class="col-xs-5 text-right">Amount</div>
                                </div>
                            </div>
                            <div class="items">
                                <?php
                                $subTotal = 0;
                                // $idsss = $_SESSION['order_details'];
                                foreach ($idsss as $u) {
                                $result_pro = mysqli_query($con, "SELECT * FROM `tbl_order` WHERE `oid` = $u");
                                $ord_det = mysqli_fetch_array($result_pro);
                                $proIds=$ord_det['product'];

                                $result_pro1 = mysqli_query($con, "SELECT * FROM `admins` WHERE `prdid` = $proIds");
                                $ord_det1 = mysqli_fetch_array($result_pro1);
                                 ?>
                                <div class="row item">
                                    <div class="col-xs-4 desc">
                                        <?= $ord_det1['discription'] ?>

                                        <!-- product name -->
                                    </div>
                                    <div class="col-xs-3 qty">
                                        <?= $ord_det['quantity'] ?>
                                        <!-- product qi -->
                                    </div>
                                    <div class="col-xs-5 amount text-right">
                                        <?= $ord_det['product_price'] ?>
                                        <!-- product price -->
                                    </div>
                                </div>
                                <?php
                                }
                                // }
                                $subTotal = $subTotal + $ord_det['product_price'];
                                ?>
                            </div>
                            <!-- <div class="total text-right">
                                <p class="extra-notes">
                                    <strong>Extra Notes</strong>
                                    Please send all items at the same time to shipping address by next week.
                                    Thanks a lot.
                                </p>
                                <div class="field">
                                    Subtotal <span>$379.00</span>
                                    Subtotal <span><?= $subTotal ?></span>
                                </div>
                                <div class="field">
                                    Shipping <span>$0.00</span>
                                </div>
                                <div class="field">
                                    Discount <span>4.5%</span>
                                </div>
                                <div class="field grand-total">
                                    Total <span>$312.00</span>
                                </div>
                            </div> -->
                            <div class="print">
                                <center><button class="print-ticket" ;>Print Ticket</button></center>
                                <script src="https://code.jquery.com/jquery-latest.min.js"></script>

                            </div>
                        </div>
                    </div>
                    <div class="footer">
                        Copyright © 2014. company name
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="https://netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <script type="text/javascript">
    </script>
    <script>
        $(document).ready(function() {
            $('.print-ticket').click(function() {
                window.print();
            });
        });
    </script>
</body>

</html>