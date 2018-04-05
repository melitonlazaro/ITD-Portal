<?php 
include "config.inc.php";

$employee_id = $_POST['del_id'];
$query = "DELETE FROM employee WHERE employee_id='$employee_id' ";
$result = mysqli_query($conn, $query);
if(isset($result))
{
	echo "YES";
}
else
{
	echo "NO";
}
 ?>