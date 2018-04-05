<!DOCTYPE html>

<?php
include "config.inc.php";
if(isset($_FILES['files'])){
    $errors= array();
	foreach($_FILES['files']['tmp_name'] as $key => $tmp_name ){
		$file_name = $_FILES['files']['name'][$key];
		$file_size =$_FILES['files']['size'][$key];
		$file_tmp =$_FILES['files']['tmp_name'][$key];
		$file_type=$_FILES['files']['type'][$key];	
      	
       	
        $desired_dir="user_data";
        if(empty($errors)==true){
            if(is_dir($desired_dir)==false){
                mkdir("$desired_dir", 0700);		// Create directory if it does not exist
            }
            if(file_exists("$desired_dir/".$file_name)==false){
            	$path = move_uploaded_file($file_tmp,"user_data/".$file_name);
            	$query="INSERT into uploads  VALUES(NULL,'$file_name') ";	
              
            }else{
            	$newname = time().$file_name;		
           		$new_dir="user_data/".$newname;
                rename($file_tmp,$new_dir) ;						//rename the file if another one exist
             	$query="INSERT into uploads  VALUES(NULL,'$newname') ";		
            }
            
            mysqli_query($conn, $query);			
        }else{
                print_r($errors);
        }
    }
	if(empty($error)){
		echo "Success";
	}
}
?>
<html>
<body>

<form action="" method="POST" enctype="multipart/form-data">
	<input type="file" name="files[]" multiple="" />
	<input type="submit"/>
</form>


<?php
include "config.inc.php";

$sql1 = "SELECT `path` FROM uploads WHERE `path`='sebs - Copy.png'";

$result = mysqli_query($conn, $sql1);

$result1 = mysqli_fetch_array($result);

if($result1)
{
	echo '<br>';
	echo '<img src="user_data/'.$result1["path"].'" ';
}
else
{
	echo "no result found";
}

?>


</body>
</html>