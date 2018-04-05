<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
	#jumbotron
	{
		padding-top: 10px;
		padding-left: 10px;
		background-color: white;

	}
	.report_container
	{
		border: 1px solid gray;
		border-radius: 5px;
	}
	</style>
</head>
<body>
	<?php 
	session_start();
	include "admin_nav.php"; ?>
	<br><br><br>

	<div class="container-fluid">
		<h1><span class="glyphicon glyphicon-file"></span>&nbsp; Reports</h1>
		<div class="jumbotron" id="jumbotron">
			<h3><span class="glyphicon glyphicon-list-alt"></span>&nbsp;I.T Daily Log</h3>
			<br>
			<div class="row">
				<div class="col-md-6">
					<div class="container-fluid report_container">
						<h4>Export to Excel</h4>
						<br>
						<h5>Report all Tickets</h5>
						<a href="report_all.php"><button class="btn btn-primary btn-block">Report all</button></a>
						<br><hr><br>
						<h5>Sort Tickets</h5>
						<form action="report_sort.php" method="POST">
							<div class="form-group">
								<input type="date" name="sortfromreport" class="form-control" required="required">
							</div>
							<br>
							<div class="form-group">
								<input type="date" name="sorttoreport" class="form-control" required="required">
							</div>
							<br>
							<button type="submit" class="btn btn-primary btn-block">Report through Sort</button>
						</form>
						<br><br>
					</div>
				</div>
				<div class="col-md-6">
					<div class="container-fluid report_container">
						<h4>Export to PDF</h4>
						<br>
						<h5>Report all Tickets</h5>
						<a href="ticket_report_pdf.php"><button class="btn btn-primary btn-block">Report all</button></a>
						<br><hr><br>
					</div>
				</div>
			</div>
		</div>

		<div class="jumbotron" id="jumbotron">
			<h3><span class="glyphicon glyphicon-user"></span>&nbsp;Employee Directory Report</h3>
			<br>
			<div class="row">
				<div class="col-md-6">
					<div class="container-fluid report_container">
						<h4>Export to Excel</h4>
						<br>
						<h5>Report all Tickets</h5>
						<a href="report_all_employee.php"><button class="btn btn-primary btn-block">Report all</button></a>
						<br><hr><br>
						<h5>Sort Tickets</h5>
						<form action="report_sort.php" method="POST">
							<div class="form-group">
								<input type="date" name="sortfromreport" class="form-control" required="required">
							</div>
							<br>
							<div class="form-group">
								<input type="date" name="sorttoreport" class="form-control" required="required">
							</div>
							<br>
							<button type="submit" class="btn btn-primary btn-block">Report through Sort</button>
						</form>
						<br><br>
					</div>
				</div>
				<div class="col-md-6">
					<div class="container-fluid report_container">
						<h4>Export to PDF</h4>
						<br>
						<h5>Report all Tickets</h5>
						<a href="ticket_report_pdf.php"><button class="btn btn-primary btn-block">Report all</button></a>
						<br><hr><br>
					</div>
				</div>
			</div>
		</div>
	</div>

</body>
</html>