<?php
// enviar-favoritos.php
session_start();
require_once 'connection.php';
require_once 'check-session.php';

if (!isset($_SESSION['id'])) {
    die("Usuário não logado.");
}

$userId = $_SESSION['id'];
$produtoId = intval($_GET['id']);
$acao = $_GET['acao'];

if ($acao == 'add') {
    // Verifica se o produto já está nos favoritos
    $stmt = $mysqli->prepare("SELECT id FROM favoritos WHERE user_id = ? AND produto_id = ?");
    $stmt->bind_param("ii", $userId, $produtoId);
    $stmt->execute();
    $stmt->store_result();
    
    // Se o produto não está nos favoritos, adiciona
    if ($stmt->num_rows == 0) {
        $stmt = $mysqli->prepare("INSERT INTO favoritos (user_id, produto_id, criado_em, atualizado_em) VALUES (?, ?, NOW(), NOW())");
        $stmt->bind_param("ii", $userId, $produtoId);
        if ($stmt->execute()) {
            echo "Produto favoritado com sucesso!";
        } else {
            echo "Erro ao favoritar o produto.";
        }
    } else {
        echo "Produto já está nos favoritos.";
    }
    $stmt->close();
}

if ($acao == 'del') {
    // Remove o produto dos favoritos
    $stmt = $mysqli->prepare("DELETE FROM favoritos WHERE user_id = ? AND produto_id = ?");
    $stmt->bind_param("ii", $userId, $produtoId);
    if ($stmt->execute()) {
        echo "Produto removido dos favoritos.";
    } else {
        echo "Erro ao remover produto dos favoritos.";
    }
    $stmt->close();
}

$mysqli->close();

?>