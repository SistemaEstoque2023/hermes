<?php
    include_once ("../credenciais.php");
    if (isset($_POST["btn_cad_prod"])) {
        $nome_prod = $_POST["nome_prod"];
        $quantidade = $_POST["quantidade"];
        $und_med = $_POST["unidade_medida"];
        $categoria = $_POST["categoria"];
        $validade = $_POST["validade"];
        $fornecedor = $_POST["fornecedor"];
        $localizacao = $_POST["localizacao"];

        ECHO $sql = "INSERT INTO materiais (nome,quantidade,unidade_de_medida,id_categoria, data, id_fornecedor,id_estante) VALUES ('$nome_prod', $quantidade, '$und_med', $categoria, '$validade', $fornecedor, $localizacao)";
    
    if (mysqli_query($conection, $sql)) {
        echo "<script>alert('Material cadastrado com sucesso!');</script>";
      echo "<script>location.href='../../html/edit/dashboard.php'</script>";
        }
else{
    echo "<script>alert('Erro ao cadastrar o material!');</script>";
    echo "<script>location.href='../../html/cad/form_cadastro_material.php'</script>";
    }
    }
    
?>