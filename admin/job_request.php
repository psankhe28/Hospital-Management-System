<?php session_start() ?>
<?php include('../include/connection.php'); ?>
<!DOCTYPE html>
<html>

<head>
    <title>MedCare-Job Request</title>
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
    <?php include('../include/header.php');
    ?>
    <div class="container-fluid" style="margin-top:80px;">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-2">
                    <!-- sidebar -->
                </div>
                <div class="col-md-10">
                    <h5 class="text-center">Job Request</h5>
                    <div id="show">
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
                            <tr>
                                <?php
                                $query = "SELECT * FROM doctor WHERE status='Pending' ORDER BY date_reg ASC";
                                $res = mysqli_query($con, $query);
                                $output = "";

                                if (mysqli_num_rows($res) < 1) {
                                    $output = "
    <td colspan='10' class='text-center'>No Job Request Yet</td>
    ";
                                }

                                while ($row = mysqli_fetch_array($res)) {
                                    $output = "
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
    <form method='POST' action='req.php'>
    <div class='col-md-6'>
    <input type='hidden' name='id' value='".$row['id']."'>
    <button type='submit' name='approve' class='btn btn-success'>Approve</button>
    </div>
    <div class='col-md-6'>
    <input type='hidden' name='id' value='".$row['id']."'>
    <button type='submit' name='reject' class='btn btn-danger'>Reject</button>
    </div>
</form>
    
    </div>
    </div>
    ";
                                }
                                echo $output;
                                ?>
                            </tr>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>