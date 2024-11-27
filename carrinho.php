<?php
session_start();
require 'conexao2.php';
require_once 'Usuario.class.php';


function removerDoCarrinho($id)
{
    if (isset($_SESSION['carrinho'])) {
        foreach ($_SESSION['carrinho'] as $key => $item) {
            if ($item['id'] == $id) {
                unset($_SESSION['carrinho'][$key]);
                break;
            }
        }
    }
}


if (isset($_GET['remover']) && !empty($_GET['remover'])) {
    $idProduto = intval($_GET['remover']);
    removerDoCarrinho($idProduto);
}


$carrinhoVazio = !isset($_SESSION['carrinho']) || empty($_SESSION['carrinho']);
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrinho de Compras</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>


    <div class="container">
        <?php include 'header.php'; ?>
        <h1>Carrinho de Compras</h1>

        <?php if ($carrinhoVazio): ?>
            <p>Seu carrinho está vazio.</p>
        <?php else: ?>
            <table>
                <thead>
                    <tr>
                        <th>Imagem</th>
                        <th>Produto</th>
                        <th>Quantidade</th>
                        <th>Preço</th>
                        <th>Ação</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $total = 0;
                    foreach ($_SESSION['carrinho'] as $item):
                        $total += $item['preco'] * $item['quantidade'];
                    ?>
                        <tr>
                            <td><img src="<?php echo htmlspecialchars($item['imagem']); ?>" alt="<?php echo htmlspecialchars($item['nome']); ?>" style="width: 100px; height: auto;" /></td> <!-- Imagem do produto -->
                            <td><?php echo htmlspecialchars($item['nome']); ?></td>
                            <td><?php echo htmlspecialchars($item['quantidade']); ?></td>
                            <td>R$ <?php echo number_format($item['preco'] * $item['quantidade'], 2, ',', '.'); ?></td>
                            <td>
                                <a href="?remover=<?php echo $item['id']; ?>" class="btn-remover">Remover</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

            <div class="total">
                <h2>Total: R$ <?php echo number_format($total, 2, ',', '.'); ?></h2>
            </div>

            <div class="acao">
                <a href="produtos.php" class="btn">Continuar Comprando</a>
                <a href="checkout.php" class="btn">Finalizar Compra</a>
            </div>
        <?php endif; ?>
    </div>

    <?php include 'footer.php'; ?>
</body>

</html>