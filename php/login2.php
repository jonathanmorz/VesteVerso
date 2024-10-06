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
    <div id="container"> <!-- div geral -->
        
        <div id="cadastro-content" class="hide">
            <form action="enviar-cadastro.php" method="POST" id="cadastroForm" class="cadastro">
                <div id="titulo" class="cadastro">
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
                <div id="inscrever-se"><span>Já tem uma conta? <a href="#" onclick="mostrarLogin()">Entrar</a></span> </div>
            </form>
        </div>

        <div id="logo"> <!-- div da logo -->
            <a href="index.php"> <!-- âncora para retornar à página inicial -->
                <img src="../resources/images/logo-roxa-grande.png" alt="Logo VesteVerso"> <!-- imagem logo -->
            </a>
        </div>   

        <div id="login-content">
            <form action="login.php" method="POST" id="loginForm"> <!-- formulário do login -->
                    <div id="titulo"> <!-- div para posicionar título -->
                        <h1 id="tiulo-login">Login</h1> <!-- título -->
                    </div>
                    <div id="email-div"> <!-- div para posicionar título email -->
                        <span>Email</span>  <!-- título email -->
                    </div>
                    <div id="email-input-div"> <!-- div para posicionar input email -->
                        <input type="email" id="email" name="Email" class="input-email-senha"> <!-- input email -->
                    </div>
                    <div id="senha-div"> <!-- div para posicionar título senha -->
                        <span>Senha</span>  <!-- título senha -->
                    </div>
                    <div id="senha-input-div"> <!-- div para posicionar input senha -->
                        <input type="password" id="senha" name="Password" class="input-email-senha">  <!-- input senha -->
                    </div>
                    <div id="checkbox"> <!-- div para posicionar checkbox -->
                        <input type="checkbox" id="checkbox-lembrar"> <label for="checkbox-lembrar">Lembrar de mim</label> <!-- checkbox -->
                    </div>
                    <div id="esqueceu-a-senha"> <!-- div para posicionar esqueceu a senha -->
                        <a href="../php/esquecer-senha.php">Esqueceu a senha?</a> <!-- esqueceu a senha -->
                    </div>
                    <div id="botao"> <!-- div para posicionar botão de entrar -->
                        <button id="enviar" onclick="logar()">Entrar</button>  <!-- botão de entrar -->
                    </div>
                    <div id="inscrever-se"> <!-- div para posicionar inscrever-se -->
                        <span>Não tem uma conta? <a href="#" onclick="mostrarCadastro()">Inscrever-se</a></span> <!-- inscrever-se -->
                    </div>
            </form>
        </div>
    </div>
    <script src="../js/animacao-login-cadastro.js"></script>
    <script src="../js/ajax-login.js"></script>
</body>
</html>