<?php
    require_once "conexao.php";
    session_start();

    @$id = $_GET["id"];
    $pg["index"] = "index.php";
    $pg["aaaaaaaaaaaaaaaa"] = "inicio.html";
    $pg["logout"] = "logout.php";
    $pg["inicio"] = "login.html";
    $pg["login"] = "login.php";
    $pg["user_menu"] = "menuUser.php";
    $pg["admin_menu"] = "menuAdmin.php";
    $pg["user_items"] = "user_items.php";

    if(empty($id)) $id = "inicio";
?> 

<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../styles/style.css" type="text/css">
        <title>Fundamentos de Programação WEB - PUCPR</title>
    </head>
    <body>  
        <div class="header">
            <div class="icon-header">
				<a href="index.php?id=inicio"><img src="../images/home.png"/></a>
			</div>
			<div class="title-header">
				<h2>GERENCIAMENTO DE ITENS EMPRESTADOS</h2>
			</div>
        </div>
        <?php
            if(!isset($_SESSION['logado'])) {
                echo "<div class='menu' style='visibility: hidden;'>";
            } else {
                echo "<div class='menu'>";
            }    
        ?>
        
            <ul>
                <li><a href="index.php?id=aaaaaaaaaaaaaaaa">INÍCIO</a></li>
                <li><a href="#">LINK</a></li>
                <li><a href="#">LINK</a></li>
                <li><a href="#">LINK</a></li>
                <?php
                    if(isset($_SESSION['logado'])) {
                        $href = "index.php?id=logout";
                        echo "<li><a href='";
                        echo $href;
                        echo "'>SAIR</a></li>";
                    }    
                ?>
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