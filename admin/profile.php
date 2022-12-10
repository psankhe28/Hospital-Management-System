<?php session_start(); ?>

<style>
    <?php include('profile.css') ?>
</style>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
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
    <?php
    include('../include/connection.php');


    $ad = $_SESSION['admin'];
    $query = "SELECT * FROM admin where username='$ad'";
    $res = mysqli_query($con, $query);

    while ($row = mysqli_fetch_array($res)) {
        $username = $row['username'];
    }

    ?>
    
    <div class="container-fluid" style="margin-top:80px">
    <div class="sidebar">
                        <div class="logo-details">
                            <!-- <i class='fas fa-heartbeat' style='color:white'></i> -->
                            <div class="logo_name">MedCare</div>
                            <i class='bx bx-menu' id="btn"></i>
                        </div>
                        <ul class="nav-list">
                            <li style="padding-right:20px">
                                <a href="index.php">
                                    <i class='bx bx-grid-alt'></i>
                                    <span class="links_name">Dashboard</span>
                                </a>
                                <span class="tooltip">Dashboard</span>
                            </li>
                            <li>
                                <a href="profile.php">
                                    <i class='bx bx-cog'></i>
                                    <span class="links_name">Profile</span>
                                </a>
                                <span class="tooltip">Profile</span>
                            </li>

                            <li>
                                <a href="admin.php">
                                    <i class='bx bx-user'></i>
                                    <span class="links_name">Administrators</span>
                                </a>
                                <span class="tooltip">Administrators</span>
                            </li>

                            <li>
                                <a href="doctor.php">
                                    <i class='bx bx-chat'></i>
                                    <span class="links_name">Doctors</span>
                                </a>
                                <span class="tooltip">Doctors</span>
                            </li>

                            <li>
                                <a href="#">
                                    <i class='bx bx-pie-chart-alt-2'></i>
                                    <span class="links_name">Patients</span>
                                </a>
                                <span class="tooltip">Patients</span>
                            </li>

                            <li>
                                <a href="logout.php">
                                    <i class='bx bx-log-out'></i>
                                    <span class="links_name">Logout</span>
                                </a>
                                <span class="tooltip">Logout</span>
                            </li>
                        </ul>
                    </div>
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-2" style="margin-left:-30px;">
                 

                </div>
                <div class="col-md-10">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-6">
                                <h4><?php echo $username ?> Profile</h4>
                                <img style="height:250px;border-radius:50%" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRqOsDzpGRdZG_U0ZHZbYCRLFIXsAgfo2kCku1R4JeWr7o--GI6WRu9SZJTVlAH2c3luQ0&usqp=CAU" alt="">
                                <br />
                                <div class="form-group">
                                    <label>UPDATE PROFILE</label>
                                    <input type="file" name="profile" class="form-control" />
                                </div>
                                <br />
                                <input type="submit" name="update" value="UPDATE" class="btn btn-success">
                            </div>
                            <div class="col-md-6">
                                <?php
                                if (isset($_POST['change'])) {
                                    $username = $_POST['username'];
                                    if (empty($username)) {
                                    } else {
                                        $query = "UPDATE admin SET username='$username' WHERE username='$ad'";
                                        $res = mysqli_query($con, $query);
                                        if ($res) {
                                            $_SESSION['admin'] = $username;
                                        }
                                    }
                                }
                                ?>
                                <form method="post">
                                    <label>Change username</label>
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
                                    $old = mysqli_query($con, "SELECT * FROM admin WHERE username='$ad'");
                                    $row = mysqli_fetch_array($old);
                                    $pass = $row['password'];
                                    if ($res) {
                                        $_SESSION['admin'] = $username;
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
                                        $query = "UPDATE admin SET password='$new_pass' WHERE username='$ad'";
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
<script>
    let sidebar = document.querySelector(".sidebar");
    let closeBtn = document.querySelector("#btn");
    let searchBtn = document.querySelector(".bx-search");

    closeBtn.addEventListener("click", () => {
        sidebar.classList.toggle("open");
        menuBtnChange(); //calling the function(optional)
    });

    searchBtn.addEventListener("click", () => { // sidebar open when you click on the search iocn
        sidebar.classList.toggle("open");
        menuBtnChange(); //calling the function(optional)
    });

    // following are the code to change sidebar button(optional)
    function menuBtnChange() {
        if (sidebar.classList.contains("open")) {
            closeBtn.classList.replace("bx-menu", "bx-menu-alt-right"); //replacing the iocns class
        } else {
            closeBtn.classList.replace("bx-menu-alt-right", "bx-menu"); //replacing the iocns class
        }
    }
</script>

</html>