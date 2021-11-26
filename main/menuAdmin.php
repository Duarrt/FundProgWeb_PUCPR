<?php
    $usuario = $_SESSION["usuario"];
?>
<html lang="pt-br">
    <head>
        <link rel="stylesheet" href="../styles/style.css" type="text/css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    </head>
    <body>
        <h1>Bem vindo, <?php echo $usuario;?>!</h1>
        <h4>Por favor, selecione alguma de nossas ferramentas do sistema abaixo:</h4>
        <div class="tools">
            <ul>
                <button type="button" class="btn" data-toggle="collapse" data-target="#collap1">
                    <li><a href="#">1. Visualizar itens emprestados</a></li>
                </button>
                <div id="collap1" class="collapse">
                    <table border="2" class="table">
                        <tr>
                            <th>ID</th>
                            <th>Código do item</th>
                            <th>ID Usuário</th>
                            <th>Data emprestada</th>
                            <th>Data devolução</th>
                        </tr>
                        <?php
                            $data_atual = date('Y-m-d');
                            $data_atualT = strtotime($data_atual);
                        
                            $script_registro = "SELECT * FROM emprestimos;";
                            $registro = mysqli_query($con, $script_registro);
                            if(mysqli_num_rows($registro)>0) {
                                while($emprest = mysqli_fetch_assoc($registro)){
                                    $id = $emprest["id"];
                                    $cod = $emprest["cod_item"];
                                    $id_usuario = $emprest["id_usuario"];                                
                                    $data_emprest = $emprest["data_emprestimo"];
                                    $data_devol = $emprest["data_devolucao"];
                                    $data_devolT = strtotime($data_devol);

                                    echo "<tr>
                                        <td>$id</td>
                                        <td>$cod</td>
                                        <td>$id_usuario</td>
                                        <td>$data_emprest</td>";  
                                        if($data_atualT > $data_devolT) {
                                            echo "<td class='atrasado' style='color:red'>"; 
                                            echo $data_devol;
                                            echo "</td>";
                                        } else {
                                            echo "<td class='regular'>"; 
                                            echo $data_devol;
                                            echo "</td>";
                                        }    
                                    echo "</tr>";
                                    //}    
                                }    
                            }    
                        ?>
                    </table>
                </div>
                <br>
                <br><button type="button" class="btn" data-toggle="collapse" data-target="#collap2">
                    <li><a href="#">2. Visualizar/Editar dados</a></li>
                </button>
                <div id="collap2" class="collapse ">
                    <?php 
                        include "conexao.php";

                        $sql_user = "SELECT * FROM usuarios where usuario like '".$_SESSION["usuario"]."';";
                        $registro_user = mysqli_query($con, $sql_user);
                        $row = mysqli_num_rows($registro_user);

                        if($row <= 0) {
                            echo "Nenhum resultado encontado...";
                        } else {
                            while($dados = mysqli_fetch_array($registro_user)) {  
                    ?>
                        <form action="../main/index.php?id=editar_usuario" method="post">
                            <h3>EDITAR DADOS</h3>
                            <div>
                                <label for="user">Usuário: </label><input type="text" name="usuario" value="<?php echo$dados['usuario'] ?>"><br>
                            </div>
                            <div>
                                <label for="name">Email: </label><input type="text" name="email" value="<?php echo$dados['email'] ?>"><br>
                            </div>
                            <div>
                                <label for="contact">Contato: </label><input type="text" name="contato" value="<?php echo$dados['contato'] ?>"><br>
                            </div>
                            <div>
                                <label for="password">Nova Senha: </label><input type="password" name="senhaNova" required><br>
                            </div>
                            <div>
                                <label for="password">Senha: </label><input type="password" name="senha" required><br>
                            </div>
                            <div>
                                <label for="passwordConfirm">Confirmar Senha: </label><input type="password" name="senhaConfirm" required><br>
                            </div>
                            <div>
                                <input type="submit" value="Editar">
                                <input type="reset" value="Limpar dados">
                            </div>
                        </form>
                        <?php
                            }
                        }
                        ?>   
                </div>
            </ul>
        </div>
    </body>
</html>