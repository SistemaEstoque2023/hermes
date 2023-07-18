<?php
    include_once("../credenciais.php");
    if (isset($_POST["btn_cad_usr"])) {
        $nome = $_POST["nome"];
        $email = $_POST["email"];
        $senha = $_POST["senha"];
        $senha_c = crypt($senha, $senha);

        $sql_valida_cad = "SELECT * FROM usuarios WHERE email = '$email' AND senha = '$senha_c'";
        $resultado_cad = mysqli_query($conection, $sql_valida_cad);

        if (mysqli_num_rows($resultado_cad) != 0) {
            $user = mysqli_fetch_assoc($resultado_cad);
            
            echo "<script>alert('Usuario já cadastrado');</script>";
            echo "<script>location.href='../../index.html';</script>";
        } else {
            $sql = "INSERT INTO usuarios (nome, email, senha) VALUES ('$nome','$email', '$senha_c')";
            mysqli_query($conection,$sql);
            echo "<script>alert('Usuario cadastrado com sucesso');</script>";
            echo "<script>location.href='../../index.html';</script>";
        }
    }
?>