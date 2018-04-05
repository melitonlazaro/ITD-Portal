<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="keywords" content="footer, basic, centered, links" />

		<script src="js/jscookmenu.min.js"></script>
		<script src="js/jquery-1.12.4.min.js"></script>
		<script src="js/wb.carousel.min.js"></script>
		<script src="js/bootstrap.js"></script>
		<script src="js/npm.js"></script>

		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
   		<link href="css/bootstrap.min.css" rel="stylesheet">
   		<script src="js/bootstrap.min.js"></script>
   		<link href="css/Dashboard.css" rel="stylesheet">
   	<style type="text/css">
   	div#myDIV 
   	{
    position:fixed;
    width:20%;
    height:5%;
   
   
    right:0%;
    bottom:2%;
	}
	#labels
	{
		font-size: 20px;
	}

	
   	</style>	

	</head>

	<body>
			 <!-- 92CD00	FFCF79	E5E4D7	2C6700 -->
		<div id="myDIV">
			<a href="skype:live:jcastro_379 live:acahapay?chat">
				<span class="label label-info pull-right" id="labels"><img src="skype-icon.png" width="30px" height="30px">&nbspChat with us!</span>
			</a>
		</div>

<?php include "header_sub.php"; ?>






		<div clas="container">
			<div class="container">

				<h1>Frequently Asked Questions </h1>
				<br>
				<br>
				<p>Before contacting us regarding the technical issue, we have provided an FAQ about common Technical Concerns. If for some 
					reason you don't see a response for your problem, you can send us a Ticket through our <em><a href="#">Ticketing System </a></em> or a <em><a href="skype:live:jcastro_379 live:acahapay?chat">Live Chat</a></em> via Skype
				 </p>
				<br>

				<ul>
					<li>I have no Internet Connection</li>
					<li>My Mouse/Keyboard is not working</li>
					<li>My Screen displays nothing</li>
					<li>My Flash Drive (USB) isn't showing up in My computer</li>
					<li>I can't access some Websites</li>
					<a href="#slow"><li>My Computer is extremely slow</li></a>
					<li>I can't Print</li>
					<li>The screen Freeze</li>
				</ul>
				<br><br><br>
				<p class="lead">
					I have no Internet Connection
				</p>
					<p>This is one of the common Technical Concern we encounter everyday. Often the problem is caused by a bad cable or a device with a "Flight Mode" turned on. You need to ensure these first:</p>
				<ul>
					<li> Check if your LAN Cable is properly inserted into the Ethernet Port</li>
					<li> Ensure your wireless adapter is enabled <em>(Laptop Only)</em></li>
				</ul>
					<p>If these are present and your Computer still displays a Warning Sign logo, indicating that you still have no Internet Connection. follow these steps:</p>
				<ol>
					<li>Click Windows Start Button and search for CMD.exe OR Press <em>Windows + R</em> and type "cmd"</li><br>
					<div class="align-right">
						<a target="_blank" href="windows.png"><img src="windows.png" class="img-thumbnail "></a><br><br>
						<a target="_blank" href="cmd.png"><img src="cmd.png" class="img-thumbnail float-righ"></a><br><br>
				
					</div>
					<li>Type "ipconfig /release" then hit "Enter"</li>
					<br>
					<a target="_blank" href="release.png"><img src="release.png" class="img-thumbnail float-righ"></a><br><br>
					<p> <em>The "ipconfig /release" command release the IP address for the specified adapter</em> </p>
					<br>
					<li>After the prompt returns, Type "ipconfig /renew" then hit "Enter"</li>
					<br>
					<a target="_blank" href="renew.png"><img src="renew.png" class="img-thumbnail float-righ"></a><br><br>
					<p> <em>The "ipconfig /renew" command renews the IP address for the specified adapter</em> </p>
					<br>
					<li>Check your Internet Connection</li>
				</ol>
				<br><br>
				<p class="lead">
					My Mouse/Keyboard is not working
				</p>
				<p>Here are some ways to troubleshoot your device:</p>
				<ul>
					
					<li>Check if it is properly inserted in its respective USB Ports.</li>
					<li>Try inserting your USB Devices again in its respective USB Ports.</li>
					<li>If it is a <a target="_blank" href="ps2-ports.jpg">PS/2</a> Port Type, you need to restart your Computer after inserting a PS/2 Type Devices.  </li> 
					
				</ul>
				<br><BR>

				<p class="lead">
					My Screen displays nothing
				</p>
				<ul>
					<li>Check the connection between the Computer and the Screen, check if it is plugged.</li>
					<li>If you are using a Laptop, contact the IT admin to have it assessed immediately. </li>
				</ul>
				<br><br>
				<p class="lead">
					My Flash Drive(USB) isn't showing up in My Computer
				</p>
				<ul>
					<li>Try different USB Port and check if it recognize your Flash Drive</li>
					<li>Check your Flash Drive in another computer</li>
				</ul>
				<br><br>

				<p class="lead">
					I can't access some Websites
				</p>
				<ul>
					<li>Due to company's policy, some websites are blocked according to their categories.</li>
				</ul>
				<br><br>

				<p class="lead" id="slow">
					My Computer is extremely slow
				</p>
				There are few notable things that slows down your computer:
						<ul>
							<li>You have a lot of windows and tabs open </li>
							<li>Your Computer has malware</li>
							<li>Your computer was running for a long time without reboot</li>
							<li>Not enough of Free Hard Drive space.</li>
							<li>Outdated Softwares </li>
						</ul>
			
				<br><br>
				
				<p class="lead">
					I can't Print
				</p>
				<p>This issue may also be caused by some factors:</p>
				<ul>
					<li>Is the printer plugged in and switched on? </li>
					<li>Is there enough paper in the Paper Tray?</li>
					<li>Is there enough ink in the toner?</li>
					<li>is the "Check Printer Offline" left unchecked?</li>
				</ul>
				<br><br>
				<p class="lead">
					The Screen Freeze
				</p>
				<p>When your computer freezes, you have no other option but to restart your Computer which leads to losing any unsaved works.</p>
				<p>Freeze can be caused by:</p>
				<ul>
					
					<li>Insufficient RAM</li>
					<li>Corrupted or missing files</li>
					<li>Driver Corruption or Errors</li>
					<li>Overheating</li>
					<li>Spyware</li>
				</ul>
				<br><br>
			</div>
		</div>



	</body>
</html>