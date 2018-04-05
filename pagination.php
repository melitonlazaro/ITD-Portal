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
 $record_per_page = 10;  
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
 $query = "SELECT * FROM daily_log ORDER BY ticket_id DESC LIMIT $start_from, $record_per_page";  
 $result = mysqli_query($connect, $query);  
 $output .= "  
      <table class='table table-bordered table-hover '>  
           <tr id='tablehead'>  
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
 ";  
 while($row = mysqli_fetch_array($result))  
 {  
      $output .= '  
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
 $output .= '</table><br /><div align="center">';  
 $page_query = "SELECT * FROM daily_log ORDER BY ticket_id DESC";  
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