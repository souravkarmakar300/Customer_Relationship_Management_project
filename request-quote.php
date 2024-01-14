<?php
session_start();
include("./api/dbconnect.php");

if ($_SESSION['id'] == '') {
    header("location:login.php");
}
if (isset($_POST["submit"])) {
    $company = $_POST["company"];
    if (!empty($company)) {
        $quote = "INSERT INTO `userquote`(`name`, `email`, `contact`, `company`, `wdd`, `seo`, `swd`, `nd`, `fwd`, `whs`, `ed`, `opi`, `dba`, `cms`, `smo`, `dwd`, `dr`, `wm`, `wta`, `ld`, `osc`, `other`, `quote`) values('{$_SESSION['name']}','{$_SESSION['email']}','{$_SESSION['phone']}','$company','" . $_POST['wdd'] . "','" . $_POST['seo'] . "','" . $_POST['swd'] . "','" . $_POST['nd'] . "','" . $_POST['fwd'] . "','" . $_POST['whs'] . "','" . $_POST['ed'] . "','" . $_POST['opi'] . "','" . $_POST['dba'] . "','" . $_POST['cms'] . "','" . $_POST['smo'] . "','" . $_POST['dwd'] . "','" . $_POST['dr'] . "','" . $_POST['wm'] . "','" . $_POST['wta'] . "','" . $_POST['ld'] . "','" . $_POST['osc'] . "','" . $_POST['other'] . "','" . $_POST['quote'] . "')";

        $xyz = mysqli_query($conn, $quote);

        echo "<script>alert('Your Quote Send')</script>";
        echo "<script>window.location.href='request-quote.php'</script>";
    } else {
        echo "<script>alert('Not Send')</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User-Request-Quote</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous" />
    <style>
        .box1 {
            margin-left: 250px;
        }
        .box2 {
            display: flex;
            justify-content: space-between;
        }
        .form {
            margin-left: 250px;
        }
        .box3 {
            display: flex;
            justify-content: space-around;
        }
        .box4 {
            width: 400px;
        }
        .box5 {
            margin: auto;
            width: 800px;
            display: flex;
            justify-content: space-between;
            padding-top: 30px;
        }
        .box6 {
            margin-left: 120px;
        }
        .box7 {
            display: flex;
            justify-content: end;
        }
        .notedit {
            cursor: not-allowed;
            width: 200px;
        }
        .ws{
            width: 200px;
        }
    </style>
</head>

<body>
    <?php include("leftbar.html"); ?>
    <div class="container-fluid bg-secondary pb-3">
        <div class="box1">
            <h2 class="text-info">Request a Quote</h2>
            <p class="text-white">Please click below mention services of your interest to receive quotation for the
                same:</p>
        </div>
        <div class="row col-md-8 form">
            <div class="card">
                <div class="card-body bg-secondary">
                    <form action="" method="POST">
                        <div class="box3">
                            <div class="mb-3">
                                <label for="name" class="from-label">Name:&nbsp;&nbsp;</label>
                                <input type="text" class="from-control notedit" name="name"
                                    value="<?php echo $_SESSION['name'] ?>">
                            </div>
                            <div class="mb-3">
                                <label for="name" class="from-label">Email ID:</label>
                                <input type="email" class="from-control notedit"  name="email"
                                    value="<?php echo $_SESSION['email'] ?>">
                            </div>
                        </div><br />
                        <div class="box3">
                            <div class="mb-3">
                                <label for="name" class="from-label">Contact:</label>
                                <input type="tell" class="from-control notedit" name="contact"
                                    value="<?php echo $_SESSION['phone'] ?>">
                            </div>
                            <div class="mb-3">
                                <label for="name" class="from-label">Company:&nbsp;</label>
                                <input type="text" class="from-control wd" name="company">
                            </div>
                        </div>
                        <div class="box5">
                            <div class="box4">
                                <label for="name" class="from-label">Service Required:</label><br><br>
                                <div>
                                    <input value="Website Design & Development" type="checkbox" name="wdd">
                                    <label for="name"> Website Design &
                                        Development</label><br>
                                    <input value="SEO (Search Engine Optimization)" type="checkbox" name="seo">
                                    <label for="name"> SEO (Search Engine
                                        Optimization)</label><br>
                                    <input value="Static Website Design" type="checkbox" name="swd">
                                    <label for="name"> Static Website Design</label><br>
                                    <input value="NewsLetter Design" type="checkbox" name="nd">
                                    <label for="name"> NewsLetter Design</label><br>
                                    <input value="Flash Website Development" type="checkbox" name="fwd">
                                    <label for="name"> Flash Website
                                        Development</label><br>
                                    <input value="Web Hosting Services" type="checkbox" name="whs">
                                    <label for="name"> Web Hosting Services</label><br>
                                    <input value="Ecommerce Development" type="checkbox" name="ed">
                                    <label for="name"> Ecommerce Development</label><br>
                                    <input value="Online Payment Integration" type="checkbox" name="opi">
                                    <label for="name"> Online Payment
                                        Integration</label><br>
                                    <input value="Dash board Application" type="checkbox" name="dba">
                                    <label for="name"> Dash board Application</label><br>
                                </div>
                            </div>
                            <div class="box4 pt-5">
                                <div>
                                    <input value="CMS (Content Management System)" type="checkbox" name="cms">
                                    <label for="name"> CMS (Content Management
                                        System)</label><br>
                                    <input value="SMO (Social Media Optimization)" type="checkbox" name="smo">
                                    <label for="name"> SMO (Social Media
                                        Optimization)</label><br>
                                    <input value="Dynamic Website Design" type="checkbox" name="dwd">
                                    <label for="name"> Dynamic Website Design</label><br>
                                    <input value="Domain Registration" type="checkbox" name="dr">
                                    <label for="name"> Domain Registration</label><br>
                                    <input value="Website Maintenance" type="checkbox" name="wm">
                                    <label for="name"> Website Maintenance</label><br>
                                    <input value="Walk Through Animation" type="checkbox" name="wta">
                                    <label for="name"> Walk Through Animation</label><br>
                                    <input value="Logo Design" type="checkbox" name="ld">
                                    <label for="name"> Logo Design</label><br>
                                    <input value="Open Source Customization" type="checkbox" name="osc">
                                    <label for="name"> Open Source
                                        Customization</label><br>
                                    <input value="Others" type="checkbox" name="other">
                                    <label for="name"> Others</label><br>
                                </div>
                            </div>
                        </div>
                        <div class="mb-2 pt-4 box6">
                            <label for="name" class="from-label">Quote:</label>
                            <input type="textarea" class="from-control" name="quote">
                        </div>
                        <div class="mb-3 mt-3 box7">
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