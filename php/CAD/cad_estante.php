<?php
include_once ("../credenciais.php");

if (isset($_POST["btncad"])) {
    $estante = $_POST["estante"];
    $prateleira = $_POST["prateleira"];
    
    $sql = "INSERT INTO estantes (estante, prateleira) VALUES ('$estante', '$prateleira')";
    
    if (mysqli_query($conexao, $sql)) {
        echo "<script>alert('Estante cadastrada com sucesso!');</script>";
        echo "<script>location.href='../../html/cad/form_cadastro_estante.html'</script>";
        }
}
else{
    echo "Erro ao cadastrar estante:".
    mysqli_erro($conexao);
  }
    
?>