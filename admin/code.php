<?php
$connection = mysqli_connect("localhost", "root", "pratiksha", "hms");
//add admin
if(isset($_POST['register'])){
    $username=$_POST['username'];
    $password=$_POST['password'];
    $email=$_POST['email'];
    $query = "INSERT INTO admin (username,email,password) VALUES ('$username', '$email','$password')";
    $query_run=mysqli_query($connection, $query);
    if($query_run){
        // echo '<script>alert("Data deleted");</script>';
        header("Location:admin.php");
    }
    else{
        echo '<script>alert("Data not deleted");</script>';
    }
}
//delete admin
if(isset($_POST['delete'])){
    $id=$_POST['id'];
    $query = "DELETE FROM admin WHERE id = '$id'";
    $query_run=mysqli_query($connection, $query);
    if($query_run){
        // echo '<script>alert("Data deleted");</script>';
        header("Location:admin.php");
    }
    else{
        echo '<script>alert("Data not deleted");</script>';
    }
}
?>
