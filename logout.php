<?php
/*
­ remove logged in session tracking

­ redirects user to login.php
*/
?>
<?php
session_start();
require_once 'includes.php';
$user = new USER();

if(!$user->is_logged_in())
{
	$user->redirect('private.php');
}

if($user->is_logged_in()!="")
{
	$user->logout();	
	$user->redirect('login.php');
}
?>