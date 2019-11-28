<?php
	session_start();
	include "conexao.php";

	$id = $_SESSION['usuario'];

	$senha = $_POST['senha'];

	$edicao = "UPDATE usuario SET senha = md5('$senha')";
	$query = mysqli_query($conectar, $edicao);

	if($query) {
		header('location: perfil.php');
	}
	else {
		header('loation: editar_senha.php');
	}

	mysqli_close($conectar);

?>
