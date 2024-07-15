<?php
session_start();
include 'connection.php';

// Verifica se o usuário está logado
if (!isset($_SESSION['id'])) {
    header('Location:login2.php');
    exit;
}

// Atualizar produto no banco de dados
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $descricao = $_POST['descricao'];
    $preco = $_POST['preco'];
    $quantidade = $_POST['quantidade'];

    $stmt = $pdo->prepare("UPDATE produtos SET nome = :nome, descricao = :descricao, preco = :preco, quantidade = :quantidade WHERE id = :id");
    $stmt->execute([
        'id' => $id,
        'nome' => $nome,
        'descricao' => $descricao,
        'preco' => $preco,
        'quantidade' => $quantidade
    ]);

    header('Location:produtos.php');
    exit;
}
?>
