<?php
include('../api/dbconnect.php');
session_start();
if ($_SESSION['id'] == '') {
    header("location:login.php");
}
// Overall Visitor
$query = mysqli_query($conn, "SELECT * from usercheck");
$row   = mysqli_num_rows($query);

// Total Register
$reg = mysqli_query($conn, "select * from users");
$total_reg   = mysqli_num_rows($reg);

// Overall Quote Request
$quote = mysqli_query($conn, "select * from userquote");
$total_quote   = mysqli_num_rows($quote);

// Overall Tickte
$tickte = mysqli_query($conn, "select * from usertickte");
$total_tickte   = mysqli_num_rows($tickte);

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="./css/u_dashboard.css" type="text/css"> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        mysqli_real_queryVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <title>Admin DashBoard</title>
    <style>
        .main_div {
            margin-left: 250px;
        }
        .box1{
            width: 600px;
            height: auto;
            background-color: #0AA699;
            border-radius: 10px;
        }
        .box2{
            width: 600px;
            height: auto;
            background-color: #0090D9;
            border-radius: 10px;
        }
        .box3{
            width: 600px;
            height: auto;
            background-color: #735F87;
            border-radius: 10px;
        }
        .box4{
            width: 600px;
            height: auto;
            background-color: #F35958;
            border-radius: 10px;
        }
        .box1:hover, .box2:hover, .box3:hover, .box4:hover{
            background-color: rgba(0, 0, 0, 0.653);
        }
    </style>
</head>

<body>
    <?php include("adminleftbar.html"); ?>
    <div class="container main_div">
        <!-- <h1 class="text-center text-primary pt-4">Welcome</h1> -->
        <div class="row pt-4">
            <div class="col-md-5 mx-3 mb-5 fs-4 box1">Overall Visitor
                <div class="fs-6 text-white pb-3 pt-2">Overall Visitors--
                    <?php echo "$row"; ?>
                </div>
            </div>
            <div class="col-md-5 mb-5 mx-3 fs-4 box2">Registered Users
                <div class="fs-6 text-white pb-3 pt-2">Registered Users--
                    <?php echo "$total_reg"; ?>
                </div>
            </div>
            <div class="col-md-5 mx-3 mb-5 fs-4 box3">Quote Requests
                <div class="fs-6 text-white pb-3 pt-2">Overall Quote Request--
                    <?php echo "$total_quote"; ?>
                </div>
            </div>
            <div class="col-md-5 mb-5 mx-3 fs-4 box4">Overall Tickets
                <div class="fs-6 text-white pb-3 pt-2">Overall Tickte Request--
                    <?php echo "$total_tickte"; ?>
                </div>
            </div>
        </div>
    </div>

</html>