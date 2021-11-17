<?php

$con = mysqli_connect('localhost', 'root', '', 'pucpr');

if(!$con) {
    die('Não foi possível conectar: '.mysql_error());
}

$usuario = @$_REQUEST["usuario"];
$user = "SELECT * from 'usuarios' where usuario = '$usuario'";

$senha = @$_REQUEST["senha"];
$passwrd = "SELECT * from 'usuarios' where senha = '$senha'";

$userResult = $con->query($user) or die("Erro: ".mysql_error($con));
$userRow = mysqli_num_rows($userResult);
$passwrdResult = $con->query($passwrd) or die("Erro: ".mysql_error($con));
$passwrdRow = mysqli_num_rows($passwrdResult);

if($userRow>=1){

    while($verificar = mysqli_fetch_array($userResult)){

    $nivel = $verificar['admin'];
     
        if($nivel==true){
            $_SESSION["admin"]=$usuario;
            @$id = $_GET["id"];
            $id = "admin_menu";
            include $pg["$id"];

        }elseif($nivel==false){
            $_SESSION["usuario"]=$usuario;
            @$id = $_GET["id"];
            $id = "user_menu";
            include $pg["$id"];
        }   
    }
} elseif($passwrdRow>=1){
    echo "<script>alert('Login Incorreto ...')</script>";
    echo "<meta http-equiv='refresh' content='0; URL=../content/index.php?id=inicio'/>";

} else{
    echo "<script>alert('login incorreto ...')</script>";
    echo "<meta http-equiv='refresh' content='0; URL=../content/index.php?id=inicio'/>";
}


?>