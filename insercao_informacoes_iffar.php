<?php
	include "conexao.php";
	$oque = $_POST['oque'];
	$sobre = $_POST['sobre'];
	$onde = $_POST['onde'];
	$contato = $_POST['contato'];


	$incert = "INSERT INTO iffar (local_iffar, oque, contato, sobre) VALUES ('$onde', '$oque', '$contato', '$sobre')";
	$query = mysqli_query($conectar, $incert);

	if($query){
		echo "<h2>Registo inserido com sucesso!</h2>";

	}else{
		
		echo"<h2>Erro ao inserir cadastro!".mysqli_error($conectar)."</h2>";
		

	}
	mysqli_close($conectar); 

?>