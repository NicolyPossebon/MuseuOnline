<?php
	session_start();
	include "conexao.php";
		//Teste para não deixar ninguem não logado entrar
    	if(!$_SESSION['usuario']) {
	      $_SESSION['erros'] = "É necessário fazer login para acessar essa página!";
	      header('location:login.php');
	    } 
	


	//parte que busca as informações dos usuários
	$id_usuario = $_SESSION['usuario'];
	$sql = "SELECT * FROM usuario WHERE ID_usuario = $id_usuario";
	$result = mysqli_query($conectar, $sql);
	$user = mysqli_fetch_assoc($result);

 
?>

<html>
<head>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

	<title>PERFIL</title>
	<!-- Link Bootstrap -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" href="css/estilo.css">

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
            <span class="">Era Uma Vez No IFFar - FW</span>
          </a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Alterna navegação" style="background-color: #C0C0C0;">
        <span class="navbar-toggler-icon"></span>
        </button>
  

 		 <div class="collapse navbar-collapse justify-content-end" id="navbarTogglerDemo01">
         
          <ul class="navbar-nav text-dark" style="font-size: 16.5px;">		


			    <!-- DROPDOWN PARA EXCLUIR -->
			    <li class="nav-item pr-3 dropdown">
              		<a class="nav-link text-dark dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                	Editar
              		</a>
          				<div class="dropdown-menu" aria-labelledby="navbarDropdown">
			                <a class="dropdown-item" href="editar_nome.php">Nome e Email</a>
			                <a class="dropdown-item" href="editar_senha.php">Senha</a>
			                <a class="dropdown-item" href="editar_foto.php">Foto</a>
		             	</div>
           		</li>

           <!-- LOGOUT -->
			    <li class="nav-item pr-3 active">
			       <a class="nav-link" href="logout.php">Sair</a>
			    </li>

        
	

		 </ul>
	</div>
</nav>

		<div class="divperfil">

		<!--imagem -->
    <?php 
    if(empty($user['foto'])){
      echo "<img class='fotoperfil' width='100' src='fotouser.jpeg'>";
    } else {
      echo "<img class='fotoperfil' width='100' src=".$user['foto'].">";
    } 
     ?>
     
		<!--Nome Usuário -->
		<h3 class="usernameperfil"> <?php echo $user['nome'];?> </h3>
		<!--Email -->
		<h3 class="usernameperfil"> <?php echo $user['email'];?> </h3>


		</div>
<center>
  <p> </p>
    <?php

      $sql = "SELECT * FROM postagens where status_moderacao = 1 and id_usuario = $id_usuario";
      $result = mysqli_query($conectar, $sql);

  foreach ($result as $postagens) {
    $id = $postagens['id_postagem'];

    echo "<div class='card' style='width: 50rem;'>";
    //Título
    echo "<div class='titulo'>".$postagens['titulo']."</div>";

    // Seleciona as linhas da tabela
    $selecionacurtidas = "SELECT * FROM curtidas WHERE id_postagem = $id";
    $sql1 = mysqli_query($conectar, $selecionacurtidas);

    //Conta as curtidas
    $contacurtidas = mysqli_num_rows($sql1);
    if($contacurtidas > 1){
      echo $contacurtidas." curtiram <br> <br>";
    }

    $sql1 = "SELECT * FROM arquivos WHERE id_postagem = $id";
    $result2 = mysqli_query($conectar, $sql1);

      // Parte do Carrosel
      echo "<div id='carouselExampleIndicators' class='carousel slide' data-ride='carousel'>
            <ol class='carousel-indicators'>
            </ol>
            <div class='carousel-inner'>";


            foreach($result2 as $key => $foto){
              if($key == 0){
                echo "<div class='carousel-item active'>";
              } else {
                echo "<div class='carousel-item'>";
              }
              if($foto['tipo_arquivo'] == "foto"){
                  echo "<img src='".$foto['endereco_arquivo']."' class='d-block w-100' alt='...''>
                 </div>";
              }else if ($foto['tipo_arquivo'] == "audio"){
                  echo "<audio preload='none' controls='controls'>
                          <source src='".$foto['endereco_arquivo']."'/>
                        </audio> <br>";

                  echo "</div>";
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
        echo"<p class='card-text'>";

          //Ano
          echo "<div class='titulo'>Ano: </div> ";
          echo  "<div class='texto'>".$postagens['ano_postagem']."</div><br>";

          //Descrição
          echo "<div class='titulo'>Descrição: </div> ";
          echo  "<div class='texto'>".$postagens['descricao_postagem']."</div><br>";

          //Excluir        
          echo "<a class='btn btn-outline-primary' href='excluir_postagem.php?id=$id' name='excluir'> EXCLUIR</a>";

          //Editar
          echo "<a class='btn btn-outline-primary' href='editar_postagem.php?id=$id' name='editar'> EDITAR </a> <br>";

        echo "<p>";
      echo "</div>";
  echo "</div>";
echo "<br>";
}

?>

<!-- JavaScript jQuery 3.3.1, Popper.js 1.14.7, Bootstrap 4 -->
	 <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>



