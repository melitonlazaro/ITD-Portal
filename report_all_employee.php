<?php

$conn = new mysqli('localhost', 'root', '');   
mysqli_select_db($conn, 'ojt');   
  
$setSql = "SELECT * FROM `employee`";  
$setRec = mysqli_query($conn,$setSql);  

$columnHeader = '';  
$columnHeader = "Employee ID" . "\t" . "First Name" . "\t" . "Last Name" . "\t" . "Department" . "\t" . "Location" . "\t" . "Directory" . "\t" . "Email" . "\t" . "Status" ;  
  
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
header("Content-Disposition: attachment; filename=Employee Directory Report$date).xls");  
header("Pragma: no-cache");  
header("Expires: 0");  
  
echo ucwords($columnHeader) . "\n" . $setData . "\n";  
  
?>  










?>