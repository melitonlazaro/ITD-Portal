<html>
<head>
	<style type="text/css">
	.tool 
{
    height: 100%;
    width: 0;
    position: fixed;
    z-index: 1032;
    top: 50;
    right: 0;
    background-color: #2F4E6F;
    color:white;
    overflow-x: hidden;
    transition: 0.4s;
    padding-top: 15px;
    border-radius: 5px;
}

.tool a:hover, .offcanvas a:focus{
    color: #33cc00;
}

.closebtn1 {
    position: absolute;
    top: 7px;
    left: -40px;
    font-size: 36px;
    margin-left: 50px;
}

@media screen and (max-height: 450px) {
  .tool {padding-top: 15px;}
  .tool a {font-size: 18px;}
}
.news_tool_button
{
	position:fixed;
	top: 50%;
	right: 0%;
	background: none;
	border:none;

}
#html_tool
{
	overflow-y: scroll;
}
#title_tool
{
	position: relative;
	color: #F5F5F5;

}
.content_title
{
	background-color:#E15119;
	text-align: center;
	font-size: 20px;
	border-radius: 10px;
}
.content_sub_title
{
	font-weight: bold;
	font-size: 16px;
	text-indent: 5px;
	border-radius: 5px;
}
.content_sub_title1
{
	font-weight: bold;
	font-size: 16px;
	border-radius: 5px;
	text-indent: 5px;
}
#hide_tools
{
	position: relative;
	top: 50%;
	left: -60%;
}
	</style>
</head>
<body>

      <button class="news_tool_button btn btn-default btn-lg" onclick="openTool()" >
      <span class="glyphicon glyphicon-menu-left" style="cursor:pointer" id="hamburger_toggle"></button>

<div id="news_tool" class="tool">
  <br>
   <button class="btn btn-default" id="hide_tools"><span class="glyphicon glyphicon-menu-left"></span> </button>
 	
    <div class="container" id="html_tool">

    	<p class="closebtn1" onclick="closeTool()" style="cursor:pointer">&times;</p>
    </div>
    <div class="container-fluid" id="title_tool">
	    <center>
	 		<h3> Content HTML Guides </h3>
	 	</center>
	 	<div class="container-fluid ">
	 		<h5 class="content_title" >Document Structure</h5>
	 	</div>
	 		<div class="row">
		 		<div class="col-md-12">
			 		<div class="container-fluid">
			 			<p class="content_sub_title">Heading</p><p>( "h1" Sets the biggest heading while "h6" sets the smaller heading) </p>
			 		</div>
			 	</div>
		 	</div> 
				<div class="row">
			 		<div class="col-md-2">
			 			<button class="btn btn-default buttons">h1</button>
			 		</div>
			 		<div class="col-md-2">
			 			<button class="btn btn-default buttons">h2</button>
			 		</div>
			 		<div class="col-md-2">
			 			<button class="btn btn-default buttons">h3</button>
			 		</div>
			 		<div class="col-md-2">
			 			<button class="btn btn-default buttons">h4</button>
			 		</div>
			 		<div class="col-md-2">
			 			<button class="btn btn-default buttons">h5</button>
			 		</div>
			 		<div class="col-md-2">
			 			<button class="btn btn-default buttons">h6</button>
			 		</div>
			 	</div>
		 		<br>
		 		<div class="row">
				 	<div class="col-md-4">
				 		<p class="content_sub_title1"> Paragraph </p>
				 		<button class="btn btn-default buttons">p</button>
				 	</div>

				 	<div class="col-md-4">
				 		<p class="content_sub_title1"> line break </p>
				 		<button class="btn btn-default buttons1">br</button>
				 	</div>
				 	<div class="col-md-4">
				 		<p class="content_sub_title1">Horizontal Line</p>
				 		<button class="btn btn-default buttons1">hr</button>
				 	</div>
				</div>
				<br>
				<div class="row">
				 	<div class="col-md-4">
				 		<p class="content_sub_title1">DIV</p>
				 		<button class="btn btn-default buttons">div</button>
				 	</div>
				 	<div class="col-md-4">
				 		<p class="content_sub_title1">Span</p>
				 		<button class="btn btn-default buttons">span</button>
				 	</div>
				</div>	
				<br><br>
		<div class="container-fluid ">
	 		<h5 class="content_title" >Text Formatting</h5>
	 	</div>
	 		<div class="row">
			 	<div class="col-md-3">
			 		<p class="content_sub_title1">Bold</p>
			 		<button class="btn btn-default buttons">b</button>
			 	</div>
			 	<div class="col-md-3">
			 		<p class="content_sub_title1">Italic</p>
			 		<button class="btn btn-default buttons">i</button>
			 	</div>
			 	<div class="col-md-3">
			 		<p class="content_sub_title1">Underline</p>
			 		<button class="btn btn-default buttons">strong</button>
			 	</div>
			 	<div class="col-md-3">
			 		<p class="content_sub_title1">Emphasis</p>
			 		<button class="btn btn-default buttons">em</button>
			 	</div>
			 	<br><br>	<br><br>	
			 	<div class="col-md-3">
			 		<p class="content_sub_title1">Strike</p>
			 		<button class="btn btn-default buttons">strike</button>
			 	</div>
			 	<div class="col-md-3">
			 		<p class="content_sub_title1">Cite</p>
			 		<button class="btn btn-default buttons">cite</button>
			 	</div>
		
			 	<div class="col-md-3">
			 		<p class="content_sub_title1">Deleted</p>
			 		<button class="btn btn-default buttons">del</button>
			 	</div>
			 	<div class="col-md-3">
			 		<p class="content_sub_title1">Pre-formatted</p>
			 		<button class="btn btn-default buttons">pre</button>
			 	</div>
			 	<br><br>	<br><br>	
			 	<div class="col-md-3">
			 		<p class="content_sub_title1">Blockquote</p>
			 		<button class="btn btn-default buttons">blockquote</button>
			 	</div>
			 	<div class="col-md-3">
			 		<p class="content_sub_title1">Short Quote</p>
			 		<button class="btn btn-default buttons">q</button>
			 	</div>
			 	<div class="col-md-3">
			 		<p class="content_sub_title1">Abbreviation</p>
			 		<button class="btn btn-default buttons">abbr</button>
			 	</div>
			 	<div class="col-md-3">
			 		<p class="content_sub_title1">Definition</p>
			 		<button class="btn btn-default buttons">def</button>
			 	</div>
			 	<br><br>	<br><br>	
			 	<div class="col-md-3">
			 		<p class="content_sub_title1">Code</p>
			 		<button class="btn btn-default buttons">code</button>
			 	</div>
			 	<div class="col-md-3">
			 		<p class="content_sub_title1">Subscript</p>
			 		<button class="btn btn-default buttons">sub</button>
			 	</div>
			</div>
		<br><br>
		<div class="container-fluid ">
	 		<h5 class="content_title" >Linking</h5>
	 	</div>
	 		<div class="row">
	 			<div class="col-md-3">
			 		<p class="content_sub_title1">Hyperlink</p>
			 		<button class="btn btn-default buttons_a">a href=""</button>
			 	</div>
			 	<div class="col-md-3">
			 		<p class="content_sub_title1">Mail To</p>
			 		<button class="btn btn-default buttons_a">a href="mailto:"</button>
			 	</div>
	 		</div>
	 	</div>
	 	<br><br>
	 	<div class="container-fluid ">
	 		<h5 class="content_title" >Images</h5>
	 		<div class="row">
	 			<div class="col-md-12">
			 		<p class="content_sub_title1">Insert Image</p>
			 		<button class="btn btn-default buttons_img">img</button>
			 	</div>
			</div>
	 	</div>
	 	<br><br>
	 	<div class="container-fluid ">
	 		<h5 class="content_title" >Lists</h5>
	 		<div class="row">
	 			<div class="col-md-4">
			 		<p class="content_sub_title1">Ordered List</p>
			 		<button class="btn btn-default buttons">ol</button>
			 	</div>
			 	<div class="col-md-4">
			 		<p class="content_sub_title1">Unordered List</p>
			 		<button class="btn btn-default buttons">ul</button>
			 	</div>
			 	<div class="col-md-4">
			 		<p class="content_sub_title1">List Item</p>
			 		<button class="btn btn-default buttons">li</button>
			 	</div>
			</div>
	 	</div>
		<br><br>
	 	<div class="container-fluid ">
	 		<h5 class="content_title" >Tables</h5>
	 		<div class="row">
	 			<div class="col-md-12">
	 				<p>Table Guide</p>
	 				<ul>
	 					<li>In creating HTML Tables: "table" must be first initialized.</li>
	 					<li>To create a row: Click the "tr" button.</li>
	 					<li>To create a Table Header:</li>
	 					<ul>
	 						<li>1. Click the "tr" button</li>
	 					</ul>
	 				</ul>
	 			</div>
	 			<div class="col-md-12">
			 		<p class="content_sub_title1">Create Table</p>
			 		<button class="btn btn-default buttons">table</button>	<br><br>
			 	</div>
		
			 	<div class="col-md-4">
			 		<p class="content_sub_title1">Table Headers</p>
			 		<button class="btn btn-default buttons">th</button>
			 	</div>
			 	<div class="col-md-4">
			 		<p class="content_sub_title1">Table Row</p>
			 		<button class="btn btn-default buttons">tr</button>
			 	</div>
			 	<div class="col-md-4">
			 		<p class="content_sub_title1">Table Data</p>
			 		<button class="btn btn-default buttons">td</button>
			 	</div>
			</div>
	 	</div>
			<br><br><br><br><br>
	</div>
</div>

 
</body>
</html>
<script>
$(document).ready(function () {
    $(".buttons").click(function () {
        var cntrl = $(this).html();
        $("#content").val(function (_, val) {
            return val + "<" + cntrl + ">" + "</" + cntrl + ">"
           
        });
    });
});

$(document).ready(function (){
	$(".buttons_img").click(function(){
		var cntrl = $(this).html();
		$("#content").val(function (_, val){
			return val + '<' + cntrl + ' src=" " alt=" " height=" " width=" " align=" ">'
		});
	});
});

$(document).ready(function (){
	$(".buttons_a").click(function(){
		var cntrl = $(this).html();
		$("#content").val(function (_, val) {
			return val + "<" + cntrl + ">" + "</a>"			
		});
	});
});

$(document).ready(function () {
    $(".buttons1").click(function () {
        var cntrl = $(this).html();
        $("#content").val(function (_, val) {
            return val + "<" + cntrl + ">"
           
        });
    });
});
</script>
<script>

function openTool() {
    document.getElementById("news_tool").style.width = "530px";
}

function closeTool() {
    document.getElementById("news_tool").style.width = "0";
}

</script>