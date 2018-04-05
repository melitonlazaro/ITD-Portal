 <!DOCTYPE html>  
 <html>  
  <head>  
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/jquery-1.12.4.min.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/pagination.js"></script>
      <style type="text/css">
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
           


           <div class="container-fluid ">  
                
              <h1><i> <span class="glyphicon glyphicon-list-alt"></span></i>&nbspI.T Daily Log</h1>
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
                        <input type="text" name="search" class="form-control" placeholder="Search">
                     </div>
                     <div class="form-group">
                        <button class="btn btn-default" type="submit"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
                     </div>
                  </div>   
               </form>

               <form method="POST" action="bc.php?action=logsort">
                  <div class="form-group">
                     <label for="from_sort">From:</label>
                     <input type="date" name="fromsort" class="form-control" id="from_sort" value="<?php echo isset($_POST["fromsort"]) ? $_POST["fromsort"] : '';?>" required>

                  </div>
                  <div class="form-group">
                        <label for="tosort">TO:</label>
                        <input type="date" class="form-control" name="tosort" id="tosort" value="<?php echo isset($_POST["tosort"]) ? $_POST["tosort"] : '';?>" required>
                  </div>
                  <div class="form-group">
                        <button type="submit" name="sort" class="btn btn-default"><span class="glyphicon glyphicon-calendar"></button>
                  </div>
               </form>
         
        
            </div>


            <br> <br>	<!-- This div is responsible for Daily Log display -->
               <!-- <div class="table-responsive" id="pagination_data">  
	            </div>   -->
              <?php
  /*
    Place code to connect to your DB here.
  */
  include('config.inc.php');  // include your code to connect to DB.

  $tbl_name="daily_log";   //your table name
  // How many adjacent pages should be shown on each side?
  $adjacents = 3;
  
  /* 
     First get total number of rows in data table. 
     If you have a WHERE clause in your query, make sure you mirror it here.
  */
  $query = "SELECT COUNT(*) as num FROM $tbl_name";
  $total_pages = mysqli_fetch_array(mysqli_query($conn, $query));
  $total_pages = $total_pages['num'];
  
  /* Setup vars for query. */
  $targetpage = "it_log.php";   //your file name  (the name of this file)
  $limit = 20;               //how many items to show per page
  if(isset($_GET['page']))
  {
    $page = $_GET['page'];
  }                 
  else
  {
    $page = 1;
  }
  if($page) 
    $start = ($page - 1) * $limit;      //first item to display on this page
  else
    $start = 0;               //if no page var is given, set start to 0
  
  /* Get data. */
  $sql = "SELECT * FROM $tbl_name ORDER BY ticket_ID DESC LIMIT $start, $limit";
  $result = mysqli_query($conn, $sql);
  
  /* Setup page vars for display. */
  if ($page == 0) $page = 1;          //if no page var is given, default to 1.
  $prev = $page - 1;              //previous page is page - 1
  $next = $page + 1;              //next page is page + 1
  $lastpage = ceil($total_pages/$limit);    //lastpage is = total pages / items per page, rounded up.
  $lpm1 = $lastpage - 1;            //last page minus 1
  
  /* 
    Now we apply our rules and draw the pagination object. 
    We're actually saving the code to a variable in case we want to draw it more than once.
  */
  $pagination = "";
  if($lastpage > 1)
  { 
    $pagination .= "<nav aria-label='Page Navigation'>";
    $pagination .= "<ul class='pagination'>";
  
    //previous button
    if ($page > 1) 
    {
      $pagination.= "<li class='page-item'>";
      $pagination.= "<a class='page-link' href=\"$targetpage?page=$prev\">previous</a>";
      $pagination.= "</li>";
    } 
    else
    {
      $pagination.= "<li class='page-item disabled'>";
      $pagination.= "<span class='page-link'>previous</span>";  
      $pagination.= "</li>";
    } 
    //pages 
    if ($lastpage < 7 + ($adjacents * 2)) //not enough pages to bother breaking it up
    { 
      for ($counter = 1; $counter <= $lastpage; $counter++)
      {
        if ($counter == $page)
        {
          $pagination.= "<li class='page-item active'>";
          $pagination.= "<span class='page-link''>$counter</span>";
          $pagination.= "</li>";
        } 
        else
        {
          $pagination.= "<li class='page-item '>";
          $pagination.= "<a class='page-link' href=\"$targetpage?page=$counter\">$counter</a>";         
          $pagination.= "</li>";
        }
      }
    }
    elseif($lastpage > 5 + ($adjacents * 2))  //enough pages to hide some
    {
      //close to beginning; only hide later pages
      if($page < 1 + ($adjacents * 2))    
      {
        for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++)
        {
          if ($counter == $page)
          {
            $pagination.= "<li class='page-item active'>";
            $pagination.= "<span class='page-link'>$counter</span>";
            $pagination.= "</li>";
          } 
          else
          {
            $pagination.= "<li class='page-item '>";
            $pagination.= "<a class='page-link' href=\"$targetpage?page=$counter\">$counter</a>";         
            $pagination.= "</li>";
          }
        }
        $pagination.= "<li class='page-item '>";
        $pagination.= "<a class='page-link href='#'>...</a>";
        $pagination.= "<a class='page-link' href=\"$targetpage?page=$lpm1\">$lpm1</a>";
        $pagination.= "<a class='page-link' href=\"$targetpage?page=$lastpage\">$lastpage</a>";   
        $pagination.= "</li>";

      }
      //in middle; hide some front and some back
      elseif($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2))
      {
        $pagination.= "<li class='page-item '>";
        $pagination.= "<a class='page-link' href=\"$targetpage?page=1\">1</a>";
        $pagination.= "<a class='page-link' href=\"$targetpage?page=2\">2</a>";
        $pagination.= "<a class='page-link href='#'>...</a>";
        $pagination.= "</li>";
  
      
        for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
        {
          if ($counter == $page)
          {
            $pagination.= "<li class='page-item active'>";
            $pagination.= "<span class='page-link' class=\"current\">$counter</span>";
            $pagination.= "</li>";
          }
          else
          {
            $pagination.= "<li class='page-item'>";
            $pagination.= "<a class='page-link' href=\"$targetpage?page=$counter\">$counter</a>";         
            $pagination.= "</li>";
          }
        }
        $pagination.= "<li class='page-item'>";
        $pagination.= "<a class='page-link href='#'>...</a>";
        $pagination.= "<a class='page-link' href=\"$targetpage?page=$lpm1\">$lpm1</a>";
        $pagination.= "<a class='page-link' href=\"$targetpage?page=$lastpage\">$lastpage</a>";   
        $pagination.= "</li>";

      }
      //close to end; only hide early pages
      else
      {
        $pagination.= "<li class='page-item'>";
        $pagination.= "<a class='page-link' href=\"$targetpage?page=1\">1</a>";
        $pagination.= "<a class='page-link' href=\"$targetpage?page=2\">2</a>";
        $pagination.= "<a class='page-link href='#'>...</a>";
        $pagination.= "</li>";
  
        for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++)
        {
          if ($counter == $page)
          {
            $pagination.= "<li class='page-item active'>";
            $pagination.= "<span class='page-link'>$counter</span>";
            $pagination.= "</li>";
          } 
          else
          {
            $pagination.= "<li class='page-item'>";
            $pagination.= "<a class='page-link' href=\"$targetpage?page=$counter\">$counter</a>";         
            $pagination.= "</li>";
          }
        }
      }
    }
    
    //next button
    if ($page < $counter - 1) 
    {
      $pagination.= "<li class='page-item'>";
      $pagination.= "<a href=\"$targetpage?page=$next\">next </a>";
      $pagination.= "</li>";
    }
    else
    {
    $pagination.= "<li class='page-item disabled'>";
    $pagination.= "<span class='page-link'>next</span>";
    $pagination.= "</li>";
    } 
    $pagination .= "</ul>";
    $pagination .= "</nav>";  
  }
?>

  <?php
      echo '<table class="table table-bordered table-hover">  
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
              ';
    while($row = mysqli_fetch_array($result))
    {
                  echo 
                  '
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
      echo '</table>';
  ?>

<?php 
echo '<center>';
echo $pagination;
echo '</center>';
?>
           </div>  
      </body>  
 </html>  

