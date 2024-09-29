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
    <link rel="stylesheet" href="../css/categorias-roupas.css">
    <link rel="stylesheet" href="../css/coracao-favoritar.css">
    <link rel="shortcut icon" href="../resources/images/favicon.ico" type="image/x-icon">

</head>
<body>
  <?php
    echo htmlHeader($nome, $role);
  ?>
    
  <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner" >
        <div class="carousel-item active">
          <img class="d-block w-100" src="../resources/images/banner_fem/banner001.png" alt="Primeiro Slide">
        </div>
        <div class="carousel-item">
          <img class="d-block w-100" src="../resources/images/banner_fem/banner002.png" alt="Segundo Slide">
        </div>
        <div class="carousel-item">
          <img class="d-block w-100" src="../resources/images/banner_fem/banner003.png" alt="Terceiro Slide">
        </div>
        <div class="carousel-item">
          <img class="d-block w-100" src="../resources/images/banner_fem/banner004.png" alt="Segundo Slide">
        </div>
        <div class="carousel-item">
          <img class="d-block w-100" src="../resources/images/banner_fem/banner005.png" alt="Terceiro Slide">
        </div>
        <div class="carousel-item">
          <img class="d-block w-100" src="../resources/images/banner_fem/banner006.png" alt="Segundo Slide">
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
    $sql = "SELECT * FROM produtos WHERE categoria = 'roupa_fem' and em_alta = 1";    
    $result = $mysqli->query($sql);
    $row = $result->fetch_assoc();
    echo htmlCardsPadrao($row, $result)
  ?>
  </div>
    
  <?php
   echo htmlFooter();
  ?>  
    
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