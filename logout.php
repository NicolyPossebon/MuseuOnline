<?php
	session_start();
	
	unset($_SESSION['usuario']);
	unset($_SESSION['tipo']);
	header("location:login.php");

?>	
