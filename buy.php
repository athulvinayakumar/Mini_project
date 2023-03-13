<?php
session_start();
if($_SESSION['usr_id']!=null){
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.1.js"></script> 
    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>

</head>

<body>
    <section class="h-100 h-custom" style="background-color: #eee;"> 
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col">
                    <div class="card">
                        <div class="card-body p-4">

                            <div class="row">
                                <!-- <div class="col-lg-5"> -->
                                <?php
                                $usr_name = $_SESSION['Username'];
                                $con = mysqli_connect("localhost", "root", "", "shoes");
                                $sql = "SELECT * FROM `auth` where username ='$usr_name'";
                                $result = mysqli_query($con, $sql);
                                $row = mysqli_fetch_array($result);
                                $name = $row["username"];
                                $email = $row["email"];
                                $address = $row["address"];
                                $phone = $row["mobile_number"];
                                ?>
                                <div class="card bg-primary text-white rounded-3">
                                    <div class="card-body">


                                        <p class="small mb-2">Supported Card type</p>
                                        <a href="#!" type="submit" class="text-white"><i class="fab fa-cc-mastercard fa-2x me-2"></i></a>
                                        <a href="#!" type="submit" class="text-white"><i class="fab fa-cc-visa fa-2x me-2"></i></a>
                                        <a href="#!" type="submit" class="text-white"><i class="fab fa-cc-amex fa-2x me-2"></i></a>
                                        <a href="#!" type="submit" class="text-white"><i class="fab fa-cc-paypal fa-2x"></i></a>

                                        <form class="mt-4">
                                            <div class="form-outline form-white mb-4">
                                                <label class="form-label" for="typeName">User Name:</label>
                                                <input type="text" id="name" class="form-control form-control-lg" siez="17" value=<?= $name ?> disabled />
                                            </div>

                                            <div class="form-outline form-white mb-4">
                                                <label class="form-label" for="typeText">phone number:</label>
                                                <input type="text" id="typeText" class="form-control form-control-lg" siez="17" value=<?= $phone ?> minlength="19" maxlength="19" disabled />
                                            </div>
                                            <div class="form-outline form-white mb-4" style="display:none">
                                                <input type="text" id="amt" class="form-control form-control-lg" siez="17" value=<?=$_SESSION['total_amount'] ?> minlength="19" maxlength="19" disabled />
                                            </div>

                                            <div class="row mb-4">
                                                <div class="col-md-12">
                                                    <div class="form-outline form-white">
                                                        <label class="form-label" for="typeExp">email</label>
                                                        <input type="text" id="typeExp" class="form-control form-control-lg" value=<?= $email ?> size="7" id="exp" minlength="7" maxlength="7" disabled />
                                                    </div>
                                                </div>

                                            </div>

                                        </form>

                                        <hr class="my-4">
                                        <!-- <button type="button" class="btn btn-info btn-block btn-lg checkout_btn"> -->
                                         <button type="button" name="pay"  class="btn btn-info btn-block btn-lg checkout_btn" id ="rzp-button1" value="pay now" onclick="pay_now()">
                                            <div class="d-flex justify-content-between">
                                                <span>Checkout <i class="fas fa-long-arrow-alt-right ms-2"></i></span>
                                            </div>
                                        </button>
                                        <button type="button" class="btn btn-info btn-block btn-lg" onclick="location.href='cart.php'">
                                            <div class="d-flex justify-content-between">
                                                <span>Cancel <i class="fas fa-long-arrow-alt-right ms-2"></i></span>
                                            </div>
                                        </button>

                                    </div>
                                    <!-- </div> -->

                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
<script>
    function pay_now(){ 
    var name=jQuery('#name').val();
    var amt=jQuery('#amt').val();
    var options = { 
    "key": "rzp_test_memh6ACSKYdCkR",
    "amount": amt*100, 
    "currency": "INR",
    "name": "VK",
    "description": "Test Transaction",
    "image": "https://drive.google.com/file/d/1FJCNPPMhML96z3s4IrR8-yGU4A6HLm2X/view?usp=share_link",
    "handler":function(response){
        console.log(response);
        jQuery.ajax({
            type:'POST',
            url:'payment.php',
            data:"payment_id="+response.razorpay_payment_id+"&amt="+amt+"&name="+name,
            success:function(result){
                window.location.href="thank_you.php";
            }

        })
     
    }
};

var rzp1 = new Razorpay(options);
document.getElementById('rzp-button1').onclick = function(e){
    rzp1.open();
    e.preventDefault();
}

}
</script>

<?php }else{
echo("<script>alert('Pls Login')</script>");
echo("<script>location.href='login.php'</script>");
}
?>

</html>