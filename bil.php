<?php
session_start();
error_reporting(E_ERROR | E_PARSE);
$user = $_SESSION['usr_id'];
include 'db.php';
$con = mysqli_connect("localhost", "root", "", "shoes");
$sql = "SELECT * FROM `cart` WHERE `id` =$user AND `status` = 1";
$result = mysqli_query($con, $sql);
while ($row = mysqli_fetch_array($result)) {
    $prdid = $row['id'];
    $sql = "SELECT * FROM `auth` WHERE `id` = $prdid ";
    $result1 = mysqli_query($con, $sql);
    $row1 = mysqli_fetch_array($result1);
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
                                    <strong>434334343</strong>
                                </div>
                                <div class="col-sm-6 text-right">
                                    <span>Payment Date</span>
                                    <strong>Jul 09, 2014 - 12:20 pm</strong>
                                </div>
                            </div>
                        </div>
                        <div class="payment-details">
                            <div class="row">
                                <div class="col-sm-6">
                                    <span>Client</span>
                                    <strong>
                                        Andres felipe posada
                                    </strong>
                                    <p>
                                        989 5th Avenue <br>
                                        City of monterrey <br>
                                        55839 <br>
                                        USA <br>
                                        <a href="#">
                                            <span class="__cf_email__" data-cfemail="3e54515050475a5b58587e59535f5752105d5153">[email&#160;protected]</span>
                                        </a>
                                    </p>
                                </div>
                                <div class="col-sm-6 text-right">
                                    <span>Payment To</span>
                                    <strong>
                                        Juan fernando arias
                                    </strong>
                                    <p>
                                        344 9th Avenue <br>
                                        San Francisco <br>
                                        99383 <br>
                                        USA <br>
                                        <a href="#">
                                            <span class="__cf_email__" data-cfemail="cea4bbafa0a8abbc8ea9a3afa7a2e0ada1a3">[email&#160;protected]</span>
                                        </a>
                                    </p>
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
                                <div class="row item">
                                    <div class="col-xs-4 desc">
                                        Html theme
                                    </div>
                                    <div class="col-xs-3 qty">
                                        3
                                    </div>
                                    <div class="col-xs-5 amount text-right">
                                        $60.00
                                    </div>
                                </div>
                                <div class="row item">
                                    <div class="col-xs-4 desc">
                                        Bootstrap snippet
                                    </div>
                                    <div class="col-xs-3 qty">
                                        1
                                    </div>
                                    <div class="col-xs-5 amount text-right">
                                        $20.00
                                    </div>
                                </div>
                                <div class="row item">
                                    <div class="col-xs-4 desc">
                                        Snippets on bootdey
                                    </div>
                                    <div class="col-xs-3 qty">
                                        2
                                    </div>
                                    <div class="col-xs-5 amount text-right">
                                        $18.00
                                    </div>
                                </div>
                            </div>
                            <div class="total text-right">
                                <p class="extra-notes">
                                    <strong>Extra Notes</strong>
                                    Please send all items at the same time to shipping address by next week.
                                    Thanks a lot.
                                </p>
                                <div class="field">
                                    Subtotal <span>$379.00</span>
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
                            </div>
                            <div class="print">
                                <a href="#">
                                    <i class="fa fa-print"></i>
                                    Print this receipt
                                </a>
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
</body>

</html>