<html>
<head>
	<title></title>
	<meta charset="utf-8">
  	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="js/jscookmenu.min.js"></script>
  <script src="js/jquery-1.12.4.min.js"></script>

  <script src="js/wb.carousel.min.js"></script>
  <script src="js/bootstrap.js"></script>
  <script src="js/npm.js"></script>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="css/morris.css">
  <script src="js/raphael-min.js"></script>
  <script src="js/morris.min.js"></script>

</head>
<body>
<?php include "admin_nav.php"; ?>
  <br><br><br>
  <h1><span class="glyphicon glyphicon-cog"></span>&nbsp;Settings</h1>
  <div class="container-fluid" >
    <div class="row">
      <div class="col-md-2">
        <h2>Accounts </h2>
      </div>
      <div class="col-md-6">
        <h3>Change Password</h3>

        <br><br>
        <form method="POST" action="bc.php?action=change_password">
          <div class="form-group">
            <label for="old_password">Old Password</label>
            <input type="password" name="old_password" id="old_password" class="form-control">
          </div>
          <div class="form-group">
            <label for="new_password">New Password</label>
            <input type="password" name="new_password" id="new_password" class="form-control">
          </div>
          <div class="form-group">
            <label for="confirm_password">Confirm New Password</label>
            <input type="password" name="confirm_password" id="confirm_password"  class="form-control">
          </div>
          <div class="form-group">
            <button type="submit" class="btn btn-primary" >Change Password</button>
          </div>
        </form>
      </div>
    </div>

    <div class="row">
      <div class="col-md-2">
      </div>
      <div class="col-md-6">
        <hr>
        <h3>Add Account</h3>
        <br><br>
        <form method="POST" action="bc.php?action=create_account">
          <div class="form-group">
            <label for="old_password">Username</label>
            <input type="text" name="username" id="old_password" class="form-control">
          </div>
          <div class="form-group">
            <label for="new_password">Password</label>
            <input type="password" name="password" id="new_password" class="form-control">
          </div>
          <div class="form-group">
            <label for="confirm_password">First Name</label>
            <input type="text" name="first_name" id="confirm_password"  class="form-control">
          </div>
          <div class="form-group">
            <label for="confirm_password">Last Name</label>
            <input type="text" name="last_name" id="confirm_password"  class="form-control">
          </div>
          <div class="form-group">
            <button type="submit" class="btn btn-primary" >Create Account</button>
          </div>
        </form>
      </div>
    </div>
  </div>

</body>
</html>
