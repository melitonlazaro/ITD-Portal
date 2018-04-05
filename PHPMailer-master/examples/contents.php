<?php 
	$conn = mysqli_connect("localhost", "root", "", "ojt");

	$query = "SELECT * FROM announcement ORDER BY announcement_id DESC LIMIT 1";
	$result = mysqli_query($conn, $query);

	$record = array();
	if( $myrow=mysqli_fetch_array($result) ){
		do{
			$info = array();
			$info['announcement_id'] = $myrow['announcement_id'];
			$info['author'] = $myrow['author'];
			$info['date_published'] = $myrow['date_published'];
			$info['time_published'] = $myrow['time_published'];
			$info['title'] = $myrow['title'];
			$info['lead'] = $myrow['lead'];
			$record[] = $info;
		}while($myrow=mysqli_fetch_array($result));
	}
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="keywords" content="footer, basic, centered, links" />
		<script src="js/jscookmenu.min.js"></script>
		<script src="js/jquery-1.12.4.min.js"></script>
		<script src="js/bootstrap.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
   		<link href="css/bootstrap.min.css" rel="stylesheet">
   		<script src="js/bootstrap.min.js"></script>
  <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
  <title>New Announcement from IT-Department</title>
</head>
<body>
<div>
  <h1>New Announcement from IT-Department</h1>
  <div align="center">
  	<h4>Title:</h4><p> <?php echo $record['title']; ?> </p><br>
  	<h4>Link:</h4><a href="http://localhost/SIT-branch3/bc.php?id=<?php echo $record['announcement_id'];?> ">Click here to view announcement</a>
  </div>

</div>
</body>
</html>
