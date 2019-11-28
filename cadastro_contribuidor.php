<?php 
    session_start();
    include "conexao.php";

?>
<html>
    <head>
         <meta charset="utf-8">
        <title>CADASTRO_CONTRIBUIDOR</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
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
</style>

    </head>
    <body>

 <nav class="navbar navbar-expand-lg navbar-light bg-white">

        <a class="navbar-brand pl-2" href="home_usuario.php">
            <img src="logo.png" width="55" height="55" class="d-inline-block" alt="">
            <span class="">Era Uma Vez No IFFar - Fw</span>
          </a>

         <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Alterna navegação" style="background-color: #C0C0C0;">
          <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="collapse navbar-collapse justify-content-end" id="navbarTogglerDemo01">
         
          <ul class="navbar-nav text-dark" style="font-size: 16.5px;">  

            <li class="nav-item pr-3">
              <a class="nav-link text-dark" href="contato.php">Fale Conosco</a>
            </li>

            <li class="nav-item pr-3">
              <a class="nav-link text-dark" href="sobre_iffar_contribuidor.php">Sobre o IFFar</a>
            </li>
          
          </ul>
        </div>
</nav>
        

            <div class="container d-flex justify-content-center" style="padding-top: 50px">
            <div class="form align-items-center fundo col-6">

            <form method="POST" action="salva_cadastro_contribuidor.php" enctype="multipart/form-data" style="margin: 10px">
            <div class="col-auto">
            <center><h2>Cadastre-se</h2></center>
            </div>

              <?php 
                    if(isset($_SESSION['formato_invalido'])) {
                        echo "<div class='alert alert-info' role='alert'>";
                        echo $_SESSION['formato_invalido'];
                        echo "</div>"; 
                        unset($_SESSION['formato_invalido']);
                    }

                    if(isset($_SESSION['usuario_existe'])) {
                        echo "<div class='alert alert-info' role='alert'>";
                        echo $_SESSION['usuario_existe'];
                        echo "</div>"; 
                        unset($_SESSION['usuario_existe']);
                    }

                    if(isset($_SESSION['erro_upload'])) {
                        echo "<div class='alert alert-info' role='alert'>";
                        echo $_SESSION['erro_upload'];
                        echo "</div>"; 
                        unset($_SESSION['erro_upload']);
                    }

                    ?>

            <div class="col-auto">
            <br><label>Nome:</label>
            <br><input type="text"  name="nome" required  class="form-control">
            </div>

            <div class="col-auto">
            <br><label>E-mail:</label>
            <br><input type="email" name="email" required  class="form-control">
            </div>

            <div class="col-auto">
            <br><label>Senha:</label>
            <br><input type="password" name="senha" class="form-control">
            </div>

            <div class="col-auto">
            <br><label>Foto</label>
            <br><input type="file" name="foto" class="form-control">
            </div>

             <center><br><button type="submit" class="btn btn-dark">Cadastrar</button></center>
           </form>
          
             </div>
         </div>
        
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </body>
</html>