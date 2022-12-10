<?php session_start(); ?>
<style>
	<?php include 'index.css'; ?>
</style>
<?php include('../include/connection.php'); ?>
<!DOCTYPE html>
<html>

<head>
	<title>Admin Dashboard</title>
	<!-- CSS only -->
	
	<script src="https://code.jquery.com/jquery-3.6.1.slim.js" integrity="sha256-tXm+sa1uzsbFnbXt8GJqsgi2Tw+m4BLGDof6eUPjbtk=" crossorigin="anonymous"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.2.0/css/fontawesome.min.css" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js"></script>
</head>

<body>
	<?php
	include('adminHeader.php')
	?>
	<div class="float-container" style="margin-top:50px;margin-left:-30px">

		<div class="float-child">
			<div class="green">
				<?php include('sidenav.php'); ?>
			</div>
		</div>

	</div>
	<div class="container-fluid" style="margin-top:70px">
		<div class="col-md-12">
			<div class="col-md-10">
				<h4 class="my-4 text-center">Admin Dashboard</h4>
				<div class="col-md-12 my-5 flex justify-content-end align-items-center">
					<div class="row my-5" style="margin-left:100px">
						<div class="col-md-3 bg-success mx-2 item">
							<div class="col-md-12">
								<div class="row">
									<div class="col-md-6 mt-2">
										<?php
										$ad = mysqli_query($con, "SELECT * FROM admin");
										$num = mysqli_num_rows($ad);
										?>
										<h5 class="my-2 text-white text-center" style="font-size:30px;margin-top:20px">
											<?php echo $num; ?>
										</h5>
										<h5 class="my-2 text-white text-center" style="font-size:30px">Total</h5>
										<h5 class="my-2 text-white text-center" style="font-size:30px">Admin</h5>
									</div>
									<div class="col-md-6">
										<a href="admin.php" style="cursor:pointer;text-decoration:none"><i class="fa fa-users-cog fa-3x my-4" style="color:black"></i></a>
									</div>

								</div>
							</div>
						</div>
						<div class="col-md-3 bg-info mx-2 item">
							<div class="col-md-12">
								<div class="row">
									<div class="col-md-6 mt-2">
									<?php
										$ad = mysqli_query($con, "SELECT * FROM doctor WHERE status = 'Approved'");
										$num = mysqli_num_rows($ad);
										?>
										<h5 class="my-2 text-white text-center" style="font-size:30px;margin-top:20px">
											<?php echo $num; ?>
										</h5>
										<h5 class="my-2 text-white text-center" style="font-size:30px">Total</h5>
										<h5 class="my-2 text-white text-center" style="font-size:30px">Doctors</h5>
									</div>
									<div class="col-md-6">
										<a href="/" style="cursor:pointer;text-decoration:none"><i class="fa fa-user-md fa-3x my-4" style="color:black"></i></a>
									</div>

								</div>
							</div>
						</div>
						<div class="col-md-3 bg-warning mx-2 item">
							<div class="col-md-12">
								<div class="row">
									<div class="col-md-6 mt-2">
										<h5 class="my-2 text-white text-center" style="font-size:30px;margin-top:20px">0</h5>
										<h5 class="my-2 text-white text-center" style="font-size:30px">Total</h5>
										<h5 class="my-2 text-white text-center" style="font-size:30px">Patients</h5>
									</div>
									<div class="col-md-6">
										<a href="/" style="cursor:pointer;text-decoration:none"><i class="fa fa-procedures fa-3x my-4" style="color:black"></i></a>
									</div>

								</div>
							</div>
						</div>
						<div class="col-md-3 bg-danger mx-2 my-2 item">
							<div class="col-md-12">
								<div class="row">
									<div class="col-md-6 mt-2">
										<h5 class="my-2 text-white text-center" style="font-size:30px;margin-top:20px">0</h5>
										<h5 class="my-2 text-white text-center" style="font-size:30px">Total</h5>
										<h5 class="my-2 text-white text-center" style="font-size:30px">Reports</h5>
									</div>
									<div class="col-md-6">
										<a href="/" style="cursor:pointer;text-decoration:none"><i class="fa fa-flag fa-3x my-4" style="color:black"></i></a>
									</div>

								</div>
							</div>
						</div>
						<div class="col-md-3 bg-info mx-2 my-2 item">
							<div class="col-md-12">
								<div class="row">
									<div class="col-md-6 mt-2">
									<?php
										$a = mysqli_query($con, "SELECT * FROM doctor WHERE status = 'Pending'");
										$b = mysqli_num_rows($a);
										?>
										<h5 class="my-2 text-white text-center" style="font-size:30px;margin-top:20px">
											<?php echo $b; ?>
										</h5>
										<h5 class="my-2 text-white text-center" style="font-size:30px">Total</h5>
										<h5 class="my-2 text-white text-center" style="font-size:30px">Job Request</h5>
									</div>
									<div class="col-md-6">
										<a href="job_request.php" style="cursor:pointer;text-decoration:none"><i class="fa fa-book-open fa-3x my-4" style="color:black"></i></a>
									</div>

								</div>
							</div>
						</div>
						<div class="col-md-3 bg-success mx-2 my-2 item">
							<div class="col-md-12">
								<div class="row">
									<div class="col-md-6 mt-2">
										<h5 class="my-2 text-white text-center" style="font-size:30px;margin-top:20px">0</h5>
										<h5 class="my-2 text-white text-center" style="font-size:30px">Total</h5>
										<h5 class="my-2 text-white text-center" style="font-size:30px">Income</h5>
									</div>
									<div class="col-md-6">
										<a href="/" style="cursor:pointer;text-decoration:none"><i class="fa fa-money-check-alt fa-3x my-4" style="color:black"></i></a>
									</div>

								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	</div>
	</div>
</body>

</html>