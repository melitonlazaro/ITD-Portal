<?php 
include "config.inc.php";

$announcement_id = $_POST['del_id'];
$query = "DELETE FROM announcement WHERE announcement_id='$announcement_id' ";
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