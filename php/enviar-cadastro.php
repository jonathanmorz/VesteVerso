<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include('connection.php');
    $nome = htmlentities($_POST['Nome']);
    $sobrenome = htmlentities($_POST['Sobrenome']);
    $senha = htmlentities($_POST['Password']);
    $email = htmlentities($_POST['Email']);
    $cpf = htmlentities($_POST['CPF']);
    $sexo = $_POST['sex-rad'];
    
    //Utiliza de comandos SQL para inserir dados no banco de dados, utilizando de um caractere no bind_param para que não haja injeção de códigos maliciosos
    $stmt = $mysqli->prepare("INSERT INTO clientes (nome, sobrenome, email, senha, sexo, cpf) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssss", $nome, $sobrenome, $email, $senha, $sexo, $cpf);
    $stmt->execute();
    if($stmt){
        header('Location:login-cadastro.php');
    }
}
?>