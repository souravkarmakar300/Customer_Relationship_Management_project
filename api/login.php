<?php
session_start();
include("./dbconnect.php");


if (isset($_POST["login"])) {
    $useremail = $_POST['email'];
    $userpass  = $_POST['password'];
    $ret       = "SELECT * FROM users where email= ? AND password= ? ";

    $query = mysqli_prepare($conn, $ret);
    mysqli_stmt_bind_param($query, 'ss', $useremail, $userpass);
    mysqli_stmt_execute($query);
    $result = mysqli_stmt_get_result($query);

    if (mysqli_num_rows($result) == 1) {

        $num = mysqli_fetch_assoc($result);

        $_SESSION['id']         = $num['id'];
        $_SESSION['email']      = $_POST['email'];
        $_SESSION['name']       = $num['name'];
        $_SESSION['created_at'] = $num['created_at'];
        $_SESSION['phone']      = $num['contact'];
        date_default_timezone_set("Asia/Calcutta");
        $time = date("h:i:sa");
        $tim  = $time;
        $date = date("Y/m/d");

        $sql1      = "insert into usercheck(logindate,logintime,user_id,user_name,user_email)value(' $date',' $tim','" . $_SESSION['id'] . "','" . $_SESSION['name'] . "','" . $_SESSION['email'] . "')";
        $checkuser = mysqli_query($conn, $sql1);

        echo "<script>alert('Login Successfull');</script>";
        echo "<script>window.location.href='../userDashboard.php'</script>";
    } else {
        echo "<script>alert('Invalid username or password');</script>";
        echo "<script>window.location.href='../login.html'</script>";
    }

}

?>