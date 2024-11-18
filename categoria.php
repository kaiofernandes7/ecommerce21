<?php
require 'verifica.php';
require 'conexao2.php';

if (isset($_GET['id_categoria']) && !empty($_GET['id_categoria'])) {
    $id_categoria = $_GET['id_categoria'];
    
    // Buscar produtos pela categoria
    $sql = "SELECT * FROM produtos WHERE categoria_id = :categoria_id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':categoria_id', $id_categoria, PDO::PARAM_INT);
    $stmt->execute();

    $produtos = $stmt->fetchAll(PDO::FETCH_ASSOC);
} else {
    echo "Selecione uma categoria.";
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produtos por Categoria</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <!-- Header -->
     <div class="container">
        <?php include 'header.php'; ?>
     </div>
    

    <main>
        <h1 class="titulo">Produtos</h1>

        <div class="container">
            <?php if (!empty($produtos)): ?>
                <div class="linha">
                    <?php foreach ($produtos as $produto): ?>
                        <div class="col-4">
                            <a href="ver-produto.php?id=<?= $produto['id'] ?>" title="Ver produto">
                                <img src="<?= htmlspecialchars($produto['imagem']) ?>" alt="<?= htmlspecialchars($produto['nome']) ?>" class="imagem-produto" />
                            </a>
                            <h4 class="nome-produto"><?= htmlspecialchars($produto['nome']) ?></h4>
                            <div class="classificacao">
                                <ion-icon name="star"></ion-icon>
                                <ion-icon name="star"></ion-icon>
                                <ion-icon name="star"></ion-icon>
                                <ion-icon name="star"></ion-icon>
                                <ion-icon name="star"></ion-icon>
                            </div>
                            <p class="preco">R$ <?= number_format($produto['preco'], 2, ',', '.') ?></p>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php else: ?>
                <p>Nenhum produto encontrado para esta categoria.</p>
            <?php endif; ?>
        </div>
    </main>

    <!-- Footer -->
    <?php include 'footer.php'; ?>

</body>
</html>
