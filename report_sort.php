<?php

$conn = new mysqli('localhost', 'root', '');   
mysqli_select_db($conn, 'ojt');   

$fromsort = $_POST["sortfromreport"];
$tosort = $_POST["sorttoreport"];

  
$setSql = "SELECT * FROM daily_log WHERE `date` between '$fromsort' and '$tosort' order by `ticket_id`"; 
$setRec = mysqli_query($conn,$setSql);  

$columnHeader = '';
 
$columnHeader = "Ticket Id" . "\t" . "Employee Name" . "\t" . "Department" . "\t" . "Concern" . "\t" . "Remarks" . "\t" . "Status" . "\t" . "Tech" . "\t" . "Date" . "\t" . "Time";  
  
$setData = '';  
  
while ($rec = mysqli_fetch_row($setRec)) {  
    $rowData = '';  
    foreach ($rec as $value) {  
        $value = '"' . $value . '"' . "\t";  
        $rowData .= $value;  
    }  
    $setData .= trim($rowData) . "\n";  
}  
  
$date = date("Y-m-d");

header("Content-type: application/octet-stream");  
header("Content-Disposition: attachment; filename=IT Log Reports($date).xls");  
header("Pragma: no-cache");  
header("Expires: 0");  
  
echo ucwords($columnHeader) . "\n" . $setData . "\n";  
  
?>  










?>