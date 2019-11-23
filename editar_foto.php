<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>EDITAR FOTO</title>
   	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<?php
		session_start();
		include "conexao.php";

	//Teste para não deixar ninguem não logado entrar
    if(!$_SESSION['usuario']) {
      $_SESSION['erros'] = "É necessário fazer login para acessar essa página!";
      header('location:login.php');
   } 

		$id = $_SESSION['usuario'];
		$sql = "select foto from usuario where ID_usuario = $id";
		$result = mysqli_query($conectar, $sql);
		$user = mysqli_fetch_assoc($result);
		mysqli_close($conectar);
	?>
</head>
<body>

	  <style>
   body{
    background-color: #ADD8E6;
   } 
   .fundo{
    background-color: white;
    padding: 20px;
    border:solid 0.5px;
    box-shadow: 10px 10px 10px 5px;
       }
       .align-items-center{
         margin-bottom:20px;
       }
</style>

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
        <ul class="navbar-nav text-dark" style="font-size: 16.7px;">  

      <li class="nav-item pr-3">
              <a class="nav-link text-dark" href="perfil.php">Perfil</a>
            </li>
    </ul>
  </div>
</nav>

	<div class="container d-flex justify-content-center" style="padding-top: 30px">
            <div class="form-row align-items-center fundo">

            <form method="POST" action="salva_edicao_foto.php" enctype="multipart/form-data">
            <div class="col-auto">
            <center><h2>FOTO</h2></center>
            <center><img src="<?php echo $user['foto'];?>"></center>
            <br><input type="file" name="foto">
            <br><input type="hidden" name="imagem" class="form-control" value="<?php echo $user['foto']?>">
            </div>

	<center><br><button type="submit" class="btn btn-dark">Enviar</button></center>
	</form>
 </div>

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>
</html>