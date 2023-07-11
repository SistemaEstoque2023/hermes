<?php
include_once("../credenciais.php");
if (isset($_POST["btn_cad"])) {
    $nome = $_POST["nome"];
    $responsavel = $_POST["responsavel"];
    $email = $_POST["email"];
    $telefone = $_POST["telefone"];
    $cnpj = $_POST["cnpj"];

    $sql_valida = "SELECT * FROM fornecedor WHERE cnpj = '$cnpj'";
    $resultado = mysqli_query($conection, $sql_valida);

    if (mysqli_num_rows($resultado) != 0) {
        echo "<script>alert('CNPJ já está cadastrado!');</script>";
        echo "<script>location.href='../../html/cad/form_cadastro_fornecedor.html';</script>";
    } else {

        $sql = "INSERT INTO fornecedor (nome, responsavel, email, telefone, cnpj) VALUES ('$nome', '$responsavel', '$email', '$telefone', '$cnpj')";

        if (mysqli_query($conection, $sql)) {
            echo "<script>alert('Fornecedor cadastrado com sucesso!');</script>";
            echo "<script>location.href='../../html/cad/form_cadastro_fornecedor.html';</script>";
        } else {
            echo "<script>alert('Erro ao cadastrar fornecedor.'+ mysqli_error($conection))</script>";
        }
    }
}
