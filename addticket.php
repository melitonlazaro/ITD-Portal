<html>
<head>


			 <meta charset="utf-8">

		  <meta http-equiv="X-UA-Compatible" content="IE=edge">
			<meta name="viewport" content="width=device-width, initial-scale=1">
		  <script src="js/jscookmenu.min.js"></script>
		  <script src="js/jquery-1.12.4.min.js"></script>
		  <script src="js/wb.carousel.min.js"></script>
		  <script src="js/bootstrap.js"></script>
		  <script src="js/npm.js"></script>

		  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

			<!-- Bootstrap -->
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
			<link href="css/bootstrap.min.css" rel="stylesheet">
			<script src="js/bootstrap.min.js"></script>

<style type="text/css">

#color
{
	background-color:#343d46;
}
#panelheading
{
	background-color: #54a51c;
	color:white;
}

#ticketcontainer
{
	width: 650px;
	height: 700px;
}

</style>

	</head>

<body >
<?php include "header_sub.php"; 
?>



<div class="container-fluid" id="ticketcontainer">

		  		<br><br><br>
					
		  		<div class="panel panel-default">
				    <div class="panel-heading" id="panelheading">

					    <h3 class="panel-title">Submit Ticket <span class="glyphicon glyphicon-question-sign"  data-toggle="tooltip" style="float:right;" title="Tech Support Concerns? Please fill up the form to send concerns to the IT Department"></span></h3>
					</div>
					<div class="panel-body">
						<div class="form-group">
						    <form method="POST" action="bc.php?action=addticket" enctype="multipart/form-data">
						    	<input type="text" name="name" placeholder="Name" class="form-control"><br><br>
						    	<select name="department" class="form-control">
						    		<option>Department</option>
						    		<option>IT Department</option>
						    		<option>Marketing</option>
						    		<option>Sales</option>
						    		<option>Customer Service</option>
						    		<option>Human Resource</option>
						    		<option>Treasury</option>

						    	</select><br><br>

						    	<textarea class="form-control" name="concern" rows="5" placeholder="Concern"></textarea><br><br>
						    	<center>
						    	<label class="btn btn-success">
						    		Upload Screenshots
						    	<input type="file" name="files[]" multiple="" />
						    	</label><br><br>
						    	</center>
						    	<input type="submit" value="Submit Concern" class="form-control">
						    </form>




						</div>
					</div>
				</div>

</div>

<br><br><br><br>

	<?php include "footer.php"; ?>
</body>
</html>