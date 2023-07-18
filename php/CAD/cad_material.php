<?php
    include_once ("../credenciais.php");
    if (isset($_POST["btn_cad_prod"])) {
        $nome_prod = $_POST["nome_prod"];
        $descricao = $_POST["descricao"];
        $marca = $_POST["marca"];
        $modelo = $_POST["modelo"];
        $quantidade = $_POST["quantidade"];
        $estoque_minimo = $_POST["estoque_minimo"];
        $preco = $_POST["preco"];
        $und_med = $_POST["unidade_medida"];
        $categoria = $_POST["categoria"];
        $fornecedor = $_POST["fornecedor"];
        $estante = $_POST["estante"];

        $sql = "INSERT INTO materiais (nome, descricao, marca, modelo, fornecedor, quantidade, unidade_de_medida, preco, estoque_minimo, id_fornecedor, id_estante) VALUES ('$nome_prod', '$descricao', '$marca', '$modelo', '$fornecedor', '$quantidade', '$und_med', '$preco', '$estoque_minimo', '$fornecedor', '$estante')";
        
        if (mysqli_query($conection, $sql)) {
            echo "<script>alert('Material cadastrado com sucesso!');</script>";
            echo "<script>location.href='../../html/cad/form_cadastro_material.php';</script>";
        } else {
            echo "<script>alert('Erro ao cadastrar material.'+ mysqli_error($conection))</script>";
            echo "<script>location.href='../../html/cad/form_cadastro_material.php';</script>";
        }
    }
?>