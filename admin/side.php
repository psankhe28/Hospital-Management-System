<style>
    <?php include('side.css') ?>
</style>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="side.css">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>

    <div class="sidebar">
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
                <span class="tooltip">Patients</span>
            </li>
            

        </ul>
    </div>
    <section class="home-section">
        <div class="text">
            <div>

                <table class="fl-table">
                    <h5 style="text-align: center">All Admins</h5>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Action</th>
                            <?php
                            $ad = $_SESSION['admin'];
                            $query = "SELECT * FROM admin where username!='$ad'";
                            $res = mysqli_query($con, $query);
                            $output = '';

                            if (mysqli_num_rows($res) < 1) {
                                $output = "<tr><td colspan='3' class='text-center'>No New Admin</td></tr>";
                            }
                            while ($row = mysqli_fetch_array($res)) {
                                $id = $row['id'];
                                $username = $row['username'];
                                $email = $row['email'];
                                echo "
                                    <tr>
                                    <td>$id</td>
                                    <td>$username</td>
                                    <td>$email</td>
                                    <td>
                                    <form action='code.php' method='post'>
                                    <input type='hidden' name='id' value='$id'>
                                    <button type='submit' name='delete' class='btn btn-delete'>Delete</button>
                                    </form>
                                    
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

                <div class="card">
                    <div class="card_title">
                        <h1>Add Another Admin</h1>
                    </div>
                    <div>
                        <?php
                        if (isset($error['u'])) {
                            $sh = $error['u'];
                            $show = "<h4 class='alert alert-danger'>$sh</h4>";
                        } else {
                            $show = "";
                        }
                        echo $show;
                        ?>
                    </div>
                    <div class="form">
                        <form action="code.php" method="post">
                            <input type="text" name="username" id="username" placeholder="UserName" />
                            <input type="email" name="email" placeholder="Email" id="email" />
                            <input type="password" name="password" placeholder="Password" id="password" />
                            <button type="submit" class="btn btn-success" name="register">Submit</button>
                        </form>
                    </div>
                </div>
            </div>


        </div>
        </div>
    </section>
    <script>
        let sidebar = document.querySelector(".sidebar");
        let closeBtn = document.querySelector("#btn");
        let searchBtn = document.querySelector(".bx-search");

        closeBtn.addEventListener("click", () => {
            sidebar.classList.toggle("open");
            menuBtnChange(); //calling the function(optional)
        });

        searchBtn.addEventListener("click", () => { // Sidebar open when you click on the search iocn
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
</body>

</html>