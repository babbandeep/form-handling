<?php 
  $dbhost = "localhost";
  $dbuser = "root";				
  $dbpass = "";
  
   $rec_limit = 5;
				$con = mysqli_connect($dbhost, $dbuser, $dbpass);

    if (!mysqli_select_db($con, 'my_db')){
				echo "error connecting";
				}
 mysqli_select_db($con,'my_db');

 /* Get total number of records */
 $sql = "SELECT count(id) FROM tableform ";
 $retval = mysqli_query( $con,$sql);

 if(! $retval ) {
    die('Could not get data: ' . mysqli_error($con));
 }
 $row = mysqli_fetch_array($retval, MYSQL_BOTH );
 $rec_count = $row[0];

 if( isset($_GET{'page'} ) ) {
    $page = $_GET{'page'} + 1;
    $offset = $rec_limit * $page ;
 }else {
    $page = 0;
    $offset = 0;
 }

 $left_rec = $rec_count - ($page * $rec_limit);
 $sql = "SELECT * FROM tableform LIMIT $offset, $rec_limit";

 $retval = mysqli_query( $con,$sql);

 if(! $retval ) {
    die('Could not get data: ' . mysql_error());
 }
 echo "<p><a href='view2.php'>View All</a> | <b>View Page:</b> ";


  echo "<table border='1'>";
  $i = 0;
  while($row = mysqli_fetch_array($retval, MYSQL_ASSOC)) {

   if ($i == 0) {
        $i++;
        echo "<tr>";
        foreach ($row as $key => $value) {
          echo "<th>" . $key . "</th>";
        }
        echo "</tr>";
        }
        echo "<tr>";
        foreach ($row as $value) {
        echo "<td>" . $value . "</td>";
       }
      echo "</tr>";

     }
    echo "</table>";
if( $page > 0 ) {
$last = $page - 2;
echo sprintf('<a href = "?page=%d">Last 5 Records</a> |', $last);
echo sprintf('<a href = "?page=%d">Next 5 Records</a>', $page);

}else if( $page == 0 ) {
$page = $page + 0;
echo sprintf('<a href = "?page=%d">Next 5 Records</a>', $page);

}else if( $left_rec < $rec_limit ) {

$last = $page - 2;
echo sprintf('<a href = "?page=%d">Last 5 Records</a> |', $last);

}

     mysqli_close($con);
	 
	 ?>
	 <p><a href="index.php">Main Menu</a></p>
