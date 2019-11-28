<?php
	session_start();
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>LOGIN</title>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
   		<link rel="stylesheet" type="text/css" href="estilo.css">
   		<link rel="stylesheet" type="text/css" href="icons/css/all.css">


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
			   a:link{
			   	
			   }
    </style>



	</head>
	<body >
<!-- CSS DA NAV -->
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

	  

        	</ul>
  	   </div>
   </nav>

<!--CSS DO FORM DE LOGIN-->

    <div class="container d-flex justify-content-center" style="padding-top: 60px; padding-bottom: 40px">
       <div class="form align-items-center fundo col-6">
		

		<form method="post" action="logar.php" style="margin:60px">
		
		<div class="col-auto">
			<center>
			<i class="fas fa-user-circle fa-7x mrgin"></i>
			</center>
			<?php 
			if(isset($_SESSION['erros'])) {
				echo "<center>";
				echo "<span> <br>".$_SESSION['erros']."</span>";
				echo "<center>";

			}
			
			?>
		</div>
			<br>
			<div class="col-auto">
            <center><h2>Logue-se</h2></center>
            </div>

		<div class="col-auto">
			<p>Email</p>
			<input type = "text" id="usuario"  class="form-control" name ="email" >
	    </div>
		
	    <div class="col-auto">	
			<br>
			<p>Senha</p>
			<input type = "password" id="senha"  class="form-control" name ="senha">
		</div>
		
		<center><br><button type="submit" class="btn btn-dark col-3">Logar</button></center>
		<br>
		<center>
		Ainda não é contribuidor? <a href="cadastro_contribuidor.php">Crie um cadastro!</a>
	</center>
        </form>
	

		</center>

<script type="text/javascript" src="icons/js/all.js"></script> 
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	</body>
</html>