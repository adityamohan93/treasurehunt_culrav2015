<?php

	session_start();
	
	if(!isset($_SESSION['id']))
	{
		header('Location: ./index.php');
		die();
	}
	
	session_destroy();

	header("Location: ./index.php");
	die("Redirecting to: ./index.php");

?>