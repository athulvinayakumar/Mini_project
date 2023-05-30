<?php
session_start();
$con = mysqli_connect("localhost", "root", "", "shoess");
$mysql = "SELECT * FROM `tbl_special`";
$result = mysqli_query($con, $mysql);
?>
<!DOCTYPE html>
<html lang="zxx">

<head>
    <title>STEPSOUT</title>
    <!-- Meta tag Keywords -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8" />
    <meta name="keywords" content="" />
    <script>
        addEventListener("load", function() {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>
    <!-- //Meta tag Keywords -->

    <!-- Custom-Files -->
    <link rel="stylesheet" href="bootstrap.css">
    <!-- Bootstrap-Core-CSS -->
    <link rel="stylesheet" href="style.css" type="text/css" media="all" />
    <link rel="stylesheet" href="./css/style2.css">
    <!-- Style-CSS -->
    <!-- font-awesome-icons -->
    <link href="font-awesome.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">



    <!-- //font-awesome-icons -->
    <!-- /Fonts -->
    <link href="//fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700" rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Source+Sans+Pro:200,200i,300,300i,400,400i,600,600i,700,700i,900" rel="stylesheet">
    <link rel="stylesheet" href="./css/product.css">
    <style>
        .menu li a {
            color: black !important;
        }

        .menu li a:hover {
            color: red !important;
        }

        #user-in {
            color: black !important;
        }
    </style>
</head>

<body>

    <!-- mian-content -->
    <div class="main-banner h-44" style="background-image: url('./images/sale_bg.jpg'); min-height:546px;" id="home">
        <!-- header -->
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
                        <li><a href="about.php">About</a></li>
                        <li><a href="product.php">Product</a></li>
                        <li><a href="feedback.php">Review</a></li>

                        <?php if (isset($_SESSION['Username'])) { ?>
                            <li class="nav-item dropdown">
                                <a class="dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <?php echo strtoupper($_SESSION['Username']); ?>
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="./profile.php">Profile</a></li>
                                    <li><a class="dropdown-item" href="changepsw.php">Change Password</a></li>
                                    <li><a class="dropdown-item" href="logout.php">logout</a></li>

                                </ul>
                            </li>

                        <?php } else { ?>
                            <li><a href="./login.php">Signin</a></li>
                        <?php
                        }
                        ?>
                        <?php if (isset($_SESSION['Username'])) { ?>
                            <li>|</li>
                            <li><a href="cart.php"><i class="bi bi-cart4 fa-10x" style="font-size:20px;"></i></a></li>
                        <?php } else { ?>
                            <li><a href="login.php"><i class="bi bi-cart4 fa-10x" style="font-size:20px;"></i></a></li>
                        <?php } ?>
                        <?php if (isset($_SESSION['Username'])) { ?>
                            <!-- <li>|</li>  -->
                            <li><a href="wishlist.php"><i class="bi bi-heart" style="font-size:20px;"></i></a></li>
                        <?php } else { ?>
                            <li><a href="login.php"><i class="bi bi-heart" style="font-size:20px;"></i></a></li>
                        <?php } ?>



                    </ul>
                </nav>
                <!-- //nav -->
            </div>
        </header>
        <!-- //header -->
        <!--/banner-->
        <div class="banner-info">
            <a href=""><img src="./images/offer.png" alt="" style="width: 70%;margin-top: -26%;"></a>
        </div>
        <!--// banner-inner -->

    </div>

    <section class="gallery">
        <div class="container">
            <div class="title">
                <h1>Special Offers</h1>
            </div>
            <div class="gallery-items">                    
                <?php
                while ($row = mysqli_fetch_array($result)) {
                ?>
                    <a href="#">
                        <div class="item col-md-4 product-men my-5">
                            <div class="product-shoe-info shoe text-center">
                                <div class="men-thumb-item">
                                    <img src="product_img/<?= $row['pr_image'] ?>" class="img-fluid" alt="">
                                    <span class="product-new-top">New</span>
                                </div>
                                <div class="item-info-product">
                                    <h4>
                                        <a href="#"><?= $row['pr_name'] ?></a>
                                    </h4>

                                    <div class="product_price">
                                        <div class="grid-price">
                                            <span class="money"><?= $row['pr_price'] ?></span>
                                        </div>
                                    </div>
                                    <a href="#" class="btn btn-success cart_btn">Add to Cart</a>
                                </div>
                            </div>
                        </div>
                    </a>
                <?php
                }
                ?>
            </div>
            <div class="pagination d-flex justify-content-center">
                <div class="prev">Prev</div>
                <div class="page">Page <span class="page-num"></span></div>
                <div class="next">Next</div>
            </div>
        </div>
    </section>
    <!-- footer -->
    <footer>
        <div class="container">
            <div class="row footer-top">
                <div class="col-lg-4 footer-grid_section_w3layouts">
                    <h2 class="logo-2 mb-lg-4 mb-3">
                        <a href="index.html">STEPSOUT</a>
                    </h2>
                    <p></p>
                    <h4 class="sub-con-fo ad-info my-4">Catch on Social</h4>
                    <ul class="w3layouts_social_list list-unstyled">
                        <li>
                            <a href="#" class="w3pvt_facebook">
                                <span class="fa fa-facebook-f"></span>
                            </a>
                        </li>
                        <li class="mx-2">
                            <a href="#" class="w3pvt_twitter">
                                <span class="fa fa-twitter"></span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="w3pvt_dribble">
                                <span class="fa fa-dribbble"></span>
                            </a>
                        </li>
                        <li class="ml-2">
                            <a href="#" class="w3pvt_google">
                                <span class="fa fa-google-plus"></span>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-8 footer-right">
                    <div class="w3layouts-news-letter">
                        <h3 class="footer-title text-uppercase text-wh mb-lg-4 mb-3">Newsletter</h3>

                        <p>By subscribing to our mailing list you will always get latest news and updates from us.</p>
                        <form action="#" method="post" class="w3layouts-newsletter">
                            <input type="email" name="Email" placeholder="Enter your email..." required="">
                            <button class="btn1"><span class="fa fa-paper-plane-o" aria-hidden="true"></span></button>

                        </form>
                    </div>
                    <div class="row mt-lg-4 bottom-w3layouts-sec-nav mx-0">
                        <div class="col-md-4 footer-grid_section_w3layouts">
                            <h3 class="footer-title text-uppercase text-wh mb-lg-4 mb-3">Information</h3>
                            <ul class="list-unstyled w3layouts-icons">
                                <li>
                                    <a href="#">Home</a>
                                </li>
                                <li class="mt-3">
                                    <a href="#">About Us</a>
                                </li>
                                <!-- <li class="mt-3">
                                    <a href="#">Gallery</a>
                                </li> -->
                                <li class="mt-3">
                                    <a href="#">Services</a>
                                </li>
                                <li class="mt-3">
                                    <a href="#">Contact Us</a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-md-4 footer-grid_section_w3layouts">
                            <!-- social icons -->
                            <div class="agileinfo_social_icons">
                                <h3 class="footer-title text-uppercase text-wh mb-lg-4 mb-3">Customer Service</h3>
                                <ul class="list-unstyled w3layouts-icons">

                                    <li>
                                        <a href="#">About Us</a>
                                    </li>
                                    <li class="mt-3">
                                        <a href="#">Delivery & Returns</a>
                                    </li>
                                    <li class="mt-3">
                                        <a href="#">Waranty</a>
                                    </li>
                                    <li class="mt-3">
                                        <a href="#">Terms & Condition</a>
                                    </li>
                                    <li class="mt-3">
                                        <a href="#">Privacy Plolicy</a>
                                    </li>
                                </ul>
                            </div>
                            <!-- social icons -->
                        </div>
                        <div class="col-md-4 footer-grid_section_w3layouts my-md-0 my-5">
                            <h3 class="footer-title text-uppercase text-wh mb-lg-4 mb-3">Contact Info</h3>
                            <div class="contact-info">
                                <div class="footer-address-inf">
                                    <h4 class="ad-info mb-2">Phone</h4>
                                    <p>9526302595</p>
                                </div>
                                <div class="footer-address-inf my-4">
                                    <h4 class="ad-info mb-2">Email </h4>
                                    <p><a href="#">VK@gmail.com</a></p>
                                    <!-- </div>
                                <div class="footer-address-inf">
                                    <h4 class="ad-info mb-2">Location</h4>
                                    <p>Honey Avenue, New York City</p>
                                </div> -->
                                </div>
                            </div>


                        </div>
                        <div class="cpy-right text-left row">
                            <p class="col-md-10">© 2022 VK All rights reserved | Design by
                            </p>
                            <!-- move top icon -->
                            <!-- <a href="#home" class="move-top text-right col-md-2"><span class="fa fa-long-arrow-up" aria-hidden="true"></span></a> -->
                            <!-- //move top icon -->
                        </div>
                    </div>
                </div>
            </div>
    </footer>
    <!-- //footer -->

</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script src="./product.js"></script>

</html>