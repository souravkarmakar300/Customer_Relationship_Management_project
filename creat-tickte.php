<?php
session_start();
include("./api/dbconnect.php");

if ($_SESSION['id'] == '') {
    header("location:login.php");
}
if (isset($_POST['submit'])) {
    $count_my_page = ("hitcounter.txt");
    $hits          = file($count_my_page);
    $hits[0]++;
    $fp = fopen($count_my_page, "w");
    fwrite($fp, "$hits[0]");
    fclose($fp);
    $tid     = $hits[0];
    $subject = $_POST['subject'];
    if (!empty($subject)) {
        $query  = "INSERT INTO `usertickte`(`tickte_id`,`user_id`,`email`, `subject`, `task`, `Priority`, `Description`) VALUES ('$tid','" . $_SESSION['id'] . "','" . $_SESSION['email'] . "','" . $_POST['subject'] . "','" . $_POST['task'] . "','" . $_POST['Priority'] . "','" . $_POST['descrive'] . "')";
        $tickte = mysqli_query($conn, $query);
        if ($tickte) {
            echo "<script>alert('Tickte Generated')</script>";
        } else {
            echo "<script>alert('Tickte Generate failed')</script>";
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Creat Tickte</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous" />
    <style>
        .box1 {
            margin-left: 250px;
        }

        .form {
            margin-left: 250px;
        }
    </style>
</head>

<body>
    <?php include("leftbar.html"); ?>
    <div class="container-fluid bg-secondary pb-3">
        <div class="box1">
            <h2 class="text-info">Create Ticket</h2>
        </div>
        <div class="row col-md-8 form">
            <div class="card">
                <div class="card-body bg-secondary">
                    <form action="" method="POST">
                        <div class="mb-3">
                            <label for="text" class="form-label">Subject:</label>
                            <input type="text" class="form-control" name="subject" placeholder="Input your Subject" />
                        </div>
                        <div class="md-3">
                            <label for="text" class="form-label">Task Type:</label>
                            <select name="task" id="task" class="form-control">
                                <option> Select your Task Type</option>
                                <option value="Billing">Billing</option>
                                <option value="Migration">Migration</option>
                                <option value="Mailing">Mailing</option>
                                <option value="Stock Avialable">Stock Avialable</option>
                            </select>
                        </div><br>
                        <div class="md-3">
                            <label for="text" class="form-label">Priority:</label>
                            <select name="Priority" id="task" class="form-control">
                                <option>Choose your Priority</option>
                                <option value="Important">Important</option>
                                <option value="Urgent (Functional Problem)">Urgent (Functional Problem)</option>
                                <option value="Non-Urgent">Non-Urgent</option>
                                <option value="Question">Question</option>
                            </select>
                        </div><br>
                        <div class="mb-3">
                            <label for="text" class="form-label">Description:</label>
                            <!-- <textarea name="description" class="form-control" rows="4"></textarea> -->
                            <input type="textarea" class="form-control" name="descrive"
                                placeholder="Description here" />
                        </div><br>
                        <div class="mb-3 mt-3">
                            <button class="btn btn-primary" name="submit" value="submit">
                                Tickte Generate
                            </button>
                            <!-- <button type="clear" name="btn-clr" class="btn btn-primary">Clear Form</button> -->
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