<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<?php
// error_reporting(E_ERROR | E_PARSE);
include 'db.php';
$user = $_SESSION['usr_id'];
$con=mysqli_connect("localhost","root","","shoess");
$sql="SELECT * FROM `auth` WHERE `id` = $user "; 
$result=mysqli_query($con,$sql);
$row=mysqli_fetch_array($result);
?>

<head>
    <meta charset="utf-8">
    <title>STEPSOUT</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css">
   
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="my-5">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/shoes/seller.php">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">My Profile</li>
                        </ol>
                    </nav>
                    <hr>
                </div>
                <form class="file-upload">
                    <div class="row mb-5 gx-5">
                        
                        <div class="col-xxl-12 mb-5 mb-xxl-0">
                            <div class="bg-secondary-soft px-4 py-5 rounded">
                                <div class="row g-3">
                                    <h4 class="mb-4 mt-0">Contact detail</h4>
                                    <div class="col-md-4">
                                        <label class="form-label">Name</label>
                                        <input type="text" id="name" class="form-control" placeholder="" aria-label="Name"
                                            value="<?= $row['name'] ?>" disabled>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label">Username</label>
                                        <input type="text" id="username" class="form-control" placeholder="" aria-label="Phone number"
                                            value="<?= $row['username'] ?>" disabled>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="inputEmail4" class="form-label">Email</label>
                                        <input type="email" id="mail" class="form-control" id="inputEmail4" 
                                            value="<?= $row['email'] ?>" disabled>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label">Phone</label>
                                        <input type="text" id="phone" class="form-control" placeholder="" aria-label="Phone number"
                                            value="<?= $row['mobile_number'] ?>" disabled>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="inputEmail4" class="form-label">Address</label>
                                        <input type="text" id="address" class="form-control" id="inputEmail4"
                                            value="<?= $row['address'] ?>" disabled>
                                    </div>
                                    
                                    
                                    <div class="col-md-4">
                                        <label for="inputEmail4" class="form-label text-light">w</label>
                                        <a href="./edit_profile.php" id="update" class="form-control btn btn-primary">Update Your Profile</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
<script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

</html>