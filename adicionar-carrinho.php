<?php
session_start(); 
require 'conexao2.php'; 


if (isset($_GET['id']) && !empty($_GET['id'])) {
    $idProduto = intval($_GET['id']);

    
    $sql = "SELECT id, nome, preco, imagem FROM produtos WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':id', $idProduto);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        $produto = $stmt->fetch(PDO::FETCH_ASSOC);

       
        if (!isset($_SESSION['carrinho'])) {
            $_SESSION['carrinho'] = [];
        }

        
        $produtosCarrinho = array_column($_SESSION['carrinho'], 'id');

        if (!in_array($produto['id'], $produtosCarrinho)) {
            
            $_SESSION['carrinho'][] = [
                'id' => $produto['id'],
                'nome' => $produto['nome'],
                'preco' => $produto['preco'],
                'quantidade' => 1, 
                'imagem' => $produto['imagem']
            ];
        } else {
            
            foreach ($_SESSION['carrinho'] as &$item) {
                if ($item['id'] == $produto['id']) {
                    $item['quantidade'] += 1; 
                    break;
                }
            }
        }

        
        header("Location: produtos.php");
        exit();
    } else {
        
        header("Location: produtos.php");
        exit();
    }
} else {
    
    header("Location: produtos.php");
    exit();
}
