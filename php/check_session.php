<?php
session_start();
include 'connection.php';

if (!isset($_SESSION['id']) && isset($_COOKIE['session_token'])) {
    $sessionToken = $_COOKIE['session_token'];

    // Verificar o token de sessão no banco de dados
    $stmt = $pdo->prepare("SELECT id FROM clientes WHERE session_token = :session_token AND expires_at > NOW()");
    $stmt->execute(['session_token' => $sessionToken]);
    $session = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($session) {
        $_SESSION['id'] = $session['user_id'];

        // Restaurar carrinho do banco de dados
        $stmt = $pdo->prepare("SELECT produto_id, quantidade FROM carrinho WHERE user_id = :user_id");
        $stmt->execute(['user_id' => $_SESSION['id']]);
        $carrinho = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $_SESSION['carrinho'] = [];
        foreach ($carrinho as $item) {
            $_SESSION['carrinho'][$item['produto_id']] = $item['quantidade'];
        }
    }
}
?>
