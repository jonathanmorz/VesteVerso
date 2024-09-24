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
        <div id="logo">
            <a href="index.php">
                <img src="../resources/images/logo-roxa-grande.png" alt="Logo VesteVerso">
            </a>
        </div>       
            <form action="login.php" method="POST" id="loginForm">

                    <div id="titulo">
                        <h1 id="tiulo-cadastro">Cadastro</h1>
                    </div>
                    <div id="nome-div">
                        <span>Nome</span> 
                    </div>
                    <div id="nome-input-div">
                        <input type="text" id="nome" name="Nome" class="input-email-senha">
                    </div>
                    <div id="sobrenome-div">
                        <span>Sobrenome</span> 
                    </div>
                    <div id="sobrenome-input-div">
                        <input type="text" id="sobrenome" name="Sobrenome" class="input-email-senha">
                    </div>
                    <div id="email-div">
                        <span>Email</span> 
                    </div>
                    <div id="email-input-div">
                        <input type="text" id="email" name="Email" class="input-email-senha"> 
                    </div>
                    <div id="senha-div">
                        <span>Senha</span> 
                    </div>
                    <div id="senha-input-div">
                        <input type="password" id="senha" name="Password" class="input-email-senha">
                    </div>
                    <div id="cpf-div">
                        <span>CPF</span> 
                    </div>
                    <div id="cpf-input-div">
                        <input type="number" id="cpf" name="CPF" class="input-email-senha">
                    </div>
                    <div id="sexo-div">
                        <span>Sexo</span> 
                    </div>
                    <div id="radios">

                        <input type="radio" class="radio" id="masc" name="sex-rad" value="Masculino" checked>
                        <label for="masc" class="label-sexo">Masculino</label>


                        <input type="radio" class="radio" id="fem" name="sex-rad" value="Feminino">
                        <label for="fem" class="label-sexo">Feminino</label>


                        <input type="radio" class="radio" id="outro" name="sex-rad" value="Outro">
                        <label for="outro" class="label-sexo">Outro</label>

                    </div>
                    <div id="botao"><button id="enviar" onclick="logar()">Enviar</button> </div>
                    <div id="inscrever-se"><span>Já tem uma conta? <a href="cadastro.php">Entrar</a></span> </div>
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