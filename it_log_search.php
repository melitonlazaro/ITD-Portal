 <!DOCTYPE html>  
 <html>  
      <head>  
          <meta charset="utf-8">
          <meta name="viewport" content="width=device-width, initial-scale=1">
          <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
          <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
          <script src="js/bootstrap.js"></script>
          <script src="js/pagination.js"></script>
      <style>
        #tablehead
        {
          background-color: #343d46;
          color: white;
        }
      </style>

      </head>  
      <body>  
      	<?php include "admin_nav.php"; ?>
           <br><br> <br>
           


           <div class="container-fluid">  
           
                    		<h1>I.T Daily Log</h1>
                    		<br>

                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-lg">Add Ticket</button>
                            <a href= "report.php"><button type="button" class="btn btn-success">Generate Report </button></a>
                            
                              <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
                               <div class="modal-dialog modal-lg" role="document">
                                 <div class="modal-content">
                                   <div class="modal-header">
                                     <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                     <h4 class="modal-title" id="addLabel">Add IT Log</h4>
                                   </div>                            <form action="bc.php?action=addissue" method="POST">
                                  <div class="modal-body">
                         
                                        <div class="form-group">
                                         <label for="employee">Employee Name</label>
                                         <input type="text" class="form-control" id="employee" placeholder="employee" name="employee">
                                        </div>
                                        <div class="form-group">
                                         <label for="conflict">Technical Concern</label>
                                         <input type="text" class="form-control" id="conflict" placeholder="Technical Concern" name="conflict">
                                        </div>
                                        <div class="form-group">
                                         <label for="remarks">Remarks</label>
                                         <input type="text" class="form-control" id="remarks" placeholder="remarks" name="remarks">
                                        </div>
                                        <div class="row">
                                          <div class="col-md-4">
                                            <div class="form-group">
                                              <label for="tech">Tech</label>
                                              <select class="selectpicker form-control" id="tech" name="tech">
                                                <option>1</option>
                                                <option>2</option>
                                                <option>3</option>
                                              </select>
                                            </div>
                                          </div>
                                          <div class="col-md-4">
                                            <div class="form-group">
                                               <label for="department">Department</label>
                                            <select class="selectpicker form-control" id="department" name="department" placeholder="">
                                               <optgroup label="Department"></optgroup>
                                               <option></option>
                                               <option>IT Department</option>
                                               <option>Marketing</option>
                                               <option>Sales</option>
                                               <option>Customer Service</option>
                                               <option>Human Resource</option>
                                               <option>Treasury</option>
                                            </select>
                                           </div>
                                          </div>
                                          <div class="col-md-4">
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
                             <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                             <button type="submit" onclick="" class="btn btn-primary pull-left" value="submit" >Save</button>
                           </div>
                        </form>
                     </div>
                  </div>
                </div>

                <br><br><br>
           	<div class="form-inline">

               <form method="POST" action="bc.php?action=search_log">
                  <div class="pull-right">
                     <div class="form-group">
                        <input type="text" name="search" class="form-control" placeholder="Search" value="<?php echo isset($_POST["search"]) ? $_POST["search"] : '';?>">
                     </div>
                     <div class="form-group">
                        <button class="btn btn-default" type="submit"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
                     </div>
                  </div>   
               </form>

               <form method="POST" action="bc.php?action=logsort">
                  <div class="form-group">
                     <label for="from_sort">From:</label>
                     <input type="date" name="fromsort" class="form-control" id="fromsort" value="<?php echo isset($_POST["fromsort"]) ? $_POST["fromsort"] : '';?>">

                  </div>
                  <div class="form-group">
                        <label for="tosort">TO:</label>
                        <input type="date" class="form-control" name="tosort" id="tosort" value="<?php echo isset($_POST["tosort"]) ? $_POST["tosort"] : '';?>">
                  </div>
                  <div class="form-group">
                        <button type="submit" name="sort" class="btn btn-default"><span class="glyphicon glyphicon-calendar"></button>
                  </div>
               </form>
         
        
            </div>


            <br> <br>	<!-- This div is responsible for Daily Log display -->
              
               <?php 
                  if(isset($_POST["sort"]))
                  {
                    $fromsort = $_POST["fromsort"];
                    $tosort = $_POST["tosort"];

                    echo '<div class="alert alert-info" role="alert">';
                    echo 'You are sorting log from '.$fromsort.' to '.$tosort.' &nbsp&nbsp&nbsp <a href="bc.php?action=tickets"><button class="btn btn-primary btn-xs">Return</button></a>';

                    echo '</div>';

                  }
                  if(isset($_POST["search"]))
                  {
                    $search = $_POST["search"];

                    echo  '
                            <div class="alert alert-info" role="alert">
                            You are searching for the Keyword <i>"'.$search.'" </i>&nbsp&nbsp&nbsp <a href="bc.php?action=tickets"><button class="btn btn-primary btn-xs">Return</button></a>
                            </div>
                          ';
                  }
                ?>
                
                  <table class="table table-bordered table-hover"> 
                    <tr id="tablehead">
                      <th>Ticket ID</th>
                      <th>Employee Name</th>
                      <th>Department</th>
                      <th>Issue</th>
                      <th>Remarks</th>
                      <th>Status</th>
                      <th>Tech</th>
                      <th>Date</th>
                      <th>Time</th>
                    </tr>
                  <?php if(isset($request))
                  {
                    foreach ($request as $row) {
                      echo  '
                              <tr>  
                              <td>'.$row["ticket_id"].'</td>  
                              <td>'.$row["employee"].'</td>
                              <td>'.$row["department"].'</td>  
                              <td>'.$row["conflict"].'</td>  
                              <td>'.$row["remarks"].'</td>  
                              <td>'.$row["status"].'</td>  
                              <td>'.$row["tech"].'</td>  
                              <td>'.$row["date"].'</td>  
                              <td>'.$row["time"].'</td>  
                              </tr>  

                            ';
                    }
                  } ?>
                </div>
	            </div>  
           </div>  
      </body>  
 </html>  
