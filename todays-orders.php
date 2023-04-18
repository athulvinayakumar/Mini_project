
<?php
session_start();
include('db.php');

date_default_timezone_set('Asia/Kolkata');// change according timezone
$currentTime = date( 'd-m-Y h:i:s A', time () );


?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Admin| Pending Orders</title>
	<link type="text/css" href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link type="text/css" href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
	<link type="text/css" href="css/theme.css" rel="stylesheet">
	<link type="text/css" href="images/icons/css/font-awesome.css" rel="stylesheet">
	<link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600' rel='stylesheet'>
	<script language="javascript" type="text/javascript">
var popUpWin=0;
function popUpWindow(URLStr, left, top, width, height)
{
 if(popUpWin)
{
if(!popUpWin.closed) popUpWin.close();
}
popUpWin = open(URLStr,'popUpWin', 'toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=yes,resizable=no,copyhistory=yes,width='+600+',height='+600+',left='+left+', top='+top+',screenX='+left+',screenY='+top+'');
}

</script>
</head>
<body>


	<div class="wrapper">
		<div class="container">
			<div class="row">
			<div class="span9">
					<div class="content">

	<div class="module">
							<div class="module-head">
								<h3>Today's Orders</h3>
							</div>
							<div class="module-body table">
	<?php if(isset($_GET['del']))
{?>
									<div class="alert alert-error">
										<button type="button" class="close" data-dismiss="alert">×</button>
									<strong>Oh snap!</strong> 	<?php echo htmlentities($_SESSION['delmsg']);?><?php echo htmlentities($_SESSION['delmsg']="");?>
									</div>
<?php } ?>

									<br />

							
			<table cellpadding="0" cellspacing="0" border="0" class="datatable-1 table table-bordered table-striped	 display table-responsive" >
									<thead>
										<tr>
											<th>#</th>
											<th> Name</th>
											<th width="50">Contact no</th>
											<th>Address</th>
											<th>Product </th>
											<th>Qty </th>
											<th>Amount </th>
											<th>Order Date</th>
											<th>Action</th>
											
										
										</tr>  
									</thead>
									<tbody>
									<?php 
// $email=$_SESSION['email'];
$sqlq="SELECT * from auth";
$resu = mysqli_query($connection, $sqlq);
$row= mysqli_fetch_assoc($resu);
$logid= $row['id'];
$cnt = 1;
$sql_query= mysqli_query($connection,"SELECT payment.pay_id, payment.name, tbl_order.oid, tbl_order.id, payment.amount
FROM payment
LEFT JOIN tbl_order ON payment.pay_id = tbl_order.pay_id
WHERE tbl_order.status = 'in Process' OR tbl_order.status ='Delivered' OR tbl_order.status IS NULL AND payment.pay_id=tbl_order.pay_id");

while ($row = mysqli_fetch_assoc($sql_query))  {

$data = array();
$data['col1'] = $row['pay_id'];
$data['col2'] = $row['orderid'];
$data['col3'] = $row['cart_id'];
$data['col5'] = $row['logid'];

$quant=mysqli_query($connection,"select quantity,pid from cart where cart_id='{$data['col3']}' ");
$row = mysqli_fetch_assoc($quant);
//print_r($row); // check the contents of the $row array
$quantity=$row['quantity'];
$pid=$row['pid'];


$quan=mysqli_query($connection,"select prdnm,prdpr from admins where pid='$pid' ");
$row = mysqli_fetch_assoc($quan);
//print_r($row); // check the contents of the $row array

$pname=$row['prdnm'];
$price=$row['prdpr'];


   
	// Do something with the retrieved data

	$quet=mysqli_query($connection,"select orderDate,orderid from orders where payid='{$data['col1']}' and orderid='{$data['col2']}' ");
    $row = mysqli_fetch_assoc($quet);
    $date=$row['orderDate'];
	$orderid=$row['orderid'];



    $qu=mysqli_query($connection,"select userid from userreg where logid='{$data['col5']}'");
    $row = mysqli_fetch_assoc($qu);
    $userid= $row['userid'];
	// ...


    $qus=mysqli_query($con,"select shippingAddress,shippingCity,shippingPincode,shipphone,shipname from tbl_address where userid='$userid'");
    while($row=mysqli_fetch_array($qus))
    {
        $name= $row['shipname'];
        $address=$row['shippingAddress'];
        $city=$row['shippingCity'];
        $code=$row['shippingPincode'];
        $phone=$row['shipphone'];
    
    // ...


?>	

<tr>
        <td><?php echo htmlentities($cnt);?></td>
        <td><?php echo htmlentities($name);?></td>
        <td><?php echo htmlentities($phone);?></td>
        <td><?php echo htmlentities($address);?><br><?php echo htmlentities($city);?><br><?php echo htmlentities($code);?></td>
        <td><?php echo htmlentities($pname);?></td>
        <td><?php echo htmlentities($quantity);?></td>
        <td><?php echo htmlentities ($price);?></td>
        <td><?php echo htmlentities($date);?></td>
        <td><a href="updateorder.php?oid=<?php echo htmlentities($orderid);?>" title="Update order" target="_blank"><i class="icon-edit"></i></a></td>
    </tr>

    <?php  $cnt=$cnt+1;} }

	
?>


									</tbody>
								</table>
							</div>
						</div>						

						
						
					</div><!--/.content-->
				</div><!--/.span9-->
			</div>
		</div><!--/.container-->
	</div><!--/.wrapper-->



	<script src="scripts/jquery-1.9.1.min.js" type="text/javascript"></script>
	<script src="scripts/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
	<script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="scripts/flot/jquery.flot.js" type="text/javascript"></script>
	<script src="scripts/datatables/jquery.dataTables.js"></script>
	<script>
		$(document).ready(function() {
			$('.datatable-1').dataTable();
			$('.dataTables_paginate').addClass("btn-group datatable-pagination");
			$('.dataTables_paginate > a').wrapInner('<span />');
			$('.dataTables_paginate > a:first-child').append('<i class="icon-chevron-left shaded"></i>');
			$('.dataTables_paginate > a:last-child').append('<i class="icon-chevron-right shaded"></i>');
		} );
	</script>
</body>
</html>
<?php  ?>