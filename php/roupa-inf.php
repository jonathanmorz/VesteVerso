<?php
  require_once 'presets.php';
  require_once 'connection.php';
?>

<?php
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
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/presets.css">
    <link rel="stylesheet" href="../css/card.css">
    <link rel="stylesheet" href="../css/coracao-favoritar.css">
    <link rel="shortcut icon" href="../resources/images/favicon.ico" type="image/x-icon">

</head>
<body>
  <?php
    echo htmlHeader($username, $role);
  ?>

  <div id="produtos">
  <?php $sql = "SELECT * FROM produtos WHERE categoria = 'roupa_inf'";    
        $result = $mysqli->query($sql);
        $row = $result->fetch_assoc();
        echo htmlCardsNoWrap($row, $result);
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