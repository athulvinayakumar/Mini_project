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
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>STEPSOUT-ORDER VIEW</title>
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
    <!-- navbar-->
      <nav class="navbar navbar-expand-lg">
        <div class="search-area">
          <div class="search-area-inner d-flex align-items-center justify-content-center">
            <div class="close-btn"><i class="icon-close"></i></div>
            <form action="">
            </form>
          </div>
        </div>
      </nav>
    </header>
    <!-- Hero Section-->
    <section class="hero hero-page gray-bg padding-small">
      <div class="container">
        <div class="row d-flex">
          <div class="col-lg-9 order-2 order-lg-1">
            <h1>Order #1735</h1><p class="lead">Order #1735 was placed on <strong>22/06/2013</strong> and is currently <strong>Being prepared</strong>.</p><p class="text-muted">If you have any questions, please feel free to contact us/a>, our customer service center is working for you 24/7.</p>
          </div>
          <div class="col-lg-3 text-right order-1 order-lg-2">
            <ul class="breadcrumb justify-content-lg-end">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item"><a href="https://demo.bootstrapious.com/hub/1-4-2/customer-orders.html">Orders</a></li>
              <li class="breadcrumb-item active">Order #1735</li>
            </ul>
          </div>
        </div>
      </div>
    </section>
    <section class="padding-small">
      <div class="container">
        <div class="row">
          <!-- Customer Sidebar-->
          <div class="customer-sidebar col-xl-3 col-lg-4 mb-md-5">
            <div class="customer-profile"><a href="customer-order.html#" class="d-inline-block"></a>
              <h5>Amal</h5>
              <!-- <p class="text-muted text-small">Ostrava, Czech republic</p> -->
            </div>
            <nav class="list-group customer-nav"><a href="https://demo.bootstrapious.com/hub/1-4-2/customer-orders.html" class="active list-group-item d-flex justify-content-between align-items-center" style=" background: #4CAF50; border-color: #4CAF50;"><span><span class="icon icon-bag"></span >Orders</span><small class="badge badge-pill badge-light">5</small></a><a href="https://demo.bootstrapious.com/hub/1-4-2/customer-account.html" class="list-group-item d-flex justify-content-between align-items-center"><span><span class="icon icon-profile"></span>Profile</span></a><a href="https://demo.bootstrapious.com/hub/1-4-2/customer-addresses.html" class="list-group-item d-flex justify-content-between align-items-center"><span><span class="icon icon-map"></span>Addresses</span></a><a href="https://demo.bootstrapious.com/hub/1-4-2/customer-login.html" class="list-group-item d-flex justify-content-between align-items-center"><span><span class="fa fa-sign-out"></span>Log out</span></a>
            </nav>
          </div>
          <div class="col-lg-8 col-xl-9 pl-lg-3">
            <div class="basket basket-customer-order">
              <div class="basket-holder">
                <div class="basket-header">
                  <div class="row">
                    <div class="col-6">Product</div>
                    <div class="col-2">Price</div>
                    <div class="col-4">Quantity</div>
                    <!-- <div class="col-2 text-right">Date</div> -->
                    <!-- <div class="col-2 text-right">BILL</div> -->
                    <!-- <div class="col-2 text-right">Date</div>    -->
                  </div>
                </div>
                <div class="basket-body">
                <?php
                while ($row1 = mysqli_fetch_array($result1)) {
                $prdid = $row1['pid'];
                $sql = "SELECT * FROM `admins` WHERE `prdid` = $prdid ";
                $result2 = mysqli_query($con, $sql);
                $row = mysqli_fetch_array($result2);
                ?>
                  <!-- Product-->
                  <div class="item">
                    <div class="row d-flex align-items-center">
                      <div class="col-6">
                        <div class="d-flex align-items-center"><img src="./product_img/<?=$row['image']?>" alt="..." class="img-fluid">
                          <div class="title"><a href="https://demo.bootstrapious.com/hub/1-4-2/detail.html">
                              <h6><?=$row['prdnm']?></h6><span class="text-muted"></span></a></div>
                        </div>
                      </div>
                      <div class="col-2"><span><?=$row['prdpr']?></span></div>
                      <div class="col-2"><?=$row['prqnt']?></div>
                      <!-- <div class="col-2 text-right"><span><?=$row1['']?></span></div> -->
                    </div>
                  </div>
                  <!-- Product-->
                  <?php
                        }
                  ?>
                </div>
            <br> <br> <br>
            <div class="row addresses">
              <div class="col-sm-6">
                <div class="block-header">
                  <h6 class="text-uppercase">Invoice address</h6>
                </div>
                <div class="block-body">
                  <p>John Brown<br>					13/25 New Avenue<br>					New Heaven<br>					45Y 73J<br>					England<br>					Great Britain</p>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="block-header">
                  <h6 class="text-uppercase">Shipping address</h6>
                </div>
                <div class="block-body">
                  <p>John Brown<br>					13/25 New Avenue<br>					New Heaven<br>					45Y 73J<br>					England<br>					Great Britain</p>
                </div>
              </div>
            </div>
            <!-- /.addresses                           -->
          </div>
        </div>
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
  </body>
</html>