<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Esqueceu a Senha?</title>
    <link rel="stylesheet" href="../css/esquecer-senha.css">
    <link rel="shortcut icon" href="../resources/images/favicon.ico" type="image/x-icon">
</head>
<body>
<form action="enviar-redefinicao.php" method="POST">

    <div class="global">
        <div class="esquerda">
            <div class="icone-info">
                <img src="../resources/images/logo2-roxo.png" alt="Ícone">
            </div>
            <h2>Informação importante!</h2>
            <p>Por favor leia as informações abaixo, e compartilhe os dados necessários.</p>
            <ul>
                <li>Não revele sua senha para ninguém.</li>
                <li>Não use senhas repetidas.</li>
                <li>Use senhas alfanuméricas.</li>
            </ul>
        </div>

        <div class="direita">
            <h2>Esqueceu a senha?</h2>
            <p id="informacao"> Não se preocupe, nós podemos ajudar.</p>
                <div id="div-email">
                <input type="email" id="input-email" name="email" placeholder="Insira seu endereço de e-mail..."><img src="../resources/images/email-icon.png" alt="email-icon" width="30" height="30">
                </div>
                <p id="instrucoes">
                    Se existir uma conta com o e-mail informado, você receberá um e-mail com as instruções para recuperar sua conta.
                
                </p>
                <div id="botão">
                <button type="submit">Continuar</button>
                </div>
            </div>
        </div>

</form>
    </body>
</html>
