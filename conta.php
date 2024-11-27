<?php
session_start();
require 'conexao2.php';
require_once 'Usuario.class.php';

if (!isset($_SESSION['idUser']) || empty($_SESSION['idUser'])) {
    header("Location: login.php");
    exit();
}


$idUsuario = $_SESSION['idUser'];


$sql = "SELECT nome, email, telefone, endereco FROM usuarios WHERE idusuario = :idUsuario";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':idUsuario', $idUsuario, PDO::PARAM_INT);
$stmt->execute();
$usuario = $stmt->fetch(PDO::FETCH_ASSOC);


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

    <div class="container">
        <?php include 'header.php'; ?>
    </div>


    <div class="conta-container">
        <h1 class="conta-title">Minha Conta</h1>
        <div class="conta-info">
            <p><strong>Nome:</strong> <?php echo htmlspecialchars($usuario['nome']); ?></p>
            <p><strong>Email:</strong> <?php echo htmlspecialchars($usuario['email']); ?></p>
            <p><strong>Telefone:</strong> <?php echo htmlspecialchars($usuario['telefone']); ?></p>
            
        </div>

        <div class="conta-actions">
            <a href="editar-conta.php" class="conta-btn">Editar Conta</a>
            <a href="logout.php" class="conta-btn">Sair</a>
        </div>
    </div>

    <?php include 'footer.php'; ?>
</body>

</html>