<html>
<head>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet"/>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
 
  	<link rel="icon" href="ergo_icon.png" >
  	<link href="css/header.css">

  <style>
	
		
		.navbar {
			position: relative;
			height:90px;
			margin-bottom:0px;
		}
		.navbar-brand {
			padding-top: 25px;
			padding-left:40px;
		}
		
		
		.navbar-nav{
			padding-top:20px;
			padding-right:40px;
		}
		
		.navbar-nav li{
			font-family:"Courier New";
			font-size:18px;
			
		}
		
		
		.dropdown:hover .dropdown-menu {
			display: block;
			margin-top: 0; // remove the gap so it doesn't close
		 }
		
		.popover{
			width:280px;
			height:300px; 
		}
		
		#login {
			font-family:"Courier New";
			font-size:17px;
			height:300px;
			width:300px;

			
		}
		
		#login button{
			font-family:"Courier New";
			font-size:17px;
			
		}
		
  </style>
</head>
<body>

<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#"><img src="ergo.png" width="99"></a>
	 
    </div>
    <ul class="nav navbar-nav navbar-right" role="tablist">
      <li><a href="bc.php?action=index">Home</a></li>
      
      <li class="dropdown">
	  <a class="dropdown-toggle" data-toggle="dropdown" href="#">Support<span class="caret"></span></a>
		<ul class="dropdown-menu" role="menu">
			<li><a href="bc.php?action=ticketpage">Add Ticket</a></li>
			<li><a href="bc.php?action=ergoemployee">Employee Directory</a></li>
            <li><a href="bc.php?action=faq">FAQs</a></li>
        </ul>
		</li>
      <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Contact Us<span class="caret"></span></a>
		<ul class="dropdown-menu" role="menu">
            <li><a href="">Skype</a></li>
			<li><a href="#">About Us</a></li>
        </ul>
	  </li>
	      	  
      <li><a href="bc.php?action=news_list">Announcement</a></li>
   
    	<li class="dropdown">
          <a href="dropdown-toggle" data-toggle="dropdown"><img src="thlarge.png" witdh="25px" height="25px"></a>
              <ul class="dropdown-menu" role="menu">
                <?php 
                  if(isset($_SESSION['username']))
                    {
                      echo  '
                              <li><a href="">Meet The Team</a></li>
                              <li><a href="bc.php?action=dashboard"><span class="glyphicon glyphicon-user"></span>&nbspAdmin</a></li>  
                            ';
                    }
                    else
                    {
                      echo  '
                              <li><a href="">Meet The Team</a></li>
                              <li><a href="loginpage.php" >Login </a></li>
                            ';
                    }
                 ?>
            
              </ul>
       </li>
  	</ul>
  </div>

</nav>
 





</body>
</html>

