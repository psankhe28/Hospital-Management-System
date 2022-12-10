<style>
<?php include 'apply.css'; ?>
</style>
<?php
include("include/header.php");
?>
<?php
include("include/connection.php");
if(isset($_POST['apply'])){
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];
    $phone = $_POST['phone'];
    $fee = $_POST['fee'];
    $specialization = $_POST['specialization'];
    $degree = $_POST['degree'];
    $password = $_POST['password'];
    $confirmpassword = $_POST['con_pass'];

    $error =array();
    if(empty($firstname)){
        $error['apply']="Enter firstname";
    }
    elseif(empty($lastname)){
        $error['apply']="Enter lastname";
    }
    elseif(empty($username)){
        $error['apply']="Enter username";
    }
    elseif(empty($email)){
        $error['apply']="Enter email";
    }
    elseif(empty($phone)){
        $error['apply']="Enter phone number";
    }
    elseif($gender==""){
        $error['apply']="Enter gender";
    }
    elseif(empty($fee)){
        $error['apply']="Enter fee";
    }
    elseif(empty($specialization)){
        $error['apply']="Enter specialization";
    }
    elseif(empty($degree)){
        $error['apply']="Enter degree";
    }
    elseif(empty($password)){
        $error['apply']="Enter password";
    }
    elseif(empty($confirmpassword)){
        $error['apply']="Enter confirm password";
    }
    elseif($confirmpassword!=$password){
        $error['apply']="Both password and confirm password do not match.";
    }

    if(count($error)==0){
        $q="INSERT INTO `doctor` (firstname,lastname,username,email,gender,phone,fee,salary,specialization,degree,password,date_reg,status,profile) VALUES ('$firstname','$lastname','$username','$email','$gender','$phone','$fee','0','$specialization','$degree','$password',NOW(),'Pending','doctor.jpg')";
        $res=mysqli_query($con,$q);
        if($res){
            echo "<script>alert('You have successfully applied') </script>";
            header("Location:doctorlogin.php");
        }
        else{
            echo "<script>alert('Failed') </script>";
        }
    }
    
}
if(isset($error['apply'])){
    $s=$error['apply'];
    $show="<h5 class='text-center alert alert-danger'>$s</h5>";
}
else{
    $show="";
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>MedCare-Doctor Signup</title>
    </head>
    <body>
        <div class="container">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-6 jumbotron">
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ9MdsMhnxaf_hZ0Bef7ckp23mFpeEgsVVpVg&usqp=CAU" class="col-md-12">
                        <h5 class="text-center text-uppercase my-2">Apply now</h5>  
                        <div>
                            <?php echo $show;?>
                        </div>                     
                        <form method="post" class="my-2">
                            <div class="form-group">
                                <label>Firstname</label>
                                <input type="text" class="form-control" name="firstname" placeholder="Enter First name" autocomplete="off">
                            </div>
                            <div class="form-group">
                                <label>Lastname</label>
                                <input type="text" class="form-control" name="lastname" placeholder="Enter Last name" autocomplete="off">
                            </div>
                            <div class="form-group">
                                <label>Username</label>
                                <input type="text" class="form-control" name="username" placeholder="Enter Username" autocomplete="off">
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" class="form-control" name="email" placeholder="Enter email" autocomplete="off">
                            </div>
                            <br/>
                            <div class="form-group">
                                <label>Select Gender</label>
                                <select name="gender" class="form-control">
                                    <option value="">Select Gender</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                    <option value="Other">Other</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Phone</label</>
                                <input type="number" class="form-control" name="phone" placeholder="Enter phone no." autocomplete="off">
                            </div>
                            <div class="form-group">
                                <label>Consultation Fee</label>
                                <input type="number" class="form-control" name="fee" placeholder="Enter consultation fee" autocomplete="off">
                            </div>
                            <div class="form-group">
                                <label>Specialization</label>
                                <input type="text" class="form-control" name="specialization" placeholder="Enter your specialization" autocomplete="off">
                            </div>
                            <div class="form-group">
                                <label>Degree</label>
                                <input type="text" class="form-control" name="degree" placeholder="Enter your degree" autocomplete="off">
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" class="form-control" name="password" placeholder="Enter Password" autocomplete="off">
                            </div>
                            <div class="form-group">
                                <label>Confirm Password</label>
                                <input type="password" class="form-control" name="con_pass" placeholder="Enter Confirm Password" autocomplete="off">
                            </div>
                            <input type="submit" name="apply" class="btn btn-success" value="Apply Now">
                            <p>I already have an account <a href="doctorlogin.php">Apply Now!</a></p>
                        </form>
                    </div>
                </div>
    </body>

</html>