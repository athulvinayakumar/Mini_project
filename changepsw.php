<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>

<body>
    <div class="container py-5">
        <div class="row">
            <div class="row">
                <div class="col-md-6 offset-md-3">
                    <span class="anchor" id="formChangePassword"></span>
                    <!-- form card change password -->
                    <div class="card card-outline-secondary">
                        <div class="card-header">
                            <h3 class="mb-0">Change Password</h3>
                        </div>
                        <div class="card-body">
                            <form class="pt-3" action="chngpswact.php" method="post">
                                <div class="form-group">
                                    <label for="inputPasswordOld">Current Password</label>
                                    <input type="password" name="cp" class="form-control" id="inputPasswordOld" required="">
                                </div>
                                <div class="form-group">
                                    <label for="inputPasswordNew">New Password</label>
                                    <input type="password" name="np"  class="form-control" id="a" onkeyup="passs()" required>
                                    <div id="hello" style="color: red;"></div>
                                </div>
                                <div class="form-group">
                                    <label for="inputPasswordNewVerify">Verify</label>
                                    <input type="password" name="cnp" class="form-control" id="b" onkeyup="conpasss()" required="">
                                    <div id="hy" style="color: red;"></div>
                                </div>
                                <div class="form-group">
                                    <input type="submit" class="btn btn-success mt-3 btn-lg float-right" value="Submit">
                                    <a href="index.php" class="btn btn-danger mt-3 btn-lg float-right">Cancel</a>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- /form card change password -->

                </div>



            </div>
            <!--/row-->

            <br><br><br><br>

        </div>
        <!--/col-->
    </div>

    </div>
    <!--/container-->
</body>
<script>
      function passs() {
        var pass = document.getElementById("a").value;
        var pwd_expression = /^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-])/;

        if (!pwd_expression.test(pass)) {
            document.getElementById("hello").innerHTML = "Upper case,Lower case,Special character and Numeric letter need";
        } else {
            document.getElementById("hello").innerHTML = ""
        }
    }

    function conpasss() {
        var pass = document.getElementById("a").value;
        var cpass = document.getElementById("b").value;

        if (pass != cpass) {
            document.getElementById("hy").innerHTML = "Password not match";
        } else {
            document.getElementById("hy").innerHTML = "";
        }
    }


    </script>
</html>