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
    echo htmlHeader($nome, $role);
?>

<div id="overflow">
  <?php

// Verifica se o usuário está logado e define o $userId
if (isset($_SESSION['id'])) {
    $userId = $_SESSION['id'];
} else {
    // Define o $userId como null ou qualquer outro valor padrão
    $userId = null; // ou faça outro tratamento
}
$sql = "SELECT * FROM produtos WHERE em_alta = 1"; // Exemplo de consulta
$result = $mysqli->query($sql);

// Verifica se o resultado da consulta é válido
if ($result) {
    echo htmlCardsPadrao($result, $mysqli, $userId);
} else {
    echo "Erro ao buscar produtos: " . $mysqli->error;
}
  ?>
  </div>

<?php
    echo htmlFooter();
?>

</body>
</html>