<php
    $con = mysqli_connect('localhost', 'root', '', 'pucpr');

    if(!$con) {
        die('Não foi possível conectar: '.mysqli_error());
    }
?>