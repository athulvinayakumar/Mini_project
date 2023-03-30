<?php
session_start();
error_reporting(E_ERROR | E_PARSE);
$user = $_SESSION['usr_id'];
include 'db.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
    <link rel="stylesheet" href="cart.css">
    <!-- CSS only -->
    <script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>

<body onload="change();">

    <section>
        <div class="container-fluid">
            <div class="row">
                <aside class="col-lg-9">
                    <div class="card">
                        <div class="table-responsive">
                            <form action="#" method="post">
                                <table id="cart-table" class="table table-borderless table-shopping-cart">
                                    <thead class="text-muted">
                                        <tr class="small text-uppercase">
                                            <th scope="col">Product</th>
                                            <th scope="col" width="120">Quantity</th>
                                            <th scope="col" width="120">Price</th>
                                            <th scope="col" class="text-right d-none d-md-block" width="200"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $con = mysqli_connect("localhost", "root", "", "shoes");
                                        $sql = "SELECT * FROM `cart` WHERE `id` =$user AND `status` = 1";
                                        $result = mysqli_query($con, $sql);
                                        while ($row = mysqli_fetch_array($result)) {
                                            $total_price=0;
                                            $prdid = $row['pid'];
                                            $sql = "SELECT * FROM `admins` WHERE `prdid` = $prdid ";
                                            $result1 = mysqli_query($con, $sql);
                                            $row1 = mysqli_fetch_array($result1);
                                            $total_price = $total_price + ($row1['prdpr'] * $row['quantity']);
                                            $_SESSION['totalPrice'] = $total_price;
                                            $discount = $discount + (10 * $row['quantity']);
                                        ?>
                                            <tr>
                                                <td>
                                                    <figure class="itemside align-items-center">
                                                        <div class="aside"><img src="product_img/<?= $row1['image']; ?>" class="img-sm"></div>
                                                        <figcaption class="info"> <a href="#" class="title text-dark" data-abc="true"><?= $row1['prdnm'] ?></a>
                                                            <p class="text-muted small"> Brand: <?= $row1['brand'] ?></p>
                                                        </figcaption>
                                                    </figure>
                                                </td>

                                                <td>
                                                    <table>
                                                        <tr>
                                                            <td><button type="button" class="dec-btn" value="<?php echo $row['cart_id']; ?>">-</button></td>
                                                            <td><input disabled id="quant" value="<?php echo $row['quantity'] ?>" name="quantitys" type="number" max="<?= $row1['prqnt'] ?>" min="1" class="quant quantitys form-control" onkeypress="return isNumberKey(event)" onchange="return change(this.value,<?= $row['pid'] ?>,<?= $user ?>);" style="width: 50px;"></td>
                                                            <td><button class="inc-btn" type="button" value="<?php echo $row['cart_id']; ?>">+</button></td>
                                                        </tr>
                                                    </table>
                                                </td>
                                                <td>
                                                    <!-- <div class="price-wrap"> <var class="pro_price price">₹<?php echo $row1['prdpr']; ?></var></div> -->
                                                    <!-- <input type="hidden" class="iprice" id="sprice" name="sprice" value="<?php echo $row1['prdpr']; ?>"> -->
                                                    
                                                <span class="ttprice" data-cartid="<?php echo $row['cart_id']; ?>"><?php echo $total_price; ?></span>
                                                    <?php
                                                    // echo $total_price; 
                                                    ?>

                                                </td>
                                                <td class="text-right d-none d-md-block"> <a href="remove_cart.php?id=<?= $row1['prdid'] ?>&uid=<?= $user ?>" class="btn btn-light" data-abc="true"> Remove</a> </td>
                                            </tr>
                                        <?php
                                        $total += $total_price;
                                        // echo($total);
                                        }
                                        // $total = $total_price - ($discount / 10);
                                        $_SESSION['total_amount'] = $total;
                                        ?>
                                        <input type="hidden" id="gtotal" value="<?php echo $total ?>">
                                    </tbody>
                                </table>
                            </form>
                        </div>
                    </div>
                    <div class="d-flex justify-content-center my-2">

                        <a class="btn btn-success" href="product.php">Home</a>
                    </div>
                </aside>
                <aside class="col-lg-3">
                    <div class="card">
                        <div class="card-body">
                        <div id="cart-summary">
                            <dl class="dlist-align">
                                <dt>Total price:</dt>
                                <dd class="tot_price text-right ml-3">₹<?= $_SESSION['total_amount']; ?></dd>
                            </dl>
                            <dl class="dlist-align">
                                <dt>Discount:</dt>
                                <dd class="text-right text-danger ml-3">₹<?= $discount ?></dd>
                            </dl>
                            <dl class="dlist-align">
                                <dt>Total:</dt>
                                <dd class="text-right text-dark b ml-3"><strong>₹<?= $_SESSION['total_amount']- $discount ?></strong></dd>
                            </dl>
                            </div>
                            <!-- <dl class="dlist-align">
                                <dt>Discount:</dt>
                                <dd class="text-right text-danger ml-3">₹<?= $discount ?></dd>
                            </dl>
                            <div id="cart-summary">
                            <dl class="dlist-align">
                                <dt>Total:</dt>
                                <dd class="text-right text-dark b ml-3"><strong>₹<?= $_SESSION['total_amount']- $discount ?></strong></dd>
                            </dl>
                            </div> -->
                            <hr> <a href="checkout.php" class="btn btn-out btn-primary btn-square btn-main" data-abc="true"> Make Purchase </a>
                            <a href="product.php" class="btn btn-out btn-success btn-square btn-main mt-2" data-abc="true">Continue Shopping</a>
                        </div>
                    </div>
                </aside>
            </div>
        </div>
        <?php
        ?>

    </section>
</body>

<script>
    function isNumberKey(evt) {
        var charCode = (evt.which) ? evt.which : evt.keyCode
        if (charCode > 31 && (charCode < 48 || charCode > 57))
            return false;
        return true;
    }
    $(document).on('click', '.dec-btn', function(e) {
        e.preventDefault();

        var cart_id = $(this).val();
        $.ajax({
            type: "POST",
            url: "cart_save.php",
            data: {
                'decrem-btn': true,
                'cart_id': cart_id
            },
            success: function(response) {
                var data = JSON.parse(response);
                if (data.status === "success") {
                    $('#cart-table').load(location.href + " #cart-table", function() {
                        // Update the price for the corresponding cart item
                        $('.ttprice[data-cartid="' + cart_id + '"]').html(data.newprice);
                        <?php $total_price = '<span class="ttprice" data-cartid="'.$row['cart_id'].'">'.$newprice.'</span>'; ?>
                        $('#cart-summary').load('cart.php #cart-summary .dlist-align');
                    });
                } else {
                    alert("Error occurred: " + response);
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.error(textStatus + ': ' + errorThrown);
            }
        });
    });
    $(document).on('click', '.inc-btn', function(e) {
        e.preventDefault();

        var cart_id = $(this).val();

        $.ajax({
            type: "POST",
            url: "cart_save.php",
            data: {
                'increm-btn': true,
                'cart_id': cart_id
            },
            success: function(response) {
                var data = JSON.parse(response);
                if (data.status === "success") {
                    $('#cart-table').load(location.href + " #cart-table", function() {
                        // Update the price for the corresponding cart item
                        $('.ttprice[data-cartid="' + cart_id + '"]').html(data.newprice);
                        <?php $total_price = '<span class="ttprice" data-cartid="'.$row['cart_id'].'">'.$newprice.'</span>'; ?>
                        $('#cart-summary').load('cart.php #cart-summary .dlist-align');
                    });
                } else {
                    alert("Error occurred: " + response);
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.error(textStatus + ': ' + errorThrown);
            }
        });
    });


    function change() {
        // alert("hi");
        var gt=document.getElementById('gtotal').value;
        document.getElementById('gt').innerText=gt;
        // alert(gt);
    }

    // var t = 0;
    // var quantity = document.getElementsByClassName('quant');
    // var price = document.getElementsByClassName('iprice');
    // // var val=document.getElementsByClassName('quant').value;
    // var tprice = document.getElementsByClassName('ttprice');
    // var gtotal = document
    // for (i = 0; i < quantity.length; i++) {
    //     // alert(quantity[i].value);
    //     // alert(price[i].value);
    //     if (quantity[i].value <= 0) {
    //         quantity[i].value = 1;
    //     }
    //     // else if(val[i].value)
    //     t = (quantity[i].value) * (price[i].value);
    //     // alert(t);
    //     // .value=t;;

    //     tprice[i].innerText = t;
    // }
    // alert(quantity);
    // alert(price);
</script>

</html>