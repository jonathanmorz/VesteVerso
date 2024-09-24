<?php
   include 'connection.php';
   session_start(); //inicia a sessão
   //Variáveis para serem usada para armazenamento de dados e utilização em páginas que precisam dessas informações
   $username = '';
   $role = '';
   $email = '';
   $fullname = '';
   
   //Este código verifica se o usuário está logado, obtém o id da sessão, e então busca no banco de dados as informações desejadas usando uma consulta SQL preparada, protegendo assim contra injeção de SQL
   if (isset($_SESSION['id'])) {
      $userId = $_SESSION['id'];
      $sql = "SELECT username, cargo, email, nome FROM clientes WHERE id = ?";
      $stmt = $mysqli->prepare($sql);
      $stmt->bind_param("i", $userId);
      $stmt->execute();
      $stmt->bind_result($username, $role, $email, $fullname);
      $stmt->fetch();
      $stmt->close();
   }
?>

<?php
function htmlHeaderNoNavBar($username = null, $role) 
{
    ob_start();
    ?>
    <header>
      <div id="div-logo">
        <a href="index.php">
          <img src="../resources/images/logo-branca-grande.png" alt="logo-vesteverso" id="img-logo">
        </a>
      </div>

      <form action="pesquisa.php" method="GET">
      <div class="div-barra-pesquisa">
        <input type="text" class="input-pesquisa" placeholder="Digite sua pesquisa...">
        <button id="button-pesquisa" type="submit"><a href="#" class="pesquisa-btn"><img src="../resources/images/lupa2.png" alt="Lupa" width="20" height="20"></a>
        </button>
    </div>
      </form>
      
      <div id="div-direita-header">        
                  <ul id="ul-dropdown">
                      <li class="dropdown" type="none">
                          <a id="menu-drop" href="minha-conta.php"><img src="../resources/images/user.svg" alt="user" class="img-header" height="51px" width="51px"></a>
                          <div class="dropdown-menu">
                              <?php if ($username && $role == "cliente"): ?>
                                  <span class="login-drop">Bem-vindo, <?php echo htmlspecialchars($username); ?></span>
                                  <a href="logout.php" class="link-header">Sair</a>
                              <?php elseif ($username && $role == "admin"): ?>
                                  <div><span class="login-drop">Bem-vindo, <?php echo htmlspecialchars($username); ?></span></div>
                                  <a href="produtos.php" class="link-header">Lista de produtos</a>
                                  <a href="logout.php" class="link-header">Sair</a>
                              <?php else: ?>
                                  <a href="../php/Cadastro.php" class="login-drop">Cadastre-se</a>
                                  <a href="../php/login2.php" class="login-drop">Entrar</a>
                              <?php endif; ?>
                          </div>
                      </li>
                  </ul>
                  <a href="carrinho.php"><img src="../resources/images/carrinho.svg" alt="carrinho" id="carrinho" class="img-header" height="51px" width="51px"></a>
                  <a href="favoritos.php"><img src="../resources/images/solid-heart.svg" alt="coracao-favorito" id="coracao-favorito" class="img-header" height="51px" width="51px"></a>
              
      </div>
    </header>
    <?php
    return ob_get_clean();
  }
   ?>

<?php
function htmlHeader($username = null, $role) 
{
    ob_start();
    ?>
    <?php echo htmlHeaderNoNavBar($username, $role) ?> 
    <nav>
      <a href="roupa-masc.php">Roupas Masculinas</a>
      <a href="roupa-fem.php">Roupas Femininas</a>
      <a href="roupa-inf.php">Roupas Infantis</a>
      <a href="roupa-promo.php">Promoções</a>
    </nav>
    <?php
    return ob_get_clean();
}
?>

<?php
function htmlCardsPadrao($row, $result) 
{
    if ($result->num_rows > 0) {
        $html = '';
        while($row = $result->fetch_assoc()) {
          $html .= '<div class="cards-wrapper">
          <div class="card-produto d-md-block">
          <a href="produto.php?id=' . $row["id"] . '">
          <img src="' . $row["imagem"] . '" alt="imagem-roupa" class="imagem-card">
          <div class="nome-produto">
          <h2 class="titulo-produto">' . $row["nome"] . '</h2>
                              </div>
                              <h3 class="titulo-produto">R$' . number_format($row["preco"], 2, ',', '.') . '</h3>
                              </a>
                              <div class="div-botao">
                              <button class="button-card-outline">
                                  <a href="enviar-carrinho.php?acao=add&id=' . $row['id'] . '">Adicionar ao Carrinho</a>
                                  </button>
                                  <button class="favoritar" onclick="favoritarProduto(' . $row['id'] . ')">
                                  <img src="../resources/images/coracao-roxo.png" alt="Coração Favorito" id="coracao-favoritar' . $row["id"] . '">
                                  </button>
                                  <script>
                                  function favoritarProduto(produtoId) {
                                      var coracaofavoritar = document.getElementById("coracao-favoritar" + produtoId);
                                      
                                      // Verifica a imagem atual e troca a imagem ao clicar
                                      if (coracaofavoritar.src.match("../resources/images/coracao-roxo.png")) {
                                          coracaofavoritar.src = "../resources/images/coracao-solido-roxo.png";
                                      } else {
                                          coracaofavoritar.src = "../resources/images/coracao-roxo.png";
                                      }
                                      
                                      // Faz a requisição AJAX
                                      var xhr = new XMLHttpRequest();
                                      xhr.open("GET", "enviar-favoritos.php?acao=add&id=" + produtoId, true);
                                      xhr.send();
                                  }
                                  </script>
                              </div>
                              </div>
                              </div>';

                }
                return $html;
    } else {
        return "0 resultados";
    }
}
?>

<?php
function htmlCardsNoWrap($row, $result) 
{
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
          echo '<div class="cards-no-wrap">
                    <div class="card-produto d-none d-md-block">
                      <a href="produto.php?id=' . $row["id"] . '">
                        <img src="' . $row["imagem"] . '" alt="imagem-roupa" style="width: 13rem;">
                        <h2 class="titulo-produto">' . $row["nome"] . '</h2>
                        <h3 class="titulo-produto">R$' . number_format($row["preco"], 2, ',', '.') . '</h3>
                      </a>
                      <div class="div-botao">
                        <button class="button-card-outline"><a href="enviar-carrinho.php?acao=add&id='.$row['id'].'">Adicionar ao Carrinho</a></button>
                        <button class="favoritar" onclick="favoritarProduto(' . $row['id'] . ')">
                                  <img src="../resources/images/coracao-roxo.png" alt="Coração Favorito" id="coracao-favoritar' . $row["id"] . '">
                                  </button>
                                  <script>
                                  function favoritarProduto(produtoId) {
                                      var coracaofavoritar = document.getElementById("coracao-favoritar" + produtoId);
                                      
                                      // Verifica a imagem atual e troca a imagem ao clicar
                                      if (coracaofavoritar.src.match("../resources/images/coracao-roxo.png")) {
                                          coracaofavoritar.src = "../resources/images/coracao-solido-roxo.png";
                                      } else {
                                          coracaofavoritar.src = "../resources/images/coracao-roxo.png";
                                      }
                                      
                                      // Faz a requisição AJAX
                                      var xhr = new XMLHttpRequest();
                                      xhr.open("GET", "enviar-favoritos.php?acao=add&id=" + produtoId, true);
                                      xhr.send();
                                  }
                      </div>
                    </div>
                    </div>
                  </div>';
        }
    } else {
        return "0 resultados";
    }
}
?>

<?php
function htmlFooter()
{
    $htmlFooter = <<<HTML
    <footer>
      <div id="footer-content">
          <img src="../resources/images/logo-roxa-grande" alt="" srcset="">
      </div>
    </footer>
    HTML;

    echo $htmlFooter;
}
?>