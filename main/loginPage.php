<?php
    require_once "conexao.php";
?>
<html>
    <head>
        <meta charset="utf-8"/>
        <link rel="stylesheet" type="text/css" href="../styles/form.css">
    </head>
    <body>
        <form action="../main/index.php?id=login" method="post">
            <h3>ENTRAR NO SISTEMA</h3>
            <div>
                <label for="name">Email: </label><input type="text" name="email" required><br>
            </div>
            <div>
                <label for="password">Senha: </label><input type="password" name="senha" required><br>
            </div>
            <div>
                <input type="submit" value="Entrar">
                <input type="reset" value="Limpar dados">
            </div>
        </form>
    </body>
</html>