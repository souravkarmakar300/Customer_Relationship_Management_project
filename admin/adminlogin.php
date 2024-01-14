<?php
session_start();
include('../api/dbconnect.php');

if (isset($_POST['login'])) {

    $adminid       = $_POST['adminid'];
    $adminpassword = $_POST['adminpassword'];

    $select = "select * from admin where user_id = ? and password = ? ";

    $query = mysqli_prepare($conn, $select);
    mysqli_stmt_bind_param($query, 'ss', $adminid, $adminpassword);
    mysqli_stmt_execute($query);
    $result = mysqli_stmt_get_result($query);

    if (mysqli_num_rows($result) > 0) {

        $row = mysqli_fetch_assoc($result);

        $_SESSION['id']      = $row['id'];
        $_SESSION['user_id'] = $row['user_id'];
        echo "<script>window.location.href='./adminDashboard.php'</script>";
    } else {
        echo "<script>alert('UserID or Password Incorrect')</script>";
        echo "<script>window.location.href='adminlogin.html'</script>";
    }


}
?>