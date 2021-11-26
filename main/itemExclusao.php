<?php
	session_start();
    include "conexao.php";
  
        $sql = "DELETE FROM emprestimos WHERE id = 4";
        $registro = mysqli_query($con, $sql);
        
        if(!$registro){
            echo "Não há registros...:".mysqli_error($con);
        }else{
            echo "Sucesso! Item devolvido.";
        }
?>