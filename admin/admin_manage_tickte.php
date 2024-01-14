<?php
session_start();
include('../api/dbconnect.php');
error_reporting(0);

if ($_SESSION['id'] == '') {
    header("location:adminlogin.php");
}
if (isset($_POST['update'])) {

    date_default_timezone_set("Asia/Calcutta");
    $time = date("h:i:sa");
    $tim  = $time;
    $date = date("Y-m-d h:i:sa");

    $remark    = $_POST["admin_respond"];
    $submit_id = $_POST["submit_id"];

    $sql2   = "update usertickte set `admin_remark`='$remark',`admin_remark_date`='$date' where tickte_id='$submit_id'";
    $tickte = mysqli_query($conn, $sql2);
    if ($tickte) {
        echo '<script>alert("Ticket has been updated")</script>';
    } else {
        echo '<script>alert("Not updated")</script>';
    }

    // $sql3     = "update usertickte set admin_remark_date='$date' where tickte_id='$submit_id'";
    // $tickte =mysqli_query($conn, $sql3);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin | Manage Tickte</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous" />
    <style>
        .box1 {
            margin-left: 250px;
        }

        .box2 {
            height: auto;
            background-color: #E5E9EC;
        }

        .box3 {
            margin-left: 250px;
        }
    </style>
</head>

<body>
    <?php include("adminleftbar.html"); ?>
    <div class="container-fluid bg-secondary pb-3">
        <div class="box1">
            <h2 class="text-info">Ticket Support</h2>
        </div>
        <?php
        // $view = mysqli_query($conn, "SELECT * FROM `usertickte` WHERE `email` LIKE '".$_SESSION['email']."'");
        $view = mysqli_query($conn, "SELECT * FROM `usertickte`order by id desc");
        $num  = mysqli_num_rows($view);

        if ($num > 0) {
            while ($row = mysqli_fetch_assoc($view)) {
                ?>
                <div class="row box3 pt-4">
                    <div class="col-md-11 box2">
                        <div class="box4 p-2">
                            <h4><img src="../image/user.png" alt="" width="35" height="35">Subject:&nbsp;<span
                                    class="text-primary">
                                    <?php echo $row['subject'] ?>
                                </span></h4>
                            <p><span class="text-danger">Tickte #
                                    <?php echo $row['tickte_id'] ?>
                                </span>&nbsp;--&nbsp;Created on:&nbsp;
                                <?php echo $row['posting_date'] ?><br>
                            <p>Description:--&nbsp;<span class="text-info">
                                    <?php echo $row['Description'] ?>
                                </span></p>
                            </p><br>
                            <img src="../image/admin.png" alt="" width="35" height="35">
                            <form action="" method="POST">
                                <div class="col-md-4">
                                    <label for="text" class="form-label">ADMIN Response:&nbsp;&nbsp;</label><span
                                        class="text-info">
                                        <?php echo $row['admin_remark'] ?>
                                    </span>
                                    <input type="text" class="form-control" name="admin_respond" />
                                </div>
                                <div class="mb-2 mt-3">
                                    <p>
                                        <input type="submit" class="btn btn-primary" value="Update" name="update" />
                                        <input name="submit_id" id="submit_id" type="hidden"
                                            value="<?php echo $row['tickte_id'] ?>" />
                                    </p>
                                </div>
                            </form>
                            </p>
                        </div>
                    </div>
                </div>
            <?php }
        } else {
            ?>
            <span class="box1" style="color:red">No Data Found</span>
            <?php
        } ?>
    </div>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm"
        crossorigin="anonymous"></script>
</body>

</html>