<html>
<head>
  
    <style type="text/css">
    #tablehead
    {
      background-color: #343d46;
      color: white;
    }
    </style>
</head>
<body>


<?php  
 //pagination.php  
 $connect = mysqli_connect("localhost", "root", "", "ojt");  
 $record_per_page = 30;  
 $page = '';  
 $output = '';  
 if(isset($_POST["page"]))  
 {  
      $page = $_POST["page"];  
 }  
 else  
 {  
      $page = 1;  
 }  
 $start_from = ($page - 1)*$record_per_page;  
 $query = "SELECT * FROM employee ORDER BY employee_id DESC LIMIT $start_from, $record_per_page";  
 $result = mysqli_query($connect, $query);  
 $output .= "  
      <table class='table table-bordered table-hover '>  
           <tr id='tablehead'>  
              <th>First Name</th>
              <th>Last Name</th>
              <th>Department</th>
              <th>Location</th>
              <th>Local Directory</th>
              <th colspan='2'>Email</th>          
              <th>Status</th>
              <th>Action</th>
            </tr>  
 ";  
 while($row = mysqli_fetch_array($result))  
 {  
      $output .= '  
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
 $output .= '</table><br /><div align="center">';  
 $page_query = "SELECT * FROM employee ORDER BY employee_id DESC";  
 $page_result = mysqli_query($connect, $page_query);  
 $total_records = mysqli_num_rows($page_result);  
 $total_pages = ceil($total_records/$record_per_page);  
 for($i=1; $i<=$total_pages; $i++)  
 {  
      $output .= "<span class='pagination_link' style='cursor:pointer; padding:6px; border:1px solid #ccc;' id='".$i."'>".$i."</span>";  
 }  
 $output .= '</div><br /><br />';  
 echo $output;  
 ?>  

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