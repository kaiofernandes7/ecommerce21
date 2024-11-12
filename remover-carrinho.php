<?php
session_start();
require 'conexao2.php'; 

if (isset($_SESSION['idUser'])) {
    if (isset($_POST['idProduto'])) {
        $idProduto = $_POST['idProduto'];

        
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
