<?php
include 'dashboard.php';

//execute the SQL query and return records
$name=$_COOKIE['name'];
$id=$_GET['id'];
echo $id;
$name=$_POST['name'];

$address =$_POST['purpose'];

$result = mysqli_query($connection,"UPDATE user SET Name='$name',Purpose='$purpose', WHERE id= $id ");

if ($result) {
    $message = 'Successfully Updated !!';


    echo "$message";

}else {
    die("Database query failed. " . mysqli_error($connection));
}mysqli_close($connection);
?>
<?php
// echo $_COOKIE["user_id"];

?>


<?php
// 1. Create a database connection
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

if(isset($_POST['submit'])){

    //echo print_r($_POST);

    // Often these are form values in $_POST
    $name = $_POST['name'];
    $address = $_POST['purpose'];








    // 2. Perform database query
    $query  = "INSERT INTO user ";
    $query .= " (Name,purpose user_id)";
    $query .= " VALUES ('{$name}', '{$purpose}', {$_COOKIE["user_id"]} )";

    $result = mysqli_query($connection, $query);

    if ($result) {
        // Success
        // redirect_to("somepage.php");
        echo "<style=\"text-align: center; display: inline-block;paddding: 5px; background: white; \" >Successfully data updated!";
    } else {
        // Failure
        $message = "Subject creation failed";
        die("Database query failed. " . mysqli_error($connection));
    }
}


?>
<html>
<head>
<title>edit table</title>
</head>
<body>
<div id="signin">
  
  <form action="edit.php" method="post">
  <div class="error">
    Please enter the correct information!
  </div><p>
    Name <input type="text" name="name" value="" placeholder="your name"  size="35px"/><p>

	
	Purpose of visit <input type="text" name="purpose" value=""  placeholder="your purpose to visit" size="25px"/><p>
	
	<input type="submit" name="submit"  value="Edit"/>
	 <a style="color:white;font-style:bold;background-color:red;padding:2px;" href="dashboard.php">Cancel</a> 
</body>
</html>