<?php
session_start();
require 'conexao2.php';

// Verifica se o carrinho está vazio
if (!isset($_SESSION['carrinho']) || empty($_SESSION['carrinho'])) {
    echo "Nenhum produto no carrinho.";
    exit();
}

// Chave PIX
$chavePix = "chave-pix-exemplo@dominio.com"; // Substitua pela sua chave PIX

// Total do pedido
$total = 0;
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sucesso na Compra</title>
    <link rel="stylesheet" href="assets/css/style-sucesso.css">
    <link rel="stylesheet" href="assets/css/style.css">
    
</head>

<body>
    <div class="container">
        <?php include 'header.php'; ?>
        <h1>Compra Finalizada com Sucesso!</h1>
        <p>Para concluir sua compra, efetue o pagamento via PIX com os dados abaixo:</p>

        <h3>Chave PIX</h3>
        <p><strong><?php echo htmlspecialchars($chavePix); ?></strong></p>

        <div class="produtos-comprados">
            <h2>Resumo do Pedido</h2>
            <table>
                <thead>
                    <tr>
                        <th>Produto</th>
                        <th>Quantidade</th>
                        <th>Valor</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($_SESSION['carrinho'] as $item): 
                        $total += $item['preco'] * $item['quantidade'];
                    ?>
                        <tr>
                            <td><?php echo htmlspecialchars($item['nome']); ?></td>
                            <td><?php echo htmlspecialchars($item['quantidade']); ?></td>
                            <td>R$ <?php echo number_format($item['preco'] * $item['quantidade'], 2, ',', '.'); ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <div class="total">
            Total a pagar: R$ <?php echo number_format($total, 2, ',', '.'); ?>
        </div>

        <div class="qr-code">
            <h2>QR Code para Pagamento</h2>
            <img src="assets/img/qr-code.jpeg" alt="QR Code para pagamento via PIX">
            <p>Escaneie o código QR acima com o app do seu banco ou copie a chave PIX para efetuar o pagamento.</p>
            <p>
                Após a verificação do pagamento iremos lhe avisar sobre a entrega pelo WhatsApp!
            </p>
        </div>

        <a href="produtos.php" class="btn-voltar">Voltar à Loja</a>
    </div>

    
</body>

</html>
