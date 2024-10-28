<?php
require 'verifica.php';

if(isset($_SESSION['idUser']) && !empty($_SESSION['idUser'])):
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

    <!-- início banner loja virtual -->
    <div class="banner"></div>

        <!-- inicio container -->
         <div class="container">
            <!-- inicio navegação -->
             <div class="navbar">
                <div class="logo">
                    <a href="index.html"><img src="assets/img/logoEscura.png" alt="" width="125px"></a>
                </div>

              <!-- Inicio menu navegação -->
        <nav>
            <ul id="MenuItens">
              <li><a href="index.html" title="">Início</a></li>
              <li><a href="produtos.html" title="">Produtos</a></li>
              <li><a href="" title="">Carrinho</a></li>
              <li><a href="" title=""><?php echo $nomeUser;?></a></li>
              <li><a href="logout.php" title="">Sair</a></li>
              
            </ul>
          </nav>
          <!-- fim menu navegação -->

                 <!-- <a href="carrinho.html" title><img src="assets/img/carrinho.png" alt="" width="30px" height="30px " class="cor-imagem"></a>
                 <img src="assets/img/menu.png" alt=""  class="menu-celular" onclick="menucelular()">
             </div> -->
             <!-- fim navegação -->

    

    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script src="assets/js/app.js"></script>

    <main>
        <div>
            <h3>Olá <?php echo $nomeUser;?></h3>
        </div>
    </main>
</body>
</html>


<?php  else: header("Location: login.php"); endif; ?>
