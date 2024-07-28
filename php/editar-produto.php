<?php
include 'connection.php';
include 'presets.php';

$id = $_GET['id'];

// Buscar detalhes do produto
$stmt = $pdo->prepare("SELECT * FROM produtos WHERE id = :id");
$stmt->execute(['id' => $id]);
$produto = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$produto) {
    die("Produto não encontrado!");
}
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
    <link rel="stylesheet" href="../css/presets.css">
    <link rel="stylesheet" href="../css/card.css">
    <link rel="stylesheet" href="../css/editar-produtos.css">
    <link rel="stylesheet" href="../css/coracao-favoritar.css">
    <link rel="shortcut icon" href="../resources/images/favicon.ico" type="image/x-icon">

</head>
<body>
    <?php
        echo htmlHeader($username);
    ?>
    <h1>Editar Produto</h1>
    <container>
        <form action="atualizar-produto.php" method="POST" id="form-produto">
            <img src="<?php echo $produto['imagem']; ?>" id="imagem-produto">
            <div id="div-conteudo">
                <input type="hidden" name="id" value="<?php echo $produto['id']; ?>">
                <label for="nome">Nome:</label>
                <input type="text" name="nome" value="<?php echo $produto['nome']; ?>" required><br>
                <label for="descricao">Descrição:</label>
                <textarea name="descricao" required><?php echo $produto['descricao']; ?></textarea><br>
                <label for="preco">Preço:</label>
                <input type="number" step="0.01" name="preco" value="<?php echo $produto['preco']; ?>" required><br>
                <label for="quantidade">Quantidade:</label>
                <input type="number" name="quantidade" value="<?php echo $produto['quantidade']; ?>" required><br>
                <div id="div-botao"><button type="submit" id="botao">Atualizar</button></div>
            </div>
        </form>
    </container>

    <?php
        echo htmlFooter();
    ?>
</body>
</html>
