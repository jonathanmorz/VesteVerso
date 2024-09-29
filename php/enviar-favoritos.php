<?php
session_start();

// Verifica se o usuário está logado
if (!isset($_SESSION['id'])) {
    header('Location:login2.php');
    exit;
}

$userId = $_SESSION['id'];

// Verifica se o produto já está nos favoritos
$stmt = $mysqli->prepare("SELECT * FROM favoritos WHERE user_id = ? AND produto_id = ?");
$stmt->bind_param("ii", $userId, $produtoId);
$stmt->execute();
$result = $stmt->get_result();

// Restaurar carrinho a partir dos cookies, se existir
if (isset($_COOKIE["favoritos_$userId"])) {
    $_SESSION['favoritos'] = unserialize($_COOKIE["favoritos_$userId"]);
    setcookie("favoritos$userId", '', time() - 3600, "/"); // Limpa o cookie
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