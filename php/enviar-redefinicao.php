<?php

include 'connection.php'; // Certifique-se de que a conexão com o banco de dados está correta

require '../mailer-src/Exception.php';
require '../mailer-src/PHPMailer.php';
require '../mailer-src/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Verifique se a requisição é POST e se o campo 'email' está presente
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['email'])) {
        $email = $_POST['email']; 
    } else {
        echo "Erro: e-mail não fornecido.";
        exit();
    }
} else {
    echo "Erro: Método de requisição incorreto.";
    exit();
}

// Validação básica do e-mail
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "Erro: e-mail inválido.";
    exit();
}

// Verifique se o e-mail existe no banco de dados
$sql = "SELECT id FROM clientes WHERE email = ?";
$stmt = $mysqli->prepare($sql);
$stmt->bind_param("s", $email);
$stmt->execute();
$stmt->store_result(); // Armazena o resultado para verificar se existe

// Verifica se o e-mail foi encontrado no banco de dados
if ($stmt->num_rows > 0) {
    // E-mail existe no banco, então prossegue com a geração do token
    $token = bin2hex(random_bytes(16)); // Gera um token aleatório

    // Salve o token e o e-mail no banco de dados (aqui você deve adicionar a lógica para armazenar o token e definir a expiração)
    $sql = "UPDATE clientes SET reset_token = ?, token_expires = DATE_ADD(NOW(), INTERVAL 1 HOUR) WHERE email = ?";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("ss", $token, $email);
    $stmt->execute();

    // Agora envie o e-mail com o link de redefinição de senha
    $mail = new PHPMailer(true);

    try {
        // Configurações do servidor SMTP
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'oharinhoreal@gmail.com'; // Seu e-mail do Gmail
        $mail->Password   = 'jofyjdtccvjkgzyq';       // Senha de aplicativo do Gmail
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        $mail->Port       = 465;

        // Definindo o remetente e o destinatário
        $mail->setFrom('vesteverso@gmail.com', 'Veste Verso'); // E-mail de quem envia
        $mail->addAddress($email, 'Cliente'); // E-mail de quem receberá

        // Conteúdo do e-mail
        $mail->isHTML(true);  // Definindo o formato HTML
        $mail->Subject = 'Redefinir senha';
        $mail->Body = 'Clique no link para redefinir sua senha: <a href="127.0.0.1/VesteVerso/php/alterar-senha.php?token=' . $token . '">Redefinir Senha</a>';

        // Envia o e-mail
        $mail->send();
        header("Location: index.php?success=1"); // Redireciona com sucesso
        exit;

    } catch (Exception $e) {
        echo "Mensagem não pôde ser enviada. Erro do Mailer: {$mail->ErrorInfo}";
    }

} else {
    // Se o e-mail não foi encontrado, redirecione para a página anterior
    header("Location: esquecer-senha.php?error=email_not_found");
    exit();
}

$stmt->close();
$mysqli->close(); // Fecha a conexão com o banco de dados
?>
