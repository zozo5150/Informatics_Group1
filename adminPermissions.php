<?php
// check if user logged in, if not, kick them to login.php
	session_start();
	if(!isset($_SESSION['UserID'])) {
		// if this is not set, it means they are not logged in
		header("Location: login.php");
	}
	if $_SESSION['UserPerm'] < 1{
		//if user doesnt have permissions send them to inputhours page
		header("Location: add_Hours.php");
	}
?>