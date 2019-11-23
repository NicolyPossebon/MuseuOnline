<?php

	session_start();
	include "conexao.php";

	$id = $_SESSION['usuario'];
	$nome = $_POST['nome'];
	$email = $_POST['email'];

	$editar = "UPDATE usuario SET nome = '$nome', email = '$email' WHERE id_usuario = $id";
	$query  = mysqli_query($conectar, $editar);

	if($query)
		header("location: perfil.php");
	else
		echo "Edição não feita.";

	mysqli_close($conectar);

?>