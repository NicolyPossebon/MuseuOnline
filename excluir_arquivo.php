<?php
	session_start();
	include "conexao.php";

	$id_arquivo = $_GET['id'];

	$sql = "DELETE FROM arquivos WHERE id_arquivo = $id_arquivo";
	$query = mysqli_query($conectar, $sql);

	header('location:editar_postagem.php');
?>