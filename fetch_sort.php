<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/bootstrap.min.css">
<script src="js/jquery-1.12.4.min.js"></script>
<script src="js/bootstrap.min.js"></script>


</head>
<body>





<?php
//fetch.php
$connect = mysqli_connect("localhost", "root", "", "ojt");
$output = '';




if(isset($_POST["query"]))
{

 $search = mysqli_real_escape_string($connect, $_POST["query"]);
 $location = $_GET['location'];
 $query = "
  SELECT * FROM employee 
  WHERE first_name LIKE '%".$search."%'
  OR last_name LIKE '%".$search."%' 
  AND location = '$location'
  ";
}
else
{
 $location = $_GET['location'];
 $query = "
 SELECT * FROM employee ORDER BY employee_id"
 ;
}
$result = mysqli_query($connect, $query);

if($result === FALSE)
{
  mysqli_error();
}
else
{
if(mysqli_num_rows($result) > 0)
{
 $output .= '
      
      <table class="table table-striped table-hover table-bordered">
        <tr>
          
          <th>First Name</th>
          <th>Last Name</th>
          <th>Department</th>
          <th>Location</th>
          <th>Local Directory</th>
          <th colspan="2">Email</th>          
          <th>Status</th>

        
        </tr>';
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

   </tr>

  ';
 }
       

 


echo $output;

}

else
{
  echo "Employee record not found.";
}
}
?>

</body>

</html>

