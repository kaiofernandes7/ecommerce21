<?php
session_start(); // Iniciar a sessão
require 'conexao2.php'; // Conexão com o banco de dados
require_once 'Usuario.class.php';

// Obtenha o ID do produto a partir da URL
$idProduto = isset($_GET['id']) ? intval($_GET['id']) : 0;

// Consulta ao banco de dados
$sql = "SELECT id, nome, preco, descricao, imagem FROM produtos WHERE id = :id";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(":id", $idProduto);
$stmt->execute();

if ($stmt->rowCount() == 0) {
    // Produto não encontrado
    header("Location: produtos.php");
    exit();
}

$produto = $stmt->fetch();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($produto['nome']); ?></title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <div class="novoMenu"></div>

    <div class="container">
        <?php include 'header.php'; ?>

        <!-- INICIO PRODUTOS DETALHES -->
        <div class="corpo-categorias ver-produto">
            <div class="linha">
                <div class="col-2">
                    <img src="<?php echo htmlspecialchars($produto['imagem']); ?>" alt="<?php echo htmlspecialchars($produto['nome']); ?>" id="produtoImg" />

                    <!-- INICIO LINHA DA GALERIA -->
                    <div class="img-linha">
                        <!-- Incluir miniaturas se necessário -->
                        <!-- Adicione lógica aqui para miniaturas -->
                    </div>
                    <!-- FIM LINHA DA GALERIA -->
                </div>

                <div class="col-2">
                    <p><?php echo htmlspecialchars($produto['nome']); ?></p>
                    <h1>Compre com desconto</h1>
                    <h4>R$ <?php echo number_format($produto['preco'], 2, ',', '.'); ?></h4>
                    <form action="adicionar-carrinho.php?id=<?php echo $produto['id']; ?>" method="post">
                        <select name="tamanho" required>
                            <option value="">Selecione o tamanho</option>
                            <option value="P">P</option>
                            <option value="M">M</option>
                            <option value="G">G</option>
                            <option value="XG">XG</option>
                            <option value="XXG">XXG</option>
                        </select>
                        <input type="number" name="quantidade" value="1" min="1" required />
                        <button type="submit" class="btn">Adicionar ao carrinho</button>
                    </form>
                    <h3>Descrição</h3>
                    <p><?php echo htmlspecialchars($produto['descricao']); ?></p>
                </div>
            </div>
        </div>
        <!-- FIM PRODUTOS DETALHES -->

        <?php include 'footer.php'; ?>
    </div>

    <script src="assets/js/app.js"></script>
</body>
</html>
