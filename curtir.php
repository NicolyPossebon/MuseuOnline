	<?php
		session_start();
		include "conexao.php";
		//Teste para não deixar ninguem não logado entrar
    	if(!$_SESSION['usuario']) {
	      $_SESSION['erros'] = "É necessário fazer login para acessar essa página!";
	      header('location:login.php');
	    } 

	    $id_postagem = $_GET['id'];
	    $id_usuario = $_SESSION['usuario'];
	    $data = date("Y-m-d H-i-s");
	    $ano = $_GET['ano'];


	  	//Algum teste para ver se o usuário já curtiu a publi.
	  	$select = "SELECT * FROM curtidas WHERE id_postagem = $id_postagem and id_usuario = $id_usuario";
	  	$puxa = mysqli_query($conectar, $select);
	  	$rows = mysqli_num_rows($puxa);

	  	//Se não retornar nenhuma linha(0), é porque ninguém curtiu, então..
	  	if($rows == 0){

	    	$adiciona = "INSERT INTO curtidas (data_curtida,  id_postagem, id_usuario) 
	    				 VALUES ('$data', $id_postagem, $id_usuario)";

		    $result = mysqli_query($conectar, $adiciona);
		    header('location: home_adm.php');


		//volta pra página do ano certo
		$selectano = "SELECT * FROM postagens WHERE id_postagem = $id_postagem";
		$queryano = mysqli_query($conectar, $selectano);
		$fetch = mysqli_fetch_array($queryano);


		if($ano >= 1960 and $ano < 1970){
			header('location:1960.php');
		}else if($ano >= 1970 and $ano < 1980){
			header('location:1970.php');
		}else if($ano >= 1980 and $ano < 1990){
			header('location:1980.php');
		}else if($ano >= 1990 and $ano < 2000){
			header('location:1990.php');
		}else if($ano >= 2000 and $ano < 2010){
			header('location:2000.php');
		}else if($ano >= 2010 and $ano < 2020){
			header('location:2010.php');
		}
	   
		//Se alguém curtiu, irá retornar um linha, então quer dizer que a pessoa "desfazer o like", já que só pode curtir uma vez
		} else{
			$excluircurtida = "DELETE FROM curtidas WHERE id_postagem = $id_postagem and id_usuario = $id_usuario";
			
			$result2 = mysqli_query($conectar, $excluircurtida);
			//header('location: home_adm.php');

		if($ano >= 1960 and $ano < 1969){
			header('location:1960.php');
		}else if($ano >= 1970 and $ano < 1979){
			header('location:1970.php');
		}else if ($ano >= 1980 and $ano < 1989){
			header('location:1980.php');
		}else if ($ano >= 1990 and $ano < 1999){
			header('location:1990.php');
		}else if ($ano >= 2000 and $ano < 2009){
			header('location:2000.php');
		}else if ($ano >= 2010 and $ano < 2019){
			header('location:2010.php');
		}
		}
	?>