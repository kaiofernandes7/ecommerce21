<?php
session_start();
require 'conexao2.php';
require 'Usuario.class.php';

if (isset($_POST['email']) && isset($_POST['senha'])) {
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $u = new Usuario();

    if ($u->login($email, $senha)) {
        header("Location: index.php");
    } else {
        echo "Email ou senha incorretos!";
    }
}
?>
