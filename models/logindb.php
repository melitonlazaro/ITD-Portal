<?php

	function login_person($username, $password){

		include"config.inc.php";
		$conn = mysqli_connect($host,$user,$pass,$db);

		if (mysqli_connect_errno($conn)){
			echo"Error connecting to MySQL Server";

		}

		//$id = (isset($_POST['id']) ? $_POST['id']: null);

		$sql= "SELECT ID, Username, Password from user where Username='$username'
		and password='$password'";
		$result = mysqli_query($conn,$sql);
		$user= array();
		if($myrow=mysqli_fetch_array($result)){
			do{
				$info= array();
				$info['ID']=$myrow['ID'];
				$info['Password']=$myrow['Password'];
				$user[]=$info;
				echo $user;
			}while($myrow=mysqli_fetch_array($result));
		}else{
			$user = "";
		}

		return $user;

	}


?>
