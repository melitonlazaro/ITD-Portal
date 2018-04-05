<?php
function add_brgyclearance()
{
	// connect to the server
	include"./config.inc.php";
	$conn = mysqli_connect($host,$user,$pass,$db);

	// check the connection
	if( mysqli_connect_errno($conn) ){
		echo "Error connecting to MySQL server!";
	}
		$LastName= ucwords($_POST['lname']);
		$FirstName = ucwords($_POST['fname']);
		$Initial = ucwords($_POST['minitial']);
		$Address = ucwords($_POST['address']);
		$Purpose = ucwords($_POST['purpose']);
		$Email = $_POST['email'];
		$PersonType = "N/A";
		$Type = "Barangay Clearance";
		$Status = "1";
		$PersonID = "0";
		$Date = date("Y-m-d");
		$DateOfAppointment = date("Y-m-d", strtotime("+3 days"));


		if(empty($FirstName))
		{
			echo '<script language="javascript">';
			echo 'alert("Please fill up First Name!")';
			echo '</script>';
		}
		else if(empty($LastName))
		{
			echo '<script language="javascript">';
			echo 'alert("Please fill up Last Name!")';
			echo '</script>';
		}
		else if(empty($Initial))
		{
			echo '<script language="javascript">';
			echo 'alert("Please fill up Middle Initial!")';
			echo '</script>';
		}
		else if(strlen($Initial)!='1')
		{
			echo '<script language="javascript">';
			echo 'alert("Please enter only your Middle Initial!")';
			echo '</script>';
			echo "strlen($Initial)";
		}
		else if(empty($Address))
		{
			echo '<script language="javascript">';
			echo 'alert("Please fill up Address!")';
			echo '</script>';
		}
		else if(empty($Purpose))
		{
			echo '<script language="javascript">';
			echo 'alert("Please indicate your Purpose!")';
			echo '</script>';
		}
		else if(empty($Email))
		{
			echo '<script language="javascript">';
			echo 'alert("Please enter your Email Address!")';
			echo '</script>';
		}
		else
		{
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


			$sql = "INSERT INTO referencenumber_table VALUES(NULL)";
			if(mysqli_query($conn, $sql)){
				$ReferenceID = mysqli_insert_id($conn);
				}else{
				}
			$sql = "INSERT INTO certificate_table VALUES(NULL, '$PersonID', '$Type', '$Purpose', '$Status', '$Date', '$DateOfAppointment', '$Email','$ReferenceID')";
			if(mysqli_query($conn, $sql)){
				echo '<script language="javascript">';
				echo 'alert("Successfully Submitted!")';
				echo '</script>';

				require 'Email\PHPMailerAutoload.php';
				$mail = new PHPMailer;
				require ("fpdf/fpdf.php");
				$pdf = new FPDF();
				$pdf->AddPage();


				$pdf->Image ('images/pasaylogoweb.gif',10,10,30,30,'GIF');
				$pdf->SetFont ('Courier', '', 15);
				$pdf->Text (65,20, "Republic of the Philippines");
				$pdf->Text (85,26, "City of Pasay");
				$pdf->Text (75,33, "Barangay 72, Zone 9");
				$pdf->Image ('images/6f55e74f66311f4ba0380d2800a86332_philippines-flag-and-emblem-philippines-flag-logo-clipart_2356-2356.jpeg',
							170,10,30,30,'JPEG');

				// Barangay Clearance
					$pdf->SetXY (20,50);
					$pdf->SetFont ('Arial', 'BU',  15);
					$pdf->Cell (170,10, 'BARANGAY CLEARANCE ', 0, 2, 'C');

				// Control #
					$pdf->SetXY (20,70);
					$pdf->SetFont ('Courier', 'B', 12);
					$pdf->MultiCell (35,6, "Reference No.  $ReferenceID", 1, 2);

				// Date Issued
					$pdf->SetXY (120,70);
					$pdf->SetFont ('Courier', 'UB', 9);
					$pdf->Cell (40,6, "Date Issued:", 0, 2, 'C');

					$pdf->SetXY (160, 70);
					$pdf->SetFont ('Courier', 'UB', 9);
					$pdf->Cell (40,6, "{$Date}", 0, 2, 'C');

				// Date of Appointment
					$pdf->SetXY (120, 76);
					$pdf->SetFont ('Courier', 'UB', 9);
					$pdf->Cell (40,6, "Date of Appointment:", 0, 2, 'C');

					$pdf->SetXY (160, 76);
					$pdf->SetFont ('Courier', 'UB', 9);
					$pdf->Cell (40,6, "Till $DateOfAppointment", 0, 2, 'C');

				// Name
					$pdf->SetXY (30,90);
					$pdf->SetFont ('Courier', '', 12);
					$pdf->Cell (30,10, "Name: ", 0, 2);

					$pdf->SetXY (60,90);
					$pdf->SetFont ('Courier', 'UB', 12);
					$pdf->Cell (30,10, "{$LastName}, {$FirstName} {$Initial}.", 0, 2);

				// Address
					$pdf->SetXY (30,100);
					$pdf->SetFont ('Courier', '', 12);
					$pdf->Cell (30,10, "Address:", 0, 2);

					$pdf->SetXY (60,100);
					$pdf->SetFont ('Courier', 'UB', 12);
					$pdf->Cell (30,10, "{$Address}", 0, 2);

				// Purpose
					$pdf->SetXY (30,110);
					$pdf->SetFont ('Courier', '', 12);
					$pdf->Cell (30,10, "Purpose:", 0, 2);

					$pdf->SetXY (60,110);
					$pdf->SetFont ('Courier', 'UB', 12);
					$pdf->Cell (30,10, "{$Purpose}", 0, 2);

				// Signature
					$pdf->Line (150,128,190,128);
					$pdf->SetFont ('Courier', '', 8);
					$pdf->Text (162,131, "Signature");

				// Note
					$pdf->SetXY (20,140);
					$pdf->SetFont ('Courier', 'B', 9);
					$pdf->SetFillColor (155, 200, 150);
					$pdf->MultiCell (170,5, "Note: Please proceed to barangay hall and present 2 government valid ID's (e.g. Driver's License, SSS, Passport etc.)", 1, 2, 'J');
					//$pdf->Cell (170,8, " (e.g. Driver's License, SSS, Passport etc.) ",0, 2, 'C', 'true');
				// $filename = "C:\Users\Public\Documents\SampleClearance1.pdf";
					ob_end_clean();
					$pdf->output('');

					$mail->isSMTP();                                      // Set mailer to use SMTP
					$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
					$mail->SMTPAuth = true;                               // Enable SMTP authentication
					$mail->Username = 'brgymis@gmail.com';                 // SMTP username
					$mail->Password = 'brgy12345';                           // SMTP password
					$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
					$mail->Port = 587;                                    // TCP port to connect to

					$mail->setFrom('brgymis@gmail.com', 'Barangay MIS');
					$mail->addAddress($Email);     // Add a recipient

					$mail->Subject = 'Form Stub';
					$mail->Body    = 'Thank you for your application! Please comply to the requirements needed. Download the file below and present it to the Barangay Hall on or before your appointment date.';
					$mail->AddStringAttachment($pdf, 'Form Stub.pdf', 'base64', 'application/pdf');
					$mail->Send();

			}else{
				echo "Please try again.";
			}
		}
}

?>
