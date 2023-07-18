<?php 
include_once("../../php/credenciais.php"); 
$id= $_GET['id'];
$consulta = "SELECT materiais.id_material, materiais.nome, materiais.descricao, materiais.marca,materiais.estoque_minimo,materiais.preco, materiais.modelo, materiais.id_fornecedor, materiais.unidade_de_medida, materiais.quantidade, materiais.preco, materiais.id_estante,  estantes.id_estante, estantes.estante, estantes.prateleira, fornecedor.id_fornecedor, fornecedor.nome as 'fornecedor', unidade_medida.id_unidade_medida, unidade_medida.unidade_medida, categorias.id_categoria, categorias.categoria
FROM materiais
INNER JOIN estantes ON materiais.id_estante = estantes.id_estante
INNER JOIN unidade_medida ON materiais.unidade_de_medida = unidade_medida.id_unidade_medida
INNER JOIN fornecedor ON materiais.id_fornecedor = fornecedor.id_fornecedor
INNER JOIN categorias ON materiais.id_categoria = categorias.id_categoria
WHERE materiais.id_material = '$id'";
$resultados = mysqli_query($conection, $consulta);
while($materiais = mysqli_fetch_array($resultados)){
?>  
<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../CSS\estilo.robin.css">
    <script src="https://kit.fontawesome.com/02177f8e2c.js" crossorigin="anonymous"></script>
</head>

<body>
    <div id="menu-lateral">
        <div id="menu"><i class="fa-solid fa-boxes-packing"></i> Gestão de materiais</div>
        <div id="menu"><i class="fa-solid fa-box-archive"></i>Gestão de categoria</div>
        <div id="menu"><i class="fa-solid fa-truck-field"></i>Gestão de fornecedor </div>
        <div id="menu"><i class="fa-solid fa-cubes"></i>Gestão de estantes</div>
        <div id="menu"><i class="fa-solid fa-arrow-up-from-bracket"></i>Entrada de Material</div>
        <div id="menu"><i class="fa-solid fa-right-from-bracket"></i>Saida de Material</div>
        <div id="menu"><i class="fa-solid fa-house-chimney-crack"></i>></i>Sair</div>

    </div>
    <div id="barra-superior">
        <div class="titulo">
            <h1>Dashboard</h1>
        </div>
    </div>

    <div id="inputs">
        <form action="../../php/edit/edit_material.php" method="post">
            <input type="hidden" name="id" value="<?php echo $materiais["id_material"]?>">
            <input type="text" name="nome_prod" value="<?php echo $materiais["nome"]?>" placeholder="Nome do produto"
            required>
            <input type="text" name="descricao" value="<?php echo $materiais["descricao"]?>" placeholder="Descrição">
            <input type="text" name="marca" value="<?php echo $materiais["marca"]?>" placeholder="Marca">
            <input type="text" name="modelo" value="<?php echo $materiais["modelo"]?>" placeholder="Modelo">
            <input type="number" name="quantidade" value="<?php echo $materiais["quantidade"]?>"
            placeholder="Quantidade">
            <input type="number" name="estoque_minimo" value="<?php echo $materiais["estoque_minimo"]?>"
            placeholder="Estoque mínimo">
            <input type="number" name="preco" value="<?php echo $materiais["preco"]?>" placeholder="Preço">
            <select name="unidade_medida">
                <option value="<?php echo $materiais["unidade_de_medida"]?>">
                    <?php echo $materiais["unidade_medida"]?>
                </option>
                <?php
                    $sql4 = 'SELECT * FROM unidade_medida ';
                    $resultado4 = mysqli_query($conection, $sql4);
                    while ($unidade_medida=mysqli_fetch_array($resultado4)) {
                        echo "<option value=".$unidade_medida[0].">".$unidade_medida[1]."</option>";
                    }
                ?>
            </select>
            <select name="categoria">
                <option value="<?php echo $materiais[" id_categoria"]?>">
                    <?php echo $materiais["categoria"]?>
                </option>
                <?php
                    $sql3 = 'SELECT * FROM categorias ';
                    $resultado3 = mysqli_query($conection, $sql3);
                    while ($categoria=mysqli_fetch_array($resultado3)) {
                        echo "<option value=".$categoria[0].">".$categoria[2]."</option>";
                    }
                ?>
            </select>
            <select name="fornecedor">
                <option value="<?php echo $materiais[" id_fornecedor"]?>" >
                    <?php echo $materiais["fornecedor"]?>
                </option>
                <?php
                    $sql1 = 'SELECT * FROM fornecedor';
                    $resultado1 = mysqli_query($conection, $sql1);
                    while ($fornecedor=mysqli_fetch_array($resultado1)) {
                        echo "<option value=".$fornecedor[0].">".$fornecedor[1]."</option>";
                    }
                ?>
            </select>
            <select name="estante">
                <option value="<?php echo $materiais[" id_estante"]?>">
                    <?php echo $materiais["estante"]." ".$materiais["prateleira"]?>
                </option>
                <?php
                    $sql2 = 'SELECT * FROM estantes';
                    $resultado2 = mysqli_query($conection, $sql2);
                    while ($estante=mysqli_fetch_array($resultado2)) {
                        echo "<option value=".$estante[0].">".$estante[1]." ".$estante[2]."</option>";
                    }
                ?>
            </select>
            <input id="boton" type="submit" name="btn_cad_prod" value="Atualizar">
        </form>
    </div>


</body>

</html>
<?php } ?>