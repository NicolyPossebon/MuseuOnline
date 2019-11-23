<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>SOBRE O IFFar - FW</title>

	<?php
		session_start();
		include "conexao.php";
		//Teste para não deixar ninguem não logado entrar
    	if(!$_SESSION['usuario']) {
	      $_SESSION['erros'] = "É necessário fazer login para acessar essa página!";
	      header('location:login.php');
	    } 
	?>
</head>
<body>

	<form method="POST" action="insercao_informacoes_iffar.php">
	<label>O que é o IFFar - FW?</label> <br>
	<input type="text" name="oque"> <br>

	<label>Sobre o IFFar - FW</label> <br>
	<input type="text" name="sobre"> <br>

	<label>Onde fica o IFFar - FW?</label> <br>
	<input type="text" name="onde"> <br>

	<label>Contato do IFFar- FW</label> <br>
	<input type="text" name="contato"> <br>

	<input type="submit" name="Enviar">
	</form>
	
</body>
</html>
