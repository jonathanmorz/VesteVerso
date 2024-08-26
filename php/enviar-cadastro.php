<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = htmlentities($_POST['nome-completo']);
    $username = htmlentities($_POST['username']);
    $senha = htmlentities($_POST['senha']);
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