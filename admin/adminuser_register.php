<?php
session_start();
include('../api/dbconnect.php');
include("./adminmail.php");

if ($_SESSION['id'] == '') {
    header("location:adminlogin.php");
}
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
        $sql    = "insert into users(name, email, password,contact,gender) value(' ".ucwords($username)."','$useremail','".md5($userpassword)." ',' $userphone ',' $usergender ')";
        $insert = mysqli_query($conn, $sql);
        if ($insert) {

            $email   = $useremail;
            $subject = "Congratulations";
            $body    = "Login successfully";
            sendMail($email, $subject, $body);


            echo "<script>alert('Successfull Register');</script>";
            echo "<script>window.location.href='adminuser_register.php'</script>";
        }
    }

}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin | User Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous" />
        <style>
        .main_div {
            margin-left: 250px;
        }
    </style>
</head>
<body>
<?php include("adminleftbar.html"); ?>
<div class="container main_div">
<div class="row col-md-6">
        <div class="card offset-5">
          <div class="card-header fs-2 text-center text-primary">
            Sign in to CRM
          </div>
          <div class="card-body bg-light pb-3">
            <form action="" method="POST">
              <div class="mb-3">
                <label for="name" class="form-label">Name: </label>
                <input
                  type="text"
                  class="form-control"
                  name="user_name"
                  placeholder="Input your name" />
              </div>
              <div class="mb-3">
                <label for="email" class="form-label">Email ID:</label>
                <input
                  type="name"
                  class="form-control"
                  name="user_email"
                  placeholder="Input your email" />
              </div>
              <div class="mb-3">
                <label for="password" class="form-label">Password:</label>
                <input
                  type="password"
                  class="form-control"
                  name="user_password"
                  placeholder="Input your Password" />
              </div>
              <div class="mb-3">
                <label for="password" class="form-label">Re-Password:</label>
                <input
                  type="password"
                  class="form-control"
                  name="user_repassword"
                  placeholder="Re-enter Password" />
              </div>
              <div class="mb-3">
                <label for="contact" class="form-label">Contact No:</label>
                <input
                  type="phone"
                  class="form-control"
                  name="user_phone"
                  placeholder="Input your Contact No" />
              </div>
              <div class="md-3">
                <label for="radio" class="form-label">Gender:</label> <br />
                <input type="radio" value="male" name="user_gender"/>
                Male
                <input type="radio" value="female" name="user_gender" /> Female
                <input type="radio" value="other" name="user_gender" /> Other
              </div>
              <div class="mb-3 mt-3">
                <button class="btn btn-primary" name="submit" value="submit">
                  Submit
                </button>
              </div>
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