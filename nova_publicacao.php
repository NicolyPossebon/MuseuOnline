<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title> NOVA PUBLICAÇÃO</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" href="estilo.css">

	
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


<!-- CSS NAV -->
	 <nav class="navbar navbar-expand-lg navbar-light bg-white">

       <?php
           if($_SESSION['tipo'] == 1){
              echo "<a class='navbar-brand pl-2' href='home_contribuidor.php'>
            <img src='logo.png' width='55' height='55' class='d-inline-block'>
            <span class=''>Era Uma Vez No IFFar - Fw</span>
          </a>";
            }else {
             echo "<a class='navbar-brand pl-2' href='home_adm.php'>
            <img src='logo.png' width='55' height='55' class='d-inline-block' alt=''>
            <span class=''>Era Uma Vez No IFFar - Fw</span>
          </a>";
            }
            ?>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Alterna navegação" style="background-color: #C0C0C0;">
        <span class="navbar-toggler-icon"></span>
        </button>
  </nav>

  <!--CSS DO FORM -->

   	<div class="container d-flex justify-content-center" style="padding-top: 20px">
    <div class="form align-items-center fundo col-10 col-sm-8 col-md-8 col-lg-6 col-xl-6">

<form method="post" action="salva_nova_publicacao.php" enctype="multipart/form-data">
		    <div class="col-auto">
            <center><h2>Faça a sua Publicação!</h2>
   			</div>
			</center>

   			<?php 
			if(isset($_SESSION['arquivo_invalido'])) {
				echo "<div class='alert alert-danger' role='alert'>";
				echo $_SESSION['arquivo_invalido'];
				echo "</div>";	
				unset($_SESSION['arquivo_invalido']);
			}
			?>
			<br>
	<div class="col-auto">
	<label>Título da Publicação:</label> 
	<input type="text" name="titulo" class="form-control"> <br>
	</div>

	<div class="col-auto">
	<label>Descrição da Publicação:</label> 
	<textarea name="descricao" class="form-control"></textarea> <br>
	</div>

	<div class="col-auto">
	<label>Ano da Publicação:</label> 
	<select name="ano" class="form-control"> 
 	  <?php for($i = 0; $i < 60; $i++){
 	  $ano = 1960 + $i;
 	  echo "<option value='$ano'>$ano</option>";
 	} ?>
	</select><br>
	</div>

	<div class="col-auto">
	<label>Arquivo da Postagem:</label> 
	<input type="file" name="foto[]" multiple class="form-control"> <br>
	<div class="col-auto">

             <center><br><button type="submit" class="btn btn-dark">Cadastrar</button></center>
    </div>
	</center>
	</form>
</div>
</div>



<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>
</html>