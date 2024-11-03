<?php
require 'conexao2.php'; // Inclua a conexão com o banco de dados

// Consulta para obter todos os produtos
$sql = "SELECT * FROM produtos";
$stmt = $pdo->prepare($sql);
$stmt->execute();

$produtos = $stmt->fetchAll(PDO::FETCH_ASSOC); // Armazena todos os produtos em um array

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produtos</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <?php include 'header.php'; ?>

    <div class="container">
        <h1>Produtos</h1>
        <div class="linha">
            <?php foreach ($produtos as $produto): ?>
                <div class="col-4">
                    <img src="<?php echo $produto['imagem']; ?>" alt="<?php echo $produto['nome']; ?>" />
                    <h4><?php echo $produto['nome']; ?></h4>
                    <p>R$ <?php echo number_format($produto['preco'], 2, ',', '.'); ?></p>
                    <a href="ver-produto.php?id=<?php echo $produto['id']; ?>" class="btn">Ver Detalhes</a>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <?php include 'footer.php'; ?>
    <script src="assets/js/app.js"></script>
</body>
</html>
