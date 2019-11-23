<?php

	include "conexao.php";

	if(isset($_POST['pesquisar'])){
		$termo = $_POST['buscar'];
		$select = "SELECT * FROM postagens WHERE titulo LIKE '%$termo%' or descricao_postagem LIKE '%$termo'";
		$query = mysqli_query($conectar, $select);
	}else {
		$sql = "SELECT * FROM postagens";
		$query = mysqli_query($conectar, $sql);
	}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Buscar</title>
</head>
<body>


	<form action="busca.php" method="post">
		<input type="text" name="buscar">
		<button type="submit" name="pesquisar"> Buscar </button>
	</form>

		<?php
		foreach ($query as $post) {
			echo "<h2>".$post['titulo']."</h2>";
			echo "<h2>".$post['descricao_postagem']."</h2>";
		}
	?>

</body>
</html>