<!DOCTYPE html>
<?php
    session_start();
?>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../styles/style.css" type="text/css">
        <title>Fundamentos de Programação WEB - PUCPR</title>
    </head>
    <body>

    <?php
        @$id = $_GET["id"];
        $pg["inicio"] = "inicio.html";
        $pg["inicioLogout"] = "logout.php";
        $pg["login1"] = "login.html";
        $pg["login2"] = "login.php";
        $pg["user_menu"] = "menuUser.php";
        $pg["admin_menu"] = "menuAdmin.php";
        $pg["user_items"] = "user_items.php";

        if(empty($id)) $id = "inicio";
    ?>     

        <div class="header">
            <div class="icon-header">
				<a href="index.php?id=inicio"><img src="../images/home.png"/></a>
			</div>
			<div class="title-header">
				<h2>GERENCIAMENTO DE ITENS EMPRESTADOS</h2>
			</div>
        </div>
        <div class="menu">
            <ul>
                <li><a href="index.php?id=inicioLogout">INÍCIO</a></li>
                <li><a href="#">LINK</a></li>
                <li><a href="#">LINK</a></li>
                <li><a href="#">LINK</a></li>
                <li><a href="index.php?id=login1">LOGIN</a></li>
            </ul>
        </div>
 <!--
       <div class="main ad1">
            <h3>ANÚNCIO1</h3>
        </div>
-->
        <div class="main">
            <?php include $pg[$id];?>
        </div>
<!--
        <div class="main ad2">
            <h3>ANÚNCIO2</h3>
        </div>
-->
        <div class="footer">
            <h3>Copyright © 2021 | Todos os direitos reservados. Ramon Duarte</h3>
        </div>
    </body>
</html>