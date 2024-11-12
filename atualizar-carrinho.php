<?php
session_start();
require 'conexao2.php'; 

if (isset($_SESSION['idUser'])) {
    if (isset($_POST['idProduto'], $_POST['quantidade'])) {
        $idProduto = $_POST['idProduto'];
        $quantidade = $_POST['quantidade'];

       
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
