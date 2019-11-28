<?php
	session_start();
	include "conexao.php";
	$id = $_SESSION['usuario'];
	$imagem = $_POST['imagem'];


	if (isset($_FILES['foto'])){ //Comparação para ver se há alguma coisa na var global

			$extensoes_permitidas = array("png", "jpeg", "jpg", "JPG");
	        $extensao = pathinfo($_FILES['foto']['name'], PATHINFO_EXTENSION);

	 		if(in_array($extensao, $extensoes_permitidas)){ //Se a extensão que o usuario escolheu etiver no array:
	            $pasta ="fotosperfil/"; //pasta onde as imagens serão salvas
	            $temporario = $_FILES['foto']['tmp_name']; //nome temporário
	            $foto = uniqid().".$extensao"; // novo nome da foto. uniqid serve para não haverem fotos iguais.
	            $insert = $pasta.$foto;
				move_uploaded_file($temporario, $pasta.$foto);
	            
				if($imagem){ 
					unlink($imagem); //deleta a imagem antiga da foto se houver alguma
				}

			$sql = "update usuario set foto = '$insert' where id_usuario = $id";
			$result = mysqli_query($conectar, $sql);
			header("location: perfil.php");
		}else{

			header("location: editar_foto.php");

		}
	}
	mysqli_close($conectar);


?>
