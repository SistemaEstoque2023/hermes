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
          <th>Descrição</th>
          <th>Marca</th>
          <th>Modelo</th>
          <th>Fornecedor</th>
          <th>Und</th>
          <th>Quantidade</th>
          <th>Preço</th>
          <th>Estante</th>
          <th>Ações</th>
        </tr>
        <?php
        include_once("../../php/credenciais.php");
        $sql = "SELECT materiais.id_material, materiais.nome, materiais.descricao, materiais.marca, materiais.modelo, materiais.id_fornecedor, materiais.unidade_de_medida, materiais.quantidade, materiais.preco, materiais.id_estante,  estantes.id_estante, estantes.estante, estantes.prateleira, fornecedor.id_fornecedor, fornecedor.nome as 'fornecedor'
        FROM materiais
        INNER JOIN estantes ON materiais.id_estante = estantes.id_estante
        INNER JOIN fornecedor ON materiais.id_fornecedor = fornecedor.id_fornecedor";
        $resultado = mysqli_query($conection, $sql);
        while ($materiais = mysqli_fetch_array($resultado)) {
          ?>
          <tr>
            <td><?php echo $materiais['nome'] ?></td>
            <td><?php echo $materiais['descricao'] ?></td>
            <td><?php echo $materiais['marca'] ?></td>
            <td><?php echo $materiais['modelo'] ?></td>
            <td><?php echo $materiais['fornecedor'] ?></td>
            <td><?php echo $materiais['unidade_de_medida'] ?></td>
            <td><?php echo $materiais['quantidade'] ?></td>
            <td><?php echo $materiais['preco'] ?></td>
            <td><?php echo $materiais['estante']." ".$materiais['prateleira'] ?></td>
            <td>
              <a href="form_edit_material.php?id=<?php echo $materiais['id_material'];?>"><i class="fa-solid fa-file-pen"></i></a>
              <a href="../../php/excluir/excluir_mat.php?id=<?php echo $materiais['id_material'];?>"><i class="fa-solid fa-trash-can"></i></a>
            </td>
            
            
          </tr>

          <?php
        }
        ?>  
     </table>
    </div>



 </body>  
</html>