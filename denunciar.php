<?php 
	session_start();
	include "conexao.php";
	//Teste para não deixar ninguem não logado entrar
    if(!$_SESSION['usuario']) {
      $_SESSION['erros'] = "É necessário fazer login para acessar essa página!";
      header('location:login.php');
    } 

    $id = $_GET['id'];
     ?>
<!DOCTYPE html>
<html>
<head>
		<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>DENUNCIE!</title>
	 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	 <link rel="stylesheet" type="text/css" href="estilo.css">

</head>
<body>
	 <nav class="navbar navbar-expand-lg navbar-light bg-white ">

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
        
        <div class="collapse navbar-collapse justify-content-end" id="navbarTogglerDemo01">
         
          <ul class="navbar-nav text-dark" style="font-size: 16.5px;">

            <li class="nav-item pr-3">
              <a class="nav-link text-dark" href="perfil.php">Perfil</a>
            </li>

            <li class="nav-item pr-3">
              <a class="nav-link text-dark" href ="javascript:history.back()">Voltar</a>
            </li>
           
         </ul>  
  </div>
</nav>

<div class="container d-flex justify-content-center" style="padding-top: 80px">
            <div class="form align-items-center fundo col-6" style="margin: 50px; height: 210px">

	<form action="salva_denuncia.php" method="POST">

		<div class="col-auto">
		<label><h3>MOTIVO!</h3></label> <br>
    <textarea name="denuncia" class="form-control" required></textarea>
		</div>
    <br>
		<input type="hidden" name ="id" value="<?php echo $id; ?>">

    <center><button type="submit" class="btn btn-dark">Enviar</button></center>

	</form>
</div>
</div>

</body>
</html>