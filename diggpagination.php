<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="js/jscookmenu.min.js"></script>
	<script src="js/jquery-1.12.4.min.js"></script>
	<script src="js/wb.carousel.min.js"></script>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script>
    <link href="css/Dashboard.css" rel="stylesheet">
</head>
<body>



<?php
	/*
		Place code to connect to your DB here.
	*/
	include('config.inc.php');	// include your code to connect to DB.

	$tbl_name="announcement";		//your table name
	// How many adjacent pages should be shown on each side?
	$adjacents = 3;
	
	/* 
	   First get total number of rows in data table. 
	   If you have a WHERE clause in your query, make sure you mirror it here.
	*/
	$query = "SELECT COUNT(*) as num FROM $tbl_name";
	$total_pages = mysqli_fetch_array(mysqli_query($conn, $query));
	$total_pages = $total_pages['num'];
	
	/* Setup vars for query. */
	$targetpage = "diggpagination.php"; 	//your file name  (the name of this file)
	$limit = 1;								//how many items to show per page
	if(isset($_GET['page']))
	{
		$page = $_GET['page'];
	} 								
	else
	{
		$page = 1;
	}
	if($page) 
		$start = ($page - 1) * $limit; 			//first item to display on this page
	else
		$start = 0;								//if no page var is given, set start to 0
	
	/* Get data. */
	$sql = "SELECT * FROM $tbl_name LIMIT $start, $limit";
	$result = mysqli_query($conn, $sql);
	
	/* Setup page vars for display. */
	if ($page == 0) $page = 1;					//if no page var is given, default to 1.
	$prev = $page - 1;							//previous page is page - 1
	$next = $page + 1;							//next page is page + 1
	$lastpage = ceil($total_pages/$limit);		//lastpage is = total pages / items per page, rounded up.
	$lpm1 = $lastpage - 1;						//last page minus 1
	
	/* 
		Now we apply our rules and draw the pagination object. 
		We're actually saving the code to a variable in case we want to draw it more than once.
	*/
	$pagination = "";
	if($lastpage > 1)
	{	
		$pagination .= "<nav aria-label='Page Navigation'>";
		$pagination .= "<ul class='pagination'>";
	
		//previous button
		if ($page > 1) 
		{
			$pagination.= "<li class='page-item'>";
			$pagination.= "<a class='page-link' href=\"$targetpage?page=$prev\">previous</a>";
			$pagination.= "</li>";
		}	
		else
		{
			$pagination.= "<li class='page-item disabled'>";
			$pagination.= "<span class='page-link'>previous</span>";	
			$pagination.= "</li>";
		}	
		//pages	
		if ($lastpage < 7 + ($adjacents * 2))	//not enough pages to bother breaking it up
		{	
			for ($counter = 1; $counter <= $lastpage; $counter++)
			{
				if ($counter == $page)
				{
					$pagination.= "<li class='page-item active'>";
					$pagination.= "<span class='page-link''>$counter</span>";
					$pagination.= "</li>";
				}	
				else
				{
					$pagination.= "<li class='page-item '>";
					$pagination.= "<a class='page-link' href=\"$targetpage?page=$counter\">$counter</a>";					
					$pagination.= "</li>";
				}
			}
		}
		elseif($lastpage > 5 + ($adjacents * 2))	//enough pages to hide some
		{
			//close to beginning; only hide later pages
			if($page < 1 + ($adjacents * 2))		
			{
				for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++)
				{
					if ($counter == $page)
					{
						$pagination.= "<li class='page-item active'>";
						$pagination.= "<span class='page-link'>$counter</span>";
						$pagination.= "</li>";
					}	
					else
					{
						$pagination.= "<li class='page-item '>";
						$pagination.= "<a class='page-link' href=\"$targetpage?page=$counter\">$counter</a>";					
						$pagination.= "</li>";
					}
				}
				$pagination.= "<li class='page-item '>";
				$pagination.= "<a class='page-link href='#'>...</a>";
				$pagination.= "<a class='page-link' href=\"$targetpage?page=$lpm1\">$lpm1</a>";
				$pagination.= "<a class='page-link' href=\"$targetpage?page=$lastpage\">$lastpage</a>";		
				$pagination.= "</li>";

			}
			//in middle; hide some front and some back
			elseif($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2))
			{
				$pagination.= "<li class='page-item '>";
				$pagination.= "<a class='page-link' href=\"$targetpage?page=1\">1</a>";
				$pagination.= "<a class='page-link' href=\"$targetpage?page=2\">2</a>";
				$pagination.= "<a class='page-link href='#'>...</a>";
				$pagination.= "</li>";
	
			
				for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
				{
					if ($counter == $page)
					{
						$pagination.= "<li class='page-item active'>";
						$pagination.= "<span class='page-link' class=\"current\">$counter</span>";
						$pagination.= "</li>";
					}
					else
					{
						$pagination.= "<li class='page-item'>";
						$pagination.= "<a class='page-link' href=\"$targetpage?page=$counter\">$counter</a>";					
						$pagination.= "</li>";
					}
				}
				$pagination.= "<li class='page-item'>";
				$pagination.= "<a class='page-link href='#'>...</a>";
				$pagination.= "<a class='page-link' href=\"$targetpage?page=$lpm1\">$lpm1</a>";
				$pagination.= "<a class='page-link' href=\"$targetpage?page=$lastpage\">$lastpage</a>";		
				$pagination.= "</li>";

			}
			//close to end; only hide early pages
			else
			{
				$pagination.= "<li class='page-item'>";
				$pagination.= "<a class='page-link' href=\"$targetpage?page=1\">1</a>";
				$pagination.= "<a class='page-link' href=\"$targetpage?page=2\">2</a>";
				$pagination.= "<a class='page-link href='#'>...</a>";
				$pagination.= "</li>";
	
				for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++)
				{
					if ($counter == $page)
					{
						$pagination.= "<li class='page-item active'>";
						$pagination.= "<span class='page-link'>$counter</span>";
						$pagination.= "</li>";
					}	
					else
					{
						$pagination.= "<li class='page-item'>";
						$pagination.= "<a class='page-link' href=\"$targetpage?page=$counter\">$counter</a>";					
						$pagination.= "</li>";
					}
				}
			}
		}
		
		//next button
		if ($page < $counter - 1) 
		{
			$pagination.= "<li class='page-item'>";
			$pagination.= "<a href=\"$targetpage?page=$next\">next </a>";
			$pagination.= "</li>";
		}
		else
		{
		$pagination.= "<li class='page-item disabled'>";
		$pagination.= "<span class='page-link'>next</span>";
		$pagination.= "</li>";
		}	
		$pagination .= "</ul>";
		$pagination .= "</nav>";	
	}
?>

	<?php
			echo '<table class="table table-bordered table-hover">  
                <tr id="tablehead">  
	            	<th>Announcement ID</th>
		            <th>Title</th>
		            <th>Author</th>
		            <th>Date Published</th>
		            <th>Time Published</th>          
		            <th>Actions</th>
	            </tr>
	            ';
		while($row = mysqli_fetch_array($result))
		{
	            		echo 
	            		'
	            			<tr>
	            			<td>'.$row['announcement_id'].'</td>
	            			<td>'.$row['title'].'</td>
	            			<td>'.$row['author'].'</td>
	            			<td>'.$row['date_published'].'</td>
	            			<td>'.$row['time_published'].'</td>
	            			<td>Actions up here</td>
	            			</tr>
	            		';
		}
			echo '</table>';
	?>

<?php 
echo '<center>';
echo $pagination;
echo '</center>';
?>
	</body>
</html>