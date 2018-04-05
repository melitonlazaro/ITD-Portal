<html>
<head>
	<title></title>
	<meta charset="utf-8">
 	<meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="js/jscookmenu.min.js"></script>
  <script src="js/jquery-1.12.4.min.js"></script>
  <script src="js/wb.carousel.min.js"></script>
  <script src="js/bootstrap.js"></script>
  <script src="js/npm.js"></script>
  <link href="css/bootstrap.min.css" rel="stylesheet">

</head>
<body>
<?php include "admin_nav.php"; ?>
<br><br><br>
	<div class="container-fluid">
  		<h1><i> <span class="glyphicon glyphicon-user"></span></i> Employee Directory </h1>
  		<br>
          <button type="submit" class="btn btn-primary" data-toggle="modal" data-target=".Add_new_employee">Add New Employee</button>
          <a href= "report.php"><button type="button" class="btn btn-success">Generate Report </button></a>

        <br><br>

       <div class="modal fade Add_new_employee" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
          <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="addLabel">Add new employee</h4>
              </div>
              <div class="modal-body">
                <form action="bc.php?action=add_new_employee_record" method="POST">
                  <div class="form-group">
                    <label for="first_name">First name</label>
                    <input type="text" class="form-control" name="first_name" id="first_name">
                  </div>
                   <div class="form-group">
                    <label for="last_name">Last Name</label>
                    <input type="text" class="form-control" name="last_name" id="last_name">
                  </div>
                   <div class="form-group">
                    <label for="department">Department</label>
                    <select class="selectpicker form-control" id="department" name="department" placeholder="">
                       <optgroup label="Department"></optgroup>
                       <option>IT Department</option>
                       <option>Marketing</option>
                       <option>Sales</option>
                       <option>Customer Service</option>
                       <option>Human Resource</option>
                       <option>Treasury</option>
                    </select>
                  </div>
                   <div class="form-group">
                    <label for="location">Location</label>
                      <select class="selectpicker form-control" id="location" name="location" >
                        <optgroup label="Status"></optgroup>
                        <option>Head Office</option>
                        <option>Sun Valley</option>
                        <option>Canlubang</option>
                        <option>Malvar</option>
                      </select>
                  </div>
                   <div class="form-group">
                    <label for="directory">Local Directory</label>
                    <input type="text" class="form-control" name="directory" id="directory">
                  </div>
                   <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" class="form-control" name="email" id="email">
                  </div>
                   <div class="form-group">
                    <label for="status">Status</label>
                    <input type="text" class="form-control" name="status" id="status">
                  </div>
                  <div class="form-group">
                    <button class="btn btn-primary" type="submit">Add</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
            <br>
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

              
         
        
            </div>
            <br><br><br>
      <!--   <div class="table-responsive" id="pagination_data">
        	Div responsible for pagination of Employee Directory
        </div> -->
        <?php
          /*
            Place code to connect to your DB here.
          */
          include('config.inc.php');  // include your code to connect to DB.

          $tbl_name="employee";   //your table name
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
          $targetpage = "manage_employee.php";   //your file name  (the name of this file)
          
          if(isset($_POST['records'])) //if Records per page are isset
          {
            $page = 1;
            $limit = $_POST['records'];
          }
          else
          {
            $limit = 5;               //how many items to show per page (Default)
          }

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
          $sql = "SELECT * FROM $tbl_name LIMIT $start, $limit";
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
                          <th>First Name</th>
                          <th>Last Name</th>
                          <th>Department</th>
                          <th>Location</th>
                          <th>Local Directory</th>
                          <th colspan="2">Email</th>          
                          <th>Status</th>
                          <th>Action</th>
                        </tr>  
                      ';
            while($row = mysqli_fetch_array($result))
            {
                          echo 
                          '
                            <tr>  
                              <td>'.$row["first_name"].'</td>
                              <td>'.$row["last_name"].'</td>
                              <td>'.$row["department"].'</td>
                              <td>'.$row["location"].'</td>
                              <td>'.$row["directory"].'</td>
                              <td>'.$row["email"].'</td>
                              <td><a href="mailto: '.$row["email"].' " ><span class="glyphicon glyphicon-envelope"></a></td>
                              <td>'.$row["status"].'</td>
                              <td>
                                <div class="btn-group" role="group" aria-label="...">
                                  <button type="button" class="btn btn-info" data-toggle="modal" data-target="#confirmmodal-'.$row['employee_id'].'" data-toggle="tooltip" data-placement="bottom" title="Edit"><span class="glyphicon glyphicon-edit"></span></button>
                                  <button type="button" name="delete" id="'.$row['employee_id'].'" class=" delete btn btn-danger" data-toggle="tooltip" data-placement="bottom" title="Delete"><span class="glyphicon glyphicon-trash"></span></button>
                                </div>  
                              </td>
                           </tr>  

                          <div id="confirmmodal-'.$row['employee_id'].'" class="modal fade" role="dialog" tabindex="-1">
                            <div class="modal-admin" role="document">
                              <div class="modal-content" style="width:70%; margin:auto;">
                                <div class="modal-header">
                                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                                  <h4 class="modal-title" id="editLabel-'.$row['employee_id'].'"> Edit Employee Record </h4>
                                </div>
                                <div class="modal-body">
                                 <div class="form-group">
                                    <form method="POST" action="bc.php?action=publishnews">
                                      <input type="hidden" name="author" value=" $_SESSION["username"]">
                                      <input type="text" name="title" class="form-control" placeholder="Title">
                                      <br>
                                      <input type="text" name="lead" class="form-control" placeholder="Lead">
                                      <br>
                                      <textarea class="form-control" rows="20" cols="50" placeholder="Content" name="content" id="content"></textarea>
                                      <br>
                                      
                                      <center>
                                      <input type="submit" class="btn btn-success" value="Publish">  
                                      </center>
                                    </form>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
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

<script>
  $(function(){
    $(".delete").click(function(){
      var del_id = $(this).attr('id');
      var $ele = $(this).parent().parent().parent();

      if(confirm("Delete this Employee Record?"))
      {
        $.ajax({
          type:'POST',
          url:'delete_employee_record.php',
          data:{'del_id':del_id},
          success:function(data){
            if(data=="YES")
            {
              $ele.fadeOut().remove();
            }
            else
            {
              alert("Can't delete the row");
            }
          }
        });
      }
      else
      {
        return false;
      }

    });
  });
</script>