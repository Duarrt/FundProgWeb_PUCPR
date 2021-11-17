<?php

$con = mysqli_connect('localhost', 'root', '', 'pucpr');

if(!$con) {
    die('Não foi possível conectar: '.mysqli_error());
}

$usuario = $_POST["usuario"];
$user = "SELECT * from usuarios where usuario like '$usuario'";

$senha = $_POST["senha"];
$passwrd = "SELECT * from usuarios where senha like '$senha'";

$userResult = $con->query($user) or die("Erro: ".mysqli_error($con));
$userRow = mysqli_num_rows($userResult);
$passwrdResult = $con->query($passwrd) or die("Erro: ".mysqli_error($con));
$passwrdRow = mysqli_num_rows($passwrdResult);

if($userRow == 1 && $passwrdRow == 1){

    while($verificar = mysqli_fetch_array($userResult)){

        $nivel = $verificar['admin'];
        
        if($nivel==true){
            $_SESSION["admin"]=$usuario;
            @$id = $_GET["id"];
            $id = "admin_menu";
            include $pg[$id];

        }elseif($nivel==false){
            $_SESSION["usuario"]=$usuario;
            @$id = $_GET["id"];
            $id = "user_menu";
            include $pg[$id];

        }elseif($nivel==null){
            echo "<script>alert('Login Incorreto ...')</script>";
        }   
    }
} else{
    echo "<script>alert('login incorreto ...')</script>";
    echo "<meta http-equiv='refresh' content='0; URL=../main/index.php?id=inicio'/>";
}


?>