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
       <!-- Início do Header -->
       <?php include 'header.php'; ?>
            <!-- Fim do Header -->
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

    <!-- Início do Footer -->
    <?php include 'footer.php'; ?>
        <!-- Fim do Footer -->

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
