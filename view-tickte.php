<?php
session_start();
include("./api/dbconnect.php");

if ($_SESSION['id'] == '') {
    header("location:login.php");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User View Tickte</title>
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
    <?php include("leftbar.html"); ?>
    <div class="container-fluid bg-secondary pb-3">
        <div class="box1">
            <h2 class="text-info">Ticket Support</h2>
        </div>
        <?php
        // $view = mysqli_query($conn, "SELECT * FROM `usertickte` WHERE `email` LIKE '".$_SESSION['email']."'");
        $view = mysqli_query($conn, "SELECT * FROM `usertickte` WHERE `user_id`= '" . $_SESSION['id'] . "'");
        $num = mysqli_num_rows($view);
        if ($num > 0) {
            while ($row = mysqli_fetch_assoc($view)) {
                ?>
                <div class="row box3 pt-4">
                    <div class="col-md-11 box2">
                        <div class="box4 p-2">
                            <h4><img src="./image/user.png" alt="" width="35" height="35">Subject:&nbsp;<span class="text-primary">
                                    <?php echo $row['subject'] ?>
                                </span></h4>
                            <p><span class="text-danger">Tickte #
                                    <?php echo $row['tickte_id'] ?>
                                </span>&nbsp;--&nbsp;Created on:&nbsp;
                                <?php echo $row['posting_date'] ?>
                                <p>Description:--&nbsp;<span class="text-info"><?php echo $row['Description'] ?></span></p>
                                
                            </p><br>
                              <img src="./image/admin.png" alt="" width="35" height="35">
                            <p>&nbsp;<span class="text-warning">ADMIN Response</span> :&nbsp;
                                <?php echo $row['admin_remark'] ?> <span class="text-info">DATE ON :&nbsp;
                                    <?php echo $row['admin_remark_date'] ?>
                                </span>
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