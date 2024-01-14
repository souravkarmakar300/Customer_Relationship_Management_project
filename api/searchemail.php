<?php
session_start();
include("./dbconnect.php");
include "./mail.php";

if (isset($_POST['btn-search'])) {
    $result     = mysqli_query($conn, "SELECT * FROM users where email='{$_POST['user_email']}'");
    $resultdata = mysqli_fetch_assoc($result);
    

    if (mysqli_num_rows($result) == 1) {
        $token  = random_int(100000, 999999);
        $date   = date("Y-m-d H:i:s");
        $update = mysqli_query($conn, "UPDATE users SET user_token = '$token',token_created_at='$date' WHERE email = '{$_POST['user_email']}'");

        $email = $_POST['user_email'];
        $sub   = "Your OTP";
        $body  = $token;
        sendMail($email, $sub, $body);
        $_SESSION['id']=$resultdata['id'];

        echo "<script>alert('Email is OK');</script>";
        echo "<script>window.location.href='../token.php'</script>";
    }
}
?>