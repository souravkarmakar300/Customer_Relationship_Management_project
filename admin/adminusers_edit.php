<?php
session_start();
include('../api/dbconnect.php');
error_reporting(1);

if ($_SESSION['id'] == '') {
    header("location:adminlogin.php");
}
if (isset($_POST['submit'])) {
    $address = $_POST['address'];
    if (!empty($address)) {
        $sql = mysqli_query($conn, "update users set name='" . $_POST['user_name'] . "',contact='" . $_POST['user_phone'] . "',
         address='" . $_POST['address'] . "',gender='" . $_POST['user_gender'] . "',status='" . $_POST['status'] . "' where id='" . $_GET['editid'] . "'");
        echo "<script>alert('Successfully Updated')</script>";
        echo "<script>window.location.href='adminusers.php'</script>";
    } else {
        echo "<script>alert('Not Updated')</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin | User Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous" />
    <style>
        .box {
            display: flex;
            justify-content: space-between;
        }

        .email_input {
            cursor: not-allowed;
        }
    </style>
</head>

<body>
    <?php include("adminleftbar.html"); ?>
    <div class="container-fluid bg-light pb-3">


        <div class="row col-md-7">
            <div class="card offset-3">
                <div class="card-header fs-2 text-center text-primary">
                    Profile Information
                </div>
                <?php
                $select = mysqli_query($conn, "SELECT * FROM users where id= '" . $_GET['editid'] . "'");

                while ($row = mysqli_fetch_assoc($select)):
                    ?>
                    <div class="card-body bg-light">
                        <form action="" method="POST">

                            <div class="mb-2">
                                <label for="name" class="form-label">Name: </label>
                                <input type="text" class="form-control" name="user_name" value="<?php echo $row['name']; ?>"
                                    placeholder="Input your name" />
                            </div>
                            <div class="mb-2">
                                <label for="email" class="form-label">Email ID:</label>
                                <input type="name" class="form-control email_input" name="name"
                                    value="<?php echo $row['email']; ?>" placeholder="Input your email" readonly />
                            </div>
                            <div class="mb-2">
                                <label for="contact" class="form-label">Contact No:</label>
                                <input type="phone" class="form-control" name="user_phone"
                                    value="<?php echo $row['contact']; ?>" placeholder="Input your Contact No" />
                            </div>
                            <div class="mb-2">
                                <label for="text" class="form-label">Address:</label>
                                <input type="textarea" class="form-control" name="address" placeholder="Address here"
                                    value="<?php echo $row['address']; ?>" />
                            </div>
                            <div class="md-2">
                                <label for="radio" class="form-label">Gender:</label> <br />
                                <input type="radio" value="male" name="user_gender" <?php if ($row['gender'] == 'male')
                                    echo "checked"; ?> />
                                Male
                                <input type="radio" value="female" name="user_gender" <?php if ($row['gender'] == 'female')
                                    echo "checked"; ?> /> Female
                                <input type="radio" value="other" name="user_gender" <?php if ($row['gender'] == 'other')
                                    echo "checked"; ?>/> Other
                            </div>
                            <div class="md-2">
                                <label for="radio" class="form-label">Status:</label> <br />
                                <input type="radio" value="1" name="status" <?php if ($row['status'] == 1)
                                    echo "checked"; ?> />
                                Active
                                <input type="radio" value="0" name="status" <?php if ($row['status'] == 0)
                                    echo "checked"; ?> /> Deactive
                            </div>
                            <div class="mb-3 mt-3">
                                <button class="btn btn-primary" name="submit" value="submit">
                                    Update Profile information
                                </button>
                                <button type="clear" name="btn-clr" class="btn btn-primary">Clear Form</button>

                            </div>
                            <?php
                endwhile; ?>
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