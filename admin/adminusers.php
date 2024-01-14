<?php
session_start();
include('../api/dbconnect.php');

if ($_SESSION['id'] == '') {
    header("location:adminlogin.php");
}
// Insert Table
$select = "select * from users order by id desc";
$query  = mysqli_query($conn, $select);

// Delete User
if ($_GET['mode'] == 'delete') {
    $sql = mysqli_query($conn, "DELETE FROM `users` WHERE id ='" . $_GET['delid'] . "'");
    echo "<script>window.location.href='adminusers.php';</script>";
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin | Manage Users</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Include DataTables CSS and JS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>

    <style>
        .main_div {
            margin-left: 250px;
        }
        .box2{
            display: flex;
            justify-content: space-between;
        }
    </style>
</head>

<body>
    <?php include("adminleftbar.html"); ?>
    <div class="container main_div">
        <h3>Manage Users</h3>
        <div class="row md-10">
            <div class="card bg-light">
                <div class="box2">
                    <div class="card-header">All Users Details</div>
                    <div><a href="./download.php"><button class="text-white btn btn-primary">Download</button></a></div>
                </div>
                <div class="card-body">
                    <?php
                    if (mysqli_num_rows($query) > 0) {
                        ?>
                        <div class="container">
                            <table class="table table-bordered" id="userTable">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>FULL NAME</th>
                                        <th>EMAIL ID</th>
                                        <th>CONTACT NO</th>
                                        <th>REGISTRATION DATE</th>
                                        <th>ACTION</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 1;
                                    while ($row = mysqli_fetch_assoc($query)) {
                                        ?>
                                        <tr>
                                            <td>
                                                <?= $i++; ?>
                                            </td>
                                            <td>
                                                <?= $row['name']; ?>
                                            </td>
                                            <td>
                                                <?= $row['email']; ?>
                                            </td>
                                            <td>
                                                <?= $row['contact']; ?>
                                            </td>
                                            <td>
                                                <?= $row['created_at']; ?>
                                            </td>
                                            <td>

                                                <a href="adminusers_edit.php?editid=<?= $row['id']; ?>">
                                                    <button class="btn btn-success">Edit</button></a>

                                                <a href="adminusers.php?delid=<?= $row['id']; ?>&mode=delete" onclick="return confirm ('Are You sure?')">
                                                    <button class="btn btn-danger">Delete</button></a>
                                            </td>
                                        </tr>
                                        <?php
                                    } ?>
                                </tbody>
                            </table>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm"
        crossorigin="anonymous"></script>
    <script>
        $(document).ready(function () {
            $('#userTable').DataTable({
                searching: true,
            });
        });
    </script>
</body>

</html>