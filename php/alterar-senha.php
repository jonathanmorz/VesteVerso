<?php
include 'connection.php'; // Conectar ao banco de dados

if (isset($_GET['token'])) {
    $token = $_GET['token'];

    // Aqui você deve verificar o token no banco de dados
    // Se o token for válido, exiba o formulário de nova senha
    // Exemplo simples (supondo que você já tenha uma lógica para verificar o token)

    ?>

    <!DOCTYPE html>
    <html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <title>Nova Senha</title>
    </head>
    <body>
        <h2>Redefinir Senha</h2>
        <form action="atualizar-senha.php" method="POST">
            <input type="hidden" name="reset_token" value="<?php echo htmlspecialchars($token); ?>">
            <input type="password" name="nova_senha" placeholder="Nova Senha" required>
            <button type="submit">Atualizar Senha</button>
        </form>
    </body>
    </html>

    <?php
} else {
    echo 'Token inválido.';
}
?>
