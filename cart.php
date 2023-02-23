<?php
session_start();
error_reporting(E_ERROR | E_PARSE);

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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>

<body>

    <section>
        <div class="container-fluid">
            <div class="row">
                <aside class="col-lg-9">
                    <div class="card">
                        <div class="table-responsive">
                            <table class="table table-borderless table-shopping-cart">
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
                                    // $values = $_SESSION['cart_btn_id'];
                                    $values = $_COOKIE["cart"];
                                    // echo"<script>alert('$values')</script>";
                                    $carts = explode(" ", $values);

                                    foreach ($carts as $cart_id) {
                                        if ($cart_id != null) {
                                            $sql = "SELECT * FROM admins WHERE prdid = '$cart_id'";
                                            $result = mysqli_query($connection, $sql);
                                            $row = mysqli_fetch_array($result);
                                            $name = $row['prdnm'];
                                            $size = $row['prdsiz'];
                                            $brand = $row['brand'];
                                            $total_price = $total_price + $row['prdpr'];
                                            $discount = $discount + 10;
                                            $xyz = $row['prdpr'];

                                    ?>
                                            <tr>
                                                <td>
                                                    <figure class="itemside align-items-center">
                                                        <div class="aside"><img src="product_img/<?= $row['image']; ?>" class="img-sm"></div>
                                                        <figcaption class="info"> <a href="#" class="title text-dark" data-abc="true"><?= $name ?></a>
                                                            <p class="text-muted small">SIZE: <?= $size ?><br> Brand: <?= $brand ?></p>
                                                        </figcaption>
                                                    </figure>
                                                </td>
                                                <td> <input id="quant<?= $row['prdid'] ?>" min="1" value="1" name="quantitys" type="number" class="quantitys form-control form-control-sm" /></td>
                                                <td>
                                                    <div class="price-wrap"> <var class="pro_price<?= $row['prdid'] ?> price">₹<?= $row['prdpr']; ?></var></div>
                                                </td>
                                                <td class="text-right d-none d-md-block"> <a href="remove_cart.php?id=<?= $row['prdid'] ?>" class="btn btn-light" data-abc="true"> Remove</a> </td>
                                            </tr>
                                            <script>
                                                $(document).ready(function() {
                                                    $("#quant<?= $row['prdid'] ?>").keyup(function() {
                                                        var x = $("#quant<?= $row['prdid'] ?>").val();
                                                        if (x < 1) {
                                                            z = '<?= $row['prdpr'] ?>'
                                                            $(".pro_price<?= $row['prdid'] ?>").text('₹' + z)

                                                        } else {
                                                            var y = '<?= $xyz ?>'
                                                            var z = x * y
                                                            $(".pro_price<?= $row['prdid'] ?>").text('₹' + z)
                                                        }
                                                    })
                                                })

                                            </script>
                                    <?php }
                                    }
                                    $total = $total_price - $discount;
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="d-flex justify-content-center my-2">

                        <a class="btn btn-success" href="product.php">Home</a>
                    </div>
                </aside>
                <aside class="col-lg-3">
                    <div class="card">
                        <div class="card-body"> 
                            <dl class="dlist-align">
                                <dt>Total price:</dt>
                                <dd class="tot_price text-right ml-3">₹<?= $total_price ?></dd>
                            </dl>
                            <dl class="dlist-align">
                                <dt>Discount:</dt>
                                <dd class="text-right text-danger ml-3">₹<?= $discount ?></dd>
                            </dl>
                            <dl class="dlist-align">
                                <dt>Total:</dt>
                                <dd class="text-right text-dark b ml-3"><strong>₹<?= $total ?></strong></dd>
                            </dl> 
                            <hr> <a href="buy.php" class="btn btn-out btn-primary btn-square btn-main" data-abc="true"> Make Purchase </a> 
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

</html>