<!DOCTYPE html>
<html lang="en">
<?php
session_start();
// error_reporting(E_ERROR | E_PARSE);
include 'db.php';
$user = $_SESSION['usr_id'];
$con=mysqli_connect("localhost","root","","shoes");
$sql="SELECT * FROM `auth` WHERE `id` = $user ";
?>

<head>
    <meta charset="utf-8">
    <title>STEPSOUT</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css">
    <link rel="stylesheet" href="/parmas/assets/css/profile.css">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="my-5">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/parmas/index.php">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">My Profile</li>
                        </ol>
                    </nav>
                    <hr>
                </div>
                <form class="file-upload">
                    <div class="row mb-5 gx-5">
                        <div class="col-xxl-4">
                            <div class="bg-secondary-soft px-4 py-5 rounded">
                                <div class="row g-3">
                                    <div class="text-center">
                                        <div class="square position-relative display-2 mb-3">
                                            <img src="/parmas/assets/img/profile/<?= $user['usr_profile'] ?>">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-8 mb-5 mb-xxl-0">
                            <div class="bg-secondary-soft px-4 py-5 rounded">
                                <div class="row g-3">
                                    <h4 class="mb-4 mt-0">Contact detail</h4>
                                    <div class="col-md-6">
                                        <label class="form-label">First Name</label>
                                        <input type="text" class="form-control" placeholder="" aria-label="First name"
                                            value="<?= $user['name'] ?>" disabled>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Phone number</label>
                                        <input type="text" class="form-control" placeholder="" aria-label="Phone number"
                                            value="<?= $user['mobile_phone'] ?>" disabled>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Email</label>
                                        <input type="text" class="form-control" placeholder="" aria-label="Phone number"
                                            value="<?= $user['email'] ?>" disabled>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="inputEmail4" class="form-label">Addrees</label>
                                        <input type="email" class="form-control" id="inputEmail4"
                                            value="<?= $user['address'] ?>" disabled>
                                    </div>
                                    <?php if ($user['usr_'] != null) { ?>
                                        <div class="col-md-6">
                                            <label for="inputEmail4" class="form-label">Baptism Name</label>
                                            <input type="text" name="usr_bapName" class="form-control"
                                                value="<?= $user['usr_bapName'] ?>" disabled>
                                        </div>
                                    <?php } ?>
                                    <?php if ($user['usr_ward'] != null) { ?>
                                        <div class="col-md-6">
                                            <label for="inputEmail4" class="form-label">Ward</label>
                                            <input type="text" name="usr_ward" class="form-control"
                                                value="<?= $user['usr_ward'] ?>" disabled>
                                        </div>
                                    <?php } ?>
                                    <div class="col-md-6">
                                        <label for="inputEmail4" class="form-label text-light">w</label>
                                        <a href="/parmas/users/user/edit_profile.php" class="form-control btn btn-primary">Update Your Profile</a>
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