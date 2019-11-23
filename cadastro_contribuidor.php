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

        

            <div class="container d-flex justify-content-center" style="padding-top: 50px">
            <div class="form-row align-items-center fundo">

            <form method="POST" action="salva_cadastro_contribuidor.php" enctype="multipart/form-data" />
            <div class="col-auto">
            <center><h2>Cadastre-se</h2></center>
            </div>

            <div class="col-auto">
            <br><label>Nome:</label>
            <br><input type="text"  name="nome" required  class="form-control"/>
            </div>

            <div class="col-auto">
            <br><label>E-mail:</label>
            <br><input type="email" name="email" required  class="form-control"/>
            </div>

            <div class="col-auto">
            <br><label>Senha:</label>
            <br><input type="password" name="senha" class="form-control" />
            </div>

            <div class="col-auto">
            <br><label>Foto</label>
            <br><input type="file" name="foto" class="form-control" >
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