<?php
session_start();
$usr_name = $_SESSION['Username'];
$con = mysqli_connect("localhost", "root", "", "shoes");
$sql = "SELECT * FROM `auth` where username ='$usr_name'";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_array($result);
$name = $row["username"];
?>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>STEPSOUT-ORDER COMPLETED</title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="robots" content="all,follow">
  <!-- Bootstrap CSS-->
  <link rel="stylesheet" href="https://d19m59y37dris4.cloudfront.net/hub/1-4-2/vendor/bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome CSS-->
  <link rel="stylesheet" href="https://d19m59y37dris4.cloudfront.net/hub/1-4-2/vendor/font-awesome/css/font-awesome.min.css">
  <!-- Bootstrap Select-->
  <link rel="stylesheet" href="https://d19m59y37dris4.cloudfront.net/hub/1-4-2/vendor/bootstrap-select/css/bootstrap-select.min.css">
  <!-- Price Slider Stylesheets -->
  <link rel="stylesheet" href="https://d19m59y37dris4.cloudfront.net/hub/1-4-2/vendor/nouislider/nouislider.css">
  <!-- Custom font icons-->
  <link rel="stylesheet" href="https://d19m59y37dris4.cloudfront.net/hub/1-4-2/css/custom-fonticons.css">
  <!-- Google fonts - Poppins-->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,700">
  <!-- owl carousel-->
  <link rel="stylesheet" href="https://d19m59y37dris4.cloudfront.net/hub/1-4-2/vendor/owl.carousel/assets/owl.carousel.css">
  <link rel="stylesheet" href="https://d19m59y37dris4.cloudfront.net/hub/1-4-2/vendor/owl.carousel/assets/owl.theme.default.css">
  <!-- theme stylesheet-->
  <link rel="stylesheet" href="https://d19m59y37dris4.cloudfront.net/hub/1-4-2/css/style.default.css" id="theme-stylesheet">
  <!-- Custom stylesheet - for your changes-->
  <link rel="stylesheet" href="https://d19m59y37dris4.cloudfront.net/hub/1-4-2/css/custom.css">
  <!-- Favicon-->
  <link rel="shortcut icon" href="https://d19m59y37dris4.cloudfront.net/hub/1-4-2/img/favicon.ico">
  <!-- Modernizr-->
  <script src="https://d19m59y37dris4.cloudfront.net/hub/1-4-2/js/modernizr.custom.79639.js"></script>
</head>

<body>
  <nav class="navbar navbar-expand-lg">
    <div class="search-area">
      <div class="search-area-inner d-flex align-items-center justify-content-center">
        <div class="close-btn"><i class="icon-close"></i></div>
        <form action="checkout5.html#">
          <div class="form-group">
            <input type="search" name="search" id="search" placeholder="What are you looking for?">
            <button type="submit" class="submit"><i class="icon-search"></i></button>
          </div>
        </form>
      </div>
    </div>
    <div class="container-fluid">
      <!-- Navbar Header  -->
      <button type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler navbar-toggler-right"><i class="fa fa-bars"></i></button>
  </nav>
  </header>
  <!-- Hero Section-->
  <section class="hero hero-page gray-bg padding-small">
    <div class="container">
      <div class="row d-flex">
        <div class="col-lg-9 order-2 order-lg-1">
          <h1>Order Confirmed</h1>
        </div>
        <div class="col-lg-3 text-right order-1 order-lg-2">
          <ul class="breadcrumb justify-content-lg-end">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item active">Order Confirmed</li>
          </ul>
        </div>
      </div>
    </div>
  </section>
  <!-- Checout Forms-->
  <section class="checkout">
    <div class="container">
      <div class="confirmation-icon" style="color: #4CAF50; border: solid 1px #4CAF50;"><i class="fa fa-check" style="padding-top: 23px;"></i></div>
      <h2>Thank you,<?=$name?>. Your order is confirmed.</h2>
      <p class="mb-5">Your order hasn't shipped yet but we will send you ane email when it does.</p>
      <p> <a href="" class="btn btn-template wide" style="background-color: #4CAF50; border-color: #4CAF50;">View or
          Manage your order</a></p>
    </div>
  </section>
  <!-- Footer-->
  <footer class="main-footer">
    <!-- Service Block-->
    <div class="services-block">
      <div class="container">
        <div class="row">
          <div class="col-lg-4 d-flex justify-content-center justify-content-lg-start">
            <div class="item d-flex align-items-center">
              <div class="icon"><i class="icon-truck"></i></div>
              <div class="text">
                <h6 class="no-margin text-uppercase">Free shipping &amp; return</h6><span>Free Shipping over $300</span>
              </div>
            </div>
          </div>
          <div class="col-lg-4 d-flex justify-content-center">
            <div class="item d-flex align-items-center">
              <div class="icon"><i class="icon-coin"></i></div>
              <div class="text">
                <h6 class="no-margin text-uppercase">Money back guarantee</h6><span>30 Days Money Back Guarantee</span>
              </div>
            </div>
          </div>
          <div class="col-lg-4 d-flex justify-content-center">
            <div class="item d-flex align-items-center">
              <div class="icon"><i class="icon-headphones"></i></div>
              <div class="text">
                <h6 class="no-margin text-uppercase">020-800-456-747</h6><span>24/7 Available Support</span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Main Block -->


    <!-- JavaScript files-->
    <script src="https://d19m59y37dris4.cloudfront.net/hub/1-4-2/vendor/jquery/jquery.min.js"></script>
    <script src="https://d19m59y37dris4.cloudfront.net/hub/1-4-2/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="https://d19m59y37dris4.cloudfront.net/hub/1-4-2/vendor/jquery.cookie/jquery.cookie.js"> </script>
    <script src="https://d19m59y37dris4.cloudfront.net/hub/1-4-2/vendor/owl.carousel/owl.carousel.min.js"></script>
    <script src="https://d19m59y37dris4.cloudfront.net/hub/1-4-2/vendor/owl.carousel2.thumbs/owl.carousel2.thumbs.min.js"></script>
    <script src="https://d19m59y37dris4.cloudfront.net/hub/1-4-2/vendor/bootstrap-select/js/bootstrap-select.min.js"></script>
    <script src="https://d19m59y37dris4.cloudfront.net/hub/1-4-2/vendor/nouislider/nouislider.min.js"></script>
    <script src="https://d19m59y37dris4.cloudfront.net/hub/1-4-2/vendor/jquery-countdown/jquery.countdown.min.js"></script>
    <script src="https://d19m59y37dris4.cloudfront.net/hub/1-4-2/vendor/masonry-layout/masonry.pkgd.min.js"></script>
    <script src="https://d19m59y37dris4.cloudfront.net/hub/1-4-2/vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>
    <!-- Main Template File-->
    <script src="https://d19m59y37dris4.cloudfront.net/hub/1-4-2/js/front.js"></script>
</body>

</html>