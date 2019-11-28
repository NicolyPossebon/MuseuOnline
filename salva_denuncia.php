<?php

	session_start();
	include "conexao.php";

	$id_usuario = $_SESSION['usuario'];
	$id_postagem = $_POST['id'];
	$motivo = $_POST['denuncia'];
	$data = date("Y-m-d H-i-s");
	echo $data;


 	$sql = "INSERT INTO denuncias (motivo, data_denuncia, id_usuario, id_postagem) VALUES ('$motivo', '$data', $id_usuario, $id_postagem)";
 	$query = mysqli_query($conectar, $sql);

 	$sql1 = "UPDATE postagens SET status_moderacao = 0 WHERE id_postagem = $id_postagem";
 	$query1 = mysqli_query($conectar, $sql1);

 	if($query){
 		echo "denuncia feita";
 	} else{
 		echo "erro";
 	}

 	if($_SESSION['tipo'] == 1){
 		header('location:1960.php');
 	}else {
 		header('location:1960.php');
 	}
?>