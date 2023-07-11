<?php include_once("../../php/credenciais.php"); ?> 
<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
        <div class="titulo"> <h1>CADRASTO DE MATERIAL</h1></div>
    </div>


    <div id="inputs">
        <form action="../../php/cad/cad_material.php" method="post">
            <input type="text" name="nome_prod" placeholder="nome do produto" required>
            <input type="number" name="quantidade" placeholder="QUANTIDADE">
            <select name="unidade_medida">
                <option value="">Selecione a unidade</option>
                <?php
                    $sql4 = 'SELECT * FROM unidade_medida ';
                    $resultado4 = mysqli_query($conection, $sql4);
                    while ($unidade_medida=mysqli_fetch_array($resultado4)) {
                        echo "<option value=".$unidade_medida[0].">".$unidade_medida[1]."</option>";
                    }
                ?>
            </select>
            <input type="datetime-local" name="data_cad" placeholder="">
            <select name="categoria">
                <option value="">Selecione a categoria</option>
                <?php
                    $sql3 = 'SELECT * FROM categorias ';
                    $resultado3 = mysqli_query($conection, $sql3);
                    while ($categoria=mysqli_fetch_array($resultado3)) {
                        echo "<option value=".$categoria[0].">".$categoria[2]."</option>";
                    }
                ?>
            </select>
            <input type="month" name="validade" placeholder="VALIDADE">
            <select name="fornecedor">
                <option value="">Selecione o fornecedor</option>
                <?php
                    $sql1 = 'SELECT * FROM fornecedor';
                    $resultado1 = mysqli_query($conection, $sql1);
                    while ($fornecedor=mysqli_fetch_array($resultado1)) {
                        echo "<option value=".$fornecedor[0].">".$fornecedor[1]."</option>";
                    }
                ?>
            </select>
            <select name="estante">
            <option value="">Selecione a localização</option>
                    <?php
                    $sql2 = 'SELECT * FROM estantes';
                    $resultado2 = mysqli_query($conection, $sql2);
                    while ($estante=mysqli_fetch_array($resultado2)) {
                        echo "<option value=".$estante[0].">".$estante[1]." ".$estante[2]."</option>";
                    }
                ?>
            </select>
            <input id="boton" type="submit" name="btn_cad_prod" value="Cadrastrar">
        </form>
    </div>


 </body>  
</html>