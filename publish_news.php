<?php  
	session_start();
 ?>

<html>
<head>
	<title></title>
	<title></title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="js/jscookmenu.min.js"></script>
	<script src="js/jquery-1.12.4.min.js"></script>
	<script src="js/wb.carousel.min.js"></script>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script>
    <link href="css/Dashboard.css" rel="stylesheet">
</head>
<body>
	<div class="container-fluid">
		<?php include "admin_nav.php"; ?>
	</div>
	<br><br><br>
	<ol class="breadcrumb pull-right">
	  <li><a href="bc.php?action=dashboard">Dashboard</a></li>
	  <li><a href="bc.php?action=show_news">News</a></li>
	  <li class="active">Publish News</li>
	</ol>
	<br><br><br>
		<div class="container" id="news_container">
			<h1>Publish News <button type="button" class="btn btn-default" data-toggle="modal" data-target="#news_help_modal"><span class="glyphicon glyphicon-question-sign"></span></button></h1>
			<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" id="news_help_modal">
			  <div class="modal-dialog modal-lg">
			  		<div class="modal-content">
					  	<div class="modal-header">
					  		<h4>Publish News Guide
					  	    <button type="button" class="close" data-dismiss="modal">&times;</button></h4>
					  	</div>
					    <div class="modal-body">
					    	<ul class="list-unstyled">
						    	<li>Create an announcement for ERGO employees.</li><br>
						    	<li>Clicking the "Submit" Button will send Email to all employees who are in the directory about the announcement with the link redirecting to it.</li>
					 		</ul><br>
					 		<dl>
					 			<dt>HTML content guide</dt>
					 			<dd>Constructing the Content of the announcement needs to be in HTML Format </dd>
					 			<dd>Click the "Left Arrow" placed in the right side.</dd>
					 			<dd>Click the button representing the HTML Tag you want to use.</dd>
					 		</dl>
					    </div>
					 </div>
			  </div>
			</div>

			<div class="form-group">
				<form method="POST" action="bc.php?action=publishnews">
					<input type="hidden" name="author" value="<?php echo $_SESSION['username'];?>">
					<input type="text" name="title" class="form-control" placeholder="Title">
					<br>
					<input type="text" name="lead" class="form-control" placeholder="Lead">
					<br>
					<textarea class="form-control" rows="20" cols="50" placeholder="Content" name="content" id="content"></textarea>
					<br>
					
					<center>
					<input type="submit" class="btn btn-success" value="Publish">  


				</form>
			</div>
		</div>
	<?php include "news_tools.php"; ?>

</body>
</html>
