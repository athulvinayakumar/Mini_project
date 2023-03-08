<?php
    include('db.php');
    session_start();

    if(isset($_POST['text'])){
        $text= $_POST['text'];
        $query = "SELECT * FROM admins WHERE prdnm LIKE '%$text%' OR brand LIKE '%$text%' OR prdpr LIKE '%$text%' OR discription LIKE '%$text%'";
        $result = mysqli_query($connection, $query);

        if($result){
            if(mysqli_num_rows($result) > 0){
                while($q = mysqli_fetch_array($result)){
                    $prod_id = $q['prdid'];
                    $prod_name= $q['prdnm'];
                    $prod_brand = $q['brand'];
                    $prod_img= $q['image'];
                    $prod_price= $q['prdpr'];
                    $prod_description= $q['discription'];
                    
              
                    echo '
                      <div class="search_row">
                          <a href="product_details.php?id='.$prod_id.'" target="_blank">
                              <div class="db_img"><img src="./product_img/'.$prod_img.'" alt="'.$prod_name.'"></div>
                              <div class="db_pname">'.$prod_name.'</div>
                          </a>
                      </div>
                      ';
                  }
            }
            else{
                echo '
                <div class="search_row">
                    <a href="#">
                        <div class="db_pname">No Results.</div>
                    </a>
                </div>
                ';
            }
          }
    }
?>

