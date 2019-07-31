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
//  header('Location:login.php');
?>
<?php
// Often these are form values in $_POST

if(isset($_POST['submit'])){


    $email =$_POST['email'];
    $password = $_POST['password'];
	
	

//Perform database query
    $query  = "select * from user where email='{$email}' AND password='{$password}' ";
    
    $result = mysqli_query($connection, $query);

    if (mysqli_num_rows($result)>0) {
	echo "User authorized!";
	header("Location: dashboard.php");
    } 
	else {
		echo "User not found!";
        die("Database query failed. " . mysqli_error($connection));
    }
}
?>
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
                    <li><a href="rules.php"><span class="glyphicon glyphicon-flag"></span> Rules</a></li>
                    <li><a href="register.php"><span class="glyphicon glyphicon-user"></span> Register</a></li>
                    <li class="active"><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>

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
    <form action="login.php" method="post">
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="text" class="form-control" id="email" name="email" required placeholder="Enter email">
        </div>
        <div class="form-group">
            <label for="email">Password:</label>
            <input type="password" class="form-control" id="password" name="password" required placeholder="Enter password">
        </div>
        <button class="btn btn-default" type="submit" name="submit">Login</button>
    </form>
	</div>
	</div>

    <footer class="navbar-fixed-bottom">
        <!--
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

