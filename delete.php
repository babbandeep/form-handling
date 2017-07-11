<?php



$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";

$con = mysqli_connect($dbhost, $dbuser, $dbpass);

if (!mysqli_select_db($con, 'my_db')){
    echo "error connecting";
}



// check if the 'id' variable is set in URL, and check that it is valid

if (isset($_GET['id']) && is_numeric($_GET['id']))

{

// get id value

$id = $_GET['id'];



// delete the entry

$result = mysqli_query($con, "DELETE FROM tableform WHERE id=$id")

or die(mysql_error($con));



// redirect back to the view page

header("Location: view2.php");

}

else

// if id isn't set, or isn't valid, redirect back to view page

{

header("Location: view2.php");

}



?>
