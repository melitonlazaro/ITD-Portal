<?php
session_start();

function index_function()
{
	include "config.inc.php";

		$sql = "Select * from announcement ORDER BY announcement_id DESC LIMIT 4";

	//execute the query
	$result = mysqli_query($conn, $sql);

	//process the result=
	$record = array();
	if( $myrow=mysqli_fetch_array($result) ){
		do{
			$info = array();
			$info['announcement_id'] = $myrow['announcement_id'];
			$info['title'] = $myrow['title'];
			$info['lead'] = $myrow['lead'];
			$info['author'] = $myrow['author'];
			$info['date_published'] = $myrow['date_published'];
			$info['time_published'] = $myrow['time_published'];
		
			$record[] = $info;
		}while($myrow=mysqli_fetch_array($result));
	}
	

	return $record;
}

function user_login()
{
	include "config.inc.php";

	if(isset($_POST["username"]))
	{
	$username = $_POST["username"];
	$password = $_POST["password"];
	
	$query = " SELECT * FROM user WHERE `username` = '$username' AND  `password` = '$password' ";

	$result = mysqli_query($conn, $query);

	if(mysqli_num_rows($result) > 0)
	{
		$_SESSION['username'] = $username;
		return true;
	}
	else
	{
		return false;
	}

	}

}

function show_issues()
{
	// connect to the server
	include"config.inc.php";
	$conn = mysqli_connect($host,$user,$pass,$ojt);

	// check the connection
	if( mysqli_connect_errno($conn) ){
		echo "Error connecting to MySQL server!";
	}
	$sql = "Select * from daily_log ORDER BY ticket_id DESC";

	//execute the query
	$result = mysqli_query($conn, $sql);

	//process the result=
	$record = array();
	if( $myrow=mysqli_fetch_array($result) ){
		do{
			$info = array();
			$info['ticket_id'] = $myrow['ticket_id'];
			$info['employee'] = $myrow['employee'];
			$info['department'] = $myrow['department'];
			$info['conflict'] = $myrow['conflict'];
			$info['remarks'] = $myrow['remarks'];
			$info['status'] = $myrow['status'];
			$info['tech'] = $myrow['tech'];
			$info['date'] = $myrow['date'];
			$info['time'] = $myrow['time'];
			$record[] = $info;
		}while($myrow=mysqli_fetch_array($result));
	}
	

	return $record;
}

function change_user_password()
{
	$conn = mysqli_connect("localhost", "root", "", "ojt");
	$username = $_SESSION['username'];
	$old_password = $_POST['old_password'];
	$new_password = $_POST['new_password'];
	$confirm_password = $_POST['confirm_password'];
	if($new_password === $confirm_password)
	{
		die(mysqli_error($conn));
	}
	else
	{
		$query1 = "UPDATE user SET `password`='$new_password' WHERE `username`='$username' ";
		$result = mysqli_query($conn, $query1);
		if($result)
		{
			return TRUE;
		}
		else
		{
			die(mysqli_error($conn));
		}
	}
}

function create_new_account()
{
	$conn = mysqli_connect("localhost", "root", "", "ojt");
	$username = $_POST['username'];
	$password = $_POST['password'];
	$first_name = $_POST['first_name'];
	$last_name = $_POST['last_name'];
	$reg_date = date('Y-m-d');

	$query1 = "SELECT * FROM user WHERE `username`='$username'";
	$result = mysqli_query($conn, $query1);
	if(mysqli_num_rows($result) > 0)
	{
		return FALSE;
	}
	else
	{
		$query2 = "INSERT INTO user VALUES(NULL, '$username', '$password', '$first_name', '$last_name', '$reg_date'); ";
		$result1 = mysqli_query($conn, $query2);
		return FALSE;
	}

}

function count_pending_ticket()
{
	$conn = mysqli_connect("localhost", "root", "", "ojt");

	$query = "SELECT * FROM tickets";
	$result = mysqli_query($conn, $query);
	$count = mysqli_num_rows($result);

	return $count;
}

function count_employee()
{
	$conn = mysqli_connect("localhost", "root", "", "ojt");
	$query = "SELECT * FROM employee ";
	$result = mysqli_query($conn, $query);
	$count = mysqli_num_rows($result);
	return $count;
}

function count_department()
{
	$conn = mysqli_connect("localhost", "root", "", "ojt");
	$query = "SELECT DISTINCT(department), count(*) as employee FROM `employee` GROUP BY department";
	$result = mysqli_query($conn, $query);

	$record = array();
	if($myrow = mysqli_fetch_array($result))
	{
		do
		{
			$info = array();
			$info["department"] = $myrow["department"];
			$info["employee"] = $myrow["employee"];
			$record[] = $info;
		}
		while($myrow = mysqli_fetch_array($result));
	}

	return $record;
}

function count_location()
{
	$conn = mysqli_connect("localhost", "root", "", "ojt");
	$query = "SELECT DISTINCT(location), count(*) as employee FROM `employee` GROUP BY location";
	$result = mysqli_query($conn, $query);

	$record = array();
	if($myrow = mysqli_fetch_array($result))
	{
		do
		{
			$info = array();
			$info["location"] = $myrow["location"];
			$info["employee"] = $myrow["employee"]; 
			$record[] = $info;
		}
		while($myrow = mysqli_fetch_array($result));
	}
	return $record;
}

function completed_ticket()
{
	$conn = mysqli_connect("localhost", "root", "", "ojt");
	$date = date("Y-m-d");
	$query = "SELECT * FROM daily_log WHERE `date`='$date'";
	$result = mysqli_query($conn, $query);
	$count = mysqli_num_rows($result);
	return $count;
}

function incomplete_ticket()
{
	$conn = mysqli_connect("localhost", "root", "", "ojt");
	$date = date("Y-m-d");
	$query = "SELECT * FROM daily_log WHERE `date`='$date' and `status` ='Incomplete' ";
	$result = mysqli_query($conn, $query);
	$count = mysqli_num_rows($result);
	return $count;
}

function AddIssue_Mdl() // User inputs value into daily log
{
	$conn = mysqli_connect("localhost","root","","ojt");

	if( mysqli_connect_errno($conn)){
		echo "Error connecting to MySQL server!";
	}
	$employee = $_POST["employee"];
	$conflict = $_POST["conflict"];
	$remarks = $_POST["remarks"];
	$tech = $_POST["tech"];
	$department = $_POST["department"];
	$status = $_POST["status"];
	$date = date("Y-m-d");
	$time =date("h:i A");

	$query = "INSERT INTO daily_log values(NULL, '$employee', '$department', '$conflict', '$remarks', '$status', '$tech', '$date', '$time')";
	$result = mysqli_query($conn, $query);
	
	if($result)
	{
		return $result;
	}
	else
	{
		echo("Error description: " . mysqli_error($conn));
	}
}

function EditIssue_Mdl()
{
	$conn = mysqli_connect("localhost","root","","ojt");
	
	$id1=$_POST['id'];
	$remarks1=$_POST['remarks'];
	$conflict1=$_POST['conflict'];
	$status1=$_POST['status'];
	$tech1=$_POST['tech'];
	
	
	if( mysqli_connect_errno($conn)){
		echo "Error connecting to MySQL server!";
	}
	
	
	// remarks='$remarks1', status='$status1', tech='tech1'
	$sql= "UPDATE daily_log SET remarks='$remarks1', conflict='$conflict1', status='$status1', tech='$tech1' where id='$id1'";
	//$sql= "UPDATE daily_log SET employee='$employee1' where id='$id1'";
		if(mysqli_query($conn, $sql))
		{
			echo '<script language="javascript">';
			echo 'alert("Successfully Edited!")';
			echo '</script>';
			// echo "Updated";
		}else{
			echo '<script language="javascript">';
			echo 'alert("Failed to Update")';
			echo '</script>';
			// echo "Failed to Update";
		}
}

function archivelog()
{
	include("config.inc.php");
	$conn = mysqli_connect("localhost","root","","ojt");


	if( mysqli_connect_errno($conn)){
		echo "Error connecting to MySQL server!";
	}

	$id = $_POST["id"];
	$employee = $_POST["employee"];
	$department = $_POST["department"];
	$conflict = $_POST["conflict"];
	$remarks = $_POST["remarks"];
	$status = $_POST["status"];
	$tech = $_POST["tech"];
	$date = $_POST["date"];
	$time = $_POST["time"];
	$logdate = date("Y-m-d");

	$sql = "INSERT INTO log_archived VALUES(NULL, '$id', '$employee', '$department', '$conflict', '$remarks', '$status', '$tech', '$date','$time', '$logdate')";
	$result = mysqli_query($conn, $sql);

	if($result)
	{
		$sql1 = "DELETE FROM daily_log WHERE id='$id' ";
		$result1 = mysqli_query($conn, $sql1);

		if($result1)
		{
			echo '<script language="javascript">';
			echo 'alert("SUCCESS")';
			echo '</script>';
		}
		else
		{
			echo '<script language="javascript">';
			echo 'alert("ERROR")';
			echo '</script>';
		}	
	}
	else
	{

		echo '<script language="javascript">';
		echo 'alert("ERROR")';
		echo '</script>';
	}
}


function searchlog()
{
	include("config.inc.php");
	$conn = mysqli_connect("localhost","root","","ojt");


	if( mysqli_connect_errno($conn)){
		echo "Error connecting to MySQL server!";
	}

	$search = $_POST["search"];

	$query = "SELECT * FROM daily_log
	 WHERE employee LIKE '%".$search."%'
	  OR ticket_id LIKE '%".$search."%'
	  OR department LIKE '%".$search."%' 
	  OR conflict LIKE '%".$search."%' 
	  OR remarks LIKE '%".$search."%' 
	  OR status LIKE '%".$search."%'
	  OR tech LIKE '%".$search."%'
	  OR date LIKE '%".$search."%'

	";
	$result = mysqli_query($conn, $query);

	$record = array();
	if( $myrow=mysqli_fetch_assoc($result) ){
		do{
			$info = array();
			$info['ticket_id'] = $myrow['ticket_id']; 
			$info['employee'] = $myrow['employee'];
			$info['department'] = $myrow['department'];
			$info['conflict'] = $myrow['conflict'];
			$info['remarks'] = $myrow['remarks'];
			$info['status'] = $myrow['status'];
			$info['tech'] = $myrow['tech'];
			$info['date'] = $myrow['date'];
			$info['time'] = $myrow['time'];
			$record[] = $info;
		}while($myrow=mysqli_fetch_array($result));
	}
	// print_r($record);
	return $record;
}

function show_employee()
{
	include"config.inc.php";
	$conn = mysqli_connect($host,$user,$pass,$ojt);


		if(mysqli_connect_errno($conn))
		{
			echo "Error connecting to MySQL server!";
		}

	$query = "SELECT * FROM employee";

	$result = mysqli_query($conn, $query);

	$record = array();

	if($myrow = mysqli_fetch_array($result))
	{
		do
		{
			$info = array();
			$info["employee_id"] = $myrow["employee_id"];
			$info["first_name"] = $myrow["first_name"];
			$info["last_name"] = $myrow["last_name"];
			$info["department"] = $myrow["department"];
			$info["directory"] = $myrow["directory"];
			$info["email"] = $myrow["email"];
			$info["status"] = $myrow["status"];
			$record[] = $info;

		}
		while($myrow = mysqli_fetch_array($result));
	}
		return $record;
}

function add_ticket()
{
	include "config.inc.php";
	$conn = mysqli_connect($host, $user, $pass, $ojt);

	if(mysqli_errno($conn))
	{
		echo "Error connecting to MySQL Server";
	}


	$ticketname = $_POST["name"];
	$department = $_POST["department"];
	$concern = $_POST["concern"];
	$date = date("Y-m-d");
	$time = date("h:i A");

	$sql = "INSERT INTO tickets VALUES (NULL, '$ticketname', '$department', '$concern', '$date', '$time')";
	
	$query = mysqli_query($conn, $sql);

		echo '<script language="javascript">';
		echo 'alert("Your request has been sent to IT Department, please wait to be assisted. Thank you for using Ticketing System!")';
		echo '</script>';
	
		$last_id = mysqli_insert_id($conn);
		if(isset($_FILES['files']))
		{
			    $errors= array();
			    $allowed_type = array('jpg', 'jpeg', 'png', 'gif', 'bmp');
				foreach($_FILES['files']['tmp_name'] as $key => $tmp_name )
				{
					$file_name = $_FILES['files']['name'][$key];
					$file_size =$_FILES['files']['size'][$key];
					$file_tmp =$_FILES['files']['tmp_name'][$key];
					$file_type=$_FILES['files']['type'][$key];	
		      	

		        $desired_dir="user_data";
		        if(empty($errors)==true)
		        {
		            if(is_dir($desired_dir)==false)
		            {
		                mkdir("$desired_dir", 0700);		// Create directory if it does not exist
		            }

		           	if( file_exists("$desired_dir/".$file_name)==true)
		            {
		            	$newname = time().$file_name;		
		           		$new_dir="user_data/".$newname;
		                move_uploaded_file($file_tmp,$new_dir) ;						//rename the file if another one exist
		             	$query="INSERT into uploads  VALUES(NULL,'$last_id','$newname') ";
		             	mysqli_query($conn, $query);	
		            }

		            if(file_exists("$desired_dir/".$file_name)==false )
		            {
		            	$path = move_uploaded_file($file_tmp,"user_data/".$file_name);
		            	$query="INSERT into uploads  VALUES(NULL, '$last_id','$file_name') ";
		            	mysqli_query($conn, $query);
		              
		            }
		          
		         
		          
		            			
		        }
		        else
		        {
		                print_r($errors);
		        }
		    }
			
		}

	else{
		echo '<script language="javascript">';
		echo 'alert("Error")';
		echo '</script>';
	}
}



function show_it_concern()
{
	include"config.inc.php";
	$conn = mysqli_connect($host,$user,$pass,$ojt);


		if(mysqli_connect_errno($conn))
		{
			echo "Error connecting to MySQL server!";
		}

	$query = "SELECT * FROM tickets";

	$result = mysqli_query($conn, $query);

	$record = array();

	if($myrow = mysqli_fetch_array($result))
	{
		do
		{
			$info = array();
			$info["ticket_id"] = $myrow["ticket_id"];
			$info["name"] = $myrow["name"];
			$info["department"] = $myrow["department"];
			$info["concern"] = $myrow["concern"];
			$info["date"] = $myrow["date"];
			$info["time"] = $myrow["time"];
			
			$record[] = $info;

		}
		while($myrow = mysqli_fetch_array($result));
	}
		return $record;
}

function transfer_issue()
{
	include"config.inc.php";
	$conn = mysqli_connect($host,$user,$pass,$ojt);


		if(mysqli_connect_errno($conn))
		{
			echo "Error connecting to MySQL server!";
		}

	$id = $_POST["ticket_id"];
	$name = $_POST["name"];
	$department = $_POST["department"];
	$conflict = $_POST["concern"];
	$status = $_POST["status"];
	$tech = $_POST["tech"];
	$remarks = $_POST["remarks"];
	$datelog = $_POST["datelog"];
	$timelog = $_POST["timelog"];



	

	$sql = "INSERT INTO daily_log VALUES (NULL, '$name', '$department', '$conflict', '$remarks', '$status', '$tech', '$datelog', '$timelog')";
	$result = mysqli_query($conn,$sql);
	
		
	if($result)
	{
			$sql2 = "DELETE FROM tickets WHERE ticket_id='$id'";
			$result2 = mysqli_query($conn, $sql2);
			
			return $result2;
	
	}
	else
	{

		echo '<script language="javascript">';
		echo 'alert("ERROR")';
		echo '</script>';
	}

}

function log_sort()
{
		include"config.inc.php";
	$conn = mysqli_connect($host,$user,$pass,$ojt);


		if(mysqli_connect_errno($conn))
		{
			echo "Error connecting to MySQL server!";
		}

	$fromsort = $_POST["fromsort"];
	$tosort = $_POST["tosort"];

	$sql = "SELECT * FROM daily_log WHERE `date` between '$fromsort' and '$tosort' order by `ticket_id` desc";

	$result = mysqli_query($conn, $sql);

	$record = array();

	if($myrow = mysqli_fetch_array($result))
	{
		do
		{
		$info = array();
		$info["ticket_id"] = $myrow["ticket_id"];
		$info["employee"] = $myrow["employee"];
		$info["department"] = $myrow["department"];
		$info["conflict"] = $myrow["conflict"];
		$info["remarks"] = $myrow["remarks"];
		$info["status"] = $myrow["status"];
		$info["tech"] = $myrow["tech"];
		$info["date"] = $myrow["date"];
		$info["time"] = $myrow["time"];

		$record[] = $info;
		}while($myrow = mysqli_fetch_array($result));
	}

	return $record;
}

function retrieveup()
{
	include "config.inc.php";
	
	$sql = "SELECT * FROM uploads ";

	$result = mysqli_query($conn, $sql);

	$record = array();

	if($myrow = mysqli_fetch_array($result))
	{
		do
		{
			$info = array();
			$info["id"] = $myrow["id"];
			$info["ticket_ids"] = $myrow["ticket_id"];
			$info["path"] = $myrow["path"];

			$record[] = $info;
		}while($myrow = mysqli_fetch_array($result));	
	}
	return $record;
}

function publish_news()
{
		include "config.inc.php";

		$author = $_POST["author"];
		$title = $_POST["title"];
		$lead = $_POST["lead"];
		$content = $_POST["content"];
		$date = date("F d Y");
		$time = date("h:i A");

		$sql = "INSERT INTO announcement VALUES (NULL, '$author','$date', '$time', '$title', '$lead', '$content')";
		$result = mysqli_query($conn, $sql);

		return $result;
		

}

function news_lists()
{
	include "config.inc.php";

	$sql = "SELECT * FROM announcement ORDER BY `announcement_id` DESC";
	$query = mysqli_query($conn, $sql);

	$record = array();

	if($myrow = mysqli_fetch_array($query))
	{
		do
		{
			$info = array();
			$info["announcement_id"] = $myrow["announcement_id"];
			$info["title"] = $myrow["title"];
			$info["lead"] = $myrow["lead"];
			$info["author"] = $myrow["author"];
			$info["date_published"] = $myrow["date_published"];
			$info["time_published"] = $myrow["time_published"];

			$record[] = $info;
		}
		while($myrow = mysqli_fetch_array($query));
	}
	return $record;
}

function show_selected_news()
{
	include "config.inc.php";
	$news_id = $_GET['id'];
	$sql = "SELECT * FROM announcement WHERE `announcement_id` = '$news_id' ";
	$query = mysqli_query($conn, $sql);
	$result = mysqli_fetch_array($query);
	return $result;
}

function show_other_news()
{
	include "config.inc.php";
	$news_id = $_GET['id'];

	$sql = "SELECT * FROM `announcement` WHERE `announcement_id` != '$news_id' ORDER BY `announcement_id` DESC LIMIT 5 ";
	$query = mysqli_query($conn, $sql);

	$record = array();
	while ($myrow = mysqli_fetch_array($query)) 
	{
		do
		{
			$info = array();
			$info['announcement_id'] = $myrow['announcement_id'];
			$info['title'] = $myrow['title']; 
			$info['lead'] = $myrow['lead']; 
			
			$record[] = $info;

		}
		while($myrow = mysqli_fetch_array($query));
	}

	return $record;
}

function search_news()
{
	include("config.inc.php");
	$conn = mysqli_connect("localhost","root","","ojt");


	if( mysqli_connect_errno($conn)){
		echo "Error connecting to MySQL server!";
	}

	$search = $_POST["search_news"];

	$query = "SELECT * FROM announcement
	 WHERE author LIKE '%".$search."%'
	  OR date_published LIKE '%".$search."%'
	  OR time_published LIKE '%".$search."%' 
	  OR title LIKE '%".$search."%' 
	  OR lead LIKE '%".$search."%' 
	  OR content LIKE '%".$search."%'

	";
	$result = mysqli_query($conn, $query);

	$record = array();
	if( $myrow=mysqli_fetch_assoc($result) ){
		do{
			$info = array();
			$info['announcement_id'] = $myrow['announcement_id'];
			$info['author'] = $myrow['author']; 
			$info['date_published'] = $myrow['date_published'];
			$info['time_published'] = $myrow['time_published'];
			$info['title'] = $myrow['title'];
			$info['lead'] = $myrow['lead'];
			$info['content'] = $myrow['content'];

			$record[] = $info;
		}while($myrow=mysqli_fetch_array($result));
	}
	// print_r($record);
	return $record;
}

function sort_locations()
{
	include("config.inc.php");
	$conn = mysqli_connect("localhost","root","","ojt");
	$location = $_GET['location'];
	$sql = "SELECT * FROM employee WHERE `location` = '$location' ";
	$query = mysqli_query($conn, $sql);
	$record = array();
	if($myrow = mysqli_fetch_array($query))
	{
		do
		{
			$info = array();
			$info["employee_id"] = $myrow["employee_id"];
			$info["first_name"] = $myrow["first_name"];
			$info["last_name"] = $myrow["last_name"];
			$info["department"] = $myrow["department"];
			$info["location"] = $myrow["location"];
			$info["directory"] = $myrow["directory"];
			$info["email"] = $myrow["email"];
			$info["status"] = $myrow["status"];
			$record[] = $info;
		}
		while($myrow = mysqli_fetch_array($query));
	}
	return $record;
}

function sort_departments()
{
	include("config.inc.php");
	$conn = mysqli_connect("localhost","root","","ojt");
	$location = $_GET['department'];
	$sql = "SELECT * FROM employee WHERE `location` = '$location' ";
	$query = mysqli_query($conn, $sql);
	$record = array();
	if($myrow = mysqli_fetch_array($query))
	{
		do
		{
			$info = array();
			$info["employee_id"] = $myrow["employee_id"];
			$info["first_name"] = $myrow["first_name"];
			$info["last_name"] = $myrow["last_name"];
			$info["department"] = $myrow["department"];
			$info["location"] = $myrow["location"];
			$info["directory"] = $myrow["directory"];
			$info["email"] = $myrow["email"];
			$info["status"] = $myrow["status"];
			$record[] = $info;
		}
		while($myrow = mysqli_fetch_array($query));
	}
	return $record;
}

function search_employee_names()
{
	$conn = mysqli_connect("localhost","root","","ojt");


	if( mysqli_connect_errno($conn)){
		echo "Error connecting to MySQL server!";
	}

	$search = $_POST["search_employee"];

	$query = "SELECT * FROM employee
	 WHERE first_name LIKE '%".$search."%'
	  OR last_name LIKE '%".$search."%'
	";
	$result = mysqli_query($conn, $query);

	$record = array();
	if($myrow = mysqli_fetch_array($result))
	{
		do
		{
			$info = array();
			$info["employee_id"] = $myrow["employee_id"];
			$info["first_name"] = $myrow["first_name"];
			$info["last_name"] = $myrow["last_name"];
			$info["department"] = $myrow["department"];
			$info["location"] = $myrow["location"];
			$info["directory"] = $myrow["directory"];
			$info["email"] = $myrow["email"];
			$info["status"] = $myrow["status"];
			$record[] = $info;

		}
		while($myrow = mysqli_fetch_array($result));
	}
	// print_r($record);
	return $record;
}

function admin_edit_employee_record()
{
	$conn = mysqli_connect('localhost', 'root', '', 'ojt');
	if( mysqli_connect_errno($conn)){
		echo "Error connecting to MySQL server!";
	}

	$employee_id = $_POST["employee_id"];
	$first_name = $_POST["first_name"];
	$last_name = $_POST["last_name"];
	$department = $_POST["department"];
	$location = $_POST["location"];
	$directory = $_POST["directory"];
	$email = $_POST["email"];
	$status = $_POST["status"];
	
	$sql = "UPDATE employee SET `first_name`='$first_name', `last_name`='$last_name', `department`='$department', `location`='$location', `directory`='$directory', `email`='$email', `status`='$status' WHERE `employee_id`='$employee_id' ";
	$query = mysqli_query($conn, $sql);
	if($query)
	{
		return TRUE;
	}
	else
	{
		return FALSE;
	}
}
function add_new_employee_record_model()
{
	$conn = mysqli_connect('localhost', 'root', '', 'ojt');
	if( mysqli_connect_errno($conn)){
		echo "Error connecting to MySQL server!";
	}
	$first_name = $_POST["first_name"];
	$last_name = $_POST["last_name"];
	$department = $_POST["department"];
	$location = $_POST["location"];
	$directory = $_POST["directory"];
	$email = $_POST["email"];
	$status = $_POST["status"];
	$query = "INSERT INTO `employee` (`employee_id`, `first_name`, `last_name`, `department`, `location`, `directory`, `email`, `status`) VALUES (NULL, '$first_name', '$last_name', '$department', '$location', '$directory', '$email', '$status');";
	$result = mysqli_query($conn, $query);	
	if($result)
	{
		return TRUE;
	}
	else
	{
		echo mysqli_error();
	}
}

function send_email_list()
{
	$conn = mysqli_connect("localhost", "root", "", "ojt");
	$query = "SELECT employee_id, first_name, last_name, email FROM `employee`";
	$result = mysqli_query($conn, $query);
	$record = array();
	if($myrow = mysqli_fetch_array($result))
	{
		do
		{
			$info = array();
			$info['employee_id'] = $myrow['employee_id'];
			$info['first_name'] = $myrow['first_name'];
			$info['last_name'] = $myrow['last_name'];
			$info['email'] = $myrow['email'];
			$record[] = $info; 
		}
		while($myrow = mysqli_fetch_array($result));
		return $record;
	}
}

function get_all_news()
{
	$conn = mysqli_connect("localhost", "root", "", "ojt");
	$query = "SELECT * FROM announcement";
	$result = mysqli_query($conn, $query);
	$record = array();
	if($myrow = mysqli_fetch_array($result))
	{
		do
		{
		$info = array();
			$info["announcement_id"] = $myrow["announcement_id"];
			$info["title"] = $myrow["title"];
			$info["lead"] = $myrow["lead"];
			$info["author"] = $myrow["author"];
			$info["date_published"] = $myrow["date_published"];
			$info["time_published"] = $myrow["time_published"];

			$record[] = $info;
		}
		while($myrow = mysqli_fetch_array($result));
		return $record;

	}

}

function edit_news_content()
{
	$id = $_POST['announcement_id'];
	$title = $_POST['title'];
	$lead = $_POST['lead'];
	$content = $_POST['content'];

	$conn = mysqli_connect("localhost", "root", "", "ojt");
	$query = "UPDATE announcement SET `title`='$title', `lead`='$lead', `content`='$content' WHERE `announcement_id`='$id' ";
	$result = mysqli_query($conn, $query);
	if($result)
	{
			echo '<script language="javascript">';
			echo 'alert("Successfully Edited!")';
			echo '</script>';
			return TRUE;
	}
	else
	{
		die(mysqli_error($conn));
	}
}

//SELECT DISTINCT(department), count(*) FROM `employee` GROUP BY department
?>
