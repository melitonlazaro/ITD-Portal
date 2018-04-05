<?php   
session_start();  
?>  

<!DOCTYPE html>
<html>

<head>
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="footer, basic, centered, links" />

    <script src="js/jscookmenu.min.js"></script>
    <script src="js/jquery-1.12.4.min.js"></script>
    <script src="js/wb.carousel.min.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/npm.js"></script>
    <link href="css/bootstrap.min.css" rel="stylesheet">
 
    <style type="text/css">
        #logincontainer
      {
        background-color: #54a51c;
        width: 550px;
        height: 350px;
        border-radius: 10px;  
        padding:40px;
        padding-top: 20px;
      }
     
      label
      {
        font-family: times;
        font-size: 20px;
        color: #323232;
      }
      span
      {
        vertical-align: middle;
      }

      </style>

</head>
<body>
  <br><br><br><br><br><br><br>
  <center>
  <div class="container">
    <img src="bannerlogo1.jpg">
    <br>
    <h2>I.T Department</h2>
    <br>
    <div id="logincontainer">
     
      <center>
        <h3><img src="admin.png" width="50px" height="50px">&nbsp&nbspAdmin Login</h3>
          <form method="POST" action="bc.php?action=login">

                  <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" id="username" name="username" class="form-control" autofocus value="<?php echo isset($_POST["username"]) ? $_POST["username"] : '';?>">
                  </div>  
                
                  <div class="form-group">  
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" class="form-control" value="<?php echo isset($_POST["password"]) ? $_POST["password"] : '';?>">
                  </div>
          
                    <button type="submit" id="login_button" onclick="" class="btn btn-primary btn-md" name="submit" >Log in</button>
                
          </form>

      </center>            
    </div>
  </div>      
  </center>         
    <br><br><br><br>      
</body>
</html>
