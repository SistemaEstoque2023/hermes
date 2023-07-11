<?php
    $host = "localhost";
    $user = "root";
    $password = "";
    $db_name = "sistema_estoque";

    $conection = mysqli_connect($host, $user, $password, $db_name);

    if (mysqli_connect_errno($conection)) {
        echo "erro de conexão no banco de dados: ". mysqli_connect_error();
    }
?>