<?php
    session_start();
    include "conexao.php";

    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = md5($_POST['senha']);
    $tipo = '0';

    //var_dump($_FILES['foto']);

    if(isset($_FILES['foto']['name'][0])){
       
        $extensoes_permitidas = array("png", "jpeg", "jpg");
        $extensao = pathinfo($_FILES['foto']['name'], PATHINFO_EXTENSION);

        if(in_array($extensao, $extensoes_permitidas)){
            $pasta ="fotosperfil/";
            $temporario = $_FILES['foto']['tmp_name'];
            $foto = uniqid().".$extensao";
            $insert = $pasta.$foto;


             if(move_uploaded_file($temporario, $pasta.$foto)){
                //$mensagem = "Upload feito com sucesso";

                $sql = "select * from usuario where email = '$email'";
                $result = mysqli_query($conectar, $sql);
                $row = mysqli_num_rows($result);
                    
                if ($row == 0) {
                        $sql = "insert into usuario (nome, email, foto, senha,  tipo) values ('$nome', '$email', '$insert', '$senha','$tipo')";
                        $query = mysqli_query($conectar, $sql); 
                        
                        if($query) {
                            echo "Registro inserido com sucesso";
                            header('location: home_adm.php');
                        }else {
                            echo "Erro ao inserir registro." . mysqli_error($conectar);
                            
                        }

                }else {
                    $_SESSION['usuario_existe'] = "Desculpe, mas esse endereço de email já existe!";
                    header('location:cadastro_moderador.php');
                }
            } else {
               $_SESSION['erro_upload'] = "Não foi possível fazer o upload!";
               header('location:cadastro_moderador.php');   
            }

        }else{
            $_SESSION['formato_invalido'] = "O formato da foto é inválido!";
            header('location:cadastro_moderador.php');
        }
       
} else {

        $sql = "select * from usuario where email = '$email'";
        $result = mysqli_query($conectar, $sql);
        $row = mysqli_num_rows($result);
                    
        if($row == 0) {

        $sql = "insert into usuario (nome, email, senha, tipo) values ('$nome', '$email', '$senha','$tipo')";
        $query = mysqli_query($conectar, $sql); 
        header('location:home_adm.php');
        }else{
        $_SESSION['usuario_existe'] = "Desculpe, mas esse endereço de email já existe!";
        header('location:cadastro_moderador.php');
    }
      
}
    mysqli_close($conectar);//fecha a conexao com o BD's + o parametro de qual é a conexao que deve ser fechada, no caso '$link'
    
?>
