<?php
$connection = mysqli_connect("localhost", "root", "pratiksha", "hms");
//approve
if(isset($_POST['approve'])){
    $id=$_POST['id'];
    $query = "UPDATE doctor SET status='Approved' WHERE id='$id'";
    mysqli_query($connection, $query);
    header("Location:job_request.php");
}
//delete admin
if(isset($_POST['reject'])){
    $id=$_POST['id'];
    $query = "UPDATE doctor SET status='Rejected' WHERE id='$id'";
    mysqli_query($connection, $query);
    header("Location:job_request.php");
}
?>
