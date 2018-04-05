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



</head>
<body>

 <br><br><br>
  <div class="container">
    	

    <div class="row">
      <div class="col-md-4 ">
        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#addData"><span class="glyphicon glyphicon-plus"> </span></button>
        <div class="modal fade" id="addData" tabindex="-1" role="dialog" aria-labelledby="addLabel">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="addLabel">Add IT Log</h4>
              </div>
              <form action="bc.php?action=addissue" method="POST">
              <div class="modal-body">
                
                <div class="form-group">
                  <label for="employee">Employee Name</label>
                  <input type="text" class="form-control" id="employee" placeholder="employee" name="employee">
                </div>
				<div class="form-group">
                  <label for="conflict">Issue</label>
                  <input type="text" class="form-control" id="conflict" placeholder="conflict" name="conflict">
                </div>
				<div class="form-group">
                  <label for="remarks">Remarks</label>
                  <input type="text" class="form-control" id="remarks" placeholder="remarks" name="remarks">
                </div>
				<div class="form-group">
                  <label for="tech">Technician</label>
                  <input type="text" class="form-control" id="tech" placeholder="tech" name="tech">
                </div>
				
				<div class="row">
                  <div class="col-xs-5">
                    <div class="form-group">
                    <label for="department">Department</label>
                      <select class="selectpicker form-control" id="department" name="department" placeholder="">
                        <optgroup label="Department"></optgroup>
                     	<option>Department</option>
						<option>IT Department</option>
						<option>Marketing</option>
						<option>Sales</option>
						<option>Customer Service</option>
						<option>Human Resource</option>
						<option>Treasury</option>
                      </select>
                    </div>
                  </div>
                </div>
				
                <div class="row">
                  <div class="col-xs-5">
                    <div class="form-group">
                      <label for="status">Status</label>
                      <select class="selectpicker form-control" id="status" name="status" >
                        <optgroup label="Status"></optgroup>
                        <option>Complete</option>
                        <option>Pending</option>
                        <option>Incomplete</option>
                      </select>
                    </div>
                  </div>
                </div>
				
              </div>

            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" onclick="" class="btn btn-primary" value="submit" >Save</button>
            </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <br>
      <br>
      <br>
      <div class="container">
     	
		    <div class="form-inline">  
		    	<form method="POST" action="bc.php?action=search_log">
		        		<div class="pull-right">
			        		<div class="form-group">
			        			<input type="text" name="search" class="form-control" placeholder="Search">
				    		</div>
			        		<div class="form-group">
					        	<button class="btn btn-default" type="button">Go! <span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
			          	 	</div>
			          	</div> 	
		      		</form>
		      		
		        	<form method="POST" action="bc.php?action=logsort">
		        		<div class="form-group">
		        			<label for="fromsort">FROM:</label>
		        			<input type="date" class="form-control" name="fromsort" id="fromsort">
		        			
		        		</div>
		        		<div class="form-group">
		        			<label for="tosort">TO:</label>
		        			<input type="date" class="form-control" name="tosort" id="tosort">
		        		</div>
		        		<div class="form-group">
		        			<button type="submit" name="sort" class="btn btn-default"><span class="glyphicon glyphicon-calendar"></button>
		        		</div>
		        	</form>

		        	<div class="form-group">
		        		<?php
		        		if(isset($_POST["sort"]))
		        		{
		        				$fromsort = $_POST["fromsort"];
								$tosort = $_POST["tosort"];					

		        			echo '<form action="report_sort.php" method="POST">';
		        			echo '<input type="hidden" value="'.$fromsort.'" name ="sortfromreport">';
		        			echo '<input type="hidden" value="'.$tosort.'" name="sorttoreport">';
		        			echo '<button type="submit" name="sort" class="btn btn-default"><span class="glyphicon glyphicon-print"></button>';

		        		}
		        		else
		        		{
		        			echo '<a href="report_all.php"><span class="glyphicon glyphicon-print"> </a>';
		        		}

		        		?>
		        		

		        		<?php 
		        	
		        		?>
		
		      			

		      		</form>
		      		</div>
		        
		    </div>

		      		
		    
    
    </div>

    <br />

	<div class="row">
			<div class="cold-md-8">
				<?php 
				if(isset($_POST["sort"]))
				{
					$fromsort = $_POST["fromsort"];
					$tosort = $_POST["tosort"];

					echo '<div class="alert alert-info" role="alert">';
					echo "You are sorting log from $fromsort to $tosort";
					echo '</div>';

				}

				?>
			<table class="table table-striped table-hover">
			  <tr>
			  		<th>Ticket ID</th>
					<th>Employee Name</th>
					<th>Department</th>
					<th>Issue</th>
					<th>Remarks</th>
					<th>Status</th>
					<th>Tech</th>
					<th>Date</th>
					<th>Time</th>
					<th>Images</th>
					<th>Action</th>
			  </tr>
			  <tr>
				<?php
				if( isset($request) ){
						foreach($request as $r){
							echo '
								<tr>
									<td>'.$r['ticket_id'].'</td>
									<td>'.$r['employee'].'</td>
									<td>'.$r['department'].'</td>
									<td>'.$r['conflict'].'</td>
									<td>'.$r['remarks'].'</td>
									<td>'.$r['status'].'</td>
									<td>'.$r['tech'].'</td>
									<td>'.$r['date'].'</td>
									<td>'.$r['time'].'</td>
									<td>
										<button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#myModal'.$r['ticket_id'].' ">
				                        <span class="glyphicon glyphicon-picture">
				                        </button>
				                        
				                        <div class="modal fade" id="myModal'.$r['ticket_id'].'" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
				                          <div class="modal-dialog" role="document">
				                            <div class="modal-content">
				                              <div class="modal-header">
				                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				                                <h4 class="modal-title" id="myModalLabel'.$r['ticket_id'].'">Modal title</h4>
				                              </div>
				                              <div class="modal-body">'; ?>
				                              <?php
				                              include "config.inc.php";
				                              $ticket_id = $r['ticket_id'];
				                              $sql1 = " SELECT * FROM uploads WHERE `ticket_id`= $ticket_id ";
				                              $result = mysqli_query($conn, $sql1);
				                              $records = array();
				                              if($myrow = mysqli_fetch_array($result))
				                              {
				                                do
				                                {
				                                  $info = array();
				                                  $info["ticket_id"] = $myrow["ticket_id"];
				                                  $info["path"] = $myrow["path"];
				                                  $records[] = $info;
				                                }
				                                while($myrow = mysqli_fetch_array($result));
				                              }
				                              echo '<center>';
					                             foreach ($records as $img)
					                             	{
						                                echo '<a target="_blank" href="user_data/'.$img['path'].'"><img height="150" width="100" class="img-thumbnail" src="user_data/'.$img['path'].'    "></a>';
						                            }
				                              echo '</center>';
				                               ?>



				              <?php
				                echo '
				                              </div>
				                              <div class="modal-footer">
				                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				                                <button type="button" class="btn btn-primary">Save changes</button>
				                              </div>
				                            </div>
				                          </div>
				                        </div>
									</td>
						<td>
						<div class="btn-group" role="group" aria-label="...">
						  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#edit-'.$r['id'].'" data-placement="top" title="Edit"><span class="glyphicon glyphicon-edit" aria-hidden="true"></button>
									<div class="modal fade" id="edit-'.$r['id'].'" tabindex="-1" role="dialog" aria-labelledby="editLabel" >
										  <div class="modal-dialog" role="document">
											<div class="modal-content">
											  <div class="modal-header">
												<button type="button" class="close" data-dismiss="modals" aria-label="Close"><span aria-hidden="true">&times;</span></button>
												<h4 class="modal-title" id="editLabel-'.$r['id'].'">Edit Data</h4>
											  </div>
											  <form action="bc.php?action=editissue" method="POST" >
												  <div class="modal-body">
													<input type="hidden" class="form-control" id="ID-'.$r['id'].'" value="'.$r['id'].'" name="id" >
														<div class="form-group">
														<label for="employee">Employee Name</label>
															<input type="text" class="form-control" id="employee-'.$r['id'].'" value="'.$r['employee'].'" name="employee" disabled>
														</div>
														
														<div class="form-group">
														<label for="department">Department</label>
															<input type="text" class="form-control" id="department-'.$r['id'].'" value="'.$r['department'].'" name="department" disabled>
														</div>
														
														<div class="form-group">
														<label for="conflict">Issue</label>
															<input type="text" class="form-control" id="conflict-'.$r['id'].'" value="'.$r['conflict'].'" name="conflict">
														</div>
														
														<div class="form-group">
														<label for="remarks">Remarks</label>
															<input type="text" class="form-control" id="remarks-'.$r['id'].'" value="'.$r['remarks'].'" name="remarks">
														</div>
														
														<div class="form-group">
														<label for="status">Status</label>
															<input type="text" class="form-control" id="status-'.$r['id'].'" value="'.$r['status'].'" name="status">
														</div>
														
														<div class="form-group">
														<label for="tech">Technician</label>
															<input type="text" class="form-control" id="tech-'.$r['id'].'" value="'.$r['tech'].'" name="tech">
														</div>
														

												  </div>
												  <div class="modal-footer">
													<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
													<button type="submit" onclick="" class="btn btn-primary" value="update" name="update">Save changes</button>
												  </div>
											  </form>
											</div>
										  </div>
										</div>
									
											
											<button type="button" class="btn btn-danger" data-toggle="modal" data-placement="top" data-target="#deleteissue-'.$r["id"].'"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></button>
												<div class="modal fade" id="deleteissue-'.$r["id"].'" tabindex="-1" role="dialog" aria-labelledby="editLabel" >
														  
														  <div class="modal-dialog" role="document">
															<div class="modal-content">
															  <div class="modal-header">
																<button type="button" class="close" data-dismiss="modals" aria-label="Close"><span aria-hidden="true">&times;</span></button>
																<h4 class="modal-title" id="editLabel-'.$r["id"].'">Delete data?</h4>
																
															  </div>
															  <form action="bc.php?action=archive_log" method="POST" >
																	<input type="hidden" class="form-control" id="ID-'.$r["id"].'" value="'.$r["id"].'" name="id" >
																	<input type="hidden" class="form-control" id="ID-'.$r["employee"].'" value="'.$r["employee"].'" name="employee" >
																	<input type="hidden" class="form-control" id="ID-'.$r["department"].'" value="'.$r["department"].'" name="department" >
																	<input type="hidden" class="form-control" id="ID-'.$r["conflict"].'" value="'.$r["conflict"].'" name="conflict" >
																	<input type="hidden" class="form-control" id="ID-'.$r["remarks"].'" value="'.$r["remarks"].'" name="remarks" >
																	<input type="hidden" class="form-control" id="ID-'.$r["status"].'" value="'.$r["status"].'" name="status" >
																	<input type="hidden" class="form-control" id="ID-'.$r["tech"].'" value="'.$r["tech"].'" name="tech" >
																	<input type="hidden" class="form-control" id="ID-'.$r["date"].'" value="'.$r["date"].'" name="date" >
																	<input type="hidden" class="form-control" id="ID-'.$r["time"].'" value="'.$r["time"].'" name="time" >


																  <div class="modal-footer">
																	<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
																	<button type="submit" onclick="" class="btn btn-danger" value="update" name="update">Delete</button>
																  </div>
															  </form>
															  
															</div>
														  </div>
														</div>
						</div></td>
								</tr>';
						}
					}
					?>


				<!-- <button type="button" class="btn btn-success" data-toggle="tooltip" data-placement="top" title="Print"><span class="glyphicon glyphicon-print" aria-hidden="true"></button>
				<button type="button" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Delete"><span class="glyphicon glyphicon-remove" aria-hidden="true"></button> -->
			  </tr>
			</table>
			</div>
			
	</div>
	
  </div> <!-- /container -->



</body>
</html>
