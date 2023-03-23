<?php
    include 'db.php';
    $cat = $_GET['cat'];
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="icon" type="image/png" href="../pics/logo_icon.png">
    <title>STEPSOUT</title>

    <?php include 'includes.php'; ?>
    <link rel="stylesheet" type="text/css" href="../css/products-css.css">
    <link rel="stylesheet" href="../css/footer.css">

</head>
<body id="productspage-body">

    <div id="ppage-mcontainer">

        <div id="ppage-filteropt-div">

            <div id="filteropt-head" onclick="filter_collapse_fn();">Filters&nbsp;&nbsp;<i class="fa fa-caret-up" id="filteropt-head-icon"></i></div>

            <div id="filteropt-content-collapsediv" class="content-expand">
                <div id="filteropt-brand">
                    <p><b>Brand</b></p>
                    <div class="filteropt-itemsdiv">
                        <?php
                            $select = mysqli_query($conn,"SELECT * FROM `band`");
                            $brand_count=0;
                            while($s = mysqli_fetch_array($select)){
                                $brand_count++;
                                // $by_info = $s['by_info'];
                                echo '
                                <div class="filteropt-checkbox-div">
                                    <input type="checkbox" id="brand-'.$brand_count.'" name="brand-'.$brand_count.'" class="common_selector brand1" value="'.$by_info.'">
                                    <label for="brand-'.$brand_count.'">'.$by_info.'</label><br>
                                </div>
                                ';
                            }
                        ?>
                    </div>
                </div>

                <div id="filteropt-rate">
                    <p><b>Color</b></p>
                    <div class="filteropt-itemsdiv">
                        <?php
                            for($i=1;$i<=5;$i++){
                                echo'
                                    <div class="filteropt-checkbox-div">
                                        <input type="checkbox" id="rate-'.$i.'" name="rate-'.$i.'" class="common_selector rating" value="'.$i.'">
                                        <label for="rate-'.$i.'"><span class="fa fa-star star-icon"></span>&nbsp;&nbsp;'.$i.' star & above</label>
                                        <br>
                                    </div>
                                ';
                            }
                        ?>
                    </div>
                </div>

                <div id="filteropt-price">
                    <p><b>Price</b></p>

                    <div class="filteropt-itemsdiv">
                        <?php
                            $rate_list=array('10000-30000','30000-50000','50000-100000','>100000');
                            for($i=1;$i<=sizeof($rate_list);$i++){
                                echo'
                                    <div class="filteropt-checkbox-div">
                                        <input type="checkbox" id="price-'.$i.'" name="price-'.$i.'" class="common_selector prange" value="'.$rate_list[$i-1].'">
                                        <label for="price-'.$i.'">'.$rate_list[$i-1].'</label><br>
                                    </div>
                                ';
                            }
                        ?>
                    </div>
                    
                </div>
            </div>
            
        </div>

        <div id="ppage-plistitem-div">
            <div id="plistitem-header"></div>

            <?php

                $query= "SELECT * FROM $table ORDER BY rating DESC";
                $select = mysqli_query($conn,$query);

                $itemcount=0;
                while($s = mysqli_fetch_array($select)){
                    $itemcount++;
                    $id = $s['id'];
                    $pname = $s['Product_name'];
                    $pimg = $s['Product_img'];
                    $pprice= $s['Product_price'];
                    $prate= $s['rating'];
                    $pdes= $s['prod_des'];
                    $p_review= $s['total_review'];
                    $pans= $s['ans_ask'];

                    echo '
                        <a class="plistitem-objects" id="plistitem-obj'.$itemcount.'" href="discription.php?id='.$id.'&cat='.$cat.'">
                            <div class="plistitem-img"><img src="'.$pimg.'" alt="'.$pname.'"></div>

                            <div class="plistitem-des">
                                <p class="plistitem-des-title">'.$pname.'</p>
                                <div class="plistitem-des-contentdiv">
                                    <p>'.$prate.'<span class="fa fa-star fa-2x"></span></p>
                                    <p>'.$p_review.'</p>
                                </div>
                                <p class="plistitem-des-txt">'.$pdes.'</p>
                            </div>

                            <p class="plistitem-price">&#8377 '.$pprice.' /-</p>
                        </a>
                    ';
                }
            ?>
        </div>
    </div>

    <div style="background-color: transparent;">
    </div>

    <script>

        function filter_collapse_fn(){
            var filterdiv= document.getElementById("filteropt-content-collapsediv");
            var filteropt_headicon= document.getElementById("filteropt-head-icon");
            if(filterdiv.classList.contains('content-expand')){
                filterdiv.classList.replace('content-expand','content-collapse');
                filteropt_headicon.style.transform = "rotate(180deg)";
            }
            else if(filterdiv.classList.contains('content-collapse')){
                filterdiv.classList.replace('content-collapse','content-expand');
                filteropt_headicon.style.transform = "rotate(0deg)";
            }
        }

        $(window).resize(function() {
            screenSizeDesignChange();
            function screenSizeDesignChange(){
                var filterdiv= document.getElementById("filteropt-content-collapsediv");
                var filteropt_headicon= document.getElementById("filteropt-head-icon");
                if(window.innerWidth <= 800){
                    filterdiv.classList.replace('content-expand','content-collapse');
                    filteropt_headicon.style.transform = "rotate(180deg)";
                }
                else{
                    filterdiv.classList.replace('content-collapse','content-expand');
                    filteropt_headicon.style.transform = "rotate(0deg)";
                }
            }
        });

        $(document).ready(function(){

            screenSizeDesignChange();
            function screenSizeDesignChange(){
                var filterdiv= document.getElementById("filteropt-content-collapsediv");
                var filteropt_headicon= document.getElementById("filteropt-head-icon");
                if(window.innerWidth <= 800){
                    filterdiv.classList.replace('content-expand','content-collapse');
                    filteropt_headicon.style.transform = "rotate(180deg)";
                }
                else{
                    filterdiv.classList.replace('content-collapse','content-expand');
                    filteropt_headicon.style.transform = "rotate(0deg)";
                }
            }
            
            filter_data();
            function filter_data(){
                var brand = get_filter('brand1');
                var rate = get_filter('rating');
                var prange = get_filter('prange');

                $.ajax({
                    url:"fetch.php",
                    method:"POST",
                    data:{brand:brand,rate:rate,prange:prange,cat:<?php echo $cat; ?>},
                    success:function(data){
                        $('#ppage-plistitem-div').html(data);
                    }
                });
            }

            function get_filter(class_name){
                var filter = [];
                $('.'+class_name+':checked').each(function(){
                    filter.push($(this).val());
                });
                return filter;
            }

            $('.common_selector').click(function(){
                filter_data();
            });

        });
    </script>

</body>
</html>
