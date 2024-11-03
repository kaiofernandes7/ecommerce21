<?php
session_start();
require 'conexao2.php'; // Inclui o arquivo de conexão com o banco de dados

if (isset($_SESSION['idUser'])) {
    if (isset($_POST['idProduto'], $_POST['quantidade'])) {
        $idProduto = $_POST['idProduto'];
        $quantidade = $_POST['quantidade'];

        // Atualiza a quantidade do produto no carrinho
        $sql = "UPDATE carrinho SET quantidade = :quantidade WHERE idusuario = :idusuario AND idproduto = :idproduto";
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':quantidade', $quantidade);
        $stmt->bindValue(':idusuario', $_SESSION['idUser']);
        $stmt->bindValue(':idproduto', $idProduto);
        $stmt->execute();

        header("Location: carrinho.php");
        exit();
    }
} else {
    header("Location: login.php");
    exit();
}
?>
