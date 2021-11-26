<?php
    session_start();
?>
<html lang="pt-br">
    <head>
        <meta charset="utf-8"/>
        <link rel="stylesheet" href="../styles/style.css" type="text/css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    </head>
    <body>
       		  
		<table border="2" class="table">
			<tr style=>
				<td style="text-align: center">Código</td>
				<td style="text-align: center">Nome</td>
				<td style="text-align: center">Tipo</td>
				<td></td>
				<td></td>
			</tr>
		<?php
					
		include "conexao.php";
						
		$sql = "SELECT * FROM itens";
		$registro = mysqli_query($con, $sql);
						
		if($registro){
		//Percorre os registros encontrados
			while($row = mysqli_fetch_assoc($registro)){
								
				echo "<tr>
                        <td>". $row['cod'] ."</td>
                        <td>". $row['nome'] ."</td>
                        <td>". $row['tipo'] ."</td>
                        <td style='text-align: center'><a href='index.php?id=item_emprestimo". $row['cod'] ."'>Emprestar</a></td>
					</tr>";
								
			}
		}
										
	    ?>
    </body>
</html>