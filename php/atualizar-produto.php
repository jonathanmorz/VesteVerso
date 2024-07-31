<?php
session_start();
include 'connection.php';

// Verifica se o usuário está logado
if (!isset($_SESSION['id'])) {
    header('Location:login2.php');
    exit;
}

// Atualizar produto no banco de dados
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $descricao = $_POST['descricao'];
    $preco = $_POST['preco'];
    $quantidade = $_POST['quantidade'];

    // Verifica se um arquivo de imagem foi enviado
    if (isset($_FILES['imagem']) && $_FILES['imagem']['error'] === UPLOAD_ERR_OK) {
        $fileTmpPath = $_FILES['imagem']['tmp_name'];
        $fileName = $_FILES['imagem']['name'];
        $fileSize = $_FILES['imagem']['size'];
        $fileType = $_FILES['imagem']['type'];
        $fileNameCmps = explode(".", $fileName);
        $fileExtension = strtolower(end($fileNameCmps));

        $allowedfileExtensions = array('jpg', 'png', 'jpeg');
        if (in_array($fileExtension, $allowedfileExtensions)) {
            // Caminho onde a imagem será salva
            $uploadFileDir = 'arquivos/';
            $dest_path = $uploadFileDir . $fileName;

            if (move_uploaded_file($fileTmpPath, $dest_path)) {
                $imagem = $dest_path;
            } else {
                echo 'Erro ao mover o arquivo para o diretório de uploads';
                exit;
            }
        } else {
            echo 'Tipo de arquivo não permitido';
            exit;
        }
    } else {
        // Se não houver uma nova imagem, manter a imagem atual
        $imagem = $_POST['imagem_atual'];
    }

    // Atualiza as informações do produto no banco de dados
    $stmt = $pdo->prepare("UPDATE produtos SET nome = :nome, descricao = :descricao, preco = :preco, quantidade = :quantidade, imagem = :imagem WHERE id = :id");
    $stmt->execute([
        'id' => $id,
        'nome' => $nome,
        'descricao' => $descricao,
        'preco' => $preco,
        'quantidade' => $quantidade,
        'imagem' => $imagem
    ]);

    header('Location:produtos.php');
    exit;
}
?>
