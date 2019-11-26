<?php
	session_start();
	
	unset($_SESSION['usuario']);
	unset($_SESSION['tipo']);
	session_unset();

	header("location:login.php");

?>	
