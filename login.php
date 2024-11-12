<?php
session_start();
require 'conexao2.php';
require 'Usuario.class.php';

$u = new Usuario(); 


if (isset($_POST['email']) && isset($_POST['senha']) && isset($_POST['senEntrar'])) {
    $email = $_POST['email'];
    $senha = $_POST['senha'];

   
    if ($u->login($email, $senha)) {
        header("Location: index.php");
        exit;
    } else {
        echo "Email ou senha incorretos!";
    }
}


if (isset($_POST['sendCad'])) {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];

   
    if ($u->cadastrar($nome, $email, $senha)) {
        echo "Cadastro realizado com sucesso!";
    } else {
        echo "Este e-mail já está cadastrado!";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <div class="container">
        <!-- Navegação -->
        <div class="navbar">
            <div class="logo">
                <a href="index.php"><img src="assets/img/logo-clara.png" alt="" width="125px"></a>
            </div>
            <nav>
                <ul id="MenuItens">
                    <li><a href="#"></a></li>
                    <li><a href="#"></a></li>
                    <li><a href="#"></a></li>
                </ul>
            </nav>
           
            <img src="assets/img/menu.png" alt="" class="menu-celular" onclick="menucelular()">
        </div>

        
        <div class="minha-conta">
            <div class="formulario">
                <div class="btn-form">
                    <span onclick="Entrar()">Entrar</span>
                    <span onclick="Cadastro()">Cadastro</span>
                    <hr id="Indicador">
                </div>
               
                <form action="login.php" method="post" id="EntrarPainel">
                    <input type="email" name="email" placeholder="E-mail de acesso" required>
                    <input type="password" name="senha" placeholder="Digite sua senha" required>
                    <button type="submit" name="senEntrar" class="btn">Entrar</button>
                    <a href="#">Esqueceu sua senha?</a>
                </form>
                
                <form action="login.php" method="post" id="CadastroSite">
                    <input type="text" name="nome" placeholder="Nome completo" required>
                    <input type="email" name="email" placeholder="E-mail de acesso" required>
                    <input type="password" name="senha" placeholder="Digite sua senha" required>
                    <button type="submit" name="sendCad" class="btn">Cadastre-se</button>
                </form>
            </div>
        </div>
    </div>

    <script src="assets/js/login.js"></script>
</body>
</html>
