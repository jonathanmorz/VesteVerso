<?php
  require_once 'presets.php';
  require_once 'connection.php';
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
      echo htmlHeader($username, $role);
    ?>
    <h1>Produtos</h1>
    <div id="produtos">
    <?php $sql = "SELECT * FROM produtos WHERE categoria = 'roupa_fem'";    
          $result = $mysqli->query($sql);
    
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