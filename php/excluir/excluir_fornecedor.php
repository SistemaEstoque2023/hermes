<?php
include_once ("../credenciais.php");
$id=$_GET['id'];

$sql="DELETE FROM fornecedor WHERE id_fornecedor='$id'";

if (mysqli_query($conection, $sql)) {
    echo "<script>alert('Fornecedor deletado com sucesso!');</script>";
  echo "<script>location.href='../../html/edit/dashboard_fornecedor.php'</script>";
    }
else{
echo "<script>alert('Erro ao deletar fornecedor!');</script>";
echo "<script>location.href='../../html/cad/form_cadastro_fornecedor.php'</script>";
}

?>