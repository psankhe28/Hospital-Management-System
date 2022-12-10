<?php session_start(); ?>
<!DOCTYPE html>
<html>

<head>
    <title>MedCare-Doctor's Profile</title>
    <link rel="stylesheet" href="index.css">
    <meta charset="UTF-8">
    <link rel="stylesheet" href="profile.css">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.1.slim.js" integrity="sha256-tXm+sa1uzsbFnbXt8GJqsgi2Tw+m4BLGDof6eUPjbtk=" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.2.0/css/fontawesome.min.css" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js"></script>
</head>

<body>
    <!-- Banner -->


    <!-- Dashboard -->
    <div class="d-flex flex-column flex-lg-row h-lg-full bg-surface-secondary">
        <!-- Vertical Navbar -->

        <!-- Main content -->
        <div class="h-screen flex-grow-1 overflow-y-lg-auto">
            <!-- Main -->
            <main class="bg-surface-secondary">
                <div class="container-fluid">
                    <!-- Card stats -->


                    <?php
                    include('../include/connection.php');

                    $ad = $_SESSION['doctor'];
                    $query = "SELECT * FROM doctor where username='$ad'";
                    $res = mysqli_query($con, $query);

                    while ($row = mysqli_fetch_array($res)) {
                        $username = $row['username'];
                    }

                    ?>
                    <div class="container-fluid">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-2" style="margin-left:-30px;">
                                    <nav class="navbar show navbar-vertical h-lg-screen navbar-expand-lg px-0 py-3 navbar-light bg-white border-bottom border-bottom-lg-0 border-end-lg" id="navbarVertical">
                                        <div class="container-fluid">
                                            <!-- Toggler -->
                                            <button class="navbar-toggler ms-n2" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarCollapse" aria-controls="sidebarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                                                <span class="navbar-toggler-icon"></span>
                                            </button>
                                            <!-- Brand -->
                                            <a class="navbar-brand py-lg-2 mb-lg-5 px-lg-6 me-0" href="#">
                                                <!-- <img src="https://preview.webpixels.io/web/img/logos/clever-primary.svg" alt="..."> -->
                                                Doctor's Dashboard
                                            </a>
                                            <!-- User menu (mobile) -->
                                            <div class="navbar-user d-lg-none">
                                                <!-- Dropdown -->
                                                <div class="dropdown">
                                                    <!-- Toggle -->
                                                    <!-- Menu -->
                                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="sidebarAvatar">
                                                        <a href="#" class="dropdown-item">Profile</a>
                                                        <a href="#" class="dropdown-item">Settings</a>
                                                        <a href="#" class="dropdown-item">Billing</a>
                                                        <hr class="dropdown-divider">
                                                        <a href="#" class="dropdown-item">Logout</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Collapse -->
                                            <div class="collapse navbar-collapse" id="sidebarCollapse">
                                                <!-- Navigation -->
                                                <ul class="navbar-nav">
                                                    <li class="nav-item">
                                                        <a class="nav-link" href="index.php">
                                                            <i class="bi bi-house"></i> Dashboard
                                                        </a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link" href="#">
                                                            <i class="bi bi-person-square"></i> Profile
                                                        </a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link" href="#">
                                                            <i class="bi bi-people"></i> Patients
                                                            <span class="badge bg-soft-primary text-primary rounded-pill d-inline-flex align-items-center ms-auto">6</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                                <!-- Divider -->
                                                <hr class="navbar-divider my-5 opacity-20">
                                                <!-- Navigation -->

                                                <!-- Push content down -->
                                                <div class="mt-auto"></div>
                                                <!-- User (md) -->
                                                <ul class="navbar-nav">
                                                    <li class="nav-item">
                                                        <a class="nav-link" href="logout.php">
                                                            <i class="bi bi-box-arrow-left"></i> Logout
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </nav>
                                </div>
                                <div class="col-md-10" style="margin-top:80px;margin-left:20px">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <h4><?php echo $username ?> Profile</h4>
                                                <img style="height:250px;border-radius:50%" src="https://img.freepik.com/premium-vector/doctor-profile-with-medical-service-icon_617655-48.jpg?w=2000" alt="">
                                                <br />
                                                <div class="form-group">
                                                    <label>UPDATE PROFILE</label>
                                                    <input type="file" name="profile" class="form-control" />
                                                </div>
                                                <br />
                                                <input type="submit" name="update" value="UPDATE" class="btn btn-success">
                                                <div class="my-3 mr-4">
                                                    <table class="table table-bordered table-sm">
                                                        <?php
                                                        include('../include/connection.php');

                                                        $ad = $_SESSION['doctor'];
                                                        $query = "SELECT * FROM doctor where username='$ad'";
                                                        $res = mysqli_query($con, $query);

                                                        while ($row = mysqli_fetch_array($res)) {
                                                            $username = $row['username'];
                                                            $firstname=$row['firstname'];
                                                            $lastname=$row['lastname'];
                                                            $email=$row['email'];
                                                            $gender=$row['gender'];
                                                            $phone=$row['phone'];
                                                            $fee=$row['fee'];
                                                            $salary=$row['salary'];
                                                            $specialization=$row['specialization'];
                                                            $degree=$row['degree'];
                                                            $status=$row['status'];
                                                        }

                                                        ?>
                                                        <tr>
                                                            <th colspan="2" class="text-center">Details</th>
                                                        </tr>
                                                        <tr>
                                                            <td>FirstName</td>
                                                            <td><?php echo $firstname?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>LastName</td>
                                                            <td><?php echo $lastname?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Username</td>
                                                            <td><?php echo $username?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Email</td>
                                                            <td><?php echo $email ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Gender</td>
                                                            <td><?php echo $gender ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Phone</td>
                                                            <td><?php echo $phone ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Fee</td>
                                                            <td><?php echo $fee?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Salary</td>
                                                            <td><?php echo $salary?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Specialization</td>
                                                            <td><?php echo $specialization?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Degree</td>
                                                            <td><?php echo $degree?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Status</td>
                                                            <td><?php echo $status?></td>
                                                        </tr>

                                                    </table>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <?php
                                                if (isset($_POST['change'])) {
                                                    $username = $_POST['username'];
                                                    if (empty($username)) {
                                                    } else {
                                                        $query = "UPDATE doctor SET username='$username' WHERE username='$ad'";
                                                        $res = mysqli_query($con, $query);
                                                        if ($res) {
                                                            $_SESSION['doctor'] = $username;
                                                        }
                                                    }
                                                }
                                                ?>
                                                <form method="post">
                                                    <label>Change Username</label>
                                                    <input type="text" name="username" class="form-control" autocomplete="off">
                                                    <br />
                                                    <input type="submit" name="change" class="btn btn-success">
                                                </form>
                                                <br />
                                                <?php
                                                if (isset($_POST['update_pass'])) {
                                                    $old_pass = $_POST['old_pass'];
                                                    $new_pass = $_POST['new_pass'];
                                                    $con_pass = $_POST['con_pass'];
                                                    $error = array();
                                                    $old = mysqli_query($con, "SELECT * FROM doctor WHERE username='$ad'");
                                                    $row = mysqli_fetch_array($old);
                                                    $pass = $row['password'];
                                                    if ($res) {
                                                        $_SESSION['doctor'] = $username;
                                                    }

                                                    if (empty($old_pass)) {
                                                        $error['p'] = "Enter old password";
                                                    } else if (empty($new_pass)) {
                                                        $error['p'] = "Enter new password";
                                                    } else if (empty($con_pass)) {
                                                        $error['p'] = "Enter confirm password";
                                                    } else if ($old_pass != $pass) {
                                                        $error['p'] = "Invalid old password";
                                                    } else if ($new_pass != $con_pass) {
                                                        $error['p'] = "Both password does not match";
                                                    }
                                                    if (count($error) == 0) {
                                                        $query = "UPDATE doctor SET password='$new_pass' WHERE username='$ad'";
                                                        mysqli_query($con, $query);
                                                    }
                                                }
                                                if (isset($error['p'])) {
                                                    $e = $error['p'];
                                                    $show = "<h5 class='text-center alert alert-danger'>$e</h5>";
                                                } else {
                                                    $show = "";
                                                }
                                                ?>
                                                <form method="post">
                                                    <h5 class="text-center my-4">Change Password</h5>
                                                    <div>
                                                        <?php echo $show ?>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Old Password</label>
                                                        <input type="password" name="old_pass" class="form-control" autocomplete="off">
                                                    </div>
                                                    <br />
                                                    <div class="form-group">
                                                        <label>New Password</label>
                                                        <input type="password" name="new_pass" class="form-control" autocomplete="off">
                                                    </div>
                                                    <br />
                                                    <div class="form-group">
                                                        <label>Confirm Password</label>
                                                        <input type="password" name="con_pass" class="form-control" autocomplete="off">
                                                    </div>
                                                    <br />
                                                    <input type="submit" name="update_pass" class="btn btn-info" value="Update Password">
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
</body>

</html>
</div>
</main>
</div>
</div>
</body>

</html>