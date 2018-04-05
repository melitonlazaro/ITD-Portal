<?php

	$host = "localhost";
	$user = "root";
	$pass = "";
	$ojt = "ojt";

		$conn = mysqli_connect($host, $user, $pass, $ojt);

	if(mysqli_errno($conn))
	{
		echo "Error connecting to MySQL Server";
	}


?>
