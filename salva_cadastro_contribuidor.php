<?php
	 
	 include "conexao.php";

	$nome = $_POST['nome'];
	$email = $_POST['email'];
	$senha = md5($_POST['senha']);
	$tipo = '1';
    
    if(isset($_FILES['foto'])){

        $extensoes_permitidas = array("png", "jpeg", "jpg");
        $extensao = pathinfo($_FILES['foto']['name'], PATHINFO_EXTENSION);

        if(in_array($extensao, $extensoes_permitidas)){
            $pasta ="fotosperfil/";
            $temporario = $_FILES['foto']['tmp_name'];
            $foto = uniqid().".$extensao";
            $fotoinsert = $pasta.$foto;


             if(move_uploaded_file($temporario, $pasta.$foto)){
                $mensagem = "Upload feito com sucesso";

                $sql = "select * from usuario where nome = '$nome', email = '$email'";
                $result = mysqli_query($conectar, $sql);
                $row = mysqli_num_rows($result);
    
                if ($row == 0) {

                    $sql = "insert into usuario (nome, email, foto, senha, tipo) values ('$nome', '$email', '$fotoinsert', '$senha','$tipo')";
                    $query = mysqli_query($conectar, $sql); 
                                    //location('login.php');
                        if($query) {
                            echo "Registro inserido com sucesso";
                            header('location: login.php');
                        }else {
                            echo "Erro ao inserir registro." . mysqli_error($conectar);
                        }
                }else {
                    $_SESSION['usuario_existe'] = true;
                    echo "Desculpe esse usuario já existe";
                    exit;
                }
            } else {
                $mensagem ="não foi possivel fazer o upload.";
            }

        }else{
            $mensagem = "Formato inválido";
        }
        
        $sql = "insert into usuario (nome, email, foto, senha, tipo) values ('$nome', '$email', '$user', '$senha','$tipo')";
        $query = mysqli_query($conectar, $sql); 


        echo $mensagem;
        header('location: login.php');
    }
    mysqli_close($conectar);//fecha a conexao com o BD's + o parametro de qual é a conexao que deve ser fechada, no caso '$link'
    
?>
