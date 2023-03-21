<?php
session_start();
$usr_name = $_SESSION['Username'];
$con = mysqli_connect("localhost", "root", "", "shoes");
$sql = "SELECT * FROM `auth` where username ='$usr_name'";
$result = mysqli_query($con, $sql);
while ($row = mysqli_fetch_array($result)) {
    $sql = "SELECT * FROM `tbl_order`";
    $result1 = mysqli_query($con, $sql);
    $row1 = mysqli_fetch_array($result1);
?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>ADMIN-ORDER VIEW</title>
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
          </div>
        </div>
                 
            </div>
          </div>
        </div>
      </nav>
    </header>
    <!-- Hero Section-->
    <section class="hero hero-page gray-bg padding-small"  style="padding: 42px">
      <div class="container">
        <div class="row d-flex">
          <div class="col-lg-9 order-2 order-lg-1">
            <h1>Your orders</h1><p class="lead">Your orders in one place.</p>
          </div>
          <div class="col-lg-3 text-right order-1 order-lg-2">
            <ul class="breadcrumb justify-content-lg-end">
              <!-- <li class="breadcrumb-item"><a href="https://demo.bootstrapious.com/hub/1-4-2/index.html">Home</a></li> -->
              <!-- <li class="breadcrumb-item active">Orders</li> -->
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
            <div class="customer-profile"><a href="customer-orders.html#" class="d-inline-block"></a>
              <h5>Amal</h5> 
              <p class="text-muted text-big">Kannur</p>
            </div>
            <nav class="list-group customer-nav"><a href="customer-orders.html" class="active list-group-item d-flex justify-content-between align-items-center"  style="background: #4CAF50;border-color: #4CAF50;"><span><span class="icon icon-bag"></span>Orders</span><small class="badge badge-pill badge-light"></small></a><a href="https://demo.bootstrapious.com/hub/1-4-2/customer-account.html" class="list-group-item d-flex justify-content-between align-items-center"><span><span class="icon icon-profile"></span>Profile</span></a><a href="https://demo.bootstrapious.com/hub/1-4-2/customer-addresses.html" class="list-group-item d-flex justify-content-between align-items-center"><span><span class="icon icon-map"></span>Addresses</span></a><a href="https://demo.bootstrapious.com/hub/1-4-2/customer-login.html" class="list-group-item d-flex justify-content-between align-items-center"><span><span class="fa fa-sign-out"></span>Log out</span></a>
            </nav>
          </div>
          <div class="col-lg-8 col-xl-9 pl-lg-3">
            <table class="table table-hover table-responsive-md">
  
              <thead>
                <tr>
                  <th>Order</th>
                  <th>Date</th>
                  <th>Total</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <th><?=$row1['oid']?></th>
                  <td><?=$row1['Date']?></td>
                  <td><?=$row1['price']?></td>
                  <td><span class="badge badge-info">Being prepared</span></td>
                  <td><a href="order.php" class="btn btn-primary btn-sm"  style="background: #4CAF50;border-color: #4CAF50;">View</a></td>
                </tr>
                <?php
                }
                ?>
                <!-- <tr>
                  <th># 1734</th>
                  <td>7/5/2017</td>
                  <td>$150.00</td>
                  <td><span class="badge badge-warning">Action needed</span></td>
                  <td><a href="https://demo.bootstrapious.com/hub/1-4-2/customer-order.html" class="btn btn-primary btn-sm">View</a></td>
                </tr>
                <tr>
                  <th># 1730</th>
                  <td>30/9/2016</td>
                  <td>$150.00</td>
                  <td><span class="badge badge-success">Received</span></td>
                  <td><a href="" class="btn btn-primary btn-sm">View</a></td>
                </tr>
                <tr>
                  <th># 1705</th>
                  <td>22/6/2016</td>
                  <td>$150.00</td>
                  <td><span class="badge badge-danger">Cancelled</span></td>
                  <td><a href="" class="btn btn-primary btn-sm">View</a></td>
                </tr> -->
              </tbody>
            </table>
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
  </body>
</html>