<?php
session_start();
include("./api/dbconnect.php");
// include("./mail.php");

// print_r($_SESSION);

// die();
if (isset($_POST['btn-login'])) {
    $result     = mysqli_query($conn, "SELECT * FROM users WHERE id = '" . $_SESSION['id'] . "'");
    $resultdata = mysqli_fetch_assoc($result);

    if ($resultdata['user_token'] == $_POST['u_token']) {
        $update = mysqli_query($conn, "UPDATE users SET password= '" . $_POST['u_password'] . "' where id='" . $_SESSION['id'] . "'");
        session_unset();
        session_destroy();
        echo "<script>alert('Password Successfully Updated')</script>";
        echo "<script>window.location.href='./login.html'</script>";
    } else {
        echo "<script>alert('OTP not Match & Please try again...')</script>";
        echo "<script>window.location.href='./login.php'</script>";
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous" />
</head>

<body>

    <div class="container">
        <div class="row col-md-5">
            <div class="card pt-4 offset-8">
                <div class="card-header fs-2 text-center text-primary">Update Password</div>
                <div class="card-body bg-secondary">
                    <form action="" method="post">
                        <div class="mb-3">
                            <label for="password" class="form-label">New Password</label>
                            <input type="password" name="u_password" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="number" class="form-label">Token</label>
                            <input type="text" name="u_token" class="form-control">
                        </div>
                        <button type="submit" name="btn-login" class="btn btn-primary">Login</button>
                    </form>
                </div>
            </div>
        </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm"
        crossorigin="anonymous"></script>
</body>

</html>