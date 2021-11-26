<?php
	session_start();
    include "conexao.php";
    
        $data = date('Y-m-d');

        $sql = "INSERT into emprestimos(cod_item, id_usuario, data_emprestimo) values (2, (select id from usuarios where usuario LIKE '".$_SESSION['usuario']."'), '$data');";
        $registro = mysqli_query($con, $sql);

        if(!$registro){
            echo "Não há registros...:".mysqli_error($con);
        }else{
            echo "Sucesso! Item emprestado.";
        }
?>