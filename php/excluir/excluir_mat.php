<?php
include_once ("../credenciais.php");
$id=$_GET['id'];

$sql="DELETE FROM materiais WHERE id_material='$id'";

if (mysqli_query($conection, $sql)) {
    echo "<script>alert('Material deletado com sucesso!');</script>";
  echo "<script>location.href='../../html/edit/dashboard_material.php'</script>";
    }
else{
echo "<script>alert('Erro ao deletar material!');</script>";
echo "<script>location.href='../../html/cad/form_cadastro_material.php'</script>";
}

?>