<?php
function add_brgyclearance()
{
	// connect to the server
	$conn = mysqli_connect("localhost","root","123456789","barangay");

	// check the connection
	if( mysqli_connect_errno($conn) ){
		echo "Error connecting to MySQL server!";
	}
		$LastName= ucwords($_POST['lname']);
		$FirstName = ucwords($_POST['fname']);
		$Initial = ucwords($_POST['minitial']);
		$Address = ucwords($_POST['address']);
		$Purpose = ucwords($_POST['purpose']);
		$PersonType = "N/A";
		$PersonID = "0";
		$sqlperson="SELECT Person_ID, Lastname, FirstName, Initial FROM person_table";
		
		if ($result=mysqli_query($conn,$sqlperson))
		{
		  // Fetch one and one row
		  while ($row=mysqli_fetch_row($result))
			{
				if ($LastName == $row[1] && $FirstName == $row[2] && $Initial == $row[3])
				{
					$PersonID = $row[0];
				}
			}
			if ($PersonID == "0")
			{
					$sqlperson = "INSERT INTO person_table VALUES(NULL, '$LastName', '$FirstName', '$Initial', '$Address', '$PersonType')";
					if(mysqli_query($conn, $sqlperson)){
					$PersonID = mysqli_insert_id($conn);
					}else{
					}
			}
		  // Free result set
		  mysqli_free_result($result);
		}
		$Type = "Barangay Clearance";
		$Status = "1";
		$Date = date("Y-m-d");
		
		$sql = "INSERT INTO certificate_table VALUES(NULL, '$PersonID', '$Type', '$Purpose', '$Status', '$Date')";
		if(mysqli_query($conn, $sql)){
			echo '<script language="javascript">';
			echo 'alert("Successfully Submitted!")';
			echo '</script>';
			
		}else{
			echo "Please try again.";
		}
		
	
}

function pdf_brgyclearance()
{
	if (!empty($_POST['submit']))
	{
	$firstname= $_POST['fname'];
	$lastname= $_POST['lname'];
	$middleinitial= $_POST['minitial'];
	$Address = $_POST['address'];
	$Purpose = $_POST['purpose'];
	
	
	require ("fpdf/fpdf.php");
	$pdf = new FPDF();
	$pdf->AddPage();


	$pdf->Image ('Brgy_Layout/pasaylogoweb.gif',10,10,30,30,'GIF');
	$pdf->SetFont ('Courier', '', 15);
	$pdf->Text (65,20, "Republic of the Philippines");
	$pdf->Text (85,26, "City of Pasay");
	$pdf->Text (75,33, "Barangay 123 Zone 45");
	$pdf->Image ('Brgy_Layout/6f55e74f66311f4ba0380d2800a86332_philippines-flag-and-emblem-philippines-flag-logo-clipart_2356-2356.jpeg',
				170,10,30,30,'JPEG');
				
	// Barangay Clearance
		$pdf->SetXY (20,50);
		$pdf->SetFont ('Arial', 'BU',  15);
		$pdf->Cell (170,10, 'BARANGAY CLEARANCE ', 0, 2, 'C');			
	
	// Control #
		$pdf->SetXY (20,70);
		$pdf->SetFont ('Courier', 'B', 12);
		$pdf->Cell (35,10, 'Control No. ', 1, 2);

	// Name
		$pdf->SetXY (30,85);
		$pdf->SetFont ('Courier', '', 12);
		$pdf->Cell (30,10, "Name: ", 0, 2);
		
		$pdf->SetXY (60,85);
		$pdf->SetFont ('Courier', 'B', 12);
		$pdf->Cell (30,10, "{$firstname} {$middleinitial}. {$lastname}", 0, 2);

	// Address
		$pdf->SetXY (30,95);
		$pdf->SetFont ('Courier', '', 12);
		$pdf->Cell (30,10, "Address:", 0, 2);
		
		$pdf->SetXY (60,95);
		$pdf->SetFont ('Courier', 'B', 12);
		$pdf->Cell (30,10, "{$Address}", 0, 2);
	
	// Purpose
		$pdf->SetXY (30,105);
		$pdf->SetFont ('Courier', '', 12);
		$pdf->Cell (30,10, "Purpose:", 0, 2);
		
		$pdf->SetXY (60,105);
		$pdf->SetFont ('Courier', 'B', 12);
		$pdf->Cell (30,10, "{$Purpose}", 0, 2);
	
	// Note
		$pdf->SetXY (20,125);
		$pdf->SetFont ('Courier', '', 8);
		$pdf->SetFillColor (155, 200, 150);
		$pdf->Cell (170,8, "Note: Please proceed to barangay hall and present 2 government valid ID's. ", 1, 2, 'C', 'true');


	// $filename = "C:\Users\Public\Documents\SampleClearance1.pdf";
	$pdf->output('D');
}

}


function add_certificateofindigency()
{
	// connect to the server
	$conn = mysqli_connect("localhost","root","","barangay");

	// check the connection
	if( mysqli_connect_errno($conn) ){
		echo "Error connecting to MySQL server!";
	}
		$LastName= ucwords($_POST['lname']);
		$FirstName = ucwords($_POST['fname']);
		$Initial = ucwords($_POST['minitial']);
		$Address = ucwords($_POST['address']);
		$Purpose = ucwords($_POST['purpose']);
		$PersonType = "N/A";
		$PersonID = "0";
		$sqlperson="SELECT Person_ID, Lastname, FirstName, Initial FROM person_table";
		if ($result=mysqli_query($conn,$sqlperson))
		{
		  // Fetch one and one row
		  while ($row=mysqli_fetch_row($result))
			{
				if ($LastName == $row[1] && $FirstName == $row[2] && $Initial == $row[3])
				{
					$PersonID = $row[0];
				}
			}
			if ($PersonID == "0")
			{
					$sqlperson = "INSERT INTO person_table VALUES(NULL, '$LastName', '$FirstName', '$Initial', '$Address', '$PersonType')";
					if(mysqli_query($conn, $sqlperson)){
					$PersonID = mysqli_insert_id($conn);
					}else{
					}
			}
		  // Free result set
		  mysqli_free_result($result);
		}
		$Type = "Certificate of Indigency";
		$Status = "1";
		$Date = date("Y-m-d");
		
		$sql = "INSERT INTO certificate_table VALUES(NULL, '$PersonID', '$Type', '$Purpose', '$Status', '$Date')";
		if(mysqli_query($conn, $sql)){
			echo '<script language="javascript">';
			echo 'alert("Successfully Submitted!")';
			echo '</script>';
		}else{
			echo "Please try again.";
		}
}
function add_goodmoralcertificate()
{
	// connect to the server
	$conn = mysqli_connect("localhost","root","","barangay");

	// check the connection
	if( mysqli_connect_errno($conn) ){
		echo "Error connecting to MySQL server!";
	}
		$LastName= ucwords($_POST['lname']);
		$FirstName = ucwords($_POST['fname']);
		$Initial = ucwords($_POST['minitial']);
		$Address = ucwords($_POST['address']);
		$Purpose = ucwords($_POST['purpose']);
		$PersonType = "N/A";
		$PersonID = "0";
		$sqlperson="SELECT Person_ID, Lastname, FirstName, Initial FROM person_table";

		if ($result=mysqli_query($conn,$sqlperson))
		{
		  // Fetch one and one row
		  while ($row=mysqli_fetch_row($result))
			{
				if ($LastName == $row[1] && $FirstName == $row[2] && $Initial == $row[3])
				{
					$PersonID = $row[0];
				}
			}
			if ($PersonID == "0")
			{
					$sqlperson = "INSERT INTO person_table VALUES(NULL, '$LastName', '$FirstName', '$Initial', '$Address', '$PersonType')";
					if(mysqli_query($conn, $sqlperson)){
					$PersonID = mysqli_insert_id($conn);
					}else{
					}
			}
		  // Free result set
		  mysqli_free_result($result);
		}
		$Type = "Good Moral Certificate";
		$Status = "1";
		$Date = date("Y-m-d");

		
		$sql = "INSERT INTO certificate_table VALUES(NULL, '$PersonID', '$Type', '$Purpose', '$Status', '$Date')";
		if(mysqli_query($conn, $sql)){
			echo '<script language="javascript">';
			echo 'alert("Successfully Submitted!")';
			echo '</script>';
		}else{
			echo "Please try again.";
		}
}
function add_businesspermit()
{
	// connect to the server
	$conn = mysqli_connect("localhost","root","","barangay");

	// check the connection
	if( mysqli_connect_errno($conn) ){
		echo "Error connecting to MySQL server!";
	}
		$LastName= ucwords($_POST['lname']);
		$FirstName = ucwords($_POST['fname']);
		$Initial = ucwords($_POST['minitial']);
		$Address = ucwords($_POST['address']);
		$Kind = ucwords($_POST['kind']);
		$PersonID = "0";
		$PersonType = "N/A";
		$sqlperson="SELECT Person_ID, Lastname, FirstName, Initial FROM person_table";

		if ($result=mysqli_query($conn,$sqlperson))
		{
		  // Fetch one and one row
		  while ($row=mysqli_fetch_row($result))
			{
				if ($LastName == $row[1] && $FirstName == $row[2] && $Initial == $row[3])
				{
					$PersonID = $row[0];
				}
			}
			if ($PersonID == "0")
			{
					$sqlperson = "INSERT INTO person_table VALUES(NULL, '$LastName', '$FirstName', '$Initial', '$Address', '$PersonType')";
					if(mysqli_query($conn, $sqlperson)){
					$PersonID = mysqli_insert_id($conn);
					}else{
					}
			}
		  // Free result set
		  mysqli_free_result($result);
		}
		$Status = "1";
		$Date = date("Y-m-d");

		$sql = "INSERT INTO business_permit_table VALUES(NULL, '$PersonID', '$Kind', '$Status', '$Date')";
		if(mysqli_query($conn, $sql)){
			echo '<script language="javascript">';
			echo 'alert("Successfully Submitted!")';
			echo '</script>';
		}else{
			echo "Please try again.";
	}
}
function add_fileaction()
{
	// connect to the server
	$conn = mysqli_connect("localhost","root","","barangay");

	// check the connection
	if( mysqli_connect_errno($conn) ){
		echo "Error connecting to MySQL server!";
	}
		$LastNameC= ucwords($_POST['lnamec']);
		$FirstNameC = ucwords($_POST['fnamec']);
		$InitialC = ucwords($_POST['minitialc']);
		$AddressC = ucwords($_POST['addressc']);
		$LastNameR= ucwords($_POST['lnamer']);
		$FirstNameR = ucwords($_POST['fnamer']);
		$InitialR = ucwords($_POST['minitialr']);
		$AddressR = ucwords($_POST['addressr']);
		$DateOfMeeting = ucwords($_POST['date']);
		$sqlperson="SELECT Person_ID, Lastname, FirstName, Initial FROM person_table";
		$Date = date("Y-m-d");
		$PersonIDC = "0";
		$PersonType = "N/A";
		if ($result=mysqli_query($conn,$sqlperson))
		{
		  // Fetch one and one row
		  while ($row=mysqli_fetch_row($result))
			{
				if ($LastNameC == $row[1] && $FirstNameC == $row[2] && $InitialC == $row[3])
				{
					$PersonIDC = $row[0];
					$sqlcomplainant = "INSERT INTO complainant_table VALUES(NULL, '$PersonIDC', '$Date')";
					if(mysqli_query($conn, $sqlcomplainant)){
					$last_idC = mysqli_insert_id($conn);
					}else{
					}
				}
			}
			if ($PersonIDC == "0")
			{
					$sqlperson = "INSERT INTO person_table VALUES(NULL, '$LastNameC', '$FirstNameC', '$InitialC', '$AddressC', '$PersonType')";
					if(mysqli_query($conn, $sqlperson)){
					$PersonID = mysqli_insert_id($conn);
					}else{
					}
			}
		  // Free result set
		  mysqli_free_result($result);
		}
		$PersonIDR = "0";
		$sqlperson="SELECT Person_ID, Lastname, FirstName, Initial FROM person_table";
		if ($result=mysqli_query($conn,$sqlperson))
		{
		  // Fetch one and one row
		  while ($row=mysqli_fetch_row($result))
			{
				if ($LastNameR == $row[1] && $FirstNameR == $row[2] && $InitialR == $row[3])
				{
					$PersonIDR = $row[0];
					$sql = "INSERT INTO respondent_table VALUES(NULL, '$PersonIDR', '$Date')";
					if(mysqli_query($conn, $sql)){
					$last_idR = mysqli_insert_id($conn);
					}else{
					}
				}
			}
			if ($PersonIDR == "0")
			{
					$sqlperson = "INSERT INTO person_table VALUES(NULL, '$LastNameR', '$FirstNameR', '$InitialR', '$AddressR', '$PersonType')";
					if(mysqli_query($conn, $sqlperson)){
					$PersonID = mysqli_insert_id($conn);
					}else{
					}
			}
		  // Free result set
		  mysqli_free_result($result);
		}
		$Status = "1";
		
		$sql = "INSERT INTO complain_table VALUES(NULL, '$last_idC', '$last_idR', '$DateOfMeeting', '$Status', '$Date')";
		if(mysqli_query($conn, $sql)){
			echo '<script language="javascript">';
			echo 'alert("Successfully Submitted!")';
			echo '</script>';
		}else{
			echo "Please try again.";
		}
}
?>

