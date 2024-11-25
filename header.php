<!-- inicio navegação -->
<div class="navbar">
  <div class="logo">
    <a href="index.php"><img src="assets/img/logo-clara.png" alt="" width="125px"></a>
  </div>

  <!-- Inicio menu navegação -->
  <nav class="menu">
    <ul id="MenuItens" class="menu-list">
      <li class="menu-item"><a href="index.php" class="menu-link">Início</a></li>
      <li class="menu-item"><a href="produtos.php" class="menu-link">Produtos</a></li>
      <li class="menu-item"><a href="conta.php" class="menu-link">Minha conta</a></li>

      <li class="menu-item">
        <form action="categoria.php" method="GET" class="category-form">
          <label for="categoria" class="category-label"></label>
          <select name="id_categoria" id="categoria" class="category-select" onchange="this.form.submit()">
            <option value="" disabled selected>Categoria</option>
            <?php
            // Seleciona as categorias do banco de dados
            $sql = "SELECT * FROM categorias";
            $stmt = $pdo->query($sql);
            while ($categoria = $stmt->fetch(PDO::FETCH_ASSOC)) {
              echo '<option value="' . $categoria['id'] . '">' . htmlspecialchars($categoria['nome']) . '</option>';
            }
            ?>
          </select>
        </form>
      </li>
      
      <li class="menu-item">
        <form action="produtos.php" method="GET" class="search-form">
          <input 
            type="text" 
            name="busca" 
            id="search-input"
            placeholder="Pesquisar produtos..." 
            class="search-input" 
            value="<?php echo isset($_GET['busca']) ? htmlspecialchars($_GET['busca']) : ''; ?>"
            onkeyup="showSuggestions()"
          >
          <button type="submit" class="search-button">Buscar</button>
        </form>

        <!-- Container para sugestões de pesquisa -->
        <div id="suggestions-container" class="suggestions-container"></div>
      </li>
    </ul>
  </nav>
  <!-- fim menu navegação -->

  <a href="carrinho.php" class="carrinho-link">
    <img src="assets/img/carrinho.png" alt="Carrinho" width="30px" height="30px" class="cor-imagem">
  </a>

  <img src="assets/img/menu.png" alt="Menu" class="menu-celular" onclick="menucelular()">
</div>
<!-- fim navegação -->

