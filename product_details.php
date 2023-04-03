<html>
<?php
session_start();
$pro_id = $_GET['id'];
$con = mysqli_connect("localhost", "root", "", "shoes");
$mysql = "SELECT * FROM `admins` WHERE prdid = '$pro_id'";
$result = mysqli_query($con, $mysql);
$row = mysqli_fetch_array($result);
$_SESSION['total_amount'] = $row['prdpr'];
$user_id = $_SESSION['usr_id'];
?>

<head>
    <title>STEPSOUT-PRODUCT DETAILS</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"> -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.1/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <!--jQuery library-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- <link rel="stylesheet" href="style.css" type="text/css" media="all" /> -->
    <link rel="stylesheet" href="./css/flip.css">
    <link rel="stylesheet" href="css/etalage.css">
    <!-- <link rel="stylesheet" href="./css/style2.css"> -->
    <link href="product_details.css" rel="stylesheet">
    <!--Latest compiled and minified JavaScript-->
    <script src="jquery.etalage.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <script>
        $(document).ready(function() {
            $('.etalage').etalage({
                thumb_image_width: 400,
                thumb_image_height: 500
            });
        });
    </script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- <title>Navbar in Bootstrap</title> -->
    <style>
        nav {
            margin: 0;
            padding: 0;
            margin-bottom: 20px;
        }

        .badge {
            background-color: #4caf50;
            font-size: larger;
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

        .animated {
            -webkit-transition: height 0.2s;
            -moz-transition: height 0.2s;
            transition: height 0.2s;
        }

        .stars {
            margin: 20px 0;
            font-size: 24px;
            color: #d17581;
        }
    </style>
</head>
<?php
if (isset($_POST['review'])) {
    $msg = $_POST['comment'];
    $star = $_POST['rating'];
    $sql = "SELECT * FROM `tbl_rating` WHERE `id` = $user_id";
    $result = mysqli_query($con, $sql);
    $num = mysqli_num_rows($result);
    if ($num > 0) {
        $sql = "UPDATE `tbl_rating` SET `r_number`='$star',`comments`='$msg' WHERE `id` =$user_id";
        mysqli_query($con, $sql);
    } else {
        $sql = "INSERT INTO `tbl_rating`(`prdid`, `id`, `r_number`, `comments`) VALUES ('$pro_id','$user_id','$star','$msg')";
        mysqli_query($con, $sql);
    }
    echo ("<script>location.href='product_details.php?id=$pro_id'</script>");
}
?>

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
                <li><a href="about.php">About</a></li>
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
                        <ul class="etalage" style="margin-left: 100px; margin-bottom:50px;">
                            <li>
                                <img class="etalage_thumb_image" src="./images/<?= $row['image'] ?>">
                                <img class="etalage_source_image" src="./images/<?= $row['image'] ?>">
                            </li>
                        </ul>

                        <div class="caption">
                            <div class="row buttons">

                                <a href="add_cart.php?id=<?= $row['prdid'] ?>"  id="cart" class="btn  col-sm-4 col-sm-offset-2 btn-lg" style="background-color:#ff9f00; color:#fff;font-size:1em;"><span class="glyphicon glyphicon-shopping-cart"></span>&nbsp;ADD TO CART</a>


                                <a href="checkout.php" class="btn col-sm-4 col-sm-offset-1 btn-lg" style="background-color:#fb641b; color:#fff;font-size:1em;"><i class="fa fa-bolt" style="font-size:1.2em;"></i> BUY NOW</a>
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

                       
                        <br>

                        <br>


                        <div class="row">
                            <div class="col-sm-6">
                                <strong>Size</strong>
                                <br>
                                <br>
                                <button class="btn btn-default" style="color:#337ab7;border:1px dashed #337ab7;">6</button>
                                <button class="btn btn-default">7</button>
                                <button class="btn btn-default">8</button>
                                <button class="btn btn-default">9</button>
                                <button class="btn btn-default">10</button>
                            </div>
                        </div>

                        <br><br>


                        <!-- Product Size -->
                        <?php
                                $con = mysqli_connect("localhost", "root", "", "shoes");
                                $sql = "SELECT * FROM `tbl_color`";
                                $ab = mysqli_query($con, $sql);
                                ?>
                        <div class="row">
                            <div class="col-sm-6">
                                <strong>Color</strong>
                                <br>
                                <br>
                                <?php
                                while($a=mysqli_fetch_array($ab))
                                    {
                                    ?>
                                <button class="btn btn-default" style="color:#337ab7;border:1px dashed #337ab7;"><?php echo $a['color_name']; ?> </button>
                                <!-- // <button class="btn btn-default">7</button>
                                // <button class="btn btn-default">8</button>
                                // <button class="btn btn-default">9</button>
                                // <button class="btn btn-default">10</button> -->
                                <?php
                                    }
                                    ?>
                            </div>
                        </div>
                        <br><br>


                        <!-- Product Count -->

                        <div class='mt-3'>
                            <?php
                            if ($row['prqnt'] > 0)
                                echo "<h4><span class='badge text-bg-success'>Stock Available</span></h4>";
                            else
                                echo "<h4><span class='badge text-bg-danger sizebadge'>Out of stock!</span></h4>";                        
                                 ?>
                        </div>
                        <br><br>



                    </div>
                    <h4><strong>Customer Review</strong></h4>
                    <div class="col-md-10" style="border-style: solid;border-radius: 8px;padding: 10px;">
                        <div class="main-heading mb-10">
                            <h4>Review <span class="label label-success"><span class="glyphicon glyphicon-star"></span><span id="avg_star"></span></span></h4>
                        </div>

                        <table class=" table table-bordered">
                            <thead>
                                <tr>
                                    <!-- <th scope="col">Sno</th> -->
                                    <th scope="col">Name</th>
                                    <th scope="col">Star Rating</th>
                                    <th scope="col">Comments</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $con = mysqli_connect("localhost", "root", "", "shoes");
                                $sql = "SELECT * FROM `tbl_rating` where `prdid`=$pro_id";
                                $result = mysqli_query($con, $sql);
                                $count = mysqli_num_rows($result);
                                $total_star = 0;
                                while ($row2 = mysqli_fetch_array($result)) {
                                    $id = $row2['id'];
                                    $sql = "SELECT * FROM `auth` WHERE `id` = $id ";
                                    $result1 = mysqli_query($con, $sql);
                                    $row1 = mysqli_fetch_array($result1);
                                    $total_star = ($total_star + $row2['r_number']);

                                ?>
                                    <tr>
                                        <th><?= $row1['name'] ?></th>
                                        <td><?= $row2['r_number'] ?> <span class="label label-success"><span class="glyphicon glyphicon-star"></span></span></td>
                                        <td><?= $row2['comments'] ?></td>
                                    </tr>
                                <?php
                                }
                                if ($total_star > 0) {
                                    $avg_star = ($total_star / $count);
                                }
                                ?>
                            </tbody>
                        </table>
                        <br><br>
                    </div>

                </div>

                <div class="row">

                    <div class="container col-md-12" style="margin-top:50px;">
                        <div class="panel panel-default" style="margin-right: 20px;">
                            <div class="panel-body">
                                <div class="col-md-12">
                                    <h3>PRODUCT DESCRIPTION</h3>
                                    <p>
                                    <h4><?= $row['discription'] ?></h4>
                                    </p>
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
                        <h3>Review and Ratings</h3>
                    </div>



                    <div class="container">
                        <div class="row" style="width: 100%;">
                            <div class="col-md-12">
                                <div class="well well-sm">
                                    <div class="text-center">
                                        <a class="btn btn-success btn-green" href="#reviews-anchor" id="open-review-box">Leave a Review</a>
                                    </div>

                                    <div class="row" id="post-review-box" style="display:none;">
                                        <div class="col-md-12">
                                            <form accept-charset="UTF-8" action="" method="POST">
                                                <input id="ratings-hidden" name="rating" type="hidden">
                                                <textarea class="form-control animated" cols="50" id="new-review" name="comment" placeholder="Enter your review here..." rows="5"></textarea><br><br>

                                                <div class="text-center">
                                                    <!-- <input type="hidden" name="stars" id="stars" /> -->
                                                    <span class="stars starrr" data-rating="0" name="star" id="star"></span><br><br>
                                                    <a class="btn btn-danger" href="#" id="close-review-box">Cancel</a>
                                                    <button class="btn btn-primary" type="submit" name="review" onsubmit="review();">Save</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!-- Button trigger modal -->
        <!-- <button type="button" id="modal_img" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" style="display: none;"> -->
        </button>

        <!-- Modal -->
        <!-- <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <img id="prd_img" id="etalage" style="margin-left: 13%;zoom: 149%;" src="./images/<?= $row['image'] ?>" class="img-responsive" alt="">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div> -->
    </section>

</body>
<script>
    var x = <?= $avg_star ?>;
    document.getElementById('avg_star').innerHTML = x;
</script>
<script>
    $(document).ready(function() {
        $("#prd_img").click(function() {
            $("#modal_img").click();
        })
    })
</script>
<script>
    (function(e) {
        var t, o = {
                className: "autosizejs",
                append: "",
                callback: !1,
                resizeDelay: 10
            },
            i = '<textarea tabindex="-1" style="position:absolute; top:-999px; left:0; right:auto; bottom:auto; border:0; padding: 0; -moz-box-sizing:content-box; -webkit-box-sizing:content-box; box-sizing:content-box; word-wrap:break-word; height:0 !important; min-height:0 !important; overflow:hidden; transition:none; -webkit-transition:none; -moz-transition:none;"/>',
            n = ["fontFamily", "fontSize", "fontWeight", "fontStyle", "letterSpacing", "textTransform", "wordSpacing", "textIndent"],
            s = e(i).data("autosize", !0)[0];
        s.style.lineHeight = "99px", "99px" === e(s).css("lineHeight") && n.push("lineHeight"), s.style.lineHeight = "", e.fn.autosize = function(i) {
            return this.length ? (i = e.extend({}, o, i || {}), s.parentNode !== document.body && e(document.body).append(s), this.each(function() {
                function o() {
                    var t, o;
                    "getComputedStyle" in window ? (t = window.getComputedStyle(u, null), o = u.getBoundingClientRect().width, e.each(["paddingLeft", "paddingRight", "borderLeftWidth", "borderRightWidth"], function(e, i) {
                        o -= parseInt(t[i], 10)
                    }), s.style.width = o + "px") : s.style.width = Math.max(p.width(), 0) + "px"
                }

                function a() {
                    var a = {};
                    if (t = u, s.className = i.className, d = parseInt(p.css("maxHeight"), 10), e.each(n, function(e, t) {
                            a[t] = p.css(t)
                        }), e(s).css(a), o(), window.chrome) {
                        var r = u.style.width;
                        u.style.width = "0px", u.offsetWidth, u.style.width = r
                    }
                }

                function r() {
                    var e, n;
                    t !== u ? a() : o(), s.value = u.value + i.append, s.style.overflowY = u.style.overflowY, n = parseInt(u.style.height, 10), s.scrollTop = 0, s.scrollTop = 9e4, e = s.scrollTop, d && e > d ? (u.style.overflowY = "scroll", e = d) : (u.style.overflowY = "hidden", c > e && (e = c)), e += w, n !== e && (u.style.height = e + "px", f && i.callback.call(u, u))
                }

                function l() {
                    clearTimeout(h), h = setTimeout(function() {
                        var e = p.width();
                        e !== g && (g = e, r())
                    }, parseInt(i.resizeDelay, 10))
                }
                var d, c, h, u = this,
                    p = e(u),
                    w = 0,
                    f = e.isFunction(i.callback),
                    z = {
                        height: u.style.height,
                        overflow: u.style.overflow,
                        overflowY: u.style.overflowY,
                        wordWrap: u.style.wordWrap,
                        resize: u.style.resize
                    },
                    g = p.width();
                p.data("autosize") || (p.data("autosize", !0), ("border-box" === p.css("box-sizing") || "border-box" === p.css("-moz-box-sizing") || "border-box" === p.css("-webkit-box-sizing")) && (w = p.outerHeight() - p.height()), c = Math.max(parseInt(p.css("minHeight"), 10) - w || 0, p.height()), p.css({
                    overflow: "hidden",
                    overflowY: "hidden",
                    wordWrap: "break-word",
                    resize: "none" === p.css("resize") || "vertical" === p.css("resize") ? "none" : "horizontal"
                }), "onpropertychange" in u ? "oninput" in u ? p.on("input.autosize keyup.autosize", r) : p.on("propertychange.autosize", function() {
                    "value" === event.propertyName && r()
                }) : p.on("input.autosize", r), i.resizeDelay !== !1 && e(window).on("resize.autosize", l), p.on("autosize.resize", r), p.on("autosize.resizeIncludeStyle", function() {
                    t = null, r()
                }), p.on("autosize.destroy", function() {
                    t = null, clearTimeout(h), e(window).off("resize", l), p.off("autosize").off(".autosize").css(z).removeData("autosize")
                }), r())
            })) : this
        }
    })(window.jQuery || window.$);

    var __slice = [].slice;
    (function(e, t) {
        var n;
        n = function() {
            function t(t, n) {
                var r, i, s, o = this;
                this.options = e.extend({}, this.defaults, n);
                this.$el = t;
                s = this.defaults;
                for (r in s) {
                    i = s[r];
                    if (this.$el.data(r) != null) {
                        this.options[r] = this.$el.data(r)
                    }
                }
                this.createStars();
                this.syncRating();
                this.$el.on("mouseover.starrr", "span", function(e) {
                    return o.syncRating(o.$el.find("span").index(e.currentTarget) + 1)
                });
                this.$el.on("mouseout.starrr", function() {
                    return o.syncRating()
                });
                this.$el.on("click.starrr", "span", function(e) {
                    return o.setRating(o.$el.find("span").index(e.currentTarget) + 1)
                });
                this.$el.on("starrr:change", this.options.change)
            }
            t.prototype.defaults = {
                rating: void 0,
                numStars: 5,
                change: function(e, t) {}
            };
            t.prototype.createStars = function() {
                var e, t, n;
                n = [];
                for (e = 1, t = this.options.numStars; 1 <= t ? e <= t : e >= t; 1 <= t ? e++ : e--) {
                    n.push(this.$el.append("<span class='glyphicon .glyphicon-star-empty'></span>"))
                }
                return n
            };
            t.prototype.setRating = function(e) {
                if (this.options.rating === e) {
                    e = void 0
                }
                this.options.rating = e;
                this.syncRating();
                return this.$el.trigger("starrr:change", e)
            };
            t.prototype.syncRating = function(e) {
                var t, n, r, i;
                e || (e = this.options.rating);
                if (e) {
                    for (t = n = 0, i = e - 1; 0 <= i ? n <= i : n >= i; t = 0 <= i ? ++n : --n) {
                        this.$el.find("span").eq(t).removeClass("glyphicon-star-empty").addClass("glyphicon-star")
                    }
                }
                if (e && e < 5) {
                    for (t = r = e; e <= 4 ? r <= 4 : r >= 4; t = e <= 4 ? ++r : --r) {
                        this.$el.find("span").eq(t).removeClass("glyphicon-star").addClass("glyphicon-star-empty")
                    }
                }
                if (!e) {
                    return this.$el.find("span").removeClass("glyphicon-star").addClass("glyphicon-star-empty")
                }
            };
            return t
        }();
        return e.fn.extend({
            starrr: function() {
                var t, r;
                r = arguments[0], t = 2 <= arguments.length ? __slice.call(arguments, 1) : [];
                return this.each(function() {
                    var i;
                    i = e(this).data("star-rating");
                    if (!i) {
                        e(this).data("star-rating", i = new n(e(this), r))
                    }
                    if (typeof r === "string") {
                        return i[r].apply(i, t)
                    }
                })
            }
        })
    })(window.jQuery, window);
    $(function() {
        return $(".starrr").starrr()
    })

    $(function() {

        $('#new-review').autosize({
            append: "\n"
        });

        var reviewBox = $('#post-review-box');
        var newReview = $('#new-review');
        var openReviewBtn = $('#open-review-box');
        var closeReviewBtn = $('#close-review-box');
        var ratingsField = $('#ratings-hidden');


        openReviewBtn.click(function(e) {
            reviewBox.slideDown(400, function() {
                $('#new-review').trigger('autosize.resize');
                newReview.focus();
            });
            openReviewBtn.fadeOut(100);
            closeReviewBtn.show();
        });

        closeReviewBtn.click(function(e) {
            e.preventDefault();
            reviewBox.slideUp(300, function() {
                newReview.focus();
                openReviewBtn.fadeIn(200);
            });
            closeReviewBtn.hide();

        });

        $('.starrr').on('starrr:change', function(e, value) {
            ratingsField.val(value);
            // alert();
            // document.getElementById('stars').value=value;
            // alert(value);
            // star.value=value;

        });
    });
</script>
<script>
    function review() {
        // var cmt;
        // var star=document.getElementById('stars').value;
        // alert(star);


    }
</script>

</html>