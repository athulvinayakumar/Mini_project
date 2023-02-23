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
        <div class="col-md-12">
            <div class="row">
                
                <div class="col-md-6 offset-md-3">
                    <span class="anchor" id="formResetPassword"></span>
                    <!-- form card reset password -->
                    <div class="card card-outline-secondary">
                        <div class="card-header">
                            <h3 class="mb-0">Password Reset</h3>
                        </div>
                        <div class="card-body">
                        <form name="f1" class="pt-3" action="" method="post" >
                                <div class="form-group">
                                    <label for="inputResetPasswordEmail">Email</label>
                                    <input type="text" class="form-control form-control-lg" id="email_address" onkeyup='emailValidation(this)' name="email" placeholder="Enter Email address" autocomplete="off"  required autofocus>
                                    <span id="mail" class="new"  style="color:red;"></span> 
                                </div>
                                <div class="form-group">
                                    <input type="submit" name="recover" class="btn btn-success mt-3 btn-lg float-right" value="Reset">
                                    <a href="index.php" class="btn btn-danger mt-3 btn-lg float-right">Cancel</a>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- /form card reset password -->

                </div>
        </div>
        <!--/col-->
    </div>
    
</div>
<!--/container-->
</body>
</html>