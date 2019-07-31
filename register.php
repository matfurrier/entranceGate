<?php
  // Create a database connection
  $dbhost = "localhost";
  $dbuser = "root";
  $dbpass = "";
  $dbname = "gate_login";
  $connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

// Test if connection succeeded
  if(mysqli_connect_errno()) {
    die("Database connection failed: " .
         mysqli_connect_error() .
         " (" . mysqli_connect_errno() . ")"
    );
  }
?>

<?php
// Often these are form values in $_POST

if(isset($_POST['submit'])){

    $name = $_POST['name'];
    $email =$_POST['email'];
    $password = $_POST['password'];
	$contact = $_POST['contact'];
	$address = $_POST['address'];
	$role= $_POST['role'];



//Perform database query
    $query  = "INSERT INTO user (";
    $query .= " name, email, password, contact, address, role";
    $query .= ") VALUES (";
    $query .= "  '{$name}', '{$email}', '{$password}', '{$contact}', '{$address}', '{$role}'";
    $query .= ")";

    $result = mysqli_query($connection, $query);

    if ($result) {
        // Success
        // redirect_to("login.php");
        echo "<h3>"."Successfully Registered !!!"."</h3>";
    } else {
        // Failure
        // $message = "user creation failed";
        die("Database query failed. " . mysqli_error($connection));
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<title>Gate Management System</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<style>
body {

	 background-color:snow;
	}
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
				<!--	<li><a href=""><span class="glyphicon glyphicon-flag"></span> List Visitors</a></li> -->


					<li class="active"><a href="register.php"><span class="glyphicon glyphicon-user"></span> Register</a></li>
					<li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>

				</ul>
			</div>
			<!-- /.navbar-collapse -->
		</div>
		<!-- /.container -->
	</nav>
	<div class="container">
<div class="col-md-4">
</div>
	<div class="col-md-4">
	<form method="post" action="register.php">

		<div class="form-group">
			<label for="email">Name:</label>
			<input type="text" class="form-control" id="name" name="name" required placeholder="Enter your name">
		</div>
		<div class="form-group">
			<label for="email">Email:</label>
			<input type="email" class="form-control" id="email" name="email"  required placeholder="email@example.com">
		</div>
		<div class="form-group">
			<label for="pwd">Password:</label>
			<input type="password" class="form-control" id="pwd" name="password"  required placeholder="Enter password">
		</div>
		<div class="form-group">
			<label for="contact">Contact Number:</label>
			<input type="number" class="form-control" id="contact" name="contact"  required placeholder="Enter contact">
		</div>
		<div class="form-group">
			<label for="contact">Address :</label>
			<input type="text" class="form-control" id="address" name="address"  required placeholder="Enter address">
		</div>

		<div class="form-group">
			<label for="select">Your Role:</label>
			<select name="role">
				<option>Student </option>
				<option>Faculty </option>
				<option>Staff </option>
				<option>Visitor </option>
			</select>
		</div>
			     <button type="submit" class="btn btn-default" name="submit" value="Register">Register</button>
              </div>
		</div>

	</form>
	</div>
	</div>

	<footer class="navbar-fixed-bottom">

		<!--	<div class="row">
            <div class="col-md-4">


                    <div class="container">
                    <div class="row">
                        <div class="col-lg-12">

                            <ul class="list-inline">
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
					<p class="copyright text-muted small" align="center"> Deerwalk institute of technology 2016</p>
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
