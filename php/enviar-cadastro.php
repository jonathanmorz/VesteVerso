<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include('connection.php');
    
    header('Content-Type: application/json'); // Indica que a resposta será em JSON

    // Verificação dos campos obrigatórios
    if (empty($_POST['Nome'])) {
        http_response_code(400);
        echo json_encode(['message' => "O campo 'Nome' não pode estar vazio."]);
        exit();
    } elseif (empty($_POST['Sobrenome'])) {
        http_response_code(400);
        echo json_encode(['message' => "O campo 'Sobrenome' não pode estar vazio."]);
        exit();
    } elseif (empty($_POST['Email'])) {
        http_response_code(400);
        echo json_encode(['message' => "O campo 'Email' não pode estar vazio."]);
        exit();
    } elseif (empty($_POST['Password'])) {
        http_response_code(400);
        echo json_encode(['message' => "O campo 'Senha' não pode estar vazio."]);
        exit();
    } elseif (empty($_POST['CPF'])) {
        http_response_code(400);
        echo json_encode(['message' => "O campo 'CPF' não pode estar vazio."]);
        exit();
    }

    // Coleta e sanitização dos dados recebidos
    $nome = htmlentities($_POST['Nome']);
    $sobrenome = htmlentities($_POST['Sobrenome']);
    $email = htmlentities($_POST['Email']);
    $senha = htmlentities($_POST['Password']);
    $cpf = htmlentities($_POST['CPF']);
    $sexo = $_POST['sex-rad'];

    // Preparação da consulta SQL para inserir os dados no banco
    $stmt = $mysqli->prepare("INSERT INTO clientes (nome, sobrenome, email, senha, sexo, cpf) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssss", $nome, $sobrenome, $email, $senha, $sexo, $cpf);
    $success = $stmt->execute();

    if ($success) {
        http_response_code(200);
        echo json_encode(['success' => true, 'message' => 'Cadastro realizado com sucesso!']);
    } else {
        http_response_code(500); // Erro no servidor
        echo json_encode(['success' => false, 'message' => 'Erro ao realizar cadastro.']);
    }

    $stmt->close();
    $mysqli->close();
}
?>
