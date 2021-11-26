<?php
    @$id = $_GET["id"];
    $page["index"] = "index.php";
    $page["inicio"] = "inicio.php";
    $page["menu_emprestimo"] = "menuEmprestimo.php";
    $page["logout"] = "logout.php";
    $page["login_page"] = "loginPage.php";
    $page["login"] = "login.php";
    $page["editar_usuario"] = "editarUsuario.php";
    $page["item_exclusao"] = "itemExclusao.php";
    $page["user_menu"] = "menuUser.php";
    $page["admin_menu"] = "menuAdmin.php";
    $page["user_items"] = "user_items.php";
    $page["conexao"] = "conexao.php";

    $page["item_exclusao1"] = "itemExclusao.php";
    $page["item_exclusao2"] = "itemExclusao.php";
    $page["item_exclusao3"] = "itemExclusao.php";
    $page["item_exclusao4"] = "itemExclusao.php";

    $page["item_emprestimo1"] = "itemEmprestimo.php";
    $page["item_emprestimo2"] = "itemEmprestimo.php";
    $page["item_emprestimo3"] = "itemEmprestimo.php";

    if(empty($id)) $id = "login_page";
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
            if(isset($_SESSION['logado'])) {
                echo "<div class='menu' style='visibility: hidden;'>";
            } else {
                echo "<div class='menu'>";
            }    
        ?>
            <ul>
                <li><a href="index.php?id=inicio">INÍCIO</a></li>
                <li><a href="index.php?id=menu_emprestimo">EMPRESTAR ITENS</a></li>
            <?php    
                if(isset($_SESSION['admin'])) {
                    $href = "index.php?id=admin_menu";
                        echo "<li><a href='";
                        echo $href;
                        echo "'>ADMINISTRAR SISTEMA</a></li>";
                } else {
                    $href = "index.php?id=user_menu";
                        echo "<li><a href='";
                        echo $href;
                        echo "'>EDITAR CONTA</a></li>";
                }
            ?>    
                <li><a href="index.php?id=logout">SAIR</a></li>
            </ul>
        </div>
 <!--
       <div class="main ad1">
            <h3>ANÚNCIO1</h3>
        </div>
-->
        <div class="main">
            <?php include $page[$id];?>
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