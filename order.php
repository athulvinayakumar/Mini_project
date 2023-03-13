<?php
session_start();
$con = mysqli_connect("localhost", "root", "", "shoes");
error_reporting(E_ERROR | E_PARSE);
include 'db.php';

if (isset($_POST['order_btn'])) {
    $name = $_POST['name'];
    $number = $_POST['number'];
    $email = $_POST['email'];
    $method = $_POST['method'];
    $flat = $_POST['flat'];
    $street = $_POST['street'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $country = $_POST['country'];
    $pin_code = $_POST['pin_code'];
?>

    <input type="button" name="pay" id="rzp-button1" value="pay now" onclick="pay_now()">
    </div>
    </div>
<?php
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CheckOut</title>

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="css/style1.css">
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
                                                <input type="text" placeholder="enter your name" name="name" required>
                                            </div>
                                            <div class="inputBox">
                                                <span>your number</span>
                                                <input type="number" placeholder="enter your number" name="number" required>
                                            </div>
                                            <div class="inputBox">
                                                <span>your email</span>
                                                <input type="email" placeholder="enter your email" name="email" required>
                                            </div>
                                            <div class="inputBox">
                                                <span>payment method</span>
                                                <select name="method">
                                                    <option value="cash on delivery" selected>cash on devlivery</option>
                                                    <option value="credit cart">credit cart</option>
                                                    <option value="paypal">paypal</option>
                                                    <option value="Razorpay">Razorpay</option>
                                                </select>
                                            </div>
                                            <div class="inputBox">
                                                <span>address line 1</span>
                                                <input type="text" placeholder="e.g. flat no." name="flat" required>
                                            </div>
                                            <div class="inputBox">
                                                <span>address line 2</span>
                                                <input type="text" placeholder="e.g. street name" name="street" required>
                                            </div>
                                            <div class="inputBox">
                                                <span>city</span>
                                                <input type="text" placeholder="e.g. mumbai" name="city" required>
                                            </div>
                                            <div class="inputBox">
                                                <span>state</span>
                                                <input type="text" placeholder="e.g. maharashtra" name="state" required>
                                            </div>
                                            <div class="inputBox">
                                                <span>country</span>
                                                <input type="text" placeholder="e.g. india" name="country" required>
                                            </div>
                                            <div class="inputBox">
                                                <span>pin code</span>
                                                <input type="text" placeholder="e.g. 123456" name="pin_code" required>
                                            </div>
                                    </div>
                                    <input type="submit" value="order now" name="order_btn" class="btn">
                                    </form>

    </section>

    </div>

    <!-- custom js file link  -->
    <script src="js/script.js"></script>
    <script>
        function pay_now() {

            var name = jQuery('#name').val();
            var amt = <?php echo $price_total ?>;
            var options = {
                "key": "rzp_test_sTxnog5fKY3bok",
                "amount": amt * 100,
                "currency": "INR",
                "name": "SmartMart",
                "description": "Test Transaction",
                "image": "https://drive.google.com/file/d/1FJCNPPMhML96z3s4IrR8-yGU4A6HLm2X/view?usp=share_link",
                "handler": function(response) {
                    console.log(response);
                    jQuery.ajax({
                        type: 'POST',
                        url: 'payment.php',
                        data: "payment_id=" + response.razorpay_payment_id + "&amt=" + amt + "&name=" + name,
                        success: function(result) {
                            window.location.href = "thankyou.php";
                        }

                    })
                    // if(response){
                    //     window.location.href="/adsol/index.php";
                    // }


                }
            };

            var rzp1 = new Razorpay(options);
            document.getElementById('rzp-button1').onclick = function(e) {
                rzp1.open();
                e.preventDefault();
            }

        }
    </script>

</body>

</html>