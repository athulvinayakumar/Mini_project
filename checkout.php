<?php
session_start();
$usr_name = $_SESSION['Username'];
$con = mysqli_connect("localhost", "root", "", "shoes");
$sql = "SELECT * FROM `auth` where username ='$usr_name'";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_array($result);
$name = $row["username"];
$email = $row["email"];
$phone = $row["mobile_number"];
?>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .container {
            max-width: 960px;
        }

        .lh-condensed {
            line-height: 1.25;
        }
    </style>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>

<body>
    <section class="h-100 h-custom" style="background-color: #eee;">
        <div class="container py-6 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col">
                    <div class="card">
                        <div class="card-body p-4">
                            <div class="row">
                                <h2>Checkout form</h2>
                                <p class="lead"></p>
                            </div>
                            <div class="col-md-8 order-md-1">
                                <h4 class="mb-3">Billing address</h4>
                                <form class="needs-validation" novalidate="">
                                    <div class="row">
                                        <div class="mb-3">
                                            <label for="firstName">Name</label>
                                            <input type="text" class="form-control" id="firstName" placeholder="Name" value="<?= $name ?>" required="">
                                            <div class="invalid-feedback"> Valid first name is required. </div>
                                        </div>
                                        <div class="mb-3">
                                            <label for="email">Email <span class="text-muted">(Optional)</span></label>
                                            <input type="email" class="form-control" id="email" placeholder="you@example.com" value="<?= $email ?>" >
                                            <div class="invalid-feedback"> Please enter a valid email address. </div>
                                        </div>
                                        <div class="mb-3">
                                            <label for="address">Address</label>
                                            <input type="text" class="form-control" id="address"  onkeyup="address()" required="" autocomplete="off">
                                            <div id="m1"></div>

                                        </div>
                                        <div class="mb-3">
                                            <label for="address2">Address 2</label>
                                            <input type="text" class="form-control" id="address2" onkeyup="address2()" required="" autocomplete="off">
                                            <div id="m2"></div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-5 mb-3">
                                                <label for="country">Country</label>
                                                <select class="custom-select d-block w-100" id="country" required="" autocomplete="off">
                                                    <option value="">Choose...</option>
                                                    <option>India</option>
                                                </select>
                                                <div class="invalid-feedback"> Please select a valid country. </div>
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <label for="state">State</label>
                                                <select class="custom-select d-block w-100" id="state" required="" autocomplete="off">
                                                    <option value="">Choose...</option>
                                                    <option>Kerala</option>
                                                </select>
                                                <div class="invalid-feedback"> Please provide a valid state. </div>
                                            </div>
                                            <div class="col-md-3 mb-3">
                                                <label for="zip">Zip</label>
                                                <input type="text" class="form-control" id="zip" placeholder="" required="" autocomplete="off">
                                                <div class="invalid-feedback"> Zip code required. </div>
                                            </div>
                                        </div>
                                        <hr class="mb-4">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="same-address">
                                            <label class="custom-control-label" for="same-address" autocomplete="off">Above Address is true</label>
                                        </div>
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="save-info">
                                            <label class="custom-control-label" for="save-info" autocomplete="off">Save this information for next time</label>
                                        </div>
                                        <center> <button type="button" name="pay" class="btn btn-info btn-block btn-lg " id="rzp-button1" value="pay now" onclick="pay_now()">
                                                <div class="d-flex justify-content-between">
                                                    <span>Checkout</span>
                                                </div>
                                            </button>
                                            <button type="button" class="btn btn-info btn-block btn-lg" onclick="location.href='cart.php'">
                                                <div class="d-flex justify-content-between">
                                                    <span>Cancel</span>
                                                </div>
                                            </button>
                                        </center>
                                    </div>
</body>
<script>
    (function() {
        'use strict'

        window.addEventListener('load', function() {
            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.getElementsByClassName('needs-validation')

            // Loop over them and prevent submission
            Array.prototype.filter.call(forms, function(form) {
                form.addEventListener('submit', function(event) {
                    if (form.checkValidity() === false) {
                        event.preventDefault()
                        event.stopPropagation()
                    }
                    form.classList.add('was-validated')
                }, false)
            })
        }, false)
    }())
</script>
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



</html>