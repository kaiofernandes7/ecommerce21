<?php
require 'verifica.php';
require 'conexao2.php';

if (isset($_SESSION['idUser']) && !empty($_SESSION['idUser'])):
?>

<?php else: header("Location: login.php");
endif; ?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <script type="module" src="https://unpkg.com/ionicons@latest/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@latest/dist/ionicons/ionicons.js"></script>
</head>

<body>


    <!-- início banner loja virtual -->
    <div class="banner"></div>

    <!-- inicio container -->
    <div class="container">
        <!-- Início do Header -->
        <?php include 'header.php'; ?>
        <!-- Fim do Header -->

        <!-- Início texto do banner -->
        <div class="linha">
            <div class="col-2">
                <h1>Escolha um novo <br>estilo de vida</h1>
                <p>A loja do seu estilo.</p>
                <br><a href="#" class="btn">Mais informações &#8594;</a>
            </div>
            <div class="col-2">
                <img src="assets/img/modelo-banner.webp" alt="">
            </div>
        </div>
        <!-- Fim texto do banner -->
    </div>
    <!-- fim container -->

    <!-- Início categorias -->
     <div class="fundo-cat">
     <div class="categorias">
        <div class="corpo-categorias">
            <div class="linha">
                <div class="col-3">
                    <img src="assets/img/cat02.jpg" alt="Categoria 1">
                </div>
                <div class="col-3">
                    <img src="assets/img/cat01.jpeg" alt="Categoria 2">
                </div>
                <div class="col-3">
                    <img src="assets/img/cat03.jpg" alt="Categoria 3">
                </div>
            </div>
        </div>
    </div>
     </div>
    
    <!-- fim categorias -->

    <!-- Inicio produtos em destaque -->
    <div class="corpo-categorias">
        <h2 class="titulo">Produtos em destaque</h2>

        <!-- inicio linha do corpo categorias -->
        <div class="linha">
            <?php
            $sql = "SELECT * FROM produtos WHERE destaque = 1 LIMIT 4";
            $stmt = $pdo->query($sql);

            while ($produto = $stmt->fetch(PDO::FETCH_ASSOC)) {
                echo '
                <div class="col-4">
                    <a href="ver-produto.php?id=' . $produto['id'] . '" title="">
                        <img src="' . htmlspecialchars($produto['imagem']) . '" alt="' . htmlspecialchars($produto['nome']) . '" />
                    </a>
                    <h4>' . htmlspecialchars($produto['nome']) . '</h4>
                    <div class="classificacao">
                        <ion-icon name="star"></ion-icon>
                        <ion-icon name="star"></ion-icon>
                        <ion-icon name="star"></ion-icon>
                        <ion-icon name="star"></ion-icon>
                        <ion-icon name="star"></ion-icon>
                    </div>
                    <p>R$ ' . number_format($produto['preco'], 2, ',', '.') . '</p>
                </div>';
            }
            ?>
        </div>
        <!-- fim linha do corpo categorias -->

        <h2 class="titulo">Novos produtos</h2>

        <!-- inicio linha do corpo categorias -->
        <div class="linha">
            <?php
            $sql = "SELECT * FROM produtos ORDER BY data_adicionado DESC LIMIT 4";
            $stmt = $pdo->query($sql);

            while ($produto = $stmt->fetch(PDO::FETCH_ASSOC)) {
                echo '
                <div class="col-4">
                    <a href="ver-produto.php?id=' . $produto['id'] . '" title="">
                        <img src="' . htmlspecialchars($produto['imagem']) . '" alt="' . htmlspecialchars($produto['nome']) . '">
                    </a>
                    <h4>' . htmlspecialchars($produto['nome']) . '</h4>
                    <div class="classificacao">
                        <ion-icon name="star"></ion-icon>
                        <ion-icon name="star"></ion-icon>
                        <ion-icon name="star"></ion-icon>
                        <ion-icon name="star"></ion-icon>
                        <ion-icon name="star"></ion-icon>
                    </div>
                    <p>R$ ' . number_format($produto['preco'], 2, ',', '.') . '</p>
                </div>';
            }
            ?>
        </div>
        <!-- fim linha do corpo categorias -->
    </div>
    <!-- Fim produtos em destaque -->

    <!-- Inicio ofertas produtos em destaque -->
    <div class="ofertas">
        <div class="corpo-categorias">
            <div class="linha">
                <div class="col-2">
                    <img src="assets/img/oferta02.png" alt="">
                </div>
                <div class="col-2">
                    <p>Produto exclusivo da loja</p>
                    <h1>Camisetas com promoções incríveis</h1>
                    <small>Aproveite nossos preços de blackfriday!</small>
                    <br> <br><a href="" class="btn">Comprar agora &#8594;</a>
                </div>
            </div>
        </div>
    </div>
    <!-- fim ofertas produtos em destaque -->

    <!-- inicio depoimentos -->
    <div class="depoimentos">
        <div class="corpo-categorias">
            <div class="linha">
                <!-- inicio item depoimentos -->
                <div class="col-3">
                    <ion-icon name="ribbon" class="depoimento-icone"></ion-icon>
                    <p>A qualidade das roupas é incrível, sempre com acabamentos impecáveis e tecidos confortáveis. Além disso, o atendimento é super atencioso e a entrega rápida. Sempre saio satisfeito e já virei cliente fiel!</p>
                    <div class="classificacao">
                        <ion-icon name="star"></ion-icon>
                        <ion-icon name="star"></ion-icon>
                        <ion-icon name="star"></ion-icon>
                        <ion-icon name="star"></ion-icon>
                        <ion-icon name="star"></ion-icon>
                    </div>
                    <img src="assets/img/cristiano.webp" alt="">
                    <h3>Cristiano Ronaldo</h3>
                </div>
                <!-- fim item depoimentos -->

                <!-- inicio item depoimentos -->
                <div class="col-3">
                    <ion-icon name="ribbon" class="depoimento-icone"></ion-icon>
                    <p>Simplesmente apaixonado por essa loja! As roupas são lindas, modernas e de altíssima qualidade. A experiência de compra é excelente, desde o atendimento até a rapidez na entrega. Recomendo de olhos fechados!</p>
                    <div class="classificacao">
                        <ion-icon name="star"></ion-icon>
                        <ion-icon name="star"></ion-icon>
                        <ion-icon name="star"></ion-icon>
                        <ion-icon name="star"></ion-icon>
                        <ion-icon name="star"></ion-icon>
                    </div>
                    <img src="assets/img/kanye.webp" alt="">
                    <h3>Kanye West</h3>
                </div>
                <!-- fim item depoimentos -->

                <!-- inicio item depoimentos -->
                <div class="col-3">
                    <ion-icon name="ribbon" class="depoimento-icone"></ion-icon>
                    <p>Uma das melhores lojas que já comprei! As peças têm um design único e caem perfeitamente. O cuidado com os detalhes, como a embalagem e o atendimento, fazem toda a diferença. Sempre fico ansioso pelas novidades!</p>
                    <div class="classificacao">
                        <ion-icon name="star"></ion-icon>
                        <ion-icon name="star"></ion-icon>
                        <ion-icon name="star"></ion-icon>
                        <ion-icon name="star"></ion-icon>
                        <ion-icon name="star"></ion-icon>
                    </div>
                    <img src="assets/img/neymar.jpg" alt="">
                    <h3>Neymar Junior</h3>
                </div>
                <!-- fim item depoimentos -->
            </div>
        </div>
    </div>
    <!-- fim depoimentos -->

    <!-- INICIO MARCAS -->
    <div class="marcas">
        <div class="corpo-categorias">
            <div class="linha">
                <div class="col-5">
                    <img src="assets/img/marca-1.png" alt="">
                </div>

                <div class="col-5">
                    <img src="assets/img/marca-2.png" alt="">
                </div>
                <div class="col-5">
                    <img src="assets/img/marca-3.png" alt="">
                </div>
                <div class="col-5">
                    <img src="assets/img/marca-4.png" alt="">
                </div>
                <div class="col-5">
                    <img src="assets/img/marca-5.png" alt="">
                </div>
            </div>
        </div>
    </div>
    <!-- FIM MARCAS -->

    <!-- Footer -->
    <?php include 'footer.php'; ?>

</body>

</html>