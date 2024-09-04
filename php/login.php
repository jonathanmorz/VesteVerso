<?php
include("connection.php");

$usuario = 0;
$Senha = 0;

if (isset($_POST['Usuario']) && isset($_POST['Password'])) {
    if (strlen($_POST['Usuario']) == 0) {
        http_response_code(400);
        exit();
        echo "O campo 'Usuário' não pode estar vazio.";
    } elseif (strlen($_POST['Password']) == 0) {
        http_response_code(400);
        exit();
        echo "O campo 'Senha' não pode estar vazio.";
    } else {
        $usuario = $mysqli->real_escape_string($_POST['Usuario']);
        $Senha = $mysqli->real_escape_string($_POST['Password']);

        $sql_code = "SELECT * FROM clientes WHERE username = '$usuario' AND senha = '$Senha'";
        $sql_query = $mysqli->query($sql_code) or die("Falha na execução do código SQL" . $mysqli->error);

        $quantidade = $sql_query->num_rows;

        if ($quantidade == 1) {
            $usuario = $sql_query->fetch_assoc();

            if (!isset($_SESSION)) {
                session_start();
            }

            $_SESSION['id'] = $usuario['id'];
            $_SESSION['nome'] = $usuario['nome'];

            // Retornar sucesso
            http_response_code(200);
            echo "Login bem-sucedido!";
            exit();
            header("Location: ../php/index.php");
        } else {
            http_response_code(401); // Código de status para "Unauthorized"
            exit();
            echo "Nome de usuário ou senha incorretos.";
        }
    }
} else {
    http_response_code(400);
    exit();
    echo "Campos de usuário e senha são obrigatórios.";
}
?>
