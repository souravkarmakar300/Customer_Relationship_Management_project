<?php
session_start();
include('../api/dbconnect.php');
if ($_SESSION['id'] == '') {
    header("location:adminlogin.php");
}

$query        = mysqli_query($conn, "SELECT * FROM `users` where status in(1)");
$row          = mysqli_fetch_array($query);
$i            = 1;
$columnHeader = '';
$tablerow = '';

while ($row = mysqli_fetch_assoc($query)) {
    $tablerow .= "
<tr>
<td>" . $i++ . "</td>
<td>" . ucwords($row['name']) . "</td>
<td>" . $row['email'] . "</td>
<td>" . $row['contact'] . "</td>
<td>" . $row['address'] . "</td>
<td>" . $row['gender'] . "</td>
<td>" . $row['created_at'] . "</td>
</tr>
";
}
$data = "<table border='1'>
<tr>
<th>ID</th>
<th>Name</th>
<th>Email</th>
<th>Contact</th>
<th>Address</th>
<th>Gender</th>
<th>Created At</th>
</tr>" . $tablerow . "
</table>";

header('content-type: application/xls');
header('Content-Disposition: attachment; filename="test.xls"');

echo $data;
exit();

?>