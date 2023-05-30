<?php
error_reporting(E_ERROR | E_PARSE);

$oid = $_GET['id'];
include "db.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <form action="#" method="POST" style="margin:10%">
        <select class="form-select" name="status" aria-label="Default select example" required>
            <option selected disabled>Select Option</option>
            <option value="Pending">Pending</option>
            <option value="Deliverd">Deliverd</option>
            <option value="Paid">Paid</option>
        </select>
        <div class="d-flex justify-content-center">
            <input type="submit" class="btn btn-success mt-3" name="subBtn" value="Update">
            <a href="pending_orders.php" class="btn btn-primary mt-3" style="margin-left: 2%;">Back</a>
        </div>
    </form>

    <?php
    if (isset($_POST['subBtn'])) {
        $status = $_POST['status'];
        if ($status != null) {
            $result = mysqli_query($connection, "UPDATE `tbl_order` SET `status`='$status' WHERE `oid` = $oid");
            if ($result) {
                echo ("<script>location.href='pending_orders.php'</script>");
            }
        }
    }
    ?>
</body>

</html>