<?php 
include "config.inc.php";

$ticket_id = $_POST['del_id'];
$query = "DELETE FROM tickets WHERE ticket_id='$ticket_id' ";
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