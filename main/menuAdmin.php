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
        ?>
        <h1>Bem vindo, <?php echo $usuario;?>!</h1>
        <h4>Por favor, selecione alguma de nossas ferramentas do sistema abaixo:</h4>
        <div class="tools">
            <ul>
                <button type="button" class="btn" data-toggle="collapse" data-target="#demo">
                    <li><a href="#">1. Visualizar itens emprestados</a></li>
                </button>
                <div id="demo" class="collapse">
                    <table border="2" class="table">
                        <tr>
                            <th>ID</th>
                            <th>Código do item</th>
                            <th>ID Usuário</th>
                            <th>Data emprestada</th>
                            <th>Data devolução</th>
                        </tr>
                        <?php      
                            $script_registro = "SELECT * FROM `emprestimos`;";
                            $registro = mysqli_query($con, $script_registro);
                            $script_usuario = "SELECT usuario FROM usuarios INNER JOIN emprestimos ON emprestimos.id_usuario = usuarios.id;";
                            $usuario_item = mysqli_query($con, $script_usuario);
                            if(mysqli_num_rows($registro)>0) {
                                while($emprest = mysqli_fetch_assoc($registro)){
                                    //if(($emprest_user = mysqli_fetch_assoc($usuario_item)) and (($emprest_user["usuario"] == $_SESSION['usuario']))){
                                    $id = $emprest["id"];
                                    $cod = $emprest["cod_item"];
                                    $id_usuario = $emprest["id_usuario"];                                
                                    $data_emprest = $emprest["data_emprestimo"];
                                    $data_devol = $emprest["data_devolucao"];
                                    echo "<tr>
                                        <td>$id</td>
                                        <td>$cod</td>
                                        <td>$id_usuario</td>
                                        <td>$data_emprest</td>
                                        <td>$data_devol</td>
                                        </tr>";
                                    //}    
                                }    
                            }    
                        ?>
                    </table>
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
    </body>
</html>