<html>
<head>
	<title></title>
	<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="keywords" content="footer, basic, centered, links" />

		<script src="js/jscookmenu.min.js"></script>
		<script src="js/jquery-1.12.4.min.js"></script>
		<script src="js/wb.carousel.min.js"></script>
		<script src="js/bootstrap.js"></script>
		<script src="js/npm.js"></script>
      <link rel="shortcut icon" href="favicon.png">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
   	<link href="css/bootstrap.min.css" rel="stylesheet">
   	<style type="text/css">
         #content
         {
            text-indent: 100px;
            text-align: justify;
         }
         #title
         {
            display: block;
            font-family: Times;
         }
         #lead
         {
            font-size: 20px;
            font-weight: 300;
            line-height: 2.0;
            color:#646565;
            font-family:Arial;

         }
         .breadcrumb
         {
            width: auto;
            white-space: nowrap;
            overflow: hidden;
            text-overflow:ellipsis;
         }
         .breadcrumb li
         {
            display: inline;
         }
         #other_news:hover
         {
            text-decoration: none;
         }
         #other_news_heading
         {
            background-color: #54a51c;
            color:white;
            font-size: 12px;
         }
         #other_news_lead
         {
            font-size: 12px;
            color:black;
         }
        
   	</style>
</head>
<body>

	<?php include "header_sub.php"; ?>
   <center>
      
         <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="bc.php?action=index">Home</a></li>
            <li class="breadcrumb-item"><a href="bc.php?action=news_list">News List </a></li>
            <li class="breadcrumb-item active"> <?php echo $result["title"];?></li>
         </ol>
     
   </center>
	<br><br><br>
   <div class="container-fluid">
      <div class="row">   
         <center>
            <div class="col-md-9">
               <div class="container-fluid">
                  <h1 id="title"> <?php echo $result["title"];?></h1>
                  <br>
                  <div class="container-fluid">   
                     <p id="lead"><?php echo $result["lead"]?> </p>
                  </div>  
                  <br><br><br>
                  <div class="container-fluid">
                     <p id="content" class="pull-left"> <?php echo $result["content"]; ?> </p>
                  </div>
                  <br><br><br>
                  <div class="container-fluid">
                     <p class="pull-left"> <?php echo $result["date_published"]; ?>
                     |
                     <?php echo $result["time_published"]; ?>
                     |
                     <span class="glyphicon glyphicon-user"></span> <?php echo $result["author"]; ?></p>
                  </div>
               </div>
            </div>
         </center>
         <div class="col-md-3">
            <br><br><br><br>
            <div class="container-fluid">
               <h3> Other News </h3>
               <?php foreach ($other_news as $on) 
               {
                echo '
                        <a href="bc.php?id='.$on["announcement_id"].'" id="other_news">
                           <div class="panel panel-default">
                              <div class="panel-heading" id="other_news_heading" >
                                 <p> '.$on["title"].' </p>
                              </div>
                              <div class="panel-body" id="other_news_lead">
                                 <p> '.$on["lead"].' </p>
                              </div>
                           </div>
                        </a>
                    ';
               } 
               ?>
            </div>
         </div>
      </div>
   </div>
   <br><br><br><br>
   <?php include "footer.php"; ?>
</body></html>