<?php
include 'connection.php';
include 'presets.php';
include 'check_session.php';

// Buscar produtos do banco de dados
$stmt = $pdo->query("SELECT * FROM produtos");
$produtos = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<?php

// Verifique se o usuário está logado
if (!isset($_SESSION['id'])) {
    header('Location:acesso-nao-autorizado.php');
    exit;
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
    <link rel="stylesheet" href="../css/produtos.css">
    <link rel="stylesheet" href="../css/coracao-favoritar.css">
    <link rel="shortcut icon" href="../resources/images/favicon.ico" type="image/x-icon">

</head>
<body>
    <?php
        echo htmlHeaderNoNavBar($nome, $role);
    ?>
    <h1>Lista de Produtos</h1>
    <div id="div-tabela">
    <a href="cadastro-produto.php" class="link-acao">Adicionar Produto</a>
        <table>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Descrição</th>
                <th>Preço</th>
                <th>Quantidade</th>
                <th>Ações</th>
            </tr>
            <?php foreach ($produtos as $produto): ?>
            <tr>
                    <?php echo '<td><a href="produto.php?id=' . $produto["id"] . '">'?> <?php echo $produto['id']; ?></a></td>
                    <?php echo '<td><a href="produto.php?id=' . $produto["id"] . '">'?> <?php echo $produto['nome']; ?></a></td>
                    <?php echo '<td><a href="produto.php?id=' . $produto["id"] . '">'?> <?php echo $produto['descricao']; ?></a></td>
                    <?php echo '<td><a href="produto.php?id=' . $produto["id"] . '">'?> <?php echo $produto['preco']; ?></a></td>
                    <?php echo '<td><a href="produto.php?id=' . $produto["id"] . '">'?> <?php echo $produto['quantidade']; ?></a></td>
                <td>
                    <a href="editar-produto.php?id=<?php echo $produto['id']; ?>" class="link-acao">Editar</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    </div>
    <?php
        echo htmlFooter();
    ?>   
</body>
</html>
