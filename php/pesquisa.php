<?php
   require_once 'connection.php';
   require_once 'presets.php';
?>

<?php
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
  <link rel="stylesheet" href="../css/presets.css">
  <link rel="stylesheet" href="../css/pesquisa.css">
  <link rel="stylesheet" href="../css/coracao-favoritar.css">
  <link rel="shortcut icon" href="../resources/images/favicon.ico" type="image/x-icon">
</head>
<body>
  <?php
      echo htmlHeader($username);
      ?>
    <div id="conteudo">
    <h4>Resultados da Pesquisa: </h4>
    <div class="produtos">
    <?php
      $result = $mysqli->query($sql);
      $row = $result->fetch_assoc();
      echo htmlCardsPadrao($row, $result)
    ?>
    </div>
    </div>
    <?php
      htmlFooter();
    ?>
</body>
</html>