<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Minha Conta</title>
    <link rel="stylesheet" href="assets/css/style-conta.css">
</head>

<body>
    <!-- inicio container -->
    <div class="container">
        <!-- Início do Header -->
        <?php include 'header.php'; ?>
            <!-- Fim do Header -->

            

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