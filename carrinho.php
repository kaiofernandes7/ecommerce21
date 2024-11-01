<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Carrinho</title>
    <link rel="stylesheet" href="assets/css/style.css" />
  </head>
  <body>
    <!-- início banner loja virtual -->
    <div class="novoMenu"></div>

    <!-- inicio container -->
    <div class="container">
      <!-- inicio navegação -->
      <div class="navbar">
        <div class="logo">
          <a href="index.html"
            ><img src="assets/img/logoEscura.png" alt="" width="125px"
          /></a>
        </div>

        <!-- Inicio menu navegação -->
        <nav>
            <ul id="MenuItens">
              <li><a href="index.php" title="">Início</a></li>
              <li><a href="produtos.php" title="">Produtos</a></li>
              <li><a href="conta.php" title="">Minha conta</a></li>
            </ul>
          </nav>
          <!-- fim menu navegação -->

        <a href="carrinho.php" title="">
            <img
              src="assets/img/carrinho2.png"
              alt=""
              width="30px"
              height="30px "
              class="cor-imagem"
            />
        </a>
        <img
          src="assets/img/menu.png"
          alt=""
          class="menu-celular"
          onclick="menucelular()"
        />
      </div>
      <!-- fim navegação -->
    </div>
    <!-- fim container -->
    <!-- fim banner loja virtual -->

    <!-- INICIO CARRINHO DE COMPRAS -->
    <div class="corpo-categorias carrinho-compras">
      <!-- INICIO TABELA DO CARRINHO DE COMPRAS -->
      <table>
        <tr>
          <th>Produto</th>
          <th>Quantidade</th>
          <th>Valor</th>
        </tr>
        <!-- INICIO ITEM DA TABELA DO CARRINHO -->
        <tr>
          <td>
            <div class="info-carrinho">
              <img src="assets/img/carrinho-1.jpg" alt="" />
              <div>
                <p>Curso loja virtual</p>
                <small>Valor: R$777</small>
                <br />
                <a href="" title="">Remover</a>
              </div>
            </div>
          </td>
          <td>
            <form action="" method="post">
              <input type="number" name=" id" value="1" />
            </form>
          </td>
          <td>Valor R$ 777</td>
        </tr>
        <!-- FIM ITEM DA TABELA DO CARRINHO -->
        <!-- INICIO ITEM DA TABELA DO CARRINHO -->
        <tr>
          <td>
            <div class="info-carrinho">
              <img src="assets/img/carrinho-2.jpg" alt="" />
              <div>
                <p>Curso loja virtual</p>
                <small>Valor: R$777</small>
                <br />
                <a href="" title="">Remover</a>
              </div>
            </div>
          </td>
          <td>
            <form action="" method="post">
              <input type="number" name=" id" value="1" />
            </form>
          </td>
          <td>Valor R$ 777</td>
        </tr>
        <!-- FIM ITEM DA TABELA DO CARRINHO -->
        <!-- INICIO ITEM DA TABELA DO CARRINHO -->

        <tr>
          <td>
            <div class="info-carrinho">
              <img src="assets/img/carrinho-3.jpg" alt="" />
              <div>
                <p>Curso loja virtual</p>
                <small>Valor: R$777</small>
                <br />
                <a href="" title="">Remover</a>
              </div>
            </div>
          </td>
          <td>
            <form action="" method="post">
              <input type="number" name=" id" value="1" />
            </form>
          </td>
          <td>Valor R$ 777</td>
        </tr>
        <!-- FIM ITEM DA TABELA DO CARRINHO -->
      </table>
      <!-- FIM TABELA DO CARRINHO DE COMPRAS -->


      <!-- INICIO VALOR TOTAL -->
       <div class="valor-total">
        <table>
            <tr>
                <td>Sub-total</td>
                <td>R$ 700</td>
            </tr>
            <tr>
                <td>Frete</td>
                <td>R$ 77</td>
            </tr>
            <tr>
                <td>Total</td>
                <td>R$ 777</td>
            </tr>
        </table>
       </div>
    <!-- FIM VALOR TOTAL -->
    </div>

    

    <!-- FIM CARRINHO DE COMPRAS -->

    <!-- INICIO RODAPÉ -->
    <footer class="rodape">
      <div class="container">
        <div class="linha">
          <div class="rodape-col-1">
            <h3>Baixe nosso app</h3>
            <p>Nas seguintes plataformas</p>
            <div class="app-logo">
              <img src="assets/img/google.png" alt="" />
              <img src="assets/img/apple.png" alt="" />
            </div>
          </div>

          <div class="rodape-col-2">
            <img src="assets/img/logo-2.png" alt="" />
            <p>
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Id sunt
              est rem placeat architecto dolorem, rerum debitis unde, deleniti
              voluptas quas esse quidem vitae pariatur laudantium fugit quam?
              Amet, nisi.
            </p>
          </div>

          <div class="rodape-col-3">
            <h3>Mais informações</h3>
            <ul>
              <li>Cupons</li>
              <li>Blog</li>
              <li>Política de privacidade</li>
              <li>Contatos</li>
            </ul>
          </div>

          <div class="rodape-col-4">
            <h3>Redes sociais</h3>
            <ul>
              <li>Facebook</li>
              <li>Instagram</li>
              <li>Twitter</li>
              <li>YouTube</li>
            </ul>
          </div>
        </div>
        <hr />
        <p class="direitos">&#169; Todos os direitos reservados</p>
      </div>
    </footer>
    <!-- FIM RODAPÉ -->

    <script
      type="module"
      src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"
    ></script>
    <script
      nomodule
      src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"
    ></script>
    <script src="assets/js/app.js"></script>
  </body>
</html>
