<?php
session_start();
require 'conexao2.php'; // Inclui o arquivo de conexão com o banco de dados

if (isset($_SESSION['idUser'])) {
    if (isset($_POST['idProduto'])) {
        $idProduto = $_POST['idProduto'];

        // Remove o produto do carrinho
        $sql = "DELETE FROM carrinho WHERE idusuario = :idusuario AND idproduto = :idproduto";
        $stmt = $pdo->prepare($sql);
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
