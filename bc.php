<?php
if( isset($_GET['action']) ){
		switch($_GET['action']){
		case 'index'		: index(); break;
		case 'faq'			: faq(); break;
		case 'editissue'	: editissue(); break;
		case 'addissue'		: addissue(); break;
		case 'tickets'		: tickets(); break;
		case 'deleteissue'	: deleteissue(); break;
		case 'search_log' 	: search_log(); break;
		case 'employeepage' : employeepage(); break;
		case 'manage_employee'	: manage_employee(); break;
		case 'addticket'	: addticket(); break;
		case 'dashboard'	: dashboard(); break;
		case 'confirm_issue'	: confirm_issue(); break;
		case 'archive_log'		: archive_log(); break;
		case 'logsort'		: logsort(); break;
		case 'retriveuploads'	: retriveuploads(); break;
		case 'ergoemployee'	: ergoemployee(); break;
		case 'login'		: login(); break;
		case 'logout'		: logout(); break;
		case 'ticketpage'	: ticketpage(); break;
		case 'publishnews'	: publishnews(); break;
		case 'news_list'	: news_list(); break;
		case 'show_news'	: show_news(); break; 
		case 'searchnews'	: searchnews(); break;
		case 'sort_department'	: sort_department(); break;
		case 'search_employee_name'	: search_employee_name(); break;
		case 'edit_employee_record' : edit_employee_record(); break;
		case 'add_new_employee_record'	: add_new_employee_record(); break;
		case 'ticket_report_pdf'	: ticket_report_pdf(); break;
		case 'send_mail_to_all' 	: send_mail_to_all(); break;
		case 'create_account'	: create_account(); break;
		case 'change_password'	: change_password(); break;
		case 'edit_news'	:	edit_news(); break;
		default: index();
	}
}
if(isset($_GET['id'])) //if isset the Announcement ID -> will display the announcement
{
	select_news();
}

if(isset($_GET['location']))
{
	sort_location();
}

if(isset($_GET['department']))
{
	sort_department();
}

function index() //index function for employee interface
{
	include_once "models/backend_model.php";
	$news = index_function();
	include_once "index.php";

}

function dashboard() //displays the dashboard for admin panel
{
	include_once "models/backend_model.php";
	$request = show_it_concern();
	$request_show_upload = retrieveup();
	$pending_ticket_count = count_pending_ticket();
	$completed_ticket = completed_ticket();
	$incomplete_ticket = incomplete_ticket();
	$employee_count = count_employee();
	include_once "dashboard.php";
}

function faq() //displays the FAQs for technical concern
{
	include "faq.php";
}

function create_account()
{
	include "models/backend_model.php";
	$result = create_new_account();
	if($result)
	{
		header("Location: http://localhost/SIT-branch3/bc.php?action=dashboard");
	}
	else
	{
		echo 	'
				<script>
				alert("Registration Failed. Username already exists.");
				</script>
				';
	}
}

function change_password()
{
	include "models/backend_model.php";
	$result = change_user_password();
	if($result)
	{
		echo "Success";
	}
}

function login()
{
	include "models/backend_model.php";
	$result = user_login();
	if($result)
	{
		header("Location: http://localhost/SIT-branch3/bc.php?action=dashboard");
	}
	else
	{
		echo 	'
				<script>
				alert("Login Failed.");
				</script>
				';
		session_destroy();

		include "loginpage.php";
	}


}

function logout()
{
	session_start();
	session_destroy();
	header("Location: http://localhost/SIT-branch3/bc.php?action=index");
}

function ticketpage() //displays the Form for Add Ticket for Employees
{
	session_start();
	include "addticket.php";

}

function addticket() //submits the ticket form filled up by employee
{
	include "models/backend_model.php";
	$result = add_ticket();
	if($result)
	{
	echo "<meta http-equiv='Refresh' content='.5; URL=bc.php?action=index'>";
	}
	else
	{
	echo "<meta http-equiv='Refresh' content='.5; URL=bc.php?action=index'>";
	
	}
	
}

function deleteissue() //delete tech concern from admin panel
{
	include "models/backend_model.php";
	deleteissue_mdl();
	$request= show_issues();
	include "View-People.php";
}

function addissue() //add tech concern from admin panel
{
	include "models/backend_model.php";
	$result = AddIssue_Mdl();
	if($result)
	{
		header("Location: http://localhost/SIT-branch3/bc.php?action=tickets");
	}
	else
	{

	}

}

function editissue() //edit issue from admin panel
{
	include "models/backend_model.php";
	EditIssue_Mdl();
	$request = show_issues();
	include "View-People.php";
}

function tickets() //displays the table for tech concerns
{
	include_once "models/backend_model.php";
	$request = show_issues();
	$request_show_upload = retrieveup();
	include_once "it_log.php";
}


function search_log() //search tech concerns
{
	include "models/backend_model.php";
	$request = searchlog();
	include "it_log_search.php";
}

function archive_log() //archive logs
{
	include "models/backend_model.php";
	archivelog();
	$request = show_issues();
	include "View-People.php";

}

function employeepage()
{
	include "models/backend_model.php";
	$request = show_employee();
	include "employee.php";
}

function manage_employee() //sort employee by DEPARTMENT
{
	session_start();
	include "manage_employee.php";
}



function confirm_issue() //transfers tech concern from dashboard to tech concern table
{
	include "models/backend_model.php";
	$result = transfer_issue();
	if($result)
	{
		echo '<script language="javascript">';
		echo 'alert("SUCCESS")';
		echo '</script>';
		header("Location: http://localhost/SIT-branch3/bc.php?action=dashboard");
	}
	else
	{
		die();
	}

}

function logsort() //sort by date the tech concern tables
{
	include "models/backend_model.php";
	$request = log_sort();
	include "it_log_search.php";
}

function retriveuploads()
{
	include "models/backend_model.php";
	$request = retrieveup();
	include "retriveupload.php";
}

function ergoemployee() //Employee Directory
{
	include "models/backend_model.php";
	$count_department = count_department();
	$count_location = count_location();
	$employee_count = count_employee();
	include "ergoemployee.php";
}


function publishnews() //publish news/announcements from IT Department
{
	include "models/backend_model.php";
	$result = publish_news();
	if($result)
	{
		$email_result = send_mail_to_all($details);
	}
	if($email_result)
	{
		echo "<meta http-equiv='Refresh' content='.5; URL=bc.php?action=dashboard'>";
	}
	else
	{
		die("FATAL ERROR");
	}
}

function news_list() //displays the news list for the employees
{
	include "models/backend_model.php";
	$result = news_lists();
	include "news_lists.php";
}

function searchnews()
{
	include "models/backend_model.php";
	$result = search_news();
	include "search_news_list.php";
}

function select_news()
{
	$id = $_GET['id'];
	include "models/backend_model.php";
	$result = show_selected_news();
	$other_news = show_other_news();
	include "view_news.php";
}

function sort_location()
{
	include "models/backend_model.php";
	$count_department = count_department();
	$count_location = count_location();
	$result_sort_location = sort_locations();
	$employee_count = count_employee();
	include "ergoemployee_sort.php";
}

function sort_department()
{
	include "models/backend_model.php";
	$count_department = count_department();
	$count_location = count_location();
	$result_sort_location = sort_departments();
	$employee_count = count_employee();
	include "ergoemployee_sort_department.php";

}

function search_employee_name()
{
	include "models/backend_model.php";
	$count_department = count_department();
	$count_location = count_location(); 
	$result_search = search_employee_names();
	$employee_count = count_employee();
	$search = $_POST["search_employee"];
	include "ergoemployee.php";
}

function edit_employee_record()
{
	include "models/backend_model.php";
	$edit = admin_edit_employee_record();
	if($edit)
	{
		header("Location: http://localhost/SIT-branch3/bc.php?action=manage_employee");

	}
	else
	{
		die();
	}
}

function add_new_employee_record()
{
	include "models/backend_model.php";
	$result = add_new_employee_record_model();
	
	if($result)
	{
		header("Location: http://localhost/SIT-branch3/bc.php?action=manage_employee");
	}
	else
	{
		echo mysqli_error();
	}
}

function ticket_report_pdf()
{
	include "models/backend_model.php";
	$result = show_issues();
	include "ticket_report_pdf.php";
}

function send_mail_to_all($details)
{
	$result = include "send_mail_to_all.php";
	if($result)
	{
		return TRUE;
	}
	else
	{
		die("ERROR in Sending Emails");
	}
}

function show_news()
{
	include "news.php";
}

function edit_news()
{
	include "models/backend_model.php";
	$result = edit_news_content();
	if($result)
	{
		echo "<meta http-equiv='Refresh' content='.5; URL=news.php'>";
	}
	else
	{
		
	}
}

?>
