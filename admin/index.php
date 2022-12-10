<style>
    <?php include ('./index.css')?>
</style>
<?php include('../include/connection.php'); ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!----======== CSS ======== -->
    <link rel="stylesheet" href="index.css">
     
    <!----===== Iconscout CSS ===== -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
	<script src="https://code.jquery.com/jquery-3.6.1.slim.js" integrity="sha256-tXm+sa1uzsbFnbXt8GJqsgi2Tw+m4BLGDof6eUPjbtk=" crossorigin="anonymous"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <title>MedCare-Admin Dashboard</title> 
</head>
<body>
    <nav>
        <div class="logo-name">
            <div class="logo-image">
                <!-- <img src="images/logo.png" alt=""> -->
                <i class="fas fa-heartbeat"></i>
            </div>

            <span class="logo_name">MedCare</span>
        </div>

        <div class="menu-items">
            <ul class="nav-links">
                <li><a href="index.php">
                    <i class="uil uil-estate"></i>
                    <span class="link-name">Dashboard</span>
                </a></li>
                <li><a href="profile.php">
                    <i class="uil uil-cog" style="color:black"></i>
                    <span class="link-name">Profile</span>
                </a></li>
                <li><a href="admin.php">
                    <i class="uil uil-files-landscapes"></i>
                    <span class="link-name">Administrators</span>
                </a></li>
                <li><a href="doctor.php">
                    <i class="uil uil-files-landscapes"></i>
                    <span class="link-name">Doctors</span>
                </a></li>
                <li><a href="#">
                    <i class="uil uil-chart"></i>
                    <span class="link-name">Patients</span>
                </a></li>
            </ul>
            
            <ul class="logout-mode">
                <li><a href="logout.php">
                    <i class="uil uil-signout"></i>
                    <span class="link-name">Logout</span>
                </a></li>

               
            </li>
            </ul>
        </div>
    </nav>

    <section class="dashboard">
        <div class="top">
            <i class="uil uil-bars sidebar-toggle"></i>

            
        </div>

        <div class="dash-content">
            <div class="overview">
                <div class="title">
                    <i class="uil uil-tachometer-fast-alt"></i>
                    <span class="text">Dashboard</span>
                </div>

                <div class="boxes">
                    <div class="box box1">
                       <a href="admin.php"> <i class="fa fa-users-cog"></i></a>
                        <span class="text">Total Admins</span>
                        <?php
										$ad = mysqli_query($con, "SELECT * FROM admin");
										$num = mysqli_num_rows($ad);
										?>
                        <span class="number"><?php echo $num; ?></span>
                    </div>
                    <div class="box box2">
                        <a href="doctor.php"><i class="fa fa-user-md"></i></a>
                        <span class="text">Total Doctors</span>
                        <?php
										$ad = mysqli_query($con, "SELECT * FROM doctor WHERE status = 'Approved'");
										$num = mysqli_num_rows($ad);
										?>
                        <span class="number"><?php echo $num; ?></span>
                    </div>
                    <div class="box box3">
                       <a href="/"> <i class="fa fa-procedures"></i></a>
                        <span class="text">Total Patients</span>
                        <?php
										$ad = mysqli_query($con, "SELECT * FROM patient");
										$num = mysqli_num_rows($ad);
										?>
                        <span class="number"><?php echo $num; ?></span>
                    </div>
                    
                </div>
                <br/>
                <div class="boxes">
                    <div class="box box1">
                        <a href=""><i class="fa fa-flag"></i></a>
                        <span class="text">Total Reports</span>
                        <?php
										$ad = mysqli_query($con, "SELECT * FROM admin");
										$num = mysqli_num_rows($ad);
										?>
                        <span class="number"><?php echo $num; ?></span>
                    </div>
                    <div class="box box2">
                        <a href="job_request.php"><i class="fa fa-book-open"></i></a>
                        <span class="text">Total Job Requests</span>
                        <?php
										$a = mysqli_query($con, "SELECT * FROM doctor WHERE status = 'Pending'");
										$b = mysqli_num_rows($a);
										?>
                        <span class="number"><?php echo $num; ?></span>
                    </div>
                    <div class="box box3">
                        <a href=""><i class="fa fa-money-check-alt"></i></a>
                        <span class="text">Total Income</span>
                        <?php
										$ad = mysqli_query($con, "SELECT * FROM admin");
										$num = mysqli_num_rows($ad);
										?>
                        <span class="number"><?php echo $num; ?></span>
                    </div>
                    
                </div>
            </div>


        </div>
    </section>

    <script>
        const body = document.querySelector("body"),
      sidebar = body.querySelector("nav");
      sidebarToggle = body.querySelector(".sidebar-toggle");


let getStatus = localStorage.getItem("status");
if(getStatus && getStatus ==="close"){
    sidebar.classList.toggle("close");
}


sidebarToggle.addEventListener("click", () => {
    sidebar.classList.toggle("close");
    if(sidebar.classList.contains("close")){
        localStorage.setItem("status", "close");
    }else{
        localStorage.setItem("status", "open");
    }
})
    </script>
</body>
</html>