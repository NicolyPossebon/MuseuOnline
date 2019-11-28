<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>CADASTRO MODERADOR</title>
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
   <nav class="navbar navbar-expand-lg navbar-light bg-white">
          <a class='navbar-brand pl-2' href='home_adm.php'>
            <img src="logo.png" width="55" height="55" class="d-inline-block" alt="">
            <span class="">Era Uma Vez No IFFar - Fw</span>
          </a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Alterna navegação" style="background-color: #C0C0C0;">
        <span class="navbar-toggler-icon"></span>
        </button>
       </nav>
            
          
            <div class="container d-flex justify-content-center" style="padding-top: 50px">
            <div class="form-row align-items-center fundo">

            <form method="POST" action="salva_cadastro_moderador.php" enctype="multipart/form-data" />

            <div class="col-auto">
            <center><h2>Cadastre Um Novo Moderador!</h2></center>
            </div>

            <div class="col-auto">
            <center>
            <i class="fas fa-user-circle fa-7x mrgin"></i>
            </center>

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
            
        </div>
        <div class="col-auto">

            <div class="col-auto">
            <label>Nome:</label>
            <input type="text"  name="nome" required class="form-control" />
            </div>
           
            <div class="col-auto">
            <label>E-mail:</label>
            <input type="email" name="email" required class="form-control" />
            </div>

            <div class="col-auto">
            <label>Senha:</label>
            <input type="password" name="senha" class="form-control"/>
            </div>

            <div class="col-auto">
            <label>Foto</label>
            <input type="file"  name="foto" class="form-control">
            </div>

            <center><br><button type="submit" class="btn btn-dark">Cadastrar</button></center>
           </form>
        </div>
    </div>
             
 
    </body>
</html>