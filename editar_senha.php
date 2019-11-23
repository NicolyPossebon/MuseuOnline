<!DOCTYPE html>
<html>
<head>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>EDITAR PERFIL</title>
	 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	 <link rel="stylesheet" type="text/css" href="css/estilo.css">

	<?php
	session_start();

	    //Teste para não deixar ninguem não logado entrar
    if(!$_SESSION['usuario']) {
      $_SESSION['erros'] = "É necessário fazer login para acessar essa página!";
      header('location:login.php');
    } 

	?>
</head>
<body>

	 <nav class="navbar navbar-expand-lg navbar-light bg-white">

            <?php
        if($_SESSION['tipo']  == 1){
          echo "<a class='navbar-brand pl-2' href='home_contribuidor.php'>";
        } else {
          echo "<a class='navbar-brand pl-2' href='home_adm.php'>";
        }
        ?>

            <img src="logo.png" width="55" height="55" class="d-inline-block" alt="">
            <span class="">Era Uma Vez No IFFar - Fw</span>
          </a>

         <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Alterna navegação" style="background-color: #C0C0C0;">
          <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="collapse navbar-collapse justify-content-end" id="navbarTogglerDemo01">
         
          <ul class="navbar-nav text-dark" style="font-size: 16.5px;">

            <li class="nav-item pr-3">
              <a class="nav-link text-dark" href="perfil.php">Perfil</a>
            </li>
           
         </ul>  
  </div>
</nav>


<div class="container d-flex justify-content-center" style="padding-top: 70px">
<div class="form-row align-items-center fundo">

	<form action="salva_edicao_senha.php" method="POST" style="margin:25px">
		
		<div class="col-auto">
		<br><label class="control-label">Editar Senha</label>  
		<input type="password" class="form-control" name="senha">
		</div>

		 <center><br><button type="submit" class="btn btn-dark">Enviar</button></center>
	</form>


	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>
</html>