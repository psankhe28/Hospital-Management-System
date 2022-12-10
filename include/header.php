<style>
	<?php include 'header.css'; ?>
</style>
<!DOCTYPE html>
<html>

<head>
	<title>MedCare</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
	<script src="https://code.jquery.com/jquery-3.6.1.slim.js" integrity="sha256-tXm+sa1uzsbFnbXt8GJqsgi2Tw+m4BLGDof6eUPjbtk=" crossorigin="anonymous"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.2.0/css/fontawesome.min.css" /> -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
</head>

<body>
	<!-- <header>
		<nav>
			<input id="nav-toggle" type="checkbox">
			<div class="logo">Hospital&nbsp;<strong>Management&nbsp;</strong>System</div>

			<ul class="links">
				<?php
				if (isset($_SESSION['admin'])) {
					$user = $_SESSION['admin'];
					echo '
			<li><a href="#about">' . $user . '</a></li>
			<li><a href="logout.php">Logout</a></li>
			';
				} else if (isset($_SESSION['doctor'])) {
					$user = $_SESSION['doctor'];
					echo '
			<li><a href="#about">' . $user . '</a></li>
			<li><a href="logout.php">Logout</a></li>
			';
				} else {
					echo '
					<li><a href="index.php">Home</a></li>
		<li><a href="adminlogin.php">Admin</a></li>
		<li><a href="doctorlogin.php">Doctor</a></li>
		<li><a href="#work">Patient</a></li>
		';
				}

				?>
			</ul>
			<label for="nav-toggle" class="icon-burger">
				<div class="line"></div>
				<div class="line"></div>
				<div class="line"></div>
			</label>
		</nav>

	</header> -->
	<header class="header">

		<a href="/index.php" class="logo"> <i class="fas fa-heartbeat"></i> medcare </a>

		<nav class="navbar">
			<?php
			if (isset($_SESSION['admin'])) {
				$user = $_SESSION['admin'];
				echo '
				<a href="index.php">Home</a>
        <a href="#services">Services</a>
		<a href="#about">About</a>
			<a href="#about">' . $user . '</a>
			<a href="logout.php">Logout</a>
			';
			} else if (isset($_SESSION['doctor'])) {
				$user = $_SESSION['doctor'];
				echo '
				<a href="index.php">Home</a>
        <a href="#services">Services</a>
		<a href="#about">About</a>
			<a href="#about">' . $user . '</a>
			<a href="logout.php">Logout</a>
			';
			} else {
				echo '
		<a href="index.php">Home</a>
        <a href="#services">Services</a>
        <a href="#about">About</a>
        <a href="adminlogin.php">Admin</a>
		<a href="doctorlogin.php">Doctors</a>
        <a href="patientlogin.php">Patient</a>
		';
			}

			?>
		</nav>

		<div id="menu-btn" class="fas fa-bars"></div>

	</header>
</body>


</html>