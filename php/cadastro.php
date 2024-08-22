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
            <form action="cadastro.php" method="POST" id="formulario">
                <div id="conteudo-formulario">
                    <div id="cadastre-se">
                        <h1>Cadastre-se</h2>
                    </div>
                    <div class="label-div">
                        <h2>Nome Completo:</h2>
                    </div>
                    <div class="input-class">
                        <input type="text" name="nome-completo"> 
                    </div>
                    <div class="label-div">
                        <h2>Nome de Usuário:</h2>
                    </div>
                    <div class="input-class" id="username">
                        <input type="text" name="username"> 
                    </div>
                    <div class="label-div">
                        <h2>Email:</h2>
                    </div>
                    <div class="input-class" id="e-mail">
                        <input type="email" name="email"> 
                    </div>
                    <div class="label-div">
                        <h2>Senha:</h2>
                    </div>
                    <div class="input-class" id="senha">
                        <input type="password" name="senha"> 
                    </div>
                    <div class="label-div">
                        <h2>Repetir Senha:</h2>
                    </div>
                    <div class="input-class" id="senha">
                        <input type="password" name="SenhaB"> 
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

    <script src="../js/ajax-cadastro.js">
    </script>
</body>
</html>


<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = htmlentities($_POST['nome-completo']);
    $username = htmlentities($_POST['username']);
    $senha = htmlentities($_POST['senha']);
    $senhaConfirmacao = htmlentities($_POST['SenhaB']);
    $email = htmlentities($_POST['email']);
    $cpf = htmlentities($_POST['cpf']);
    $telefone = htmlentities($_POST['tel']);
    $endereco = htmlentities($_POST['endereco']);
    $cep = htmlentities($_POST['cep']);
}
include('connection.php');

$stmt = $mysqli->prepare("INSERT INTO clientes (nome, username, email, senha, telefone, cpf, endereco, cep) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("ssssssss", $nome, $username, $email, $senha, $telefone, $cpf, $endereco, $cep);
$stmt->execute()

?>