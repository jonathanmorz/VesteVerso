<?php
session_start();
include 'connection.php';

if (isset($_SESSION['id']) && isset($_SESSION['carrinho'])) {
    $userId = $_SESSION['id'];
    
    // Limpa o carrinho atual do banco de dados
    $stmt = $pdo->prepare("DELETE FROM carrinho WHERE user_id = :user_id");
    $stmt->execute(['user_id' => $userId]);
    
    // Salva o carrinho no banco de dados
    foreach ($_SESSION['carrinho'] as $produtoId => $quantidade) {
        $stmt = $pdo->prepare("INSERT INTO carrinho (user_id, produto_id, quantidade) VALUES (:user_id, :produto_id, :quantidade)");
        $stmt->execute([
            'user_id' => $userId,
            'produto_id' => $produtoId,
            'quantidade' => $quantidade
        ]);
    }
}

session_unset();
session_destroy();
header('Location:login2.php');
exit;
?>
