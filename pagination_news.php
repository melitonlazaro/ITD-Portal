<html>
<head>
  
    <style type="text/css">
    hr.style8:after
    {
      content: '';
      display: block;
      margin-top: 2px;
      border-top: 1px solid #8c8b8b;
      border-bottom: 1px solid #fff;
    }
    hr.style18:before 
    { 
      display: block; 
      content: ""; 
      height: 30px; 
      margin-top: -31px; 
      border-style: solid; 
      border-color: #8c8b8b; 
      border-width: 0 0 1px 0; 
      border-radius: 20px; 
    }
    a
    {
      color: black;
    }
    a:hover
    {
      color: #54a51c;
    }

    </style>
</head>
<body>


<?php  
 //pagination_news.php  
 $connect = mysqli_connect("localhost", "root", "", "ojt");  
 $record_per_page = 12;  
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
 $query = "SELECT * FROM announcement ORDER BY announcement_id DESC LIMIT $start_from, $record_per_page";  
 $result = mysqli_query($connect, $query);  
   

 while($r = mysqli_fetch_array($result))  
 {  
      $output .= '  
         <div class="row">
            <a href ="bc.php?id='.$r["announcement_id"].' " id="news_container">
              <div class="col-md-2">
                <br><br>
                <div class="container">
                  <div class="panel-body" id="date_time">
                    '.$r["date_published"].'
                    <br>
                    '.$r["time_published"].'
                    <br>
                    <span class="glyphicon glyphicon-user"></span>&nbsp'.$r["author"].'
                  </div>
                </div>
              </div>
              <div class="col-md-10"> 
                <div class="container-fluid" id="jumbotron_news">
                  <h2><b>'.$r["title"].'</b></h2>
                  <br>
                  <h6 id="lead">'.$r["lead"].'</h6>
                </div>
              </div>
            </a>
        </div>

            <hr class="style18">
      ';  
 }  
 $page_query = "SELECT * FROM announcement ORDER BY announcement_id DESC";  
 $page_result = mysqli_query($connect, $page_query);  
 $total_records = mysqli_num_rows($page_result);  
 $total_pages = ceil($total_records/$record_per_page);  

 $output .= "
              <nav aria-label='Page Navigation'>
              <ul class='pagination pagination-lg'>
            ";

 for($i=1; $i<=$total_pages; $i++)  
 {  
      $output .= " <li><span class='pagination_link' style='cursor:pointer;' id='".$i."'>".$i."</span> </li>
      ";  
 }  
 $output .= ' </ul></nav> <br /><br />';  
 echo $output;  
 ?>  

 </body>
</html>