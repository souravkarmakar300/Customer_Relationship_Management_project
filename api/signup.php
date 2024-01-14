<?Php
session_start();
include("./dbconnect.php");
include("./mail.php");

error_reporting(1);
if ($_POST["submit"]) {
    $username       = $_POST["user_name"];
    $useremail      = $_POST["user_email"];
    $userpassword   = $_POST["user_password"];
    $userrepassword = $_POST["user_repassword"];
    $userphone      = $_POST["user_phone"];
    $usergender     = $_POST["user_gender"];

    $query  = mysqli_query($conn, "select * from users where email='" . $useremail . "'");
    $number = mysqli_num_rows($query);
    // $number  = mysqli_num_rows($query);

    if ($userpassword != $userrepassword) {
        echo "<script>alert('Password not match');</script>";
        echo "<script>window.location.href='../signup.html'</script>";
    } elseif (empty($username)) {
        echo "<script>alert('name is empty');</script>"; //JavaScript Redirection Method
        echo "<script>window.location.href='../signup.html'</script>";
    } elseif (empty($useremail)) {
        echo "<script>alert('email is empty');</script>"; //JavaScript Redirection Method
        echo "<script>window.location.href='../signup.html'</script>";
    } elseif (empty($userpassword)) {
        echo "<script>alert('password is empty');</script>"; //JavaScript Redirection Method
        echo "<script>window.location.href='../signup.html'</script>";
    } elseif (empty($userphone)) {
        echo "<script>alert('contact no is empty');</script>"; //JavaScript Redirection Method
        echo "<script>window.location.href='../signup.html'</script>";
    } elseif (empty($usergender)) {
        echo "<script>alert('gender is empty');</script>"; //JavaScript Redirection Method
        echo "<script>window.location.href='../signup.html'</script>";
    } elseif ($number != 0) {
        echo "<script>alert('Email already exits');</script>";
        echo "<script>window.location.href='../signup.html'</script>";
    } elseif (!empty($username) && !empty($useremail) && !empty($userpassword) && !empty($userphone) && !empty($usergender)) {
        date_default_timezone_set("Asia/Calcutta");
        $time   = date("h:i:sa");
        $tim    = $time;
        $date   = date("Y/m/d");
        $sql    = "insert into users(name, email, password,contact,gender,status) value(' ".ucwords($username)."','$useremail','".md5($userpassword)." ',' $userphone ',' $usergender ',1)";
        $insert = mysqli_query($conn, $sql);
        if ($insert) {

            $email   = $useremail;
            $subject = "Congratulations";
            $body    = "Login successfully";
            sendMail($email, $subject, $body);
            
            echo "<script>alert('Successfull Register');</script>";
            echo "<script>window.location.href='../login.html'</script>";
        }
    }

}
?>