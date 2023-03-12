<!DOCTYPE html>
<html lang="en">
<?php
session_start();
$user = $_SESSION['usr_id'];
$con = mysqli_connect("localhost", "root", "", "shoes");
$sql = "SELECT * FROM `auth` WHERE `id` = $user ";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_array($result);
?>

<head>
    <meta charset="utf-8">
    <title>PARMAS</title>
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
                            <li class="breadcrumb-item"><a href="/shoes/index.php">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">My Profile</li>
                        </ol>
                    </nav>
                    <hr>
                </div>
                <form method="POST" action="#" class="file-upload" enctype="multipart/form-data">
                    <div class="row mb-5 gx-5">

                        <div class="col-xxl-12 mb-5 mb-xxl-0">
                            <div class="bg-secondary-soft px-4 py-5 rounded">
                                <div class="row g-3">
                                    <h4 class="mb-4 mt-0">Contact detail</h4>
                                    <div class="col-md-4">
                                        <label class="form-label">Name </label> <label class="form-label error" id="f_error"></label>
                                        <input type="text" name="fname" id="fname" class="form-control" placeholder="" aria-label="Name" autocomplete="off" value="<?= $row['name'] ?>" required>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label">Username </label> <label class="form-label error" id="s_error"></label>
                                        <input type="text" name="uname" id="uname" class="form-control" placeholder="" aria-label="Last name" autocomplete="off" value="<?= $row['username'] ?>" required>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label">Email </label> <label class="form-label error" id="e_error"></label>
                                        <input type="email" name="email" id="email" class="form-control" placeholder="" aria-label="Phone number" autocomplete="off" value="<?= $row['email'] ?>" required>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="inputEmail4" class="form-label">Phone</label> <label class="form-label error" autocomplete="off" id="h_error"></label>
                                        <input type="text" name="phone" class="form-control" id="phone" value="<?= $row['mobile_number'] ?>" required>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="inputEmail4" class="form-label">Address</label> <label class="form-label error"  autocomplete="off" id="h_error"></label>
                                        <input type="text" name="address" class="form-control" id="address" value="<?= $row['address'] ?>" required>
                                    </div>

                                    <div class="col-md-6">
                                        <label for="inputEmail4" class="form-label text-light">w</label>
                                        <input type="submit" name="update" id="Update" class="form-control btn-primary" value="Update">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="inputEmail4" class="form-label text-light">w</label>
                                        <a href="./profile.php" class="form-control btn btn-danger">Cancel</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

            </div>
            </form>
        </div>
    </div>
    </div>
    <?php
    if (isset($_POST['update'])) {
        $fname = $_POST['fname'];
        $uname = $_POST['uname'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $address = $_POST['address'];
        if ($fname != null && $uname != null && $phone != null && $phone != null && $email != null && $address != null) {
            $sql = "UPDATE `auth` SET `name`='$fname',`username`='$uname',`mobile_number`='$phone',`email`='$email',`address`='$address' WHERE `id` = $user";
            mysqli_query($con, $sql);
            echo("<script>location.href='profile.php'</script>");
        }
    }
    ?>
</body>
<script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>


</html>