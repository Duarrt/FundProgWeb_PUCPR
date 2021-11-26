<?php
    require "conexao.php";
    session_start();

    $usuario = $_POST['usuario'];
    $email = $_POST['email'];
    $contato = $_POST['contato'];
    $senhaNova = $_POST['senhaNova'];
    $senha = $_POST['senha'];
    $senhaConfirm = $_POST['senhaConfirm'];
 
    $usuario_sessao = $_SESSION['usuario'];
    
    $senhaBanco = "SELECT * from usuarios where usuario like '".$_SESSION['usuario']."';";
    $registro = $con->query($senhaBanco) or die("Erro: ".mysqli_error($con));
    $row = mysqli_num_rows($registro);

    if($row <= 0) {
        echo "Nenhum resultado encontado...";
    } else {
        while(@$dados = mysqli_fetch_assoc($registro)) {
            $senhaBD = $dados['senha'];
            if(($senha !== $senhaConfirm) and ($senha !== $senhaBD)) {
                echo "As senhas não coincidem ou está incorreta!";
            } else {
                $sql = "UPDATE usuarios SET usuario='$usuario', email='$email', contato='$contato', senha='$senhaNova' WHERE usuario='$usuario_sessao'";
                $registro = mysqli_query($con, $sql);

                if(!$registro) {
                    echo "Não houve sucesso ao atualizar dados...";
                } else {
                    echo "Dados alterados com sucesso! \n";
                    include "logout.php";
                }
            }
        }   
    }
?>