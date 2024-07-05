<?php
include 'connection.php';

$sql = "SELECT id, nome, preco, imagem FROM produtos";
$result = $mysqli->query($sql);

echo '<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>VesteVerso</title>
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <link rel="stylesheet" href="../css/header.css">
  <link rel="stylesheet" href="../css/card.css">
  <link rel="stylesheet" href="../css/coracao-favoritar.css">
  <link rel="shortcut icon" href="../resources/images/favicon.ico" type="image/x-icon">
</head>
<body>
    <header>
        <div id="div-logo"><a href="index.html"><img src="../resources/images/logo-branca-grande.png" alt="logo-vesteverso" id="img-logo"></a></div>
        <form action="">
          <div id="div-barra-pesquisa"><input type="search" placeholder="Digite sua pesquisa..." id="input-pesquisa"><button id="button-pesquisa"><img src="../resources/images/lupa.png" alt="lupa-pesquisa" id="img-lupa"></button></input></div>
        </form>
        <div id="div-direita-header">
            <div id="div-dropdown">
                <ul id="ul-dropdown">
                    <li type="none" class="dropdown"><a id="menu-drop" href="#"><img src="../resources/images/user.png" alt="user">
                    <div class="dropdown-menu">
                        <a href="Cadastro.html" class="login-drop">Cadastre-se</a>
                        <a href="login.html" class="login-drop">Entrar</a>
                    </div>
                    </li>
                </ul>
            </div>
        </div>
    </header>
    <nav>
        <a href="#">Roupas Masculinas</a>
        <a href="#">Roupas Femininas</a>
        <a href="#">Roupas Infantis</a>
        <a href="#">Promoções</a>
    </nav>
  <div class="produtos">';
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo '<div class="cards-wrapper">
                <div class="card-produto d-none d-md-block">
                  <a href="produto-' . $row["id"] . '.php">
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
              </div>';
    }
} else {
    echo "0 resultados";
}
echo '</div>';
$mysqli->close();
?>
</body>
</html>