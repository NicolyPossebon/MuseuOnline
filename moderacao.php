<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>MODERAÇÃO DE POSTAGENS</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="css/estilo.css">
  <link rel="stylesheet" type="text/css" href="icons/css/all.css">

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
       </nav>

<center>
	<p>
		<?php
		session_start();
		include "conexao.php";

		//Teste para não deixar ninguem não logado entrar
    	if(!$_SESSION['usuario']) {
	      $_SESSION['erros'] = "É necessário fazer login para acessar essa página!";
	      header('location:login.php');
	    } 

		$id = $_SESSION['usuario'];
		$sql = "SELECT * FROM postagens WHERE status_moderacao = 0 and id_usuario != $id";
		$query = mysqli_query($conectar, $sql);


		foreach ($query as $postagens) {

		echo "<p>";

		$id = $postagens['id_postagem'];
		echo "<div class='card' style='width: 50rem;'>";

		echo "<div class='titulo'>".$postagens['titulo']."</div>";
		
		//echo $postagens['id_postagem'];

		

		$sql1 = "SELECT * FROM arquivos where id_postagem = $id";
		$result1 = mysqli_query($conectar, $sql1);

		  // Parte do Carrosel
      echo "<div id='carouselExampleIndicators' class='carousel slide' data-ride='carousel'>
            <ol class='carousel-indicators'>
            </ol>
            <div class='carousel-inner'>";


            foreach($result1 as $key => $foto){

              if($key == 0){
                echo "<div class='carousel-item active'>";
              } else {
                echo "<div class='carousel-item'>";
              }
              
              if($foto['tipo_arquivo'] == "foto"){
                  echo "<img src='".$foto['endereco_arquivo']."' class='d-block w-100' width='360' height='400' alt='...''>
                 </div>";
              }else if ($foto['tipo_arquivo'] == "audio"){
                  echo "<audio preload='none' controls='controls'>
                          <source src='".$foto['endereco_arquivo']."'/>
                        </audio> <br>";
              }
            }

       echo  "<a class='carousel-control-prev' href='#carouselExampleIndicators' role='button' data-slide='prev'>
              <span class='carousel-control-prev-icon' aria-hidden='true'></span>
              <span class='sr-only'>Previous</span>
            </a>
       
            <a class='carousel-control-next' href='#carouselExampleIndicators' role='button' data-slide='next'>
              <span class='carousel-control-next-icon' aria-hidden='true'></span>
              <span class='sr-only'>Next</span>
            </a>
      </div>";
	echo "</div>";


	echo "<div class='card-body'>";
		echo "<p class='card-text'>";

		//Ano
	    echo "<div class='titulo'>Ano: </div> ";
   		echo  "<div class='texto'>".$postagens['ano_postagem']."</div><br>";

		//Descrição
		echo "<div class='titulo'>Descrição: </div> ";
    	echo  "<div class='texto'>".$postagens['descricao_postagem']."</div><br>";

 		echo "</p>";


		echo "<form action='salva_moderacao.php' method='POST'>
			<!--ID da postagem -->
			<input type='hidden' name='id' value='$id'>
			<!-- Botão de Aceitar -->
			<input type='submit' class='btn btn-outline-info' name='sim' value='Confirmar'>
			<!-- Botão de Excluir -->
			<input type='submit' class='btn btn-outline-info' name='nao' value='Excluir'>
		</form>";

	echo "</div>";
	echo "</div>";
	echo "</p>";

		}
		
	?>
</p>
</center>
<script type="text/javascript" src="icons/js/all.js"></script> 

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>
</html>