<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login</title>
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
              <li><a href="index.html" title="">Início</a></li>
              <li><a href="produtos.html" title="">Produtos</a></li>
              <li><a href="" title="">Empresa</a></li>
              <li><a href="" title="">Contato</a></li>
              <li><a href="minha-conta.html" title="">Minha conta</a></li>
            </ul>
          </nav>
          <!-- fim menu navegação -->

        <a href="carrinho.html" title="">
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


    <!-- INICIO MINHA CONTA -->
   <div class="minha-conta">
    <div class="container">
        <div class="linha">
            <div class="col-2">
                <img src="assets/img/banner-1.png" alt="" width="100%">
            </div>
            <div class="col-2">
                <div class="formulario">
                    <div class="btn-form">
                        <span onclick="Entrar()">Entrar</span>
                        <span onclick="Cadastro()">Cadastro</span>
                        <hr id="Indicador">
                    </div>
                    <form action="logar.php" method="post" id="EntrarPainel">
                        <input type="text" name="email" id="" placeholder="E-mail de acesso">
                        <input type="password" name="senha" id="" placeholder="Digite sua senha">
                        <button type="submit" name="senEntrar" class="btn">Entrar</button>
                        <a href="#" title="">Esqueceu sua senha?</a>
                    </form>
                    <form action="" method="post" id="CadastroSite">
                        <input type="text" name="nome" id="" placeholder="Nome completo">
                        <input type="text" name="nome" id="" placeholder="E-mail de acesso">
                        <input type="password" name="senha" id="" placeholder="Digite sua senha">
                        <button type="submit" name="sendCad" class="btn">Cadastre-se</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
   </div>

    <!-- FIM MINHA CONTA -->


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
    <script src="assets/js/login.js"></script>
  </body>
</html>
