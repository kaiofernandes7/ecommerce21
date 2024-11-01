<?php
require 'conexao2.php';
require_once 'Usuario.class.php';

if (isset($_SESSION['idUser']) && !empty($_SESSION['idUser'])) {
    $u = new Usuario();
    $listLogged = $u->logged($_SESSION['idUser']);
    $nomeUser = isset($listLogged['nome']) ? $listLogged['nome'] : "Usuário";
} else {
    header("Location: login.php");
    exit();
}
?>
