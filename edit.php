<?php

function renderForm($id, $name, $email, $phone, $message, $error)

{

?>

<!DOCTYPE >

<html>

<head>

<title>Edit Record</title>

</head>

<body>

<?php



if ($error != '')

{

echo '<div style="padding:4px; border:1px solid red; color:red;">'.$error.'</div>';

}

?>



<form action="" method="post">

<input type="hidden" name="id" value="<?php echo $id; ?>"/>

<div>

<p><strong>ID:</strong> <?php echo $id; ?></p>

<strong> Name: *</strong> <input type="text" name="name" value="<?php echo $name; ?>"/><br/>

<strong>Email *</strong> <input type="text" name="email" value="<?php echo $email; ?>"/><br/>

<strong>Phone *</strong> <input type="varchar" name="phone" value="<?php echo $phone; ?>"/><br/>

<strong>Message *</strong> <input type="text" name="message" value="<?php echo $message; ?>"/><br/>

<p>* Required</p>

<input type="submit" name="submit" value="Submit">

</div>

</form>

</body>

</html>

<?php
}


$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";

$con = mysqli_connect($dbhost, $dbuser, $dbpass);

if (!mysqli_select_db($con, 'my_db')){
    echo "error connecting";
}



// check if the form has been submitted. If it has, process the form and save it to the database

if (isset($_POST['submit']))

{

// confirm that the 'id' value is a valid integer before getting the form data

if (is_numeric($_POST['id']))

{

// get form data, making sure it is valid

$id = $_POST['id'];

$name = $_POST['name'];

$email = $_POST['email'];

$phone = $_POST['phone'];

$message = $_POST['message'];



// check that firstname/lastname fields are both filled in

if ($name == '' || $email == '' || $phone == '' || $message == '')

{

// generate error message

$error = 'ERROR: Please fill in all required fields!';



//error, display form

renderForm($id, $name, $email, $phone, $message, $error);

}

else

{

// save the data to the database

mysqli_query($con, "UPDATE tableform SET name='$name', email='$email', phone='$phone', message='$message' WHERE id='$id'")

or die(mysqli_error($con));



// once saved, redirect back to the view page

header("Location: view2.php");

}

}

else

{

// if the 'id' isn't valid, display an error

echo 'Error!';

}

}

else

// if the form hasn't been submitted, get the data from the db and display the form

{



// get the 'id' value from the URL (if it exists), making sure that it is valid (checing that it is numeric/larger than 0)

if (isset($_GET['id']) && is_numeric($_GET['id']) && $_GET['id'] > 0)

{

// query db

$id = $_GET['id'];

$result = mysqli_query($con, "SELECT * FROM tableform WHERE id='$id'")

or die(mysqli_error($con));

$row = mysqli_fetch_array($result);



// check that the 'id' matches up with a row in the databse

if($row)

{



// get data from db

$name = $row['name'];

$email = $row['email'];

$phone = $row['phone'];

$message = $row['message'];

// show form
echo $name;
renderForm($id, $name, $email, $phone, $message, '');

}

else

// if no match, display result

{

echo "No results!";

}

}

else

// if the 'id' in the URL isn't valid, or if there is no 'id' value, display an error

{



echo "error";


}
}



?>
