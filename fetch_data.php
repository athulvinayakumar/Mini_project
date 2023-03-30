<?php

//fetch_data.php
// include"../session.php";
include('db.php');

if(isset($_POST["action"]))
{
	$query = "
		SELECT * FROM admins
	";
	
	// Price filter
	if(isset($_POST["minimum_price"], $_POST["maximum_price"]) && !empty($_POST["minimum_price"]) && !empty($_POST["maximum_price"]))
	{
		$query .= "
		 AND price BETWEEN '".$_POST["minimum_price"]."' AND '".$_POST["maximum_price"]."'
		";
	}
	
	// Brand filter
	if(isset($_POST["brand"]))
	{
		$brand_filter = implode("','", $_POST["brand"]);
		$query .= "
		 AND brand IN('".$brand_filter."')
		";
	}
	
	// Category filter
	if(isset($_POST["category"]))
	{
		$category_filter = implode("','", $_POST["cat"]);
		$query .= "
		 AND category IN('".$category_filter."')
		";
	}
	

	$statement = $connect->prepare($query);
	$statement->execute();
	$result = $statement->fetchAll();
	$total_row = $statement->rowCount();
	$output = '';
	if($total_row > 0)
	{
		foreach($result as $row)
		{
			
			$output .= '
			<div class="col-sm-4 col-lg-3 col-md-3">
				<div style="border:1px solid #ccc; border-radius:5px; padding:16px; margin-bottom:16px; height:445px; width:200px">
					<img src="../product_img/'. $row['image'] .'" alt=""  width="165px" height="228px" ><br><br>
					<p align="center"><strong><a style="text-decoration: none;" href="viewmore.php?p_id='.$row['prdid'].'">'. $row['prdnm'] .'</a></strong></p>
					<h4 style="text-align:center;" class="text-danger" >Rs. '. $row['prdpr'] .'</h4>
					
					Category : '. $row['category'] .' <br />
					<br	>
					
					<p align="center"><strong><a style="text-decoration: none;" href="add_to_cart.php?p_id='.$row['prdid'].'">Add to cart</a></strong></p>
				</div>

			</div>
			';
		}
	}
	else
	{
		$output = '<h3>No Product Found</h3>';
	}
	echo $output;
}

?>