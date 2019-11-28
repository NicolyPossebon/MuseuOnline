<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>EDIÇÃO SOBRE O IFFAR - FW</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="estilo.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">


  <?php
    session_start();
    include 'conexao.php';

  //Teste para não deixar ninguem não logado entrar
    if(!$_SESSION['usuario']) {
      $_SESSION['erros'] = "É necessário fazer login para acessar essa página!";
      header('location:login.php');
    } 
    
    $sql = "select * from iffar where id_iffar = 0";
    $result = mysqli_query($conectar, $sql);
    $iffar = mysqli_fetch_assoc($result);
    mysqli_close($conectar);
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

<div class="container d-flex justify-content-center" style="padding-top: 40px; margin-bottom: 20px">
            <div class="col-7 align-items-center fundo"> <!-- O col-7 faz aumentar o tamanho da caixa-->

                        <form method="POST" action="salva_edicoes_iffar.php" enctype="multipart/form-data" style="margin:20px">
                        <div class="col-auto">
                       <center><h2>Edição de informações</h2></center>
                        </div>

                       <div class="col-auto">
                            <br><label class="control-label">O que é o IFFAR-FW?</label>  
                              <br><textarea  name="oque" class="form-control" rows="2" value ="<?php echo $iffar['oque']?>" required></textarea>                          
                        
                        </div>
                        <div class="col-auto">
                            <br><label>Sobre o IFFar-FW:</label>
                            <br><textarea name="sobre" class="form-control" rows="2" value ="<?php echo $iffar['sobre']?>" required></textarea>                      
                        </div>

                       <div class="col-auto">
                            <br><label class="control-label">Onde fica o IFFar-FW?</label> 
                            <br><textarea name="onde" class="form-control" rows="2" value ="<?php echo $iffar['local_iffar']?>" required></textarea>
                           
                        
                        </div>


                       <div class="col-auto">
                            <br><label class="control-label">Contato do IFFar-FW:</label>                           
                            <br><textarea name="contato" class="form-control" rows="2" value ="<?php echo $iffar['contato']?>" required></textarea>
                        </div>

                        <center><br><button type="submit" class="btn btn-dark">Enviar</button></center>
            </form>

  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>
</html>
