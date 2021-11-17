<html lang="pt-br">
    <head>
        <link rel="stylesheet" href="../styles/style.css" type="text/css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    </head>
    <body>
        <?php
        $usuario = $_SESSION["usuario"];
        
        <h1>Bem vindo, $usuario</h1>
        <h4>Por favor, selecione alguma de nossas ferramentas do sistema abaixo:</h4>
        <div class="tools">
            <ul>
                <button type="button" class="btn" data-toggle="collapse" data-target="#demo">
                    <li><a href="#">1. Visualizar itens emprestados</a></li>
                </button>
                <div id="demo" class="collapse">
                    Todos os itens emprestados.
                </div>
                <br>
                <br><button type="button" class="btn" data-toggle="collapse" data-target="#demo">
                    <li><a href="#">2. Cadastrar</a></li>
                </button>
                <div id="demo" class="collapse">
                    Todos os itens emprestados.
                </div>
            </ul>
        </div>
        ?>
    </body>
</html>