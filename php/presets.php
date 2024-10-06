
<?php
   include 'connection.php';
   session_start(); //inicia a sessão
   //Variáveis para serem usada para armazenamento de dados e utilização em páginas que precisam dessas informações
   $nome = '';
   $role = '';
   $email = '';
   $fullname = '';
   
   //Este código verifica se o usuário está logado, obtém o id da sessão, e então busca no banco de dados as informações desejadas usando uma consulta SQL preparada, protegendo assim contra injeção de SQL
   if (isset($_SESSION['id'])) {
      $userId = $_SESSION['id'];
      $sql = "SELECT nome, cargo, email, nome FROM clientes WHERE id = ?";
      $stmt = $mysqli->prepare($sql);
      $stmt->bind_param("i", $userId);
      $stmt->execute();
      $stmt->bind_result($nome, $role, $email, $fullname);
      $stmt->fetch();
      $stmt->close();
   }
?>

<?php
function htmlHeaderNoNavBar($nome = null, $role) 
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
        <input type="text" class="input-pesquisa" placeholder="Digite sua pesquisa..." name="query">
        <button id="button-pesquisa" type="submit"><a href="#" class="pesquisa-btn"><img src="../resources/images/lupa2.png" alt="Lupa" width="20" height="20"></a>
        </button>
    </div>
        </form>
      
        <div id="div-direita-header">        
          <?php if ($nome && $role == "cliente"): ?>
            <ul id="ul-dropdown">
                <li class="dropdown" type="none">
                    <a id="menu-drop" href="minha-conta.php"><img src="../resources/images/user.svg" alt="user" class="img-header" height="51px" width="51px"></a>
                    <div class="dropdown-menu">
                        <span class="login-drop">Bem-vindo, <?php echo htmlspecialchars($nome); ?></span>
                        <a href="logout.php" class="link-header">Sair</a>
                    </div>
                </li>
            </ul>
            <?php elseif ($nome && $role == "admin"): ?>
                <ul id="ul-dropdown">
                    <li class="dropdown" type="none">
                        <a id="menu-drop" href="minha-conta.php"><img src="../resources/images/user.svg" alt="user" class="img-header" height="51px" width="51px"></a>
                        <div class="dropdown-menu">
                            <div><span class="login-drop">Bem-vindo, <?php echo htmlspecialchars($nome); ?></span></div>
                            <a href="produtos.php" class="link-header">Lista de produtos</a>
                            <a href="logout.php" class="link-header">Sair</a>
                        </div>
                    </li>
                </ul>
            <?php else: ?>
                <a id="menu-drop" href="../php/login-cadastro.php"><img src="../resources/images/user.svg" alt="user" class="img-header" height="51px" width="51px"></a>
            <?php endif; ?>
            <a href="carrinho.php"><img src="../resources/images/carrinho.svg" alt="carrinho" id="carrinho" class="img-header" height="51px" width="51px"></a>
            <a href="favoritos.php"><img src="../resources/images/solid-heart.svg" alt="coracao-favorito" id="coracao-favorito" class="img-header" height="51px" width="51px"></a>       
        </div>
    </header>
    <?php
    return ob_get_clean();
  }
   ?>

<?php
function htmlHeader($nome = null, $role) 
{
    ob_start();
    ?>
    <?php echo htmlHeaderNoNavBar($nome, $role) ?> 
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
function htmlCardsPadrao($result, $mysqli, $userId) 
{
    $html = '';

    // Consulta todos os produtos favoritados do usuário de uma vez
    $stmtFavoritos = $mysqli->prepare("SELECT produto_id FROM favoritos WHERE user_id = ?");
    $stmtFavoritos->bind_param("i", $userId);
    $stmtFavoritos->execute();
    $favoritosResult = $stmtFavoritos->get_result();
    
    // Armazena os produtos favoritados em um array para consulta rápida
    $favoritos = [];
    while ($rowFavorito = $favoritosResult->fetch_assoc()) {
        $favoritos[] = $rowFavorito['produto_id'];
    }
    
    // Gera o HTML para cada produto
    while($row = $result->fetch_assoc()) {
        // Verifica se o produto está na lista de favoritos
        $favoritado = in_array($row['id'], $favoritos);
        
        // Define a imagem inicial do coração com base no status de favoritado
        $coracaoImg = $favoritado ? "../resources/images/coracao-solido-roxo.png" : "../resources/images/coracao-roxo.png";

        // Gera o HTML para o produto
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
                                <a href="enviar-favoritos.php?acao=add&id=' . $row['id'] . '">Adicionar ao Carrinho</a>
                            </button>
                            <button class="favoritar" onclick="favoritarProduto(' . $row['id'] . ')">
                                <img src="' . $coracaoImg . '" alt="Coração Favorito" id="coracao-favoritar' . $row["id"] . '">
                            </button>
                            <script>
                                function favoritarProduto(produtoId) {
                                    var coracaofavoritar = document.getElementById("coracao-favoritar" + produtoId);
                                    
                                    // Verifica a imagem atual e troca a imagem ao clicar
                                    if (coracaofavoritar.src.match("../resources/images/coracao-roxo.png")) {
                                        coracaofavoritar.src = "../resources/images/coracao-solido-roxo.png";
                                        var acao = "add";
                                    } else {
                                        coracaofavoritar.src = "../resources/images/coracao-roxo.png";
                                        var acao = "del";
                                    }
                                    
                                    // Faz a requisição AJAX para salvar ou remover dos favoritos
                                    var xhr = new XMLHttpRequest();
                                    xhr.open("GET", "enviar-favoritos.php?acao=" + acao + "&id=" + produtoId, true);
                                    xhr.onreadystatechange = function() {
                                        if (xhr.readyState === 4 && xhr.status === 200) {
                                            console.log(xhr.responseText);  // Para verificar a resposta do servidor
                                        }
                                    };
                                    xhr.send();
                                }
                            </script>
                        </div>
                    </div>
                </div>';
    }

    return $html;
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
                        <button class="button-card-outline"><a href="enviar-favoritos.php?acao=add&id='.$row['id'].'">Adicionar ao Carrinho</a></button>
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
            <div id="footer-top">
            <section class="footer-grid" id="section1">
                <img src="../resources/images/logo-branca-grande.png" id="logo-footer">
                <p>Cadastre-se em nossa Newsletter para receber novidades e promoções!</p>
                <div class="div-email">
                <input type="email" name="e-news" class="input-email" placeholder="Digite seu email">
                <button id="btn-enviar"><img id="seta-direita" src="../resources/images/seta-direita.png" alt="Seta-Direita" width="20" height="20"></button>
                </div>
            </section>
            <section class="footer-grid" id="section2">
                <h4>Grupo Soma</h4>
                <ul>
                <li>Home</li>
                <li>Sobre</li>
                <li>Time</li>
                </ul>
            </section>
            <section class="footer-grid" id="section3">
                <h4>Documentação</h4>
                <ul>
                <li>Central de Ajuda</li>
                <li>Contato</li>
                <li>FAQ</li>
                <li>Política de privacidade</li>
                </ul>
            </section>
            <section class="footer-grid" id="section4">
                <h4>Redes Sociais</h4>
                <ul>
                <li>Facebook</li>
                <li>Instagram</li>
                <li>Youtube</li>
                <li>Twitter</li>
                </ul>
            </section>
            </div>
            <div id="footer-bottom">
            <div id="linha"></div>
            <div id="direitos">
                <h5>&copy;VesteVerso. Todos os direitos reservados 2024</h5>
                <h5>Termos & Condições</h5>
            </div>
            </div>
        </div>
    </footer>
    HTML;

    echo $htmlFooter;
}
?>