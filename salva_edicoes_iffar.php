<?php
	include "conexao.php";
	$oque = $_POST['oque'];
	$sobre = $_POST['sobre'];
	$onde = $_POST['onde'];
	$contato = $_POST['contato'];


   $update = "UPDATE iffar SET local_iffar = '$onde', oque = '$oque', contato = '$contato', sobre = '$sobre' WHERE id_iffar = 1";
	$query = mysqli_query($conectar, $update);

	if($query){
		header('location:home_adm.php');

	}else{
		
		echo"<h2>Erro ao inserir cadastro!".mysqli_error($conectar)."</h2>";
	}
	mysqli_close($conectar); 

	header('location: sobre_iffar_moderador.php');
?>