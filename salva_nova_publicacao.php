<?php
    session_start();
    include "conexao.php";

    $id = $_SESSION['usuario']; //ID usuário
    $titulo = $_POST['titulo'];
    $descricao = $_POST['descricao'];
    $ano = $_POST['ano'];
    $dataatual = date("Y-m-d H-i-s");
    $status = 0;

    //Incerção dos dados da
   $insert = "INSERT INTO postagens (descricao_postagem, ano_postagem, status_moderacao, titulo,       data_atual, id_usuario) VALUES ('$descricao', '$ano', '$status', '$titulo', '$dataatual', '$id')";

    $sql = mysqli_query($conectar, $insert);

//Testa a global FILES para ver se há algo nela, usando o primeiro name arquivo ([0]) pois não pega de todos os que podem vir
if(!empty($_FILES['foto']['tmp_name'][0])){
    
        //Exetenções de arquivos permitidas
        $extensoes_permitidas = array("png", "jpeg", "jpg", "mp3", "ogg");
        //Conta quantos arquivos tem na global
        $quantidadeArquivos = count($_FILES['foto']['name']);

        $contador = 0;

        //While que repete até a $quantidadeArquivos
        while($contador < $quantidadeArquivos){

        //Pega a extensao do arquivo
        $extensao = pathinfo($_FILES['foto']['name'][$contador], PATHINFO_EXTENSION);

        //Testa para ver se a extenção do arquivos escolhido pelo usuário está no array
        if(in_array($extensao, $extensoes_permitidas)){

            //Diretório onde as fotos serão armazenadas
            $pasta ="postagens/";

            //Nome temporário (?)
            $temporario = $_FILES['foto']['tmp_name'][$contador];

            //uniqid faz com que cada foto tenha um nome único e concatena com a extensao
            $foto = uniqid().".$extensao";

            $fotoinsert = $pasta.$foto;
            // if que testa se manda pra pasta
             if(move_uploaded_file($temporario, $pasta.$foto)){

                //echo "Upload feito com sucesso";
                //Testa a extenção para depois incerir no banco
                    if ($extensao == "png" or $extensao == "jpeg" or $extensao == "jpg"){
    					$tipo = "foto";
    				} elseif ($extensao == "mp3" or $extensao =="ogg") {
    					$tipo = "audio";
   					 }
 
                //Seleciona a última postagem, no caso a feita no início do arquivo, para que assim o arquivo seja incerido com o id da postagem certo.
                   $select = "SELECT * FROM postagens WHERE id_usuario = $id ORDER BY id_postagem DESC limit 1";
                   $sql1 = mysqli_query($conectar, $select);
                   $dados = mysqli_fetch_assoc($sql1);

                   //Pega o ID da postagem
                   $idpostagem = $dados['id_postagem'];

                   //Incere os arquivos
				    $insert2 = "INSERT INTO arquivos (endereco_arquivo, tipo_arquivo, id_postagem) VALUES ('$fotoinsert', '$tipo', $idpostagem)";
				    $sql2 = mysqli_query($conectar, $insert2);
        
            } else {
                //Se não vai para a pasta
                echo "não foi possivel fazer o upload.";
            }

        }else{
            //Se não é das extenções permitidas
            echo "Formato inválido";
        }

$contador++;    
}
}

//If para voltar para a página certa
 if($_SESSION['tipo'] == 1){
    header('locaion:home_contribuidor');
} else if ($_SESSION['tipo'] == 0){
header('location:home_adm.php');  
  } else{
    header('login.php');
  } 

?>