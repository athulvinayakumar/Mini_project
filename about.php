<!-- <?php
        session_start();
        include 'db.php';

        ?> -->
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">

    <link href="font-awesome.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>


    <!-- //font-awesome-icons -->
    <!-- /Fonts -->
    <link href="//fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700" rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Source+Sans+Pro:200,200i,300,300i,400,400i,600,600i,700,700i,900" rel="stylesheet">
    <!-- //Fonts -->
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            margin: 0;
        }

        html {
            box-sizing: border-box;
        }

        *,
        *:before,
        *:after {
            box-sizing: inherit;
        }

        .column {
            float: left;
            width: 33.3%;
            margin-bottom: 16px;
            padding: 0 8px;
        }

        .card {
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
            margin: 8px;
        }

        .about-section {
            padding: 120px;
            height: 750px;
            text-align: center;
            background-color: #474e5d;
            color: white;
        }

        .container {
            padding: 0 16px;
        }

        .container::after,
        .row::after {
            content: "";
            clear: both;
            display: table;
        }

        .title {
            color: grey;
        }

        .button {
            border: none;
            outline: 0;
            display: inline-block;
            padding: 8px;
            color: white;
            background-color: #000;
            text-align: center;
            cursor: pointer;
            width: 100%;
        }

        .button:hover {
            background-color: #555;
        }

        @media screen and (max-width: 650px) {
            .column {
                width: 100%;
                display: block;
            }
        }
    </style>
</head>

<body>

    <!-- mian-content -->
    <div class="h-44" id="home">
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
    </div>
    <div class="about-section">
        <h1>About Us</h1>
        <h4>Launched In January 2023</h4><br>
        <p><b>
                <ul>Created By VK</ul>
            </b></p>
        <p>One of our popular shoe collections is our athletic shoe line, designed for men. Whether you're into running, hiking, or working out, our selection of sports shoes caters to every need. We offer shoes with advanced features such as breathable mesh material, cushioned soles, and sturdy grip for better traction. We understand that finding the right athletic shoe is essential for athletes and fitness enthusiasts alike, and we take great care in ensuring that our customers are satisfied with their purchase.</p>
        <p>At our shoe store, we believe that shoes are not just an accessory but a necessity. We take great pride in providing our customers with high-quality shoes that offer both comfort and style. With our extensive collection of footwear and knowledgeable staff, we are confident that we can help you find the perfect pair of shoes for any occasion. So come on in and experience the best shoe shopping experience in town!</p>

    </div>



    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</body>

</html>