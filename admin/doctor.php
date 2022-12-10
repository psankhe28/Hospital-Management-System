<?php session_start(); ?>

<style>
    <?php include('doctor.css') ?>
</style>
<?php include('../include/connection.php')?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="doctor.css">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>

    <div class="sideBar">
        <div class="logo-details">
            <i class='fas fa-heartbeat' style='color:white'></i>
            <div class="logo_name">MedCare</div>
            <i class='bx bx-menu' id="btn"></i>
        </div>
        <ul class="nav-list">
            <li>
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
    <section class="home-section">
        <div class="text">
            <div>

            <table class="fl-table">
                    <h5 style="text-align: center">All Doctors</h5>
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Firstname</th>
                        <th>Lastname</th>
                        <th>username</th>
                        <th>Email</th>
                        <th>Gender</th>
                        <!-- <th>Phone</th>
                                <th>Fee</th>
                                <th>Salary</th> -->
                        <th>Specialization</th>
                        <th>Degree</th>
                        <th>Date Registration</th>
                        <th style='width:10%'>Action</th>

                        <?php
                        $query = "SELECT * FROM doctor WHERE status = 'Approved' ORDER BY date_reg ASC";
                        $res = mysqli_query($con, $query);
                        $output = '';

                        if (mysqli_num_rows($res) < 1) {
                            $output = "<tr><td colspan='3' class='text-center'>No Doctors</td></tr>";
                        }
                        while ($row = mysqli_fetch_array($res)) {
                            echo "
                                    <tr>
                                    <td>" . $row['id'] . "</td>
                                    <td>" . $row['firstname'] . "</td>
                                    <td>" . $row['lastname'] . "</td>
                                    <td>" . $row['username'] . "</td>
                                    <td>" . $row['email'] . "</td>
                                    <td>" . $row['gender'] . "</td>
                                    
                                    <td>" . $row['specialization'] . "</td>
                                    <td>" . $row['degree'] . "</td>
                                    <td>" . $row['date_reg'] . "</td>
                                    <td>
                                    <a href='edit.php?id=" . $row['id'] . "'>
                                    <button name='edit' class='btn btn-delete'>Edit</button>
                                    </a>
                                    
                                    </td>
                                    </tr>
                                    ";
                        }

                        echo $output;
                        ?>
                </thead>

                </table>

            </div>
            <!-- <h5 style="text-align: center;margin-top:7%">Add Admin</h5> -->

            <div class="container-form">


    </div>


        </div>
        </div>
    </section>
    <script>
        let sideBar = document.querySelector(".sideBar");
        let closeBtn = document.querySelector("#btn");
        let searchBtn = document.querySelector(".bx-search");

        closeBtn.addEventListener("click", () => {
            sideBar.classList.toggle("open");
            menuBtnChange(); //calling the function(optional)
        });

        searchBtn.addEventListener("click", () => { // sideBar open when you click on the search iocn
            sideBar.classList.toggle("open");
            menuBtnChange(); //calling the function(optional)
        });

        // following are the code to change sideBar button(optional)
        function menuBtnChange() {
            if (sideBar.classList.contains("open")) {
                closeBtn.classList.replace("bx-menu", "bx-menu-alt-right"); //replacing the iocns class
            } else {
                closeBtn.classList.replace("bx-menu-alt-right", "bx-menu"); //replacing the iocns class
            }
        }
    </script>
</body>

</html>