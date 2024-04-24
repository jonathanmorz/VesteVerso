<?php
$nome = $_POST['nome-completo'];
$username = $_POST['username'];
$Senha = $_POST['senha'];
$email = $_POST['email'];
$cpf = $_POST['cpf'];
$telefone = $_POST['tel'];
$endereco = $_POST['endereco'];
$cep = $_POST['cep'];

include('connection.php');

    $sql = "INSERT into clientes(nome, username, email, senha, telefone, cpf, endereco, cep) VALUES('$nome', '$username', '$email', '$Senha', '$telefone', '$cpf', '$endereco', '$cep')";

    $rs = mysqli_query($mysqli, $sql);

    header('Location:../html/login.html');

?>