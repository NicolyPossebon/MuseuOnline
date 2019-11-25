<html>
<?php

session_start();
include "conexao.php";

?>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title> 1960 </title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="css/estilo.css">
  <link rel="stylesheet" href="../assets/css/linha.css">
  <link rel="stylesheet" type="text/css" href="icons/css/all.css">

</head>

<body>

 <nav class="navbar navbar-expand-lg navbar-light bg-white">

      <?php 
          if(isset($_SESSION['tipo'])){
            if($_SESSION['tipo'] == 1){
              echo "<a class='navbar-brand pl-2' href='home_contribuidor.php'>";
            } else if ($_SESSION['tipo'] == 0){
              echo "<a class='navbar-brand pl-2' href='home_adm.php'>"; 
            }
          }else {
              echo "<a class='navbar-brand pl-2' href='home_usuario.php'>";
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
      </div>
    </div>
  </div>
</nav>
<?php

//TESTANDO CARDS
echo "<center> <p>";

//Select que pega as postagens que já foram moderadas.
$sql = "select * from postagens where status_moderacao = 1 and ano_postagem between 1990 and 1999";
$result = mysqli_query($conectar, $sql);

//FORECHA POSTAGENS
    foreach ($result as $postagens) {
        $id = $postagens['id_postagem'];
        $id_usuario = $postagens['id_usuario'];
        $ano = $postagens['ano_postagem'];

    //Primeira div do Card
    echo "<div class='card' style='width: 50rem;'>";

          //Foreach do Usuário
          $usuario = "SELECT * FROM usuario WHERE id_usuario = $id_usuario";
          $result_usuario = mysqli_query($conectar, $usuario);
          foreach ($result_usuario as $informacoes_usuario) {
              echo "<div class='titulo'> Autor: </div> ";
              // echo "<img  class='fotoperfilpostagens' src='".$informacoes_usuario['foto']."'> ";
              echo $informacoes_usuario['nome']."  ";
              echo $informacoes_usuario['email'];
          }

              $sql1 = "SELECT * FROM arquivos WHERE id_postagem = $id";
              $result2 = mysqli_query($conectar, $sql1);

        echo "<div class='card-body'>";
    echo"<p class='card-text'>";
    echo "<div class='titulo'>".$postagens['titulo']."</div>";
   // echo "<div class='ano'> Ano: ".$postagens['ano_postagem']."</div> <br>";

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
                        </audio> <br> </div>";
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

    //Ano
    echo "<div class='titulo'>Ano: </div> ";
    echo  "<div class='texto'>".$postagens['ano_postagem']."</div><br>";

    //Descrição
    echo "<div class='titulo'>Descrição: </div> ";
    echo  "<div class='texto'>".$postagens['descricao_postagem']."</div><br>";



      if(isset($_SESSION['usuario'])){
          $select = "SELECT * FROM curtidas WHERE id_postagem = $id and id_usuario = ".$_SESSION['usuario'];
          $puxa = mysqli_query($conectar, $select); 
          $rows = mysqli_num_rows($puxa);

        //CURTIDAS
        $selecionacurtidas = "SELECT * FROM curtidas WHERE id_postagem = $id";
        $sql1 = mysqli_query($conectar, $selecionacurtidas);
        $contacurtidas = mysqli_num_rows($sql1);

          if ($rows == 1){
            echo $contacurtidas."<a href='curtir.php?id=$id&ano=$ano' <i class='fas fa-heart' ></i> </a>";
            //echo "<a href='curtir.php?id=$id&ano=$ano'>Descurtir </a> ";
          } else{
            echo $contacurtidas."<a href='curtir.php?id=$id&ano=$ano' <i class='far fa-heart'></i> </a>";
          }  

          //DENÚNCIA
          echo "<a href='denunciar.php?id=$id&ano=$ano' <i class='fas fa-exclamation-circle'> </i></a> <br>"; 

echo "<p>";
}
 

 

echo "</div>";
echo "</div>";
echo "<br>";
}
echo "</center";
?>
<script type="text/javascript" src="icons/js/all.js"></script> 

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>
</html>