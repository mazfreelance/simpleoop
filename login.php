<?php
/*
- contains the login form

­ verifies login attempt with data from users.txt

­ create a logged in session for tracking

­ displays appropriate message on failed login attempt
*/
?>
<?php
session_start();
require_once 'includes.php';
$user_login = new USER();

if($user_login->is_logged_in()!="")
{
	$user_login->redirect('private.php');
}

if(isset($_POST['submit']))
{
	$user = trim($_POST['user']);
	$upass = trim($_POST['pass']);
	
	if($user_login->login($user,$upass))
	{
		$user_login->redirect('private.php');
	}
}
?>
<!doctype html>
<!-- Website template by freewebsitetemplates.com -->
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Login</title>
	<link rel="stylesheet" href="css/style.css" type="text/css">
	<link rel="stylesheet" type="text/css" href="css/mobile.css">
	<script src="js/mobile.js" type="text/javascript"></script>
</head>
<body>
	<div id="page">
		<div id="header">
			<div>
				<a href="index.html" class="logo"><img src="images/logo.png" alt=""></a>
				<ul id="navigation">
					<li>
						<a href="index.php">Home</a>
					</li>
					<li class="selected">
						<a href="login.php">Login</a>
					</li> 
					<li>
						<a href="contact.html">Contact</a>
					</li>
				</ul>
			</div>
		</div>
		<div id="body">
			<div class="header">
				<div class="contact">
					<h1>Login</h1>
                    <?php
        if(isset($_GET['error']))
		{
			?>
             <h3><font color="#FF0000">
				<center>Wrong Details!<br/>Please insert the correct username and password</center>
                </font> 
            </h3>
            <?php
		}
		?>
				  <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="loginf" id="loginf">
                    	<h3><font color="#FFFFFF">Username:</font></h3>
					<input type="text" name="user" id="user"/>
                      <h3><font color="#FFFFFF">Password:</font></h3>
						<input type="password" name="pass" id="pass"/>
					  <input type="submit" value="Login" name="submit" id="submit">
					</form>
				</div>
			</div>
		</div>
		<div id="footer">
			<div class="connect">
				<div>
					<h1>FOLLOW OUR  MISSIONS ON</h1>
					<div>
						<a href="http://freewebsitetemplates.com/go/facebook/" class="facebook">facebook</a>
						<a href="http://freewebsitetemplates.com/go/twitter/" class="twitter">twitter</a>
						<a href="http://freewebsitetemplates.com/go/googleplus/" class="googleplus">googleplus</a>
						<a href="http://pinterest.com/fwtemplates/" class="pinterest">pinterest</a>
					</div>
				</div>
			</div>
			<div class="footnote">
				<div>
					<p>&copy; 2023 BY SPACE PROSPECTION | ALL RIGHTS RESERVED</p>
				</div>
			</div>
		</div>
	</div>
</body>
</html>