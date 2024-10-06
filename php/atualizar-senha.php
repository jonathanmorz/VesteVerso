<?php
include 'connection.php'; // Conectar ao banco de dados

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Verifique se o reset_token e a nova senha foram fornecidos
    if (!isset($_POST['reset_token']) || !isset($_POST['nova_senha'])) {
        echo 'Erro: Reset token ou nova senha não fornecidos.';
        exit();
    }

    $reset_token = $_POST['reset_token']; // Armazena o reset token
    $nova_senha = $_POST['nova_senha'];   // Armazena a nova senha

    // Verifica se o reset_token existe no banco de dados
    $sql = "SELECT reset_token FROM clientes WHERE reset_token = ?"; // Verifique se o reset_token é válido
    $stmt = $mysqli->prepare($sql);

    if (!$stmt) {
        echo "Erro ao preparar a consulta: " . $mysqli->error; // Mostra o erro do MySQL
        exit();
    }

    $stmt->bind_param("s", $reset_token);
    $stmt->execute();
    $stmt->store_result();

    // Verifique se o reset_token foi encontrado
    if ($stmt->num_rows > 0) {
        // O reset_token é válido, agora vamos atualizar a senha
        //$hashed_senha = password_hash($nova_senha, PASSWORD_DEFAULT); // Gera o hash da nova senha

        $hashed_senha = $nova_senha; // Usar a senha como está para visualização no banco de dados

        $sql_update = "UPDATE clientes SET senha = ?, reset_token = NULL WHERE reset_token = ?"; // Atualiza a senha e limpa o reset_token
        $stmt_update = $mysqli->prepare($sql_update);

        if (!$stmt_update) {
            echo "Erro ao preparar a consulta de atualização: " . $mysqli->error; // Mostra o erro do MySQL
            exit();
        }

        $stmt_update->bind_param("ss", $hashed_senha, $reset_token);

        if ($stmt_update->execute()) {
            header("Location: index.php?success=1");
        } else {
            echo 'Erro ao atualizar a senha: ' . $stmt_update->error;
        }

        $stmt_update->close();
    } else {
        echo 'Erro: Reset token inválido.';
    }

    $stmt->close();
}

// Fechar a conexão com o banco de dados
$mysqli->close();
?>
