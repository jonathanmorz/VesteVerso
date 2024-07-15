<?php
session_start();

// Verifica se o usuário está logado
if (!isset($_SESSION['id'])) {
    header('Location:login2.php');
    exit;
}

$userId = $_SESSION['id'];

// Restaurar carrinho a partir dos cookies, se existir
if (isset($_COOKIE["carrinho_$userId"])) {
    $_SESSION['carrinho'] = unserialize($_COOKIE["carrinho_$userId"]);
    setcookie("carrinho_$userId", '', time() - 3600, "/"); // Limpa o cookie
} else {
    if (!isset($_SESSION['carrinho'])) {
        $_SESSION['carrinho'] = array();
    }
}

// Adiciona produto
if (isset($_GET['acao'])) {
    // ADICIONAR CARRINHO
    if ($_GET['acao'] == 'add') {
        $id = intval($_GET['id']);
        if (!isset($_SESSION['carrinho'][$id])) {
            $_SESSION['carrinho'][$id] = 1;
        } else {
            $_SESSION['carrinho'][$id] += 1;
        }
    }

    // REMOVER CARRINHO
    if ($_GET['acao'] == 'del') {
        $id = intval($_GET['id']);
        if (isset($_SESSION['carrinho'][$id])) {
            unset($_SESSION['carrinho'][$id]);
        }
    }

    // ALTERAR QUANTIDADE
    if ($_GET['acao'] == 'up') {
        if (is_array($_POST['prod'])) {
            foreach ($_POST['prod'] as $id => $qtd) {
                $id = intval($id);
                $qtd = intval($qtd);
                if (!empty($qtd) || $qtd != 0) {
                    $_SESSION['carrinho'][$id] = $qtd;
                } else {
                    unset($_SESSION['carrinho'][$id]);
                }
            }
        }
    }
}

header('Location:index.php');
exit;
?>