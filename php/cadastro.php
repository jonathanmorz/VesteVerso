<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../css/cadastro.css">
        <link rel="shortcut icon" href="../resources/images/favicon.ico" type="image/x-icon">
        <title>Cadastro - VesteVerso</title>
    </head>
    <body>
        <div id="div-geral">
        <div id="error-msg"></div>
            <form action="cadastro.php" method="POST" id="formulario">
                <div id="conteudo-formulario">
                    <div id="cadastre-se">
                        <h1>Cadastre-se</h2>
                    </div>
                    <div class="label-div">
                        <h2>Nome Completo:</h2>
                    </div>
                    <div class="input-class">
                        <input type="text" name="nome-completo" value="teste"> 
                    </div>
                    <div class="label-div">
                        <h2>Nome de Usuário:</h2>
                    </div>
                    <div class="input-class" id="username">
                        <input type="text" name="username" value="teste"> 
                    </div>
                    <div class="label-div">
                        <h2>Email:</h2>
                    </div>
                    <div class="input-class" id="e-mail">
                        <input type="email" name="email" value="teste@teste.com"> 
                    </div>
                    <div class="label-div">
                        <h2>Senha:</h2>
                    </div>
                    <div class="input-class" id="Bsenha">
                        <input type="password" name="senha" value="teste123">
                    </div>
                    <div class="label-div">
                        <h2>Repetir Senha:</h2>
                    </div>
                    <div class="input-class" id="Bsenha">
                        <input type="password" name="SenhaB" value="teste123"> 
                    </div>
                    
                    <div class="mensagemErro" id="erroSenha"></div>
                    
                    <div class="label-div">
                        <h2>CPF:</h2>
                    </div>
                    <div class="input-class" id="cpf">
                        <input type="text" name="cpf"> 
                    </div>
                    <div class="label-div">
                        <h2>Endereço:</h2>
                    </div>
                    <div class="input-class" id="endereco">
                        <input type="text" name="endereco"> 
                    </div>
                    <div class="label-div">
                        <h2>Telefone:</h2>
                    </div>
                    <div class="input-class" id="Telefone">
                        <input type="text" name="tel"> 
                    </div>
                    <div class="label-div">
                        <h2>CEP:</h2>
                    </div>
                    <div class="input-class" id="cep">
                        <input type="text" name="cep"> 
                    </div>
                </div>
            </div>
            
            <div id="logo">
                <img src="../resources/images/logo-roxa-grande.png" alt="Logo VesteVerso">
                <div id="botao"><button type="submit" id="enviar">Continuar</button></div>
            </form>
        </div>
        <script src="../js/ajax-cadastro.js"></script>
    </body>
    </html>