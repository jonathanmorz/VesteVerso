<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - VesteVerso</title>
    <link rel="stylesheet" href="../css/login.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100..700;1,100..700&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="../resources/images/favicon.ico" type="image/x-icon">
</head>
<body>
    <div id="container">
        <div id="logo"><a href="index.php"><img src="../resources/images/logo-roxa-grande.png" alt="Logo VesteVerso"></a></div>       
            <form action="login.php" method="POST" id="loginForm">

                    <div id="titulo">
                        <h1 id="tiulo-login">Login</h1>
                    </div>
                    <div id="usuario">
                        <span>Usuário</span> <br>
                    </div>
                        <div id="usuario-input">
                            <input type="text" name="Usuario" class="input-usuario-senha"> <br>
                        </div>
                    <div id="senha">
                        <span>Senha</span> <br>
                    </div>
                        <div id="senha-input">
                            <input type="password" name="Password" class="input-usuario-senha">
                        </div>
                    <div id="checkbox"><input type="checkbox" id="checkbox-lembrar"> <span>Lembrar de mim</span><br> </div>
                    <div id="esqueceu-a-senha">
                        <a href="#">Esqueceu a senha?</a>
                    </div>
                    <div id="botao"><button id="enviar" onclick="logar()">Entrar</button> <br></div>
                    <div id="inscrever-se"><span>Não tem uma conta? <a href="cadastro.php">Inscrever-se</a></span> <br></div>
                    <div id="entrar-com">
                        <span>Entrar com</span> <br>
                    </div>
                    <div id="google-facebook">
                            <a href="#"><img src="../resources/images/google-logo.png" alt="" id="google"></a>
                            <a href="#" ><img src="../resources/images/facebook-logo.png" alt="" id="facebook"></a>
                    </div>
            </form>
    </div>
    <script>

        function logar(){

            const form = document.querySelector('#loginForm'); // Formulário com id 'loginForm'

            form.addEventListener('submit', async function(e) {
                e.preventDefault(); // Evita o redirecionamento padrão ao enviar o formulário

                const formData = new FormData(this); // Pega os dados do formulário

                try {
                    const response = await fetch('../php/login.php', {
                        method: 'POST',
                        body: formData
                    });

                    const result = await response.json(); // Espera a resposta JSON do servidor

                    if (response.ok) {
                        // Se a resposta for sucesso, por exemplo, login correto
                        window.alert('Login bem-sucedido! Redirecionando...');
                        window.location.href = "../php/index.php"; // Redirecionar apenas em caso de sucesso
                    } else {
                        // Se houver erro, mostra um alerta com a mensagem retornada do servidor
                        window.alert('Erro: ' + result.message);
                    }
                } catch (error) {
                    // Lida com erros no envio da requisição
                    console.error('Erro ao enviar o formulário:', error);
                    window.alert('Erro ao enviar o formulário. Tente novamente.');
                }
            });
            }

    </script>
</body>
</html>