<?php
session_start();

// Verifica se o usuário está logado
if (!isset($_SESSION['id'])) {
    header('Location:login2.php');
    exit;
}

$userId = $_SESSION['id'];

// Restaurar carrinho a partir dos cookies, se existir
if (isset($_COOKIE["favoritos_$userId"])) {
    $_SESSION['favoritos'] = unserialize($_COOKIE["favoritos_$userId"]);
    setcookie("carrinho_$userId", '', time() - 3600, "/"); // Limpa o cookie
} else {
    if (!isset($_SESSION['favoritos'])) {
        $_SESSION['favoritos'] = array();
    }
}

// Adiciona produto
if (isset($_GET['acao'])) {
    // ADICIONAR CARRINHO
    if ($_GET['acao'] == 'add') {
        $id = intval($_GET['id']);
        if (!isset($_SESSION['favoritos'][$id])) {
            $_SESSION['favoritos'][$id] = 1;
        } else {
            $_SESSION['favoritos'][$id] += 1;
        }
    }

    // REMOVER CARRINHO
    if ($_GET['acao'] == 'del') {
        $id = intval($_GET['id']);
        if (isset($_SESSION['favoritos'][$id])) {
            unset($_SESSION['favoritos'][$id]);
        }
    }

    // ALTERAR QUANTIDADE
    if ($_GET['acao'] == 'up') {
        if (is_array($_POST['prod'])) {
            foreach ($_POST['prod'] as $id => $qtd) {
                $id = intval($id);
                $qtd = intval($qtd);
                if (!empty($qtd) || $qtd != 0) {
                    $_SESSION['favoritos'][$id] = $qtd;
                } else {
                    unset($_SESSION['favoritos'][$id]);
                }
            }
        }
    }
}

header('Location:index.php');
exit;
?>