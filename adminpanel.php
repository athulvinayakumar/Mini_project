<?php
session_start();
include 'db.php';
if (!isset($_SESSION['Username'])) {
  header('location:login.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" /> -->
  <script src="js/jquery-3.6.0.min.js"></script>
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <title>Admin panel</title>
  <link rel="stylesheet" href="css/admin.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
  <style>
    .display-3,
    a {
      display: inline-block;
    }

    .bg-nav-color {
      background-color: #212529 !important;
      margin-left: -3% !important;
      margin-right: -2% !important;
    }

    .nav-link {
      color: #fff !important;
    }
  </style>

</head>

<body>

  <div class="row">
    <div class="col-md-2">
      <div class="side-pane" style="height: 136vh;">
        <div class="page-header">
          <h1 style="color: white;">Admin</h1>

        </div>
        <table style="width: 100%;">

          <tr>
            <td><button id='Add-item' class="panel_btns"><i class="fa fa-plus-circle" aria-hidden="true"></i> Add Item</button></td>
          </tr>
          <tr>
            <td><button id='history' class="panel_btns"><i class="fa fa-plus-circle" aria-hidden="true"></i>Overall Sales</button></td>
          </tr>
          <tr>
            <td><button id='Add-colour' class="panel_btns"><i class="fa fa-plus-circle" aria-hidden="true"></i> Add Color</button></td>
          </tr>
          <tr>
            <td><button id='Add-cat' class="panel_btns"><i class="fa fa-plus-circle" aria-hidden="true"></i> Add Category</button></td>
          </tr>
          <tr>
            <td><button id='Add-special' class="panel_btns"><i class="fa fa-plus-circle" aria-hidden="true"></i> Add Special Offers</button></td>
          </tr>
          <tr>
            <td> <button id='Product' class="panel_btns"><i class="fa fa-user-circle" aria-hidden="true"></i> Products</button></td>
          </tr>
          <tr>
            <td><button id='View' class="panel_btns"><i class="fa fa-opencart" aria-hidden="true"></i> View Users</button></td>
          </tr>
          <tr>
            <td>
              <p>
                <button class="panel_btns" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                  Sales <i class="bi bi-caret-down-fill"></i>
                </button>
              </p>
              <div class="collapse" id="collapseExample">
                <div class="card card-body" style="background: #212529;border:none">
                  <button id='stock' class="panel_btns"><i class="fa fa-home" aria-hidden="true"></i>Sales Graph</button>
                  <button id='report' class="panel_btns"><i class="fa fa-home" aria-hidden="true"></i>Sales Report</button>
                </div>
              </div>
            </td>
          </tr>
          <tr>
            <td><button id='seller_products' class="panel_btns"><i class="fa fa-opencart" aria-hidden="true"></i> Seller Products</button></td>
          </tr>
          <tr>
            <td><button id='usr_msg' class="panel_btns"><i class="fa fa-opencart" aria-hidden="true"></i> Contact Message</button></td>
          </tr>
          <tr>
            <td><button id='sel_msg' class="panel_btns"><i class="fa fa-opencart" aria-hidden="true"></i> Seller Messages</button></td>
          </tr>
          <tr>
            <td><button id='sel_req' class="panel_btns"><i class="fa fa-opencart" aria-hidden="true"></i> Seller Request</button></td>
          </tr>
          <tr>
            <td><button id='usr_review' class="panel_btns"><i class="fa fa-opencart" aria-hidden="true"></i>User Review</button></td>
          </tr>
          <tr>
            <td><button id='view_order' class="panel_btns"><i class="fa fa-home" aria-hidden="true"></i> View Order List</button></td>
          </tr>
          <tr>
            <td><button id='view_payment_details' class="panel_btns"><i class="fa fa-home" aria-hidden="true"></i> View payment Details</button></td>
          </tr>
          <tr>
            <td><button id='today' class="panel_btns"><i class="fa fa-home" aria-hidden="true"></i>Todays Orders</button></td>
          </tr>
          <tr>
            <td><button id='pending' class="panel_btns"><i class="fa fa-home" aria-hidden="true"></i>Pending Orders</button></td>
          </tr>
          <tr>
            <td><button id='home-page' class="panel_btns"><i class="fa fa-home" aria-hidden="true"></i> Home Page</button></td>
          </tr>


        </table>
      </div>

    </div>


    <!-- add  container -->

    <div class="col-md-10 " id="add-movies-container">
      <nav class="navbar navbar-expand-lg bg-body-tertiary bg-nav-color">
        <div class="container-fluid">
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">

            </ul>
            <form class="d-flex" role="search">
              <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                  <a class="nav-link active" aria-current="page" href="product_charts.php">Sales chart</a>
                </li>
                <br>
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Admin
                  </a>
                  <ul class="dropdown-menu" style="background-color: #212529;">
                    <li><button id='logout' class="panel_btns"><i class="fa fa-chevron-right" aria-hidden="true"></i> Logout</button></li>
                  </ul>
                </li>
                <li>&emsp;&emsp;&emsp;&emsp;&emsp;</li>
              </ul>
            </form>
          </div>
        </div>
      </nav>
      <div class="p-5 bg-light">
        <div class="container">
          <p>
          <h1 class="display-3">Add new Items</h1>
          </p>
        </div>

        <form method="post" id="form" enctype="multipart/form-data" action="admin.php">
          <div class="mb-3">
            <h6>Select Category</h6>
            <label for="" class="form-label"></label>
            <select name="category" class="form-control" id="m">
              <?php
              $sql = "SELECT * FROM `tbl_category`";
              $result = mysqli_query($connection, $sql);
              while ($row = mysqli_fetch_array($result)) {
              ?>
                <option value="<?= $row['cat_name'] ?>"><?= $row['cat_name'] ?></option>
              <?php
              }
              ?>
            </select>
          </div>
          <div class="mb-3">
            <h6>Product name</h6>
            <label for="" class="form-label"></label>
            <input type="text" class="form-control" name="vk" id="b" aria-describedby="helpId" onkeyup="product()" autocomplete="off">
            <div id="message2"></div>
          </div>
          <div class="mb-3">
            <h6>Product quantity</h6>
            <label for="" class="form-label"></label>
            <input type="text" class="form-control" name="a" id="d" aria-describedby="helpId" onkeyup="pro_qnt()" autocomplete="off">
            <div id="message4"></div>
          </div>

          <div class="mb-3">
            <h6>Product Price</h6>
            <label for="" class="form-label"></label>
            <input type="text" class="form-control" name="ak" id="c" aria-describedby="helpId" onkeyup="pro_price()" autocomplete="off">
            <div id="message3"></div>
          </div>

          <div class="mb-3">
            <h6>Product Discription</h6>
            <label for="" class="form-label"></label>
            <textarea class="form-control" name="discription" onkeyup="discriptions()" id="a" rows="2"></textarea>
            <div id="message5"></div>
          </div>
          <div class="mb-3">
            <h6>Product Brand</h6>
            <label for="" class="form-label"></label>
            <select name="p_brand" class="form-control" id="s">
              <?php
              $sql = "SELECT * FROM `bands`";
              $result = mysqli_query($connection, $sql);
              while ($row = mysqli_fetch_array($result)) {
              ?>
                <option value="<?= $row['b_name'] ?>"><?= $row['b_name'] ?></option>
              <?php
              }
              ?>
            </select>
          </div>
          <div class="mb-3">
            <h6>Product image</h6>
            <label for="" class="form-label"></label>
            <input type="file" class="form-control" name="img" id="e" aria-describedby="helpId" onchange="unames()" autocomplete="off">
            <div id="message5"></div>
          </div>
          <button type="submit" name="submit" class="btn btn-primary" id="add-btn">Add</button>
          <button type="reset" class="btn btn-secondary">Reset</button>
      </div>
      </form>
    </div>
  </div>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="admin.js"></script>
</body>


<script>
  $("#Product").click(function() {
    window.location.href = "edit_details.php";
  })
  $("#history").click(function() {
    window.location.href = "seminar.php";
  })
  $("#Add-special").click(function() {
    window.location.href = "edit_special.php";
  })
  $("#sel_msg").click(function() {
    window.location.href = "seller_msg_request.php";
  })
  $("#Add-cat").click(function() {
    window.location.href = "cat.php";
  })
  $("#Add-colour").click(function() {
    window.location.href = "color.php";
  })
  $("#home-page").click(function() {
    window.location.href = "index.php";
  })
  $("#pending").click(function() {
    window.location.href = "pending_orders.php";
  })
  $("#logout").click(function() {
    window.location.href = "logout.php";
  })
  $("#stock").click(function() {
    window.location.href = "sales_graph.php";
  })
  $("#report").click(function() {
    window.location.href = "sales_report.php";
  })
  $("#View").click(function() {
    window.location.href = "view_user.php";
  })
  $("#usr_msg").click(function() {
    window.location.href = "usr_msg.php";
  })
  $("#usr_review").click(function() {
    window.location.href = "usr_msg.php";
  })
  $("#sel_req").click(function() {
    window.location.href = "seller_req.php";
  })
  $("#view_order").click(function() {
    window.location.href = "admin_order.php";
  })
  $("#seller_products").click(function() {
    window.location.href = "seller_products.php";
  })
  $("#view_payment_details").click(function() {
    window.location.href = "view_payment.php";
  })
  $("#today").click(function() {
    window.location.href = "todays_orders.php";
  })
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

</html>