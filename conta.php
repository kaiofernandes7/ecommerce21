<?php
session_start();
require 'conexao2.php'; // Conexão com o banco de dados
require_once 'Usuario.class.php'; // Classe de usuários, se necessário

// Verificar se o usuário está logado
if (!isset($_SESSION['idUser']) || empty($_SESSION['idUser'])) {
    header("Location: login.php");
    exit();
}

// Obter o ID do usuário da sessão
$idUsuario = $_SESSION['idUser'];

// Buscar dados do usuário no banco de dados
$sql = "SELECT nome, email, telefone, endereco FROM usuarios WHERE idusuario = :idUsuario";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':idUsuario', $idUsuario, PDO::PARAM_INT);
$stmt->execute();
$usuario = $stmt->fetch(PDO::FETCH_ASSOC);

// Se o usuário não for encontrado (caso raro)
if (!$usuario) {
    echo "Erro: Usuário não encontrado.";
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Minha Conta</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/style-conta.css">
</head>
<body>
    <?php include 'header.php'; ?>

    <div class="conta-container">
        <h1 class="conta-title">Minha Conta</h1>
        <div class="conta-info">
            <p><strong>Nome:</strong> <?php echo htmlspecialchars($usuario['nome']); ?></p>
            <p><strong>Email:</strong> <?php echo htmlspecialchars($usuario['email']); ?></p>
            <p><strong>Telefone:</strong> <?php echo htmlspecialchars($usuario['telefone']); ?></p>
            <p><strong>Endereço:</strong> <?php echo htmlspecialchars($usuario['endereco']); ?></p>
        </div>

        <div class="conta-actions">
            <a href="editar-conta.php" class="conta-btn">Editar Conta</a>
            <a href="logout.php" class="conta-btn">Sair</a>
        </div>
    </div>

    <?php include 'footer.php'; ?>
</body>
</html>
