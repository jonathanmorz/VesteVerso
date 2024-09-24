<?php
  require_once 'connection.php';
  require_once 'presets.php';
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VesteVerso</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/presets.css">
    <link rel="stylesheet" href="../css/index.css">
    <link rel="stylesheet" href="../css/coracao-favoritar.css">
    <link rel="shortcut icon" href="../resources/images/favicon.ico" type="image/x-icon">

</head>
<body>
  <?php
    echo htmlHeader($username, $role);
  ?>
    
  <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner" >
        <div class="carousel-item active">
          <img class="d-block w-100" src="../resources/images/banner-1.jpg" alt="Primeiro Slide">
        </div>
        <div class="carousel-item">
          <img class="d-block w-100" src="../resources/images/banner-2.jpg" alt="Segundo Slide">
        </div>
        <div class="carousel-item">
          <img class="d-block w-100" src="../resources/images/banner-3.jpg" alt="Terceiro Slide">
        </div>
      </div>
      <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Anterior</span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Próximo</span>
      </a>
    </div>

  <h1>Em destaque</h1>
  <div id="overflow">
  <?php
    //Seleciona produtos que estão em alta a partir de uma pesquisa no banco de dados utilizando de um código SQL
    $sql = "SELECT * FROM produtos WHERE em_alta = 1";    
    $result = $mysqli->query($sql);
    $row = $result->fetch_assoc();
    echo htmlCardsPadrao($row, $result)
  ?>
  </div>
    
  <footer>
    <div id="footer-content">
        <div id="footer-top">
          <section class="footer-grid" id="section1">
            <img src="../resources/images/logo-branca-grande.png" id="logo-footer">
            <p>Cadastre-se em nossa Newsletter para receber novidades e promoções!</p>
            <input type="email" name="e-news" id="email-news" placeholder="Digite seu email">
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
    
    <script>
      function trocarImagem() {
          var coracaofavoritar = document.getElementById('coracao-favoritar');
          if (coracaofavoritar.src.match("../resources/images/coracao-roxo.png")) {
              coracaofavoritar.src = "../resources/images/coracao-solido-roxo.png";
          } else {
              coracaofavoritar.src = "../resources/images/coracao-roxo.png";
          }
      }
    </script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" ></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" ></script>
    <script src="../js/bootstrap.bundle.min.js"></script>
</body>
</html>