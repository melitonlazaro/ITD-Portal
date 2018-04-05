<html>
	<head>

	<link href="views/style.css" rel="stylesheet" type="text/css">

	<script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>
	</head>
		<body bgcolor="white">

		<div class="body"></div>

			

			<div class="header">



			</div>
			<br />
			<br />
			<br />
			<div class="container">
			<div class="login">
				<form id="body" action="contro_login.php?page=login" method="POST">

				<?php

				if(isset($error)){
					switch($error){
						case 1:
							$error = "Please enter your username and password to continue logging in.";
							break;
						case 2:
							$error = "You have entered an invalid username or password.";
							break;
					}

					echo'<div class="error-msg"><i class="fa fa-times-circle"></i>'.$error.'</div>';
				}



				?>


				<br />
				<br />

					<input type="text" name="username" placeholder="username" id="username"/>
				<br />
				<br />

					<input type="password" name="password" placeholder="password" id="password"/>
				<br />
				<br />

					<input id="button" type="submit" value="Login" />
				</form>
				</div>
				</div>
			<hr />
			<hr />
			<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.jd'></script>


		</body>



</html>
