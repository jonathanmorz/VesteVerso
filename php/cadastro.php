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
            <form action="cadastro.php" method="POST">
                <div id="conteudo-formulario">
                    <div id="bem-vindo">
                        <h1>Bem-Vindo ao nosso site</h1>
                    </div>
                        <div id="linha-preta-div"><img src="../resources/images/pixel-linha.jpg" alt="linha preta" id="linha-preta"></div>
                    <div id="cadastre-se">
                        <h2>Cadastre-se</h2>
                    </div>
                        <div class="input-class"><input type="text" placeholder="Nome completo: " name="nome-completo"> <br></div>
                        <div class="input-class" id="username"><input type="text" placeholder="Nome de usuário:" name="username"> <br></div>
                        <div class="input-class" id="e-mail"><input type="email" placeholder="E-mail:" name="email"> <br></div>
                        <div class="input-class" id="senha"><input type="password" placeholder="Senha:" name="senha"> <br></div>
                        <div class="input-class" id="senha"><input type="password" placeholder="Repetir Senha:" name="SenhaB"> <br></div>
                        <div class="input-class" id="cpf"><input type="text" placeholder="CPF:" name="cpf"> <br></div>
                        <div class="input-class" id="endereco"><input type="text" placeholder="Endereço:" name="endereco"> <br></div>
                        <div class="input-class" id="Telefone"><input type="text" placeholder="Telefone:" name="tel"> <br></div>
                        <div class="input-class" id="cep"><input type="text" placeholder="CEP:" name="cep"> <br></div>
                        <div id="botao"><button>Continuar</button></div>
                </div>
            </form>
    </div>
</body>
</html>


<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    htmlentities($nome = $_POST['nome-completo']);
    htmlentities($username = $_POST['username']);
    htmlentities($senha = $_POST['senha']);
    htmlentities($senhaConfirmacao = $_POST['senha-confirmacao']);
    htmlentities($email = $_POST['email']);
    htmlentities($cpf = $_POST['cpf']);
    htmlentities($telefone = $_POST['tel']);
    htmlentities($endereco = $_POST['endereco']);
    htmlentities($cep = $_POST['cep']);

    include('connection.php');

    $stmt = $mysqli->prepare("SELECT * FROM clientes WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if($result->num_rows > 0){
        echo "Este e-mail já está cadastrado.";
        exit();
    } else {
        if ($senha === $senhaConfirmacao) {
            $stmt = $mysqli->prepare("INSERT INTO clientes (nome, username, email, senha, telefone, cpf, endereco, cep) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("ssssssss", $nome, $username, $email, $senha, $telefone, $cpf, $endereco, $cep);
    
            if ($stmt->execute()) {
                header('Location: login.php');
                exit();
            } else {
                echo "Erro ao cadastrar: " . $stmt->error;
            }
        } else {
            echo "As senhas não conferem.";
        }
    }

    $stmt->close();
    $mysqli->close();
}
?>