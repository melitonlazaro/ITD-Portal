<html>


<h1> retrieve upload </h1>



<form action="bc.php?action=retriveuploads" method="POST">
	<h6> Ticket Id </h6>
	<input type="text" name="ticket_id" placeholder="Ticket ID">

	<input type="submit" value="Submit">
</form>


<?php


if(isset($request))
{
	foreach ($request as $r) {
		echo '<a href="user_data/'.$r['path'].'"> <img src="user_data/'.$r['path'].'" width="100px" height="100px"></a>';
		echo '<br>';
	}
}



?>
</html>