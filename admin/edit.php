<?php session_start() ?>
<?php include('../include/connection.php'); ?>
<!DOCTYPE html>
<html>

<head>
    <title>Edit Doctor</title>
</head>

<body>
    <?php include('../include/header.php') ?>
    <div class="container-fluid" style="margin-top:80px">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-2">
                    <!--sidebar-->
                </div>
                <div class="col-md-10">
                    <h5 class="text-center">Edit Doctor Details</h5>
                    <?php
                    if(isset($_GET['id'])){
                        $id = $_GET['id'];
                        $query = "SELECT * FROM doctor WHERE id = '$id'";
                        $res=mysqli_query($con,$query);
                        $row=mysqli_fetch_array($res);
                    }
                    ?>
                    <div class="row">
                        <div class="col-md-6">
                            <h5 class="text-center">Doctor Details</h5>
                            <h5 class="my-3">ID: <?php echo $row['id']; ?></h5>
                            <h5 class="my-3">First Name: <?php echo $row['firstname']; ?></h5>
                            <h5 class="my-3">Last Name: <?php echo $row['lastname']; ?></h5>
                            <h5 class="my-3">username: <?php echo $row['username']; ?></h5>
                            <h5 class="my-3">Email: <?php echo $row['email']; ?></h5>
                            <h5 class="my-3">Phone: <?php echo $row['phone']; ?></h5>
                            <h5 class="my-3">Gender: <?php echo $row['gender'];?></h5>
                            <h5 class="my-3">Fee: Rs. <?php echo $row['fee'];?></h5>
                            <h5 class="my-3">Specialization: <?php echo $row['specialization'];?></h5>
                            <h5 class="my-3">Degree: <?php echo $row['degree'];?></h5>
                            <h5 class="my-3">Salary: <?php echo $row['salary'];?></h5>
                        </div>
                        <div class="col-md-4">
                            <h5 class="text-center">Update Salary</h5>
                            <?php
                            if(isset($_POST['update'])){
                                $salary = $_POST['sal'];
                                $q="UPDATE doctor SET salary=$salary WHERE id='$id'";
                                mysqli_query($con,$q);

                            }
                            ?>
                            <form method="post">
                                <label>Enter Doctor's Salary</label>
                                <input type="number" class="form-control" name="sal" autocomplete="off" value="<?php echo $row['salary']?>" placeholder="Enter Doctor's Salary" />
                                <input type="submit" name="update" value="Update Salary" class="btn btn-primary my-3"/>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>