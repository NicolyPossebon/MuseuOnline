<?php

session_start();
include "conexao.php";

$id = $_POST['id'];

if(isset($_POST['sim'])){

	$sql = "UPDATE postagens SET status_moderacao = 1 WHERE id_postagem = $id";
	$query = mysqli_query($conectar, $sql);
	header('location: moderacao.php');

} else if(isset($_POST['nao'])) {
	$sql  = "DELETE FROM arquivos  WHERE id_postagem = $id";
	$sql2 = "DELETE FROM postagens WHERE id_postagem = $id";
	$sql3 = "DELETE FROM curtidas  WHERE id_postagem = $id";
	$sql4 = "DELETE FROM denuncias WHERE id_postagem = $id";

	$query  = mysqli_query($conectar, $sql );
	$query2 = mysqli_query($conectar, $sql2);
	$query3 = mysqli_query($conectar, $sql3);
	$query4 = mysqli_query($conectar, $sql4);

	header('location: moderacao.php');
}

?>