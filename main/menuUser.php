<?php
    require_once "conexao.php";
    session_start();

    $usuario = $_SESSION['usuario'];
?>
<html lang="pt-br">
    <head>
        <link rel="stylesheet" href="../styles/style.css" type="text/css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    </head>
    <body>
        <h2>Dados de sua conta, <?php echo $usuario;?>!</h2>
        <div class="tools">
            <ul>
                <button type="button" class="btn" data-toggle="collapse" data-target="#collap1">
                    <li><a href="#">1. Itens emprestados</a></li>
                </button>
                <div id="collap1" class="collapse ">
                    <table border="2" class="table">
                        <tr>
                            <th>Código do item</th>
                            <th>Usuário</th>
                            <th>Data emprestada</th>
                            <th>Data devolução</th>
                        </tr>
                        <?php
                            //require "login.php";
                            $data_atual = date('Y-m-d');
                            $data_atualT = strtotime($data_atual);
                            
                            $sql_emprest = "SELECT * FROM emprestimos e INNER JOIN usuarios u ON e.id_usuario = u.id AND u.usuario LIKE '".$_SESSION["usuario"]."';";
                            $registro_emprest = mysqli_query($con, $sql_emprest);
                            if(mysqli_num_rows($registro_emprest)>0) {
                                while($emprest = mysqli_fetch_array($registro_emprest)){
                                        $cod = $emprest["cod_item"];
                                        $nome = $emprest["usuario"];                                  
                                        $data_emprest = $emprest["data_emprestimo"];
                                        $data_devol = $emprest["data_devolucao"];
                                        $data_devolT = strtotime($data_devol);

                                        echo "<tr>
                                            <td>$cod</td>
                                            <td>$nome</td>
                                            <td>$data_emprest</td>";  
                                                if($data_atualT > $data_devolT) {
                                                    echo "<td style='color:red'>"; 
                                                    echo $data_devol;
                                                    echo "</td>";
                                                } else {
                                                    echo "<td>"; 
                                                    echo $data_devol;
                                                    echo "</td>";
                                                }
                                        echo "\n<td style='text-align: center'><form action='../main/index.php?id=item_exclusao' method='post'><input type='submit' value='Devolver'></form></td>";
                                        echo "</tr>";
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