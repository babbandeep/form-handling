<!DOCTYPE>
<html>
    <head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script>

$(document).ready(function(){
    usershow = {
    showUser: function(str){
        if (str == ""){
        $("#txtHint").html("");
        return;
         } else { 
            $.ajax({
                url: 'getuser.php?q='+str,
            }).done(function(html){
                 $("#txtHint").html(html);
            });
         }
}
}
});

</script>
    </head>
	<body>

<form>
<select name="dropdown" onchange="usershow.showUser(this.value)">
<option value="id"> Sort List</option>
<option value="name">Name Ascending</option>
<option value="name DESC">Name Descending</option>
<option value="email">Email Ascending</option>
<option value="email DESC">Email Descending</option>
</select>
</form>
<div id="txtHint">
<?php


$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";

$con = mysqli_connect($dbhost, $dbuser, $dbpass);

if (!mysqli_select_db($con, 'my_db')){
    echo "error connecting";
}


$result = mysqli_query($con, "SELECT * FROM tableform")

or die(mysqli_error($con));


echo '<p><b>View All</b> | <a href="p2.php">View Paginated</a></p>';

echo "<table border='1' cellpadding='10'>";

echo '<tr> <th>ID</th> <th>Name</th> <th>Email</th> <th>Phone</th> <th>Message</th> 

</tr>';




while($row = mysqli_fetch_array($result)) {


echo "<tr>";

echo '<td>' . $row['id'] . '</td>';

echo '<td>' . $row['name'] . '</td>';

echo '<td>' . $row['email'] . '</td>';

echo '<td>' . $row['phone'] . '</td>';

echo '<td>' . $row['message'] . '</td>';

echo '<td><a href="edit.php?id=' . $row['id'] . '">Edit</a></td>';

echo '<td><a href="delete.php?id=' . $row['id'] . '">Delete</a></td>';

echo "</tr>";

}

echo "</table>";

?>
</div>

<p><a href="index.php">Main Menu</a></p>


</body>

</html>







