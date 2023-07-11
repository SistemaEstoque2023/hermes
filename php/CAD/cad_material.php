<?php
    include_once ("../credenciais.php");
    if (isset($_POST["btn_cad_prod"])) {
        $nome_prod = $_POST["nome_prod"];
        $quantidade = $_POST["quantidade"];
        $und_med = $_POST["und_med"];
        $data_cad = $_POST["data_cad"];
        $categoria = $_POST["categoria"];
        $validade = $_POST["validade"];
        $fornecedor = $_POST["fornecedor"];
        $localizacao = $_POST["localizacao"];

        $sql = "INSERT INTO materiais"
    }
?>