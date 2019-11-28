<?php
    session_start();
    include "conexao.php";
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title> SOBRE O IFFar - FW</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="estilo.css">
  <style>
  p{
    word-wrap: normal;
  }
</style>
</head>
<body>

 <nav class="navbar navbar-expand-lg navbar-light bg-white">


  <a class='navbar-brand pl-2' href='home_adm.php'>
            <img src="logo.png" width="55" height="55" class="d-inline-block" alt="">
            <span class="">Era Uma Vez No IFFar - Fw</span>
          </a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Alterna navegação" style="background-color: #C0C0C0;">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarTogglerDemo01">
         
          <ul class="navbar-nav text-dark" style="font-size: 16.5px;">

 				<li class="nav-item pr-3 active">
			       <a class="nav-link" href="edicao_informacoes_iffar.php">Editar</a>
			    </li>
         
         </ul>
      </div>
    </div>
  </div>
</nav>
	<div class="container data-slide col-md-6 col-lg-6 col-xg-6"  style="margin-top: 25px;">
    <!-- Utiliza a classe carousel slide para que o bootstrap saiba que ali será um componente de imagem e a classe slide é utilizada para que ele passe as imagens automaticamente
    Outro ponto importante é o nome da div id="carousel" ele será utilizado para ligar os botões de avançar e voltar co componente carrousel -->
    <div id="carousel" class="carousel slide" data-ride="carousel" >
      <ol class="carousel-indicators">
      <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
      <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
      <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
    </ol>
      <div class="carousel-inner">
        <!-- Aqui cria-se uma imagem (item) do carousel através da classe carousel-item a classe active define qual será a imagem ativa ao abrir o site pela primeira vez -->
        <div class="carousel-item active">
          <img src="https://picsum.photos/id/10/2500/1667" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
          <h5>First slide label</h5>
          <p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p>
        </div>
        </div>
        <div class="carousel-item">
          <img src="https://picsum.photos/id/10/2500/1667" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
          <h5>First slide label</h5>
          <p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p>
        </div>
        </div>

        <div class="carousel-item">
          <img src="https://picsum.photos/id/10/2500/1667" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
          <h5>First slide label</h5>
          <p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p>
        </div>
        </div>

        <!-- neste ponto cria-se os botões de avançar e voltar notem que o href dos botões estão apontado para o nome do carousel através do #carousel -->
        <a class="carousel-control-prev" href="#carousel" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Volar</span>
        </a>
        <a class="carousel-control-next" href="#carousel" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Avançar</span>
        </a>
      </div>
    </div>
  </div>  

<div class="container d-flex justify-content-center" style="margin-bottom: 20px; margin-top: 20px">
            <div class="form align-items-center fundo col-12">

   <form method="POST" action="envia.php" enctype="multipart/form-data">
     <div class="col-auto">
       <center><h2>Informações</h2></center>
     </div>
     <hr>
   <div class="col-auto">
    <?php
    $iffar = "SELECT * FROM iffar WHERE id_iffar = 0";
    $query = mysqli_query($conectar, $iffar);
    $informacoes = mysqli_fetch_assoc($query);

    echo '<b>'."O que é o IFFAR - FW: ".'</b>' . '<p>'.$informacoes['oque'].'</p>';
    echo '<hr>';
    echo '<b>'."Sobre o IFFAR - FW: ".'</b>' . '<p>'.$informacoes['sobre'].'</p>';   
    echo '<hr>';
    echo '<b>'."Onde fica o IFFAR - FW: ".'</b>'. '<p>'.$informacoes['local_iffar'].'</p>';
    echo '<hr>';
    echo '<b>'."Onde fica o IFFAR - FW: ".'</b>'. '<p>'. $informacoes['contato'].'</p>';

  ?>
                 
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>