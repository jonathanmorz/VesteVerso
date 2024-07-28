<?php
session_start();
include 'connection.php';

$username = '';

if (isset($_SESSION['id'])) {
    $userId = $_SESSION['id'];
    $sql = "SELECT username FROM clientes WHERE id = ?";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("i", $userId);
    $stmt->execute();
    $stmt->bind_result($username);
    $stmt->fetch();
    $stmt->close();
}
?>
    <?php else: ?>
        <a href="../html/Cadastro.html" class="login-drop">Cadastre-se</a>
        <a href="../html/login.html" class="login-drop">Entrar</a>
        <div><a href="logout.php"><button name="logout" id="botao-logout">Sair</button></a></div>
    <?php endif; ?>

<?php
  function htmlHeaderNoLog($username)
  {
    $htmlHeaderNoLog = <<<HTML 
    <header>
    <div id="div-logo"><a href="index.php"><img src="../resources/images/logo-branca-grande.png" alt="logo-vesteverso" id="img-logo"></a></div>
        <form action="pesquisa.php" method="GET">
          <div id="div-barra-pesquisa"><input type="text" name="query" placeholder="Digite sua pesquisa..." id="input-pesquisa"><button id="button-pesquisa" type="submit"><img src="../resources/images/lupa.png" alt="lupa-pesquisa" id="img-lupa"></button></input></div>
        </form>
        <div id="div-direita-header">
            <div id="div-dropdown">
                <ul id="ul-dropdown">
                    <li class="dropdown" type="none">
                        <a id="menu-drop" href="#"><img src="../resources/images/user.png" alt="user"></a>
                        <div class="dropdown-menu">
                            <div>
                              <span class="login-drop">
                                Bem-vindo, echo htmlspecialchars($username); 
                              </span>
                            </div>
                            <div><a href="logout.php"><button name="logout" id="botao-logout">Sair</button></a></div>
                        </div>
                    </li>
                </ul>
            </div>
            <div id="div-carrinho">
                <img src="../resources/images/carrinho.png" alt="carrinho" id="carrinho">
            </div>
            <div id="div-favorito">
                <img src="../resources/images/coracao-solido.png" alt="coracao-favorito" id="coracao-favorito">
            </div>
        </div>
    </header>
    <nav>
        <a href="roupa-masc.php">Roupas Masculinas</a>
        <a href="roupa-fem.php">Roupas Femininas</a>
        <a href="roupa-inf.php">Roupas Infantis</a>
        <a href="roupa-promo.php">Promoções</a>
    </nav>
    HTML;

    echo $htmlHeader
  }
?>

<?php
function gerarHeader($username = null) {
    ob_start();
    ?>
    <header>
        <div id="div-logo">
            <a href="index.php"><img src="../resources/images/logo-branca-grande.png" alt="logo-vesteverso" id="img-logo"></a>
        </div>
        <form action="pesquisa.php" method="GET">
            <div id="div-barra-pesquisa">
                <input type="text" name="query" placeholder="Digite sua pesquisa..." id="input-pesquisa">
                <button id="button-pesquisa" type="submit"><img src="../resources/images/lupa.png" alt="lupa-pesquisa" id="img-lupa"></button>
            </div>
        </form>
        <div id="div-direita-header">
            <ul id="ul-dropdown">
                <li class="dropdown" type="none">
                    <a id="menu-drop" href="#"><img src="../resources/images/user.png" alt="user" class="img-header"></a>
                    <div class="dropdown-menu">
                        <?php if ($username): ?>
                            <div><span class="login-drop">Bem-vindo, <?php echo htmlspecialchars($username); ?></span></div>
                            <div><a href="logout.php"><button name="logout" id="botao-logout">Sair</button></a></div>
                        <?php else: ?>
                            <a href="../html/Cadastro.html" class="login-drop">Cadastre-se</a>
                            <a href="../html/login.html" class="login-drop">Entrar</a>
                        <?php endif; ?>
                    </div>
                </li>
            </ul>
            <a href="carrinho.php"><img src="../resources/images/carrinho.png" alt="carrinho" id="carrinho" class="img-header"></a>
            <a href="favoritos.php"><img src="../resources/images/coracao-solido.png" alt="coracao-favorito" id="coracao-favorito" class="img-header"></a>
        </div>
    </header>
    <nav>
        <a href="roupa-masc.php">Roupas Masculinas</a>
        <a href="roupa-fem.php">Roupas Femininas</a>
        <a href="roupa-inf.php">Roupas Infantis</a>
        <a href="roupa-promo.php">Promoções</a>
    </nav>
    <?php
    return ob_get_clean();
}
$username = ['username'];
echo gerarHeader($username);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VesteVerso</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/categorias-roupas.css">
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/cards.css">
    <link rel="stylesheet" href="../css/coracao-favoritar.css">
    <link rel="shortcut icon" href="../resources/images/favicon.ico" type="image/x-icon">
    <style>
      
    </style>
  </head>
<body>
    <header>
    <div id="div-logo"><a href="index.php"><img src="../resources/images/logo-branca-grande.png" alt="logo-vesteverso" id="img-logo"></a></div>
        <form action="pesquisa.php" method="GET">
          <div id="div-barra-pesquisa"><input type="text" name="query" placeholder="Digite sua pesquisa..." id="input-pesquisa"><button id="button-pesquisa" type="submit"><img src="../resources/images/lupa.png" alt="lupa-pesquisa" id="img-lupa"></button></input></div>
        </form>
        <div id="div-direita-header">
            <div id="div-dropdown">
                <ul id="ul-dropdown">
                    <li class="dropdown" type="none">
                        <a id="menu-drop" href="#"><img src="../resources/images/user.png" alt="user"></a>
                        <div class="dropdown-menu">
                            <?php if ($username): ?>
                                <div><span class="login-drop">Bem-vindo, <?php echo htmlspecialchars($username); ?></span></div>
                                <div><a href="logout.php"><button name="logout" id="botao-logout">Sair</button></a></div>
                            <?php else: ?>
                                <a href="../html/Cadastro.html" class="login-drop">Cadastre-se</a>
                                <a href="../html/login.html" class="login-drop">Entrar</a>
                            <?php endif; ?>
                        </div>
                    </li>
                </ul>
            </div>
            <div id="div-carrinho">
                <img src="../resources/images/carrinho.png" alt="carrinho" id="carrinho">
            </div>
            <div id="div-favorito">
                <img src="../resources/images/coracao-solido.png" alt="coracao-favorito" id="coracao-favorito">
            </div>
        </div>
    </header>
    <nav>
        <a href="roupa-masc.php">Roupas Masculinas</a>
        <a href="roupa-fem.php">Roupas Femininas</a>
        <a href="roupa-inf.php">Roupas Infantis</a>
        <a href="roupa-promo.php">Promoções</a>
    </nav>

    <?php $sql = "SELECT * FROM produtos";    
          $result = $mysqli->query($sql);
    
          if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
              echo '<div class="cards-wrapper">
                        <div class="card-produto d-none d-md-block">
                          <a href="produto.php?id=' . $row["id"] . '">
                            <img src="' . $row["imagem"] . '" alt="imagem-roupa" style="width: 30vh;">
                            <h2 class="titulo-produto">' . $row["nome"] . '</h2>
                            <h3 class="titulo-produto">R$' . number_format($row["preco"], 2, ',', '.') . '</h3>
                          </a>
                          <div class="div-botao">
                            <button class="button-card-outline">Adicionar ao Carrinho</button>
                            <img src="../resources/images/coracao-roxo.png" alt="Coração Favorito" id="coracao-favoritar' . $row["id"] . '" onclick="trocarImagem' . $row["id"] . '()">
                            <script>
                              function trocarImagem' . $row["id"] . '() {
                                var coracaofavoritar = document.getElementById("coracao-favoritar' . $row["id"] . '");
                                if (coracaofavoritar.src.match("../resources/images/coracao-roxo.png")) {
                                  coracaofavoritar.src = "../resources/images/coracao-solido-roxo.png";
                                } else {
                                  coracaofavoritar.src = "../resources/images/coracao-roxo.png";
                                }
                              }
                            </script>
                          </div>
                        </div>
                        </div>
                      </div>';
            }
        } else {
            echo "0 resultados";
        }
        ?>
  </body>
</html>