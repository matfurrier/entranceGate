
<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<title>Gate Management System</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<style>
	
	</style>
</head>
<body>
<div class="container-fluid">
	<nav class="navbar navbar-default topnav" role="navigation">
		<div class="container">
			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand topnav" href="#"><strong>Deerwalk Entrance Management System</strong></a>
			</div>
			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav navbar-right">
					<li ><a href="home.php"><span class="glyphicon glyphicon-apple"></span> Home</a></li>
					<li class="active"><a href="dashboard.php"><span class="glyphicon glyphicon-flag"></span> Dashboard</a></li>
					<li><a href="register.php"><span class="glyphicon glyphicon-user"></span> Register</a></li>
					<li><a href="logout.php"><span class="glyphicon glyphicon-log-in"></span> logout</a></li>

				</ul>
			</div>
			<!-- /.navbar-collapse -->
		</div>
		<!-- /.container -->
	</nav>
	<!--<div class="container-fluid">
		<button><a href="checkin.php">CHECK IN</button></a> <br> <br>
		-->
		<?php
		$db = mysqli_connect("localhost", "root", "", "gate_login");

		$sql = "SELECT * from checkin";
		$result = mysqli_query($db, $sql);
		if (mysqli_num_rows($result) > 0) {
			// output data of each row
			date_default_timezone_set("Asia/Kathmandu");
			
			echo "<table border='1' class='table'>

                    <tr>
                        <th>Name</th>
                        <th>Time</th>
                        <th>Date of Visit</th>
                        <th>Purpose of Visit</th>
                        <th>Action</th>
                    </tr>";




			while($row = mysqli_fetch_assoc($result)) {
				echo "<tr>
                        <td>".$row["name"]."</td>
                        <td> ".date("H:i:s")." </td>
                        <td>".date('Y/m/d')."</td>
                         <td> ".$row['purpose']."</td>
                        <td>
						<button>
						     <a href=\"update.php?id={$row["id"]}\">Update
						 </button>
						<button>
						       <a href=\"delete.php?id={$row["id"]}\">Delete
						</button>
                        </tr>";
			}
			echo "</table>";
		} else {
			echo "0 results";
		}

		mysqli_close($db);
		?>
<div>
		<button><a href="checkin.php">Check In</button></a> <br> <br>
		<button><a href="checkout.php">Check Out </button></a> <br> <br>
		</div>
	</div>
	<footer class="navbar-fixed-bottom">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					 <!--<ul class="list-inline">
						<li>
							<a href="#">Home</a>
						</li>
						<li class="footer-menu-divider">&sdot;</li>
						<li>
							<a href="#about">About Us</a>
						</li>
						<li class="footer-menu-divider">&sdot;</li>
						<li>
							<a href="#services">Services </a>
						</li>
						<li class="footer-menu-divider">&sdot;</li>
						<li>
							<a href="#contact">Contact Us</a>
						</li>
					</ul>
					-->
					<p class="copyright text-muted small" align="center"> Deerwalk Institute of Technology 2016</p>
				</div>
			</div>
		</div>
	</footer>
</div>
<!-- jQuery -->
<script src="js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>

</body>

</html>
