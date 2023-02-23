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

</head>
<script>
        $(document).ready(function() {
            var check = 0;
            var check1 = 0;
            var check2 = 0;
            $("#Name").keyup(function() {
                var name = document.getElementById("Name").value
                var c_name = /^[a-z ]{3,20}$/i;
                var r_name = c_name.test(name)
                if (r_name == false) {
                    $("#name2").text("*Enter a valid Name");
                    check=1;
                } else {
                    check=0;
                    $("#name2").text("");

                }
            })

            $("#inputemail").keyup(function() {
                var email = document.getElementById("inputemail").value
                var c_email = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/
                var r_email = c_email.test(email)
                if (r_email == false) {
                    check1=1;
                    $("#inputemail2").text("*Enter a valid Email");
                } else {
                   
                                check1=0;
                                $("#inputemail2").text("");
                            }
            })
            $("#inputmob").keyup(function() {
                var mobile = document.getElementById("inputmob").value
                var c_mobile = /^[6-9][0-9]{9}$/;
                var r_mobile = c_mobile.test(mobile)
                if (r_mobile == false) {
                    $("#inputmob2").text("*Enter a valid mobile number");
                   check2=1;
                } else {
                    check2=0;
                    $("#inputmob2").text("");


                }
            })
            $("#msg").keyup(function() {
                var mobile = document.getElementById("msg").value
                var c_mobile = /^[a-zA-Z. ']{3,30}$/;
                var r_mobile = c_mobile.test(mobile)
                if (r_mobile == false) {
                    $("#msg2").text("*Enter a valid message");
                   check2=1;
                } else {
                    check2=0;
                    $("#msg2").text("");


                }
            })
            $("#btn").click(function() {
                var mobile = document.getElementById("inputmob").value
                var name = document.getElementById("Name").value
                var email = document.getElementById("inputemail").value
                if (mobile.length == 0) {
                    alert("Please fill all the fields");
                } else if (name.length == 0) {
                    alert("Please fill all the fields");


                } else if (email.length == 0) {
                    alert("Please fill all the fields");

                } else {
                }
                if (check == 1 || check1 == 1 || check2 == 1) {
                    alert("please fill all field correctly");
                } else {
                    
                }
            })
        })
    </script>

<body>

    <!-- mian-content -->
    <div class="main-banner h-44" style="background-image: url('./images/banner1.jpg'); min-height:500px;" id="home">
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
                        <?php if (isset($_SESSION['Username'])) { ?>
                            <li>|</li>
                            <li><a href="cart.php"><i class="bi bi-cart4 fa-10x" style="font-size:20px;"></i></a></li>
                        <?php } else { ?>
                            <li><a href="login.php"><i class="bi bi-cart4 fa-10x" style="font-size:20px;"></i></a></li>
                        <?php } ?>


                    </ul>
                </nav>
                <!-- //nav -->
            </div>
        </header>
        <!-- //header -->
        <!--/banner-->
        <div class="banner-info">
        </div>
        <!--// banner-inner -->

    </div>

    <section class="ab-info-main py-5">
        <div class="container py-3">
            <h3 class="tittle text-center"><span class="sub-tittle">Find Us</span> Contact Us</h3>
            <div class="row contact-main-info mt-5">
                <div class="col-md-6 contact-right-content">
                    <form action="#" method="post" class="col-lg-10 offset-lg-7">
                        <input type="text" name="Name" id="Name" placeholder="Name" autocomplete="off" required="">
                        <div id="name2" style=color:red></div>
                        <input type="email" class="email" name="Email" id="inputemail" placeholder="Email" autocomplete="off" required="">
                        <div id="inputemail2"></div>
                        <input type="text" name="Phone_no" id="inputmob" placeholder="Phone" autocomplete="off"  required="">
                        <div id="inputmob2"></div>
                        <textarea name="Message" placeholder="Message"  id="msg" autocomplete="off"  required=""></textarea>
                        <div id="msg2"></div>
                        <div class="read mt-3">
                            <input type="submit" name="sub" class="offset-lg-4 btn-primary" id="btn" value="Submit">
                        </div>
                    </form>
                    <?php
                    if(isset($_POST['sub'])){
                        $name=$_POST['Name'];
                        $email=$_POST['Email'];
                        $phone=$_POST['Phone_no'];
                        $msg=$_POST['Message'];
                        $usr_id=$_SESSION['usr_id'];
                        if($name!=null&&$email!=null&&$phone!=null&&$msg!=null){
                            $con=mysqli_connect("localhost","root","","shoes");
                            $sql="INSERT INTO `contact`(`usr_id`, `usr_name`, `usr_email`, `usr_phone`, `usr_msg`) VALUES ('$usr_id','$name','$email','$phone','$msg')";
                            mysqli_query($con,$sql);
                            echo"<script>alert('Messages sent successfully')</script>";
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    </section>
    <!-- //ab -->
    
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</body>

</html>