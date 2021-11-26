<?php
require_once "conexao.php";
session_start();

$email = $_POST['email'];
$senha = $_POST['senha'];

$sql = "SELECT * from usuarios where email = '$email' and senha = '$senha'";

$Result = $con->query($sql) or die("Erro: ".mysqli_error($con));
$row = mysqli_num_rows($Result);

if($row > 0){

    while($verificar = mysqli_fetch_array($Result)){

        $nivel = $verificar['admin'];
        $usuario = $verificar['usuario'];
        
        $_SESSION['usuario'] = $usuario;
        $_SESSION['logado'] = true;

        if($nivel==true){
            $_SESSION['admin'] = true;
        }
        echo "<meta http-equiv='refresh' content='0; URL=../main/index.php?id=inicio'/>";
    }
} else{
    session_destroy();
    echo "<script>alert('login incorreto...')</script>";
    echo "<meta http-equiv='refresh' content='0; URL=../main/index.php?id=login_page'/>";
}


?>