<?php include_once("../../php/credenciais.php"); ?> 
<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://kit.fontawesome.com/02177f8e2c.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../../CSS\estilo.robin.css">
</head>
 <body> 


    <div id="menu-lateral">
        <div id="menu">Homes</div>
        <div id="menu">Cadrastros</div>
        <div id="menu">Relatorios</div>
        <div id="menu">Gestão</div>
    </div>
    <div id="barra-superior">
        <div class="titulo"> <h1>Dashboard</h1></div>
    </div>
    <div id="main">
      <table>
        <tr>
          <th>Nome</th>
          <th>Responsavel</th>
          <th>E-mail</th>
          <th>Telefone</th>
          <th>CNPJ</th>
           <th>Ações</th>
        </tr>
        <?php
        include_once("../../php/credenciais.php");
        $sql = "SELECT * FROM fornecedor";
        $resultado = mysqli_query($conection, $sql);
        while ($fornecedor = mysqli_fetch_array($resultado)) {
          ?>
          <tr>
            <td><?php echo $fornecedor['nome'] ?></td>
            <td><?php echo $fornecedor['responsavel'] ?></td>
            <td><?php echo $fornecedor['email'] ?></td>
            <td><?php echo $fornecedor['telefone'] ?></td>
            <td><?php echo $fornecedor['cnpj'] ?></td>
           
            <td>
              <a href="../../php/edit/"><i class="fa-solid fa-file-pen"></i></a>
              <a href="../../php/excluir/excluir_fornecedor.php?id=<?php echo $fornecedor['id_fornecedor'];?>"><i class="fa-solid fa-trash-can"></i></a>
            </td>
            
            
          </tr>

          <?php
        }
        ?>  
     </table>
    </div>



 </body>  
</html>