<?php
// Create a database connection
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "gate_login"; //name of database
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
    $date = date("H:i:s");
    $time = date('Y/m/d');

//Perform database query
    $query  = "INSERT INTO checkout (";
    $query .= " name, date, time";
    $query .= ") VALUES (";
    $query .= "  '{$name}', '{$date}', '{$time}'";
    $query .= ")";

    $result = mysqli_query($connection, $query);

    if ($result) {
        // Success
        // redirect_to("login.php");
        echo "Checked out!";
        //header('Location:dashboard.php');
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
            <form action="checkout.php" method="post">
                <div class="form-group">
                    <label for="Name">Name:</label>
                    <input type="text" class="form-control" id="name" name="name" required placeholder="Enter your name">
                </div>

                <button class="btn btn-default" type="submit" name="submit">Check Out</button>
                <a style="color:white;font-style:bold; background-color:red;padding:2px;" href="dashboard.php" >View Page</a>
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

<!--
<html>
<head>
<title>check out</title>
</head>
<link rel="stylesheet" type="text/css" href="checkout.css"></link>
<body>
<div id="signin">
  <h1>Check Out</h1>
  
  <form action="checkout.php" method="post">
  <div class="error">
    Please enter the correct information!
  </div><p>
    Name <input type="text" name="name" value="" placeholder="your name"  size="30px"/><p>
	Time of exit<input type="time" name="exit_time" value=""  size="40px"/> Select Time<p>
	Date of your visit<input type="date" name="date" value=""  size="40px"/><p>
	
	<input type="submit" name="submit"  value="Check Out"/>
	<a style="color:white;font-style:bold;background-color:red;padding:2px;" href="dashboard.php">Cancel</a>
	
</div>
</body>
</html>

<!--
<html>
<head>
<title>check out</title>
</head>
<body background="2.jpg" text="red">
<center>
<table background="1.jpg"  height="300px">
	<th>CHECK IN </th>
<form action="checkout.php" method="post">
<tr>
	<td>
		Name <input type="text" name="name" value=""  size="40px"/>
	</td>
</tr>

<tr>
	<td>
		Time<input type="time" name="time" value=""  size="40px"/>	
	</td>
</tr>

<tr>
	<td>
		Date <input type="date" name="date" value=""  size="35px"/>
	</td>
</tr>
	
	<td>
		<input type="submit" name="submit"  value="Check out"/>
	</td>
</tr>
</form>
</table>
</body>
</html>
-->
