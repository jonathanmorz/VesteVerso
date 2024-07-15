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
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VesteVerso</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/cadastro-produtos.css">
    <link rel="stylesheet" href="../css/coracao-favoritar.css">
    <link rel="shortcut icon" href="../resources/images/favicon.ico" type="image/x-icon">
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
   
    <div id="div-form">
        <form action="../php/salvar.php" enctype="multipart/form-data" method="POST">
            <div class="form-group row">
              <label for="inputTitle" class="col-sm-2 col-form-label">Título do Produto</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="inputTitle" placeholder="Digite o titulo do produto com poucos caracteres (Máximo de 25): " name="nome-produto">
              </div>
            </div>
            <div class="form-group row">
              <label for="inputTitle" class="col-sm-2 col-form-label">Descrição do Produto</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="inputDesc" placeholder="Digite o titulo do produto: " name="desc-produto">
              </div>
            </div>
            <div class="form-group row">
              <label for="inputPrice" class="col-sm-2 col-form-label">Preço</label>
              <div class="col-sm-10">
                <input type="number" step="0.010" class="form-control" id="inputPrice" placeholder="Digite o preço do produto: " name="preco">
              </div>
            </div>
            <div class="form-group row">
              <label for="inputPassword3" class="col-sm-2 col-form-label">Quantidade</label>
              <div class="col-sm-10">
                <input type="number" class="form-control" id="inputQnt" placeholder="Digite quantas unidades do produto estão em estoque: " name="quantidade">
              </div>
            </div>
            <fieldset class="form-group">
              <div class="row">
                <legend class="col-form-label col-sm-2 pt-0">Categoria</legend>
                <div class="col-sm-10">
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios1" value="roupa_masc" checked>
                    <label class="form-check-label" for="gridRadios1">
                      Roupa Masculina
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios2" value="roupa_fem">
                    <label class="form-check-label" for="gridRadios2">
                      Roupa Feminina
                    </label>
                  </div>
                  <div class="form-check disabled">
                    <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios3" value="roupa_inf">
                    <label class="form-check-label" for="gridRadios3">
                      Roupa Infantil
                    </label>
                  </div>
                </div>
              </div>
            </fieldset>
        <div class="form-group row">
    <div class="col-sm-2">Adicional</div>
    <div class="col-sm-10">
      <div class="form-check">
        <input class="form-check-input" type="checkbox" id="gridCheck1" name="em_alta">
        <label class="form-check-label" for="gridCheck1">
          Em Alta
        </label>
      </div>
      <div class="form-check">
        <input class="form-check-input" type="checkbox" id="gridCheck2" name="promocao">
        <label class="form-check-label" for="gridCheck2">
          Promoção
        </label>
      </div>
    </div>
  </div>
                <div class="form-group">
                  <label for="exampleFormControlFile1">Imagem do Produto</label>
                  <input type="file" class="form-control-file" name="arquivo" placeholder="Escolher Imagem">
                </div>

                <div class="form-group row">
                <div class="col-sm-10">
                    <button type="submit" name="upload" class="btn btn-primary">Enviar</button>
                </div>
                </div>
        </form>
    </div>

</body>
</html>