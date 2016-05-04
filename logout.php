<?php
	
	session_start();
//	session_unset();
	if (isset($_SESSION['UserID'])) {
		unset($_SESSION['UserID']);
	}
	session_destroy();

	header('Location: login.php');
	
?>