<?php

	include "conexao.php";
	$termo = $_POST['buscar'];

	$select = "SELECT * FROM postagens WHERE titulo LIKE '%$termo%' or descricao_postagem LIKE '%$termo'";
	$query = mysqli_query($conectar, $select);

	$select1 = "SELECT * FROM usuario WHERE nome LIKE '%$termo%'";
	$query1 = mysqli_query($conectar, $select);

?>

<!DOCTYPE html>
<html>
<head>
	<title>RESULTADOS</title>
</head>
<body>
	<?php
		foreach ($query as $post) {
			echo "<h2>".$post['titulo']."</h2>";
			echo "<h2>".$post['descricao_postagem']."</h2>";
		}
	?>

</body>
</html>