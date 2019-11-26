	<?php
		session_start();
		include "conexao.php";
		//Teste para não deixar ninguem não logado entrar
    	if(!$_SESSION['usuario']) {
	      $_SESSION['erros'] = "É necessário fazer login para acessar essa página!";
	      header('location:login.php');
	    } 
	   
	    $id_postagem = $_GET['id'];
	    $sql = "SELECT * FROM postagens WHERE id_postagem = $id_postagem";
	    $query = mysqli_query($conectar, $sql);
	    $post = mysqli_fetch_array($query);

	    $sql1 = "SELECT * FROM arquivos WHERE id_postagem = $id_postagem";
	    $query1 = mysqli_query($conectar, $sql1);
	  

	    mysqli_close($conectar);
	?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" href="css/estilo.css">
	<link rel="stylesheet" type="text/css" href="icons/css/all.css">


	<title>EDITAR POSTAGEM</title>

</head>
<body>

<!-- CSS NAV -->
	 <nav class="navbar navbar-expand-lg navbar-light bg-white">
	      	<?php if($_SESSION['tipo'] == 1){
	             echo "<a class='navbar-brand pl-2' href='home_contribuidor.php'>";
	            } else if ($_SESSION['tipo'] == 0){
	              echo "<a class='navbar-brand pl-2' href='home_adm.php'>"; 
	          	} 
	        ?>
            <img src="logo.png" width="55" height="55" class="d-inline-block" alt="">
            <span class="">Era Uma Vez No IFFar - FW </span>
          </a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Alterna navegação" style="background-color: #C0C0C0;">
        <span class="navbar-toggler-icon"></span>
        </button>
 		<div class="collapse navbar-collapse justify-content-end" id="navbarTogglerDemo01">
	          <ul class="navbar-nav text-dark" style="font-size: 16.5px;">		
				 <li class="nav-item pr-3 active">
				    <a class="nav-link" href="perfil.php">Perfil</a>
				 </li>
			 </ul>
		</div>
	</nav>

<!-- CSS FORM -->

	<div class="container d-flex justify-content-center" style="padding-top: 30px">
    <div class="form-row align-items-center fundo">

		<form method="post" action="salva_edicao_postagem.php" enctype="multipart/form-data">
	

			<div class="col-auto">
                <center><h2>Edite sua Publicação!</h2></center>
            </div>

		<input type="hidden" name = "id" value= <?php echo $id_postagem; ?>>

		<div class="col-auto">
		<label>Título da Postagem</label> <br>
		<input type="text" name="titulo" class="form-control" value="<?php echo $post['titulo']; ?>"><br>
		</div>

		<div class="col-auto">
		<label>Descrição da Postagem</label> <br>
		<input type="text" name="descricao" class="form-control" value="<?php echo $post['descricao_postagem']; ?>"> <br>
		</div>

		<div class="col-auto">
		<label>Ano da Postagem</label> <br>
		<select required class="form-control" name="ano"> <br>
	 	  <?php for($i = 0; $i < 70; $i++){
	 	  $ano = 1950 + $i;
	 	  echo "<option value='$ano'>$ano</option> ";
	 	 
	 	} ?>
		</select>
		</div>

		<div class="col-auto">
		<label>Escolher Mais arquivos</label> <br>
		<input type="file" name="foto[]" class="form-control" value = "<?php echo $arquivo['endereco_arquivo']; ?>" multiple> <br>
		</div>

		<?php 
			foreach ($query1 as $foto) {

				$id_arquivo = $foto['id_arquivo'];
				echo "<center> <br> <a href='excluir_arquivo.php?id_arquivo=$id_arquivo&id=$id_postagem' <i class='fas fa-trash'></i> EXCLUIR</a> <br> </center> ";
				    if($foto['tipo_arquivo'] == "foto"){
	      			  echo "<center> <img src='".$foto['endereco_arquivo']."' width='360' height='400'> <br> </center>";
	    			} else if ($foto['tipo_arquivo'] == "audio"){
	     				 echo "<audio autoplay='autoplay' controls='controls'>
	             			 		<source src='".$foto['endereco_arquivo']."'/>
	            			  </audio> <br>";
			}
		}
		?>
		<br>
		<center>
		<input type="submit" class='btn btn-outline-primary' name="Salvar" > <br>
		</center>
		</form>

	</div>
	</div>

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>
</html>