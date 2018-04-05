 <?php  
 session_start();  
 $connect = mysqli_connect("localhost", "root", "", "ojt");  
 if(isset($_POST["username"]))  
 {  
     $username = $_POST["username"];
     $password = $_POST["password"];

     $query = " SELECT * FROM user WHERE `username` = $username AND  `password` = $password ";
     
      $result = mysqli_query($connect, $query);  
      if(mysqli_num_rows($result) > 0)  
      {  
           $_SESSION['username'] = $username; 
           echo 'Yes';  
      }  
      else  
      {  
           echo 'No';  
      }  
 }  
 if(isset($_POST["action"]))  
 {  
      unset($_SESSION["username"]);  
 }  
 ?>  