<?php
    include_once ("../credenciais.php");


    if (isset($_POST["btn_cad_prod"])) {
        $id = $_POST["id"];
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

        $sql = "UPDATE  materiais 
        SET nome = '$nome_prod', 
        descricao = '$descricao',
        marca = '$marca',
        modelo = '$modelo',
        quantidade = $quantidade,
        unidade_de_medida = $und_med,
        preco = $preco,
        estoque_minimo = $estoque_minimo,
        id_fornecedor = '$fornecedor',
        id_estante = '$estante',
        id_categoria = '$categoria'
        WHERE id_material = $id"; 
        
        if (mysqli_query($conection, $sql)) {
            echo "<script>alert('Cadastro atualizado com sucesso!');</script>";
            echo "<script>location.href='../../html/edit/dashboard_material.php';</script>";
        } else {
            echo "<script>alert('Erro ao atualizar cadastro))</script>";
            echo "<script>location.href='../../html/cad/form_cadastro_material.php';</script>";
        }
    }
?>