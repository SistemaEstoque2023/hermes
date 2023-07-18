<?php
include_once("../credenciais.php");
    if (isset($_POST["btn_login"])) {
        $email = $_POST["email"];
        $senha = $_POST["senha"];
        $senha_c = crypt($senha, $senha);

        $sql_valida_login = "SELECT * FROM usuarios WHERE email = '$email' AND senha = '$senha_c'";
        $resultado_login = mysqli_query($conection, $sql_valida_login);

        if (mysqli_num_rows($resultado_login) != 0) {
            $user = mysqli_fetch_assoc($resultado_login);
            session_start();
            $_SESSION["autentica"] = $user["nome"];

            echo "<script>alert('Login realizado com sucesso, bem vindo ".$_SESSION["autentica"]."');</script>";
            echo "<script>location.href='../../html/cad/form_cadastro_material.php';</script>";
        } else {
            echo "<script>alert('Usuario ou senha invalidos!');</script>";
            echo "<script>location.href='../../index.html';</script>";
        }
    }
?>