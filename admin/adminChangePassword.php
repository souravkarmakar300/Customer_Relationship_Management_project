<?php
session_start();
include('../api/dbconnect.php');
if ($_SESSION['id'] == '') {
    header("location:adminlogin.php");
}
if (isset($_POST['btn-submit'])) {
    $oldpass = $_POST["old_password"];
    $newpass = $_POST["new_password"];
    $confirmpass = $_POST["confirm_password"];

    if ($newpass != $confirmpass) {
        echo "<script>alert('Password and Re-Type Password Field do not match  !!')</script>";
        echo "<script>window.location.href='adminChangePassword.php'</script>";
    } elseif (empty($oldpass)) {
        echo "<script>alert('Old Password Field Empty...')</script>";
        echo "<script>window.location.href='adminChangePassword.php'</script>";
    } elseif (empty($newpass)) {
        echo "<script>alert('New Password Field Empty...')</script>";
        echo "<script>window.location.href='adminChangePassword.php'</script>";
    } elseif (empty($confirmpass)) {
        echo "<script>alert('Confirm Password Field Empty...')</script>";
        echo "<script>window.location.href='adminChangePassword.php'</script>";
    } elseif (!empty($oldpass) && !empty($newpass) && !empty($confirmpass)) {
        $result = mysqli_query($conn, "select password from admin where password='$oldpass' and user_id= '" . $_SESSION['user_id'] . "'");
        $num = mysqli_num_rows($result);
        if ($num > 0) {
            $update = mysqli_query($conn, "update admin set password='$confirmpass' where user_id= '" . $_SESSION['user_id'] . "'");
            echo "<script>alert('Password Updated Successfully...')</script>";
            echo "<script>window.location.href='adminChangePassword.php'</script>";
        } else {
            echo "<script>alert('Password Not Match')</script>";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="./css/u_dashboard.css" type="text/css"> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <title>Admin Change password</title>
    <style>
        .main_div {
            margin-left: 250px;
        }
    </style>
</head>

<body>
    <?php include("adminleftbar.html"); ?>
    <div class="container main_div">
        <div class="row col-md-5">
            <div class="card pt-4 offset-8">
                <div class="card-header fs-2 text-center text-primary">Change Password</div>
                <div class="card-body bg-light">
                    <form action="#" method="post">
                        <div class="mb-3">
                            <label for="password" class="form-label">Old Password</label>
                            <input type="password" name="old_password" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">New Password</label>
                            <input type="password" name="new_password" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Confirm Password</label>
                            <input type="password" name="confirm_password" class="form-control">
                        </div>
                        <button type="submit" name="btn-submit" class="btn btn-primary">Submit</button>
                        <button type="clear" name="btn-clr" class="btn btn-primary">Clear Form</button>

                    </form>
                </div>
            </div>
        </div>
    </div>

</html>