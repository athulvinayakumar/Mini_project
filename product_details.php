<html>
<?php
session_start();
$pro_id = $_GET['id'];
$con = mysqli_connect("localhost", "root", "", "shoes");
$mysql = "SELECT * FROM `admins` WHERE prdid = '$pro_id'";
$result = mysqli_query($con, $mysql);
$row = mysqli_fetch_array($result);

$_SESSION['total_amount'] = $row['prdpr'];
?>

<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"> -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">

    <!--jQuery library-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- <link rel="stylesheet" href="style.css" type="text/css" media="all" /> -->
    <link rel="stylesheet" href="./css/flip.css">
    <!-- <link rel="stylesheet" href="./css/style2.css"> -->
    <link href="product_details.css" rel="stylesheet">
    <!--Latest compiled and minified JavaScript-->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Navbar in Bootstrap</title>
    <style>
        nav {
            margin: 0;
            padding: 0;
            margin-bottom: 20px;
        }


        #logo a {
            float: left;
            display: initial;
            margin: 0;
            letter-spacing: 1px;
            color: #fff;
            font-size: 1em;
            font-weight: 700;
            text-shadow: 2px 5px 3px rgba(0, 0, 0, 0.06);
        }

        nav:after {
            content: "";
            display: table;
            clear: both;
        }

        nav ul {
            float: right;
            padding: 0;
            margin: 0;
            list-style: none;
            position: relative;
        }

        nav ul li {
            margin: 0px 1em;
            display: inline-block;
            float: left;
        }
    </style>
</head>

<body>
    <!-- <header class="header bg-transparent"> -->
    <div class="container-fluid px-lg-5 mb-3">
        <!-- nav -->
        <nav class="py-4 pt-5 mb-5">
            <div id="logo">
                <h1> <a href="#">STEPSOUT</a></h1>
            </div>
            <ul class="menu mt-2">
                <li class=""><a href="index.php">Home</a></li>
                <li><a href="#">About</a></li>
                <li><a href="product.php">Product</a></li>
                <li><a href="contact.php">Contact</a></li>
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
                <li>|</li>

                <li><a href="cart.php"><i class="bi bi-cart4 fa-10x" style="font-size:20px;"></i></a></li>

            </ul>
        </nav>
        <!-- //nav -->
    </div>
    <!-- </header> -->


    <section>
        <div class="container-fluid">
            <div class="row">
                <!-- Product picture -->
                <div class="col-sm-5">
                    <div class="thumbnail">
                        <img id="prd_img" src="./images/<?= $row['image'] ?>" class="img-responsive" alt="">

                        <div class="caption">
                            <div class="row buttons">

                                <a href="add_cart.php?id=<?= $row['prdid'] ?>" class="btn  col-sm-4 col-sm-offset-2 btn-lg" style="background-color:#ff9f00; color:#fff;font-size:1em;"><span class="glyphicon glyphicon-shopping-cart"></span>&nbsp;ADD TO CART</a>


                                <a href="buy.php" class="btn col-sm-4 col-sm-offset-1 btn-lg" style="background-color:#fb641b; color:#fff;font-size:1em;"><i class="fa fa-bolt" style="font-size:1.2em;"></i> BUY NOW</a>
                            </div>

                        </div>
                    </div>

                </div>

                <!-- Product Description -->
                <div class="col-sm-7 desc">

                    <div>

                        <ol class="breadcrumb col-sm-12" style="background-color:transparent;">

                        </ol>

                        <h4><?= $row['prdnm'] ?>(<?= $row['brand'] ?>)</h4>

                        <div class="row">
                            <div class="col-sm-12">
                                <span class="label label-success">4.6 <span class="glyphicon glyphicon-star"></span></span>
                                <strong>2,421 Ratings & Reviews</strong>
                            </div>

                        </div>

                        <div>
                            <h3>Rs <?= $row['prdpr'] ?></h3>
                        </div>

                        <div>

                            <h5><span class="glyphicon glyphicon-calendar"></span> EMIs from <strong>Rs 3,070/month </strong><a href="">View Plans <i class="fa fa-chevron-right"></i></a></h5>

                            <h5><span class="glyphicon glyphicon-tag"></span><strong> Bank Offer</strong> 5% Instant Discount on Visa Cards for First 3 Online Payments. <a href="">T&C</a></h5>

                            <h5><span class="glyphicon glyphicon-tag"></span><strong> Bank Offer</strong> Extra 5% off* with Axis Bank Buzz Credit Card. <a href="">T&C</a></h5>

                        </div>

                        <br>

                        <br>

                        <div class="row">
                            <div class="col-sm-6">
                                <strong>Color</strong>
                                <br>
                                <br>
                                <button class="btn btn-default" style="color:#337ab7;border:1px dashed #337ab7;">Red</button>
                                <button class="btn btn-default">Blue</button>
                            </div>
                        </div>

                        <br><br>
                        <br><br>  

                    </div>
                    <br><br>
                </div>
            </div>
            <div class="row">

                <div class="container col-xs-12" style="margin-top:50px;">
                    <div class="panel panel-default" style="margin-right: 20px;">
                        <div class="panel-body">
                            <div class="col-sm-12">
                                <h3>PRODUCT DESCRIPTION</h3>
                                <p><h4><?= $row['discription'] ?></h4></p>

                            </div>

                        </div>
                        <hr>
                        
                            </div>

                        </div>

                        <div class="panel-footer">


                        </div>

                    </div>


                    <!-- Specifications -->

                    <div class="panel panel-default ml-5 " id="specifications">
                        <div class="panel-heading" style="background-color:#fff;">
                            <h3>Specifications</h3>
                        </div>

                        <div class="panel-body">

                            <h4>General</h4>

                            <table class="table table-default">
                                <tbody>
                                    <tr>
                                        <td class="col-sm-4">In The Box</td>
                                        <td class="col-sm-8">
                                            Handset, EarPods with Lightning Connector, Lightning to 3.5 mm Headphone Jack Adapter, Lightning to USB Cable, USB Power Adapter, Documentation</td>
                                    </tr>

                                    <tr>
                                        <td class="col-sm-4">Model Number</td>
                                        <td class="col-sm-8">
                                            MQA62HN/A</td>
                                    </tr>

                                    <tr>
                                        <td class="col-sm-4">Model Name</td>
                                        <td class="col-sm-8">iPhone X</td>
                                    </tr>

                                    <tr>
                                        <td class="col-sm-4">Color</td>
                                        <td class="col-sm-8">Silver</td>
                                    </tr>

                                    <tr>
                                        <td class="col-sm-4">Browse Type</td>
                                        <td class="col-sm-8">Smartphones</td>
                                    </tr>

                                </tbody>

                            </table>

                        </div>

                        <div class="panel-footer">
                            <h4><a href="">Read More</a></h4>
                        </div>
                    </div>

                </div>
            </div>
            <!-- Button trigger modal -->
            <button type="button" id="modal_img" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" style="display: none;">
            </button>

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                        <img id="prd_img" style="margin-left: 13%;zoom: 149%;" src="./images/<?= $row['image'] ?>" class="img-responsive" alt="">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
    </section>



</body>
<script>
    $(document).ready(function(){
        $("#prd_img").click(function(){
            $("#modal_img").click();
        })
    })
</script>
</html>