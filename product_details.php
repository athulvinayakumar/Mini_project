<?php
session_start();
$pro_id = $_GET['id'];
$con = mysqli_connect("localhost", "root", "", "shoes");
$mysql = "SELECT * FROM `admins` WHERE prdid = '$pro_id'";
$result = mysqli_query($con, $mysql);
$row = mysqli_fetch_array($result);

$_SESSION['total_amount']=$row['prdpr'];
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $row['prdnm'] ?>(<?= $row['brand'] ?>)</title>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">

    <link rel="stylesheet" href="style.css" type="text/css" media="all" />
    <link rel="stylesheet" href="./css/style2.css">
    <!-- CSS -->
    <link href="product_details.css" rel="stylesheet">
    <meta name="robots" content="noindex,follow" />

</head>

<body>
    <header class="header bg-transparent">
        <div class="container-fluid px-lg-5">
            <!-- nav -->
            <nav class="py-4">
                <div id="logo">
                    <h1> <a href="#">STEPSOUT</a></h1>
                </div>

                <label for="drop" class="toggle">Menu</label>
                <input type="checkbox" id="drop" />
                <ul class="menu mt-2">
                    <li class=""><a href="index.php">Home</a></li>
                    <li><a href="#">About</a></li>
                    <li><a href="product.php">Product</a></li>
                    <li><a href="contact.php">Contact</a></li>

                    <!-- <li>
                            <label for="drop-2" class="toggle">Drop Down <span class="fa fa-angle-down" aria-hidden="true"></span> </label>
                            <a href="#">Drop Down <span class="fa fa-angle-down" aria-hidden="true"></span></a>
                            <input type="checkbox" id="drop-2" />
                            <ul>
                                <li><a href="blog.html">Blog</a></li>
                                <li><a href="shop.html">Shop Now</a></li>
                                <li><a href="shop-single.html">Single Page</a></li>
                            </ul>
                        </li> -->
                    <?php if (isset($_SESSION['Username'])) { ?>
                        <a href="#" id="user-in"><?php echo strtoupper($_SESSION['Username']); ?></a>
                        <li><a href="logout.php">logout</a></li>

                    <?php } else { ?>
                        <li><a href="./login.php">Signin</a></li>
                    <?php
                    }
                    ?>
                    <li>|</li>

                    <li><a href="cart.php"><i class="bi bi-cart4 fa-10x" style="font-size:20px;"></i></a></li>

                </ul>
            </nav>
            <!-- //nav -->
        </div>
    </header>
    <main class="container">

        <!-- Left Column / Headphones Image -->
        <div class="left-column">
            <img class="active" src="./images/<?= $row['image'] ?>" alt="">
        </div>


        <!-- Right Column -->
        <div class="right-column">

            <!-- Product Description -->
            <div class="product-description">
                <span>Shoes</span>
                <h1><?= $row['prdnm'] ?>(<?= $row['brand'] ?>)</h1>
                <p>The preferred choice of a vast range of acclaimed DJs. Punchy, bass-focused sound and high isolation. Sturdy headband and on-ear cushions suitable for live performance</p>
            </div>

            <!-- Product Configuration -->
            <div class="product-configuration">

                <!-- Product Color -->
                <div class="product-color">
                    <span>Color</span>

                    <div class="color-choose">
                        <input type="radio" class="btn-check" name="options-outlined" id="success-outlined" autocomplete="off" checked>
                        <label class="btn btn-outline-success" for="success-outlined">Green</label>

                        <input type="radio" class="btn-check" name="options-outlined" id="danger-outlined" autocomplete="off">
                        <label class="btn btn-outline-danger" for="danger-outlined">Red</label>
                        <input type="radio" class="btn-check" name="options-outlined" id="primary-outlined" autocomplete="off">
                        <label class="btn btn-outline-primary" for="primary-outlined">Blue</label>
                    </div>

                </div>

                <!-- Cable Configuration -->
                <div class="cable-config">
                    <span>Size</span>

                    <div class="cable-choose">
                        <input type="radio" class="btn-check" name="size" id="9" autocomplete="off" checked>
                        <label class="btn btn-outline-danger" for="9">9</label>

                        <input type="radio" class="btn-check" name="size" id="8" autocomplete="off">
                        <label class="btn btn-outline-danger" for="8">8</label>
                        <input type="radio" class="btn-check" name="size" id="7" autocomplete="off">
                        <label class="btn btn-outline-danger" for="7">7</label>
                        <input type="radio" class="btn-check" name="size" id="6" autocomplete="off">
                        <label class="btn btn-outline-danger" for="6">6</label>
                    </div>

                </div>
            </div>

            <!-- Product Pricing -->
            <div class="product-price">
                <span>₹<?= $row['prdpr'] ?></span>
                <a href="buy.php" class="cart-btn buy_btn mx-2" style="background-color: #fb641b;" name="btn_s">Buy now</a>
                <a href="add_cart.php?id=<?= $row['prdid'] ?>" class="cart-btn">Add to cart</a>
            </div>
        </div>
    </main>

    <!-- Scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js" charset="utf-8"></script>
    <!-- <script>
        $(document).ready(function() {

            $('.color-choose input').on('click', function() {
                var headphonesColor = $(this).attr('data-image');

                $('.active').removeClass('active');
                $('.left-column img[data-image = ' + headphonesColor + ']').addClass('active');
                $(this).addClass('active');
            });

        });
    </script> -->
</body>

</html>