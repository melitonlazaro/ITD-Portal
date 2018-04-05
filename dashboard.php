  <?php 
//index.php
$connect = mysqli_connect("localhost", "root", "", "ojt");
$date1 = date('Y-m-01');
$date2 = date('Y-m-31');
$query = "SELECT COUNT(1) AS ticket, DATE(date) as date FROM daily_log WHERE date between '$date1' and '$date2' GROUP BY DATE(date) LIMIT 0 , 30";
$result = mysqli_query($connect, $query);
$chart_data = '';
while($row = mysqli_fetch_array($result))
{
 $chart_data .= "{ date:'".$row["date"]."', ticket:".$row["ticket"]."}, ";
}
$chart_data = substr($chart_data, 0, -2);
?>

<!DOCTYPE html>
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
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="css/morris.css">
  <script src="js/raphael-min.js"></script>
  <script src="js/morris.min.js"></script>

   

 
<style media="screen">
  img
    {
      margin: 10px;
      border: 10px solid ;
      border-color: rgb(37, 137, 140);      
    }
  #panels_pending
  {
    background-color: #f39c12;
    color:white;
    border-radius: 10px;
  }
  #panel-footer-pending
  {
    background-color: #f39c12;
    color:white;
    border-bottom-right-radius: 10px;
    border-bottom-left-radius:10px;
  }

  #panels_solved
  {
    background-color: #2389dd;
    color:white;
    border-radius: 10px;
  }
  #panel-footer-solved
  {
    background-color: #2389dd;
    color:white;
    border-bottom-right-radius: 10px;
    border-bottom-left-radius:10px;
  }

  #panels_unsolved
  {
    background-color: #ea2020;
    color:white;
    border-radius: 10px;
  }
  #panel-footer-unsolved
  {
    background-color: #ea2020;
    color:white;
    border-bottom-right-radius: 10px;
    border-bottom-left-radius:10px;
  }

  #glyph
  {
    float:right;
    margin-top: 2px;
    margin-right: 0px;
    font-size: 25px;
    opacity: .5;
  }
  #title
  {
    font-family: Arial;
    font-size: 17px;
  }
  #ticketcontainer
  {
    background-color: #e7f3f9;
    border-radius:10px;
  }
  #tickettable
  {
    width: 100%;
    background-color:white;
  }
  #tablehead
  {
    color:white;
    background-color: #343d46;
  }
  #chart
  {
    background-color: white;
  }
 
</style>

</head>
<body>
  <?php include "admin_nav.php"; ?>
  <br><br><br>


<div class="container-fluid" id="ticketcontainer">

  <h1><i> <span class="glyphicon glyphicon-dashboard"></span></i> Dashboard </h1>

  <br><br>
  <div class="row">  
    <div class="col-md-3">
      <div class="panel panel-default" id="panels_pending">
        <div class="panel-body">
          <h6 id="title"><b>Pending Tickets</b></h6>
          <h3><?php echo $pending_ticket_count; ?>  <span class="glyphicon glyphicon-tasks" id="glyph" aria-hidden="true"></span></h3>
        </div>
        <div class="panel-footer" id="panel-footer-pending">
          <h6>Number of Pending Tickets</h6>
        </div>
      </div>
    </div>

    <div class="col-md-3">
      <div class="panel panel-default" id="panels_solved"> 
        <div class="panel-body">
         <h6 id="title"><b>Solved Tickets</b></h6>
         <h3><?php echo $completed_ticket; ?>  <span class="glyphicon glyphicon-tasks" id="glyph" aria-hidden="true"></span></h3>
        </div>
        <div class="panel-footer" id="panel-footer-solved">
          <h6>Solved Tickets (<?php echo date("Y-m-d"); ?>)</h6>
        </div>
      </div>
    </div>
    
    
    <div class="col-md-3">
      <div class="panel panel-default" id="panels_unsolved">
        <div class="panel-body">
         <h6 id="title"><b>Unsolved Tickets</b></h6>
         <h3><?php echo $incomplete_ticket; ?> <span class="glyphicon glyphicon-tasks" id="glyph" aria-hidden="true"></span></h3>
        </div>
        <div class="panel-footer" id="panel-footer-unsolved">
          <h6>Number of Unsolved Tickets</h6>
        </div>
      </div>
    </div>

    <div class="col-md-3">
      <div class="panel panel-default" id="panels_solved"> 
        <div class="panel-body">
         <h6 id="title"><b>Employees</b></h6>
         <h3><?php echo $employee_count; ?>  <span class="glyphicon glyphicon-user" id="glyph" aria-hidden="true"></span></h3>
        </div>
        <div class="panel-footer" id="panel-footer-solved">
          <h6>Employee Number(<?php echo date("Y-m-d"); ?>)</h6>
        </div>
      </div>
    </div>
  </div>



  <br><br><br>
<div class="container">
  <h2>Pending Tickets </h2>
<table class="table table-hover table-responsive table-bordered" id="tickettable" >
        <tr id="tablehead">
          <th>Ticket ID</th>
          <th >Name</th>
          <th>Department</th>
          <th>Issue</th>
          <th>Image</th>
          <th>Date</th>
          <th>Time</th>
          <th>Action</th>

        </tr>
        <tr>
        <?php
        if( isset($request) ){
            foreach($request as $r ){
              echo '
                <tr>
                  <td>'.$r['ticket_id'].'</td>
                  <td>'.$r['name'].'</td>
                  <td>'.$r['department'].'</td>
                  <td>'.$r['concern'].'</td>
                  <td>  
                    <button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#myModal'.$r['ticket_id'].' ">
                        <span class="glyphicon glyphicon-picture">
                        </button>
                            <!-- MODAL GALLERY -->
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
                              foreach ($records as $img) {
                                echo '<a target="_blank" href="user_data/'.$img['path'].'"><img height="150" width="100" class="img-thumbnail" src="user_data/'.$img['path'].'    "></a>';
                              }
                              echo '</center>';
                               ?>



              <?php // MODAL FOOTER
                echo '
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                              </div>
                            </div>
                          </div>
                        </div>
                  </td>
                  <td>'.$r['date'].'</td>
                  <td>'.$r['time'].'</td>
        

                  </td>

            <td>
            <div class="btn-group" role="group" aria-label="...">

            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#confirmmodal-'.$r['ticket_id'].'" data-toggle="tooltip" data-placement="bottom" title="Edit"><span class="glyphicon glyphicon-ok"></span></button>
            <button type="button" name="delete" id="'.$r['ticket_id'].'" class=" delete btn btn-danger"><span class="glyphicon glyphicon-trash"></span></button>
            </div>
            <div id="confirmmodal-'.$r['ticket_id'].'" class="modal fade" role="dialog" tabindex="-1" aria-labelledby="editLabel">
                <div class="modal-admin" role="document">
                    <div class="modal-content" style="width:70%; margin:auto;">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title" id="editLabel-'.$r['ticket_id'].'">Confirm Issue</h4>
                        </div>

                          <form method="POST" action="bc.php?action=confirm_issue">
                      <div class="modal-header">
                            <div class="form-inline">
                              <div class="form-group">
                                <label for="remarks">Remarks</label>
                                <input type="text" class="form-control" name="remarks" id="remarks">
                                </label
                              </div>
                              &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp

                              <div class="form-group">
                              <label for="status">Status</label>

                                <select class="selectpicker form-control"  name="status" id="status" >
                                    <optgroup label="Status"></optgroup>
                                    <option>Complete</option>
                                    <option>Pending</option>
                                    <option>Incomplete</option>
                                </select>

                              </div>
                              &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                              <div class="form-group">
                              <label for="tech">Tech</label>
                                <select class="selectpicker form-control"  name="tech" id="tech">
                                    <optgroup label="Tech"></optgroup>
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                </select>
                              </div>

                            </div>
                      </div>

                      <div class="modal-body">


                                <input type="hidden" value="'.$r['ticket_id'].'" name="ticket_id" id="id-'.$r['ticket_id'].'">
                                <div class="form-group">  
                                    <label for="employee">Employee Name</label>
                                     <input type="text" class="form-control" id="employee-'.$r['ticket_id'].'" value="'.$r['name'].'" name="name">
                                </div>

                                <div class="form-group">
                                <label for="department">Department</label>
                                <input type="text" class="form-control" value="'.$r['department'].'" name="department" id="department-'.$r['ticket_id'].'">
                                </div>

                                <div class="form-group">
                                <label for="concern">Issue</label>
                                <input type="text" class="form-control" value="'.$r['concern'].'" name="concern" id="concern-'.$r['ticket_id'].'">
                                </div>

                                <div class="form-group">
                                <label for="date">Date</label>
                                <input type="text" class="form-control" value="'.$r['date'].'" name="datelog" id="date-'.$r['ticket_id'].'" readonly>
                                </div>

                                <div class="form-group">
                                <label for="time">Time</label>
                                <input type="text" class="form-control" value="'.$r['time'].'" name="timelog" time="time-'.$r['ticket_id'].'" readonly>
                                </div>
                                <br>
                                <button type="submit" class="btn btn-info" value="confirm" name="update">Confirm</button>
                            </form>
                        </div>

                    </div>
               </div>


            </div>
            </td>

                </tr>';
            }
          }
      
          ?>

        </tr>
      </table>
      <div class="container">
        <h2> Number of Tickets </h2>
        <div id="chart"></div>
      </div>
 </div>
</div>
</body></html>
<script>
Morris.Bar({
 element : 'chart',
 data:[<?php echo $chart_data; ?>],
 xkey:'date',
 ykeys:['ticket'],
 labels:['Tickets'],
 hideHover:'auto',
 stacked:true
});
</script>
<script>
  $(function(){
    $(".delete").click(function(){
      var del_id = $(this).attr('id');
      var $ele = $(this).parent().parent().parent();

      if(confirm("Delete this Ticket?"))
      {
        $.ajax({
          type:'POST',
          url:'deleteticket.php',
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