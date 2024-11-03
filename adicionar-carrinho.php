<?php
session_start(); // Iniciar a sessão
require 'conexao2.php'; // Conexão com o banco de dados

// Verifica se o ID do produto foi enviado
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $idProduto = intval($_GET['id']);

    // Consulta o banco de dados para obter os dados do produto
    $sql = "SELECT id, nome, preco, imagem FROM produtos WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':id', $idProduto);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        $produto = $stmt->fetch(PDO::FETCH_ASSOC);

        // Adiciona o produto ao carrinho
        if (!isset($_SESSION['carrinho'])) {
            $_SESSION['carrinho'] = [];
        }

        // Verifica se o produto já está no carrinho
        $produtosCarrinho = array_column($_SESSION['carrinho'], 'id');

        if (!in_array($produto['id'], $produtosCarrinho)) {
            // Se não estiver, adiciona o produto ao carrinho
            $_SESSION['carrinho'][] = [
                'id' => $produto['id'],
                'nome' => $produto['nome'],
                'preco' => $produto['preco'],
                'quantidade' => 1, // Pode ser alterado para permitir a seleção de quantidade
                'imagem' => $produto['imagem']
            ];
        } else {
            // Se já estiver, você pode optar por incrementar a quantidade ou não
            foreach ($_SESSION['carrinho'] as &$item) {
                if ($item['id'] == $produto['id']) {
                    $item['quantidade'] += 1; // Incrementa a quantidade
                    break;
                }
            }
        }

        // Redireciona para a página de produtos ou carrinho
        header("Location: produtos.php");
        exit();
    } else {
        // Produto não encontrado
        header("Location: produtos.php");
        exit();
    }
} else {
    // ID do produto não foi enviado
    header("Location: produtos.php");
    exit();
}
