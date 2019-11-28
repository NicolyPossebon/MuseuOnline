<!DOCTYPE html>
<html>
<head>
	<title>EXCLUIR POSTAGEM</title>
</head>
<body>
	<?php
	session_start();
	include "conexao.php";

	//Teste para não deixar ninguem não logado entrar
    if(!$_SESSION['usuario']) {
	    $_SESSION['erros'] = "É necessário fazer login para acessar essa página!";
	    header('location:login.php');
	} 

	$id = $_GET['id'];
	$tipo = $_SESSION['tipo'];
	
	$sql  = "DELETE FROM arquivos  WHERE id_postagem = $id";
	$sql2 = "DELETE FROM postagens WHERE id_postagem = $id";
	$sql3 = "DELETE FROM curtidas  WHERE id_postagem = $id";
	$sql4 = "DELETE FROM denuncias WHERE id_postagem = $id";

	$query  = mysqli_query($conectar, $sql );
	$query2 = mysqli_query($conectar, $sql2);
	$query3 = mysqli_query($conectar, $sql3);
	$query4 = mysqli_query($conectar, $sql4);

	header('location: perfil.php');
	?>
</body>
</html>