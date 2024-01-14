<?php
session_start();
if($_SESSION['id']==''){
    header("location:login.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="./css/u_dashboard.css" type="text/css"> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <title>User DashBoard</title>
    <style>
        .main_div {
            margin-left: 250px;
        }
    </style>
</head>

<body>
    <?php include("leftbar.html"); ?>
    <div class="container main_div">
        <h1 class="text-center text-primary pt-4">Welcome <?php echo $_SESSION['name']?></h1>
    </div>

</html>