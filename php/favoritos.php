<?php

require_once 'presets.php';
require_once 'check-session.php';

session_start();
include 'connection.php'; // Inclui a conexão ao banco de dados

echo "User ID: " . $userId;

// Verifica se o usuário está logado
if (!isset($_SESSION['id'])) {
    header('Location: login2.php');
    exit;
}

$userId = $_SESSION['id'];

// Consulta para pegar os produtos favoritados pelo usuário
$sql = "SELECT p.id, p.nome, p.imagem, p.preco 
        FROM produtos p
        JOIN favoritos f ON p.id = f.produto_id
        WHERE f.user_id = ?";
$stmt = $mysqli->prepare($sql);
$stmt->bind_param("i", $userId);
$stmt->execute();
$result = $stmt->get_result();

// Armazena os favoritos em uma variável
$favoritos = [];
while ($row = $result->fetch_assoc()) {
    $favoritos[] = $row;
}
$stmt->close();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Favoritos - VesteVerso</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/presets.css">
    <link rel="stylesheet" href="../css/card.css">
    <link rel="stylesheet" href="../css/carrinho.css">
    <link rel="stylesheet" href="../css/coracao-favoritar.css">
    <link rel="shortcut icon" href="../resources/images/favicon.ico" type="image/x-icon">
</head>
<body>
   <?php echo htmlHeader($nome, $role); ?>

   <div id="conteudo">
      <h1>Meus Favoritos</h1>
      <?php if (count($favoritos) > 0): ?>
<table>
   <thead>
      <tr>
         <th width="250">Produto</th>
         <th width="150">Preço</th>
         <th width="150">Remover</th>
      </tr>
   </thead>
   <tbody>
      <?php foreach ($favoritos as $produto): ?>
      <tr>
         <td>
            <img src="<?= $produto['imagem']; ?>" width="100em"> 
            <br><?= $produto['nome']; ?>
         </td>
         <td>R$ <?= number_format($produto['preco'], 2, ',', '.'); ?></td>
         <td><a href="enviar-favoritos.php?acao=del&id=<?= $produto['id']; ?>" class="link-acao">Remover</a></td>
      </tr>
      <?php endforeach; ?>
   </tbody>
</table>
<?php else: ?>
   <p>Você ainda não tem produtos favoritos.</p>
<?php endif; ?>

   </div>

   <?php echo htmlFooter(); ?>
</body>
</html>
