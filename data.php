<?php


$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";

$con = mysqli_connect($dbhost, $dbuser, $dbpass);
// If we couldn't, then it either doesn't exist, or we can't see it.
if (!mysqli_select_db($con, 'my_db')){
    $sql = "CREATE DATABASE IF NOT EXISTS my_db";
     if (!mysqli_query($con, $sql)) {
      echo "Error creating database: " . mysqli_error($con);
    } 
}

  $name = $email = $phone = $message = "";
  
   if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $name = $_POST["name"];
	$email = $_POST["email"];
	$phone = $_POST["phone"];
	$message = $_POST["message"];
}

$sql = "CREATE TABLE IF NOT EXISTS my_db.tableform (
        `id` int(5) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        `name` varchar(100) NOT NULL,
        `email` varchar(255) NOT NULL,
        `phone` varchar(12) NOT NULL,
        `message` varchar(255) NOT NULL
        )";
		
if (!mysqli_query($con, $sql)) {
    echo "Error creating table: " . mysqli_error($con);
}

	$sql= "INSERT INTO tableform(name,email,phone,message) VALUES ('$name','$email','$phone','$message')";
	
	$db_selected = mysqli_select_db($con, 'my_db');
		if (!$db_selected) {
		die ('Database selection error : ' . mysqli_error($con));
	}
	$retval = mysqli_query($con, $sql);
	if(! $retval ){
		die('Could not enter data: ' . mysqli_error($con));
    } else {
		header('location: index.php');
	}
	
	
	
	
?>
