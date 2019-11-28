<?php 
session_start();

include "conexao.php";
$email = $_POST["email"];
$senha = $_POST["senha"];


	if(empty($email) or empty($senha)) { //Para ver se as variáveis foram estanciadas
		$_SESSION['erros'] = "Os campos não podem ser nulos!";
		header('location:login.php');
		exit;
	} 

 	$email = mysqli_real_escape_string($conectar, $email);
	$senha = md5(mysqli_real_escape_string($conectar, $senha));

	$pesquisa = "select * from usuario where email = '$email' and  senha = '$senha'";
	$resultado = mysqli_query($conectar, $pesquisa);
	$user = mysqli_fetch_array($resultado);
	$row = mysqli_num_rows($resultado);

	if($row == 1) {
		$_SESSION['usuario'] = $user['id_usuario'];
		$_SESSION['tipo'] = $user['tipo'];
		unset($_SESSION['erros']);
		if($_SESSION['tipo'] == 0 ){
			header('location: home_adm.php'); 
		}elseif ($_SESSION['tipo'] == 1){
			header('location:home_contribuidor.php');
		} 
	}else{
		$_SESSION['erros'] = "Usuário e senha incorretos!";
		header('location:login.php');
	}

	mysql_close($conectar);
?>
