<?php

include "conexao.php";
session_start();

$titulo = $_POST['titulo'];
$descricao = $_POST['descricao'];
$ano = $_POST['ano'];
$data = date("Y-m-d H-i-s");
$id = $_SESSION['usuario'];
$id_postagem = $_POST['id'];

//echo $titulo." ".$descricao." ".$ano." ".$data." ".$id." ".$id_postagem;

$sql = "UPDATE postagens SET descricao_postagem = '$descricao', ano_postagem = $ano, status_moderacao = 0, titulo = '$titulo', id_usuario = $id WHERE id_postagem = $id_postagem";
$result = mysqli_query($conectar, $sql);

if(isset($_FILES['foto'])){
        
        //arquivos permitidos
        $extensoes_permitidas = array("png", "jpeg", "jpg", "mp3", "ogg");
        $quantidadeArquivos = count($_FILES['foto']['name']);
        $contador = 0;

        while($contador < $quantidadeArquivos){

        $extensao = pathinfo($_FILES['foto']['name'][$contador], PATHINFO_EXTENSION);

        if(in_array($extensao, $extensoes_permitidas)){
            $pasta ="postagens/";
            $temporario = $_FILES['foto']['tmp_name'][$contador];
            $foto = uniqid().".$extensao";
            $fotoinsert = $pasta.$foto;



             if(move_uploaded_file($temporario, $pasta.$foto)){
                echo "Upload feito com sucesso";
                    if ($extensao == "png" or $extensao == "jpeg" or $extensao == "jpg"){
    					$tipo = "foto";
    				} elseif ($extensao == "mp3" or $extensao =="ogg") {
    					$tipo = "audio";
   					 }
 

				    $insert2 = "INSERT INTO arquivos (endereco_arquivo, tipo_arquivo, id_postagem) VALUES ('$fotoinsert', '$tipo', $id_postagem)";
				    $sql2 = mysqli_query($conectar, $insert2);

            } else {
                echo "não foi possivel fazer o upload.";
            }

        }else{
            echo "Formato inválido";
        }

      

$contador++;    
}
}
   if($_SESSION['tipo'] == 0 ){ 
        header('location:home_adm.php'); // página inicial do adm                
   }else if($_SESSION['tipo'] == 1){
        header('location:home_contribuidor.php');// arquivo da página incial
    }
?>