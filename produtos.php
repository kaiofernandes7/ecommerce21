<?php
session_start(); 
require 'conexao2.php'; 


$termo = isset($_GET['busca']) ? trim($_GET['busca']) : '';


$sql = "SELECT id, nome, preco, imagem FROM produtos";
if ($termo) {
    $sql .= " WHERE nome LIKE :termo";
}
$stmt = $pdo->prepare($sql);

if ($termo) {
    $stmt->bindValue(':termo', '%' . $termo . '%');
}
$stmt->execute();
$produtos = $stmt->fetchAll();
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
    <div class="novoMenu"></div>

    <div class="container">
        <?php include 'header.php'; ?>

        <h1>Produtos</h1>

        
        <?php if (empty($produtos)): ?>
            <p>Nenhum produto encontrado para sua busca.</p>
        <?php else: ?>
            <div class="corpo-categorias">
                <div class="linha">
                    <?php foreach ($produtos as $produto): ?>
                    <div class="col-4">
                        <img src="<?php echo htmlspecialchars($produto['imagem']); ?>" alt="<?php echo htmlspecialchars($produto['nome']); ?>" />
                        <h4><?php echo htmlspecialchars($produto['nome']); ?></h4>
                        <p>R$ <?php echo number_format($produto['preco'], 2, ',', '.'); ?></p>
                        <a href="ver-produto.php?id=<?php echo $produto['id']; ?>" class="btn">Ver Detalhes</a>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        <?php endif; ?>
    </div>
    <?php include 'footer.php'; ?>

    <script src="assets/js/app.js"></script>
</body>
</html>
