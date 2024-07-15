<?php
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['carrinho'])) {
    $userId = $_SESSION['id'];
    setcookie("carrinho_$userId", serialize($_SESSION['carrinho']), time() + (86400 * 30), "/"); // 30 dias
}

session_unset();
session_destroy();
header('Location:index.php');
exit;
?>
