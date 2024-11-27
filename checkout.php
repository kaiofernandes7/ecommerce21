<?php
session_start();
require 'conexao2.php';
require_once 'Usuario.class.php';

if (!isset($_SESSION['idUser']) || empty($_SESSION['idUser'])) {
    header("Location: login.php");
    exit();
}

$idUsuario = $_SESSION['idUser'];

// Buscar os dados do usuário
$sql = "SELECT nome, email, telefone, endereco, cidade, estado, bairro, rua, numero, complemento FROM usuarios WHERE idusuario = :idUsuario";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':idUsuario', $idUsuario, PDO::PARAM_INT);
$stmt->execute();
$usuario = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$usuario) {
    echo "Erro: Usuário não encontrado.";
    exit();
}

// Atualizar dados de endereço se o formulário for enviado
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome'];
    $telefone = $_POST['telefone'];
    $endereco = $_POST['endereco'];
    $cidade = $_POST['cidade'];
    $estado = $_POST['estado'];
    $bairro = $_POST['bairro'];
    $rua = $_POST['rua'];
    $numero = $_POST['numero'];
    $complemento = $_POST['complemento'];

    // Atualizar no banco de dados
    $sqlUpdate = "UPDATE usuarios SET nome = :nome, telefone = :telefone, endereco = :endereco, cidade = :cidade, estado = :estado, bairro = :bairro, rua = :rua, numero = :numero, complemento = :complemento WHERE idusuario = :idUsuario";
    $stmtUpdate = $pdo->prepare($sqlUpdate);
    $stmtUpdate->bindValue(':nome', $nome);
    $stmtUpdate->bindValue(':telefone', $telefone);
    $stmtUpdate->bindValue(':endereco', $endereco);
    $stmtUpdate->bindValue(':cidade', $cidade);
    $stmtUpdate->bindValue(':estado', $estado);
    $stmtUpdate->bindValue(':bairro', $bairro);
    $stmtUpdate->bindValue(':rua', $rua);
    $stmtUpdate->bindValue(':numero', $numero);
    $stmtUpdate->bindValue(':complemento', $complemento);
    $stmtUpdate->bindValue(':idUsuario', $idUsuario, PDO::PARAM_INT);
    $stmtUpdate->execute();

    // Inserir pedidos na tabela de pedidos
    if (isset($_SESSION['carrinho']) && !empty($_SESSION['carrinho'])) {
        $carrinho = $_SESSION['carrinho'];
        foreach ($carrinho as $produto) {
            $idProduto = $produto['id'];
            $nomeProduto = $produto['nome'];
            $preco = $produto['preco'];
            $quantidade = $produto['quantidade'];

            // Inserir no banco de dados
            $sqlPedido = "INSERT INTO pedidos (id_usuario, id_produto, nome_produto, preco, quantidade, data_pedido) 
                          VALUES (:id_usuario, :id_produto, :nome_produto, :preco, :quantidade, NOW())";
            $stmtPedido = $pdo->prepare($sqlPedido);
            $stmtPedido->bindValue(':id_usuario', $idUsuario, PDO::PARAM_INT);
            $stmtPedido->bindValue(':id_produto', $idProduto, PDO::PARAM_INT);
            $stmtPedido->bindValue(':nome_produto', $nomeProduto);
            $stmtPedido->bindValue(':preco', $preco);
            $stmtPedido->bindValue(':quantidade', $quantidade);

            // Verificar se a inserção foi bem-sucedida
            if (!$stmtPedido->execute()) {
                echo "Erro ao adicionar o pedido. Tente novamente.";
                exit();
            }
        }
    } else {
        echo "Erro: Carrinho vazio.";
        exit();
    }

    // Redirecionar para uma página de confirmação ou sucesso
    header("Location: sucesso.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
    <div class="container">
        <?php include 'header.php'; ?>
    </div>

    <div class="checkout-container">
        <h1 class="checkout-title">Informações de Entrega</h1>
        <form action="checkout.php" method="POST" class="checkout-form">
            <div class="form-group">
                <label for="nome">Nome Completo</label>
                <input type="text" id="nome" name="nome" value="<?php echo htmlspecialchars($usuario['nome']); ?>" required>
            </div>
            <div class="form-group">
                <label for="telefone">Telefone</label>
                <input type="text" id="telefone" name="telefone" value="<?php echo htmlspecialchars($usuario['telefone']); ?>" required>
            </div>
            <div class="form-group">
                <label for="estado">Estado</label>
                <input type="text" id="estado" name="estado" value="<?php echo htmlspecialchars($usuario['estado']); ?>" required>
            </div>
            <div class="form-group">
                <label for="cidade">Cidade</label>
                <input type="text" id="cidade" name="cidade" value="<?php echo htmlspecialchars($usuario['cidade']); ?>" required>
            </div>
            <div class="form-group">
                <label for="bairro">Bairro</label>
                <input type="text" id="bairro" name="bairro" value="<?php echo htmlspecialchars($usuario['bairro']); ?>" required>
            </div>
            <div class="form-group">
                <label for="rua">Rua</label>
                <input type="text" id="rua" name="rua" value="<?php echo htmlspecialchars($usuario['rua']); ?>" required>
            </div>
            <div class="form-group">
                <label for="numero">Número</label>
                <input type="text" id="numero" name="numero" value="<?php echo htmlspecialchars($usuario['numero']); ?>" required>
            </div>
            <div class="form-group">
                <label for="complemento">Complemento</label>
                <input type="text" id="complemento" name="complemento" value="<?php echo htmlspecialchars($usuario['complemento']); ?>">
            </div>

            <button type="submit" class="btn">Pagar</button>
        </form>
    </div>

    <?php include 'footer.php'; ?>
</body>

</html>
