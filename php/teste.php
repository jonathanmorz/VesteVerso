<?php
include 'connection.php';

// Consulta ao banco de dados
$sql = "SELECT id, nome, preco, imagem FROM produtos";
$result = $mysqli->query($sql);

echo '<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>VesteVerso</title>
  <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/card.css">
    <link rel="stylesheet" href="../css/coracao-favoritar.css">
    <link rel="shortcut icon" href="../resources/images/favicon.ico" type="image/x-icon">
</head>
<body>
  
</body>
</html>';
// Verificar se há resultados
if ($result->num_rows > 0) {
    // Gerar HTML para cada produto
    while($row = $result->fetch_assoc()) {
        echo '<div class="card-produto d-none d-md-block">';
        echo '    <a href="produto-' . $row["id"] . '.php">';
        echo '        <img src="' . $row["imagem"] . '" alt="imagem-roupa" style="width: 30vh;">';
        echo '        <h2 class="titulo-produto">' . $row["nome"] . '</h2>';
        echo '        <h3 class="titulo-produto">R$' . number_format($row["preco"], 2, ',', '.') . '</h3>';
        echo '    </a>';
        echo '    <div class="div-botao">';
        echo '        <button class="button-card-outline">Adicionar ao Carrinho</button>';
        echo '        <img src="../resources/images/coracao-roxo.png" alt="Coração Favorito" id="coracao-favoritar' . $row["id"] . '" onclick="trocarImagem' . $row["id"] . '()">';
        echo '        <script>';
        echo '            function trocarImagem' . $row["id"] . '() {';
        echo '                var coracaofavoritar = document.getElementById("coracao-favoritar' . $row["id"] . '");';
        echo '                if (coracaofavoritar.src.match("../resources/images/coracao-roxo.png")) {';
        echo '                    coracaofavoritar.src = "../resources/images/coracao-solido-roxo.png";';
        echo '                } else {';
        echo '                    coracaofavoritar.src = "../resources/images/coracao-roxo.png";';
        echo '                }';
        echo '            }';
        echo '        </script>';
        echo '    </div>';
        echo '</div>';
    }
} else {
    echo "0 resultados";
}

$mysqli->close();
?>