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
include 'connection.php';

$query = $_GET['query'];
$sql = "SELECT id, nome, preco, imagem FROM produtos WHERE nome LIKE '%$query%'";
$result = $mysqli->query($sql);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Resultados da Pesquisa - VesteVerso</title>
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <link rel="stylesheet" href="../css/header.css">
  <link rel="stylesheet" href="../css/coracao-favoritar.css">
  <link rel="shortcut icon" href="../resources/images/favicon.ico" type="image/x-icon">
  <style>
    * {
      margin: 0;
      padding: 0;
      }
      h4 {
        padding-top: 10px;
        padding-left: 40px;
        
    }
    
    .produtos {
      display: flex;
      flex-wrap: wrap;
      padding-left: 50px;
    }
    .cards-wrapper {
      display: flex;
      flex-direction: row;
      margin: 10px;
    }
    .card-produto {
      padding: 10px;
      border: 1px solid rgb(170, 170, 170);
      border-radius: 10px;
      display: inline-flex;
    }
    .imagem-card {
      width: 30vh; 
      display: inline-flex;
    }
    h2, h3 {
      font-size: 130%;
      display: inline-flex;
    }
    h3 {
      color: #535353;
    }
    .card-produto > a  {
      display: inline-flex;
      flex-direction: column;
      text-decoration: none;
      color: #000;
    }
    a:hover {
      text-decoration: none;
      color: #000;
    }
    .titulo-produto {
      display: inline-flex;
      text-align: start;
      word-wrap: break-word;
    }
    .div-botao {
      display: flex;
      justify-content: space-between;
    }
    .button-card-outline {
      background-color: #fff;
      color: #561aa4;
      border: 3px solid #561aa4;
      border-radius: 10px;
      font-size: 77%;
      font-weight: bold;
    }
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
  <h4>Resultados da Pesquisa: </h4>
  <div class="produtos">

<?php
  if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
      echo '<div class="cards-wrapper">
      <div class="card-produto d-md-block">
        <a href="produto.php?id=' . $row["id"] . '">
          <img src="' . $row["imagem"] . '" alt="imagem-roupa" style="width: 30vh;">
          <h2 class="titulo-produto">' . $row["nome"] . '</h2>
          <h3 class="titulo-produto">R$' . number_format($row["preco"], 2, ',', '.') . '</h3>
        </a>
        <div class="div-botao">
          <button class="button-card-outline"><a href="enviar-carrinho.php?acao=add&id='.$row['id'].'">Adicionar ao Carrinho</a></button>
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
$mysqli->close();
?>
</div>
</body>
</html>