<?php
require 'conexao2.php'; // Inclua a conexão com o banco de dados

// Verifica se o ID do produto foi passado na URL
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = intval($_GET['id']); // Converte o ID para um número inteiro

    // Consulta para obter os detalhes do produto
    $sql = "SELECT * FROM produtos WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':id', $id);
    $stmt->execute();

    $produto = $stmt->fetch(PDO::FETCH_ASSOC); // Obtém os detalhes do produto

    // Verifica se o produto foi encontrado
    if (!$produto) {
        header("Location: produtos.php"); // Redireciona se o produto não for encontrado
        exit();
    }
} else {
    header("Location: produtos.php"); // Redireciona se o ID não for válido
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $produto['nome']; ?></title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <?php include 'header.php'; ?>

    <div class="container">
        <h1><?php echo $produto['nome']; ?></h1>
        <div class="corpo-categorias ver-produto">
            <div class="linha">
                <div class="col-2">
                    <img src="<?php echo $produto['imagem']; ?>" alt="<?php echo $produto['nome']; ?>" id="produtoImg" />
                </div>

                <div class="col-2">
                    <h4>R$ <?php echo number_format($produto['preco'], 2, ',', '.'); ?></h4>
                    <form action="" method="post">
                        <select name="tamanho" id="">
                            <option value="">Selecione o tamanho</option>
                            <option value="P">P</option>
                            <option value="M">M</option>
                            <option value="G">G</option>
                            <option value="XG">XG</option>
                            <option value="XXG">XXG</option>
                        </select>
                        <input type="number" name="quantidade" id="" value="1" min="1" />
                        <button type="submit" class="btn">Adicionar ao carrinho</button>
                    </form>
                    <h3>Descrição</h3>
                    <p><?php echo $produto['descricao']; ?></p>
                </div>
            </div>
        </div>
    </div>

    <?php include 'footer.php'; ?>
    <script src="assets/js/app.js"></script>
</body>
</html>
