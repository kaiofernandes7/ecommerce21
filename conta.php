<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Minha Conta</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style-conta.css">
</head>

<body>
    <!-- inicio container -->
    <div class="container">
        <!-- inicio navegação -->
        <div class="navbar">
            <div class="logo">
                <a href="index.php"><img src="assets/img/logoEscura.png" alt="" width="125px"></a>
            </div>

            <!-- Inicio menu navegação -->
            <nav>
                <ul id="MenuItens">
                    <li><a href="index.php" title="">Início</a></li>
                    <li><a href="produtos.php" title="">Produtos</a></li>
                    <li><a href="conta.php" title="">Minha conta</a></li>
                    <div class="botoes">

                    </div>
                </ul>
            </nav>
            <!-- fim menu navegação -->

            <a href="carrinho.php" title><img src="assets/img/carrinho.png" alt="" width="30px" height="30px" class="cor-imagem"></a>
            <img src="assets/img/menu.png" alt="" class="menu-celular" onclick="menucelular()">
        </div>
        <!-- fim navegação -->

        <section class="minha-conta">
            <h2>Minha Conta</h2>
            <div class="dados-usuario">
                <?php
                // Exemplo de dados do usuário, esses dados geralmente viriam de um banco de dados
                $usuario = [
                    'nome' => 'João da Silva',
                    'email' => 'joao.silva@email.com',
                    'telefone' => '(11) 1234-5678',
                    'endereco' => 'Rua das Flores, 123, São Paulo - SP',
                ];
                ?>

                <div>
                    <h3>Nome</h3>
                    <p><?php echo $usuario['nome']; ?></p>
                </div>
                <div>
                    <h3>Email</h3>
                    <p><?php echo $usuario['email']; ?></p>
                </div>
                <div>
                    <h3>Telefone</h3>
                    <p><?php echo $usuario['telefone']; ?></p>
                </div>
                <div>
                    <h3>Endereço</h3>
                    <p><?php echo $usuario['endereco']; ?></p>
                </div>
            </div>
            <div class="botoes">
                <form action="logout.php" method="post">
                    <button type="submit" class="btn">Sair</button>
                </form>
            </div>

        </section>


    </div>
</body>

</html>