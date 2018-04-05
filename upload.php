 <?php  
 //upload.php  
 $output = '';  

  include"config.inc.php";
  $conn = mysqli_connect($host,$user,$pass,$ojt);


    if(mysqli_connect_errno($conn))
    {
      echo "Error connecting to MySQL server!";
    }

 if(is_array($_FILES))   
 {
      $uploader = $_POST["filename"];  
      $total = count($_FILES['files']['name']);
      foreach ($_FILES['files']['name'] as $name => $value)  
      {  
           $file_name = explode(".", $_FILES['files']['name'][$name]);  
           $allowed_ext = array("jpg", "jpeg", "png", "gif");  
           if(in_array($file_name[1], $allowed_ext))  
           {  
                $new_name = md5(rand()) . '.' . $file_name[1];  
                $sourcePath = $_FILES['files']['tmp_name'][$name];  
                $targetPath = "upload/".$uploader. '-' .$new_name;  
                if(move_uploaded_file($sourcePath, $targetPath))  
                {  
                    $sql = "INSERT INTO upload VALUES (NULL, '". mysqli_real_escape_string($conn, $targetPath)."')";
                    $query = mysqli_query($conn, $sql);

                     $output .= '<img src="'.$targetPath.'" width="150px" height="180px" />
                                  <p>'.$new_name.' </p>
                                  <p>'.$total.'</p>
                                  <p>'.$uploader.'</p>
                                  ';  
                }                 
           }            
      }  
      echo $output;  
 }  
 ?>  