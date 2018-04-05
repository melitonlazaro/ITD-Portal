<?php 
error_reporting(0);
session_start();
  if(!isset($_SESSION['username']))
  {
    header('location:loginpage.php');
  }
 ?>

<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="js/jscookmenu.min.js"></script>
	<script src="js/jquery-1.12.4.min.js"></script>
	<script src="js/wb.carousel.min.js"></script>

    <link href="css/bootstrap.min.css" rel="stylesheet">



<style type="text/css">

.sidenav 
{
    height: 100%;
    width: 0;
    position: fixed;
    z-index: 1032;
    top: 0;
    left: 0;
    background-color: #343d46;
    color:white;
    overflow-x: hidden;
    transition: 0.3s;
    padding-top: 60px;
    opacity: 0.95;
}

.sidenav a 
{
    padding: 8px 8px 8px 8px;
    text-decoration: bold;
    font-family: Arial;
    font-size: 18px;
    color: #818181;
    display: block;
    transition: 3s.	0;
}

.sidenav a:hover, .offcanvas a:focus{
    color: #33cc00;
}

.closebtn {
    position: absolute;
    top: 20px;
    right: 25px;
    font-size: 36px;
    margin-left: 50px;
}

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}
#sidenav_title
{
  font-size: 20px;
  font-family: Arial;
  background-color: #33cc00;
}
#ergo_logo
{
  position: relative;
  top: -59%;
  left:10%;
}

</style>

</head>
<body>

<nav class="navbar navbar-default navbar-fixed-top" id="admin_nav">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
    
      <a class="navbar-brand" onclick="openNav()" >
      <p ><span class="glyphicon glyphicon-menu-hamburger" style="cursor:pointer" id="hamburger_toggle"></p></a>
      <a class="navbar-brand" href="bc.php?action=index">
        <img alt="Brand" src="ergo.png" height="30px" id="ergo_logo" >
      </a>
 
    </div>
</div>
</nav>
</body>

<div id="mySidenav" class="sidenav">
<br>
  <div id="sidenav_title">
    <center> 

      <p id="side_title">IT Department</p>
    </center>
  </div>
  <div class="container">

  	<p class="closebtn" onclick="closeNav()" style="cursor:pointer">&times;</p>
  </div>
  <a href="bc.php?action=dashboard"><span class="glyphicon glyphicon-dashboard"></span>&nbsp Dashboard</a>
  <a href="bc.php?action=tickets" ><span class="glyphicon glyphicon-list-alt"></span>&nbsp Technical Support</a>
  <a href="bc.php?action=manage_employee"><span class="glyphicon glyphicon-user"></span>&nbsp Employee Portal</a>
  <a href="#" ><span class="glyphicon glyphicon-list-alt"></span>&nbsp Inventory</a>
  <a href="bc.php?action=show_news"><span class="glyphicon glyphicon-comment"></span>&nbsp News</a>
  <a href="report.php"><span class="glyphicon glyphicon-file"></span>&nbsp Report</a>
  <a href="settings.php" ><span class="glyphicon glyphicon-cog"></span>&nbsp Settings</a>
  <a href="bc.php?action=logout"><span class="glyphicon glyphicon-log-out"></span>&nbsp Logout
    <p>&nbsp&nbsp (<?php echo $_SESSION['username']; ?>) </p>
  </a>

</div>



</html>
<script>

function openNav() {
    document.getElementById("mySidenav").style.width = "220px";
}

function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
}

</script>