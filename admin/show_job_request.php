<?php
include('../include/connection.php');
$query = "SELECT * FROM doctor WHERE status='Pending' ORDER BY date_reg ASC";
$res = mysqli_query($con, $query);
$output = "";
$output = "
<table class='table table-bordered'>
<tr>
<th>ID</th>
<th>Firstname</th>
<th>Lastname</th>
<th>username</th>
<th>Email</th>
<th>Gender</th>
<th>Phone</th>
<th>Specialization</th>
<th>Degree</th>
<th>Date Registration</th>
<th>Action</th>
</tr>
";

if (mysqli_num_rows($res) < 1) {
    $output = "
    <tr>
    <td colspan='10'>No Job Request Yet</td>
    </tr>
    ";
}

while ($row = mysqli_fetch_array($res)) {
    $output = "
    <tr>
    <td>" . $row['id'] . "</td>
    <td>" . $row['firstname'] . "</td>
    <td>" . $row['lastname'] . "</td>
    <td>" . $row['username'] . "</td>
    <td>" . $row['email'] . "</td>
    <td>" . $row['gender'] . "</td>
    <td>" . $row['phone'] . "</td>
    <td>" . $row['specialization'] . "</td>
    <td>" . $row['degree'] . "</td>
    <td>" . $row['date_reg'] . "</td>
    <td>
    <div class='col-md-12'>
    <div class='row'>
    <div class='col-md-6'>
    <button class='btn btn-success approve' id='".$row['id']."' onClick='approve()'>Approve</button>
    </div>
    <div class='col-md-6'>
    <button class='btn btn-danger reject' id='".$row['id']."'>Reject</button>
    </div>
    </div>
    </div>
    </td>
    ";
}
$output="</tr></table>";

?>
