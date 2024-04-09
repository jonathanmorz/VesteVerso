<?php

include('connection.php');

$nome = $_POST['nome-completo'];
$username = $_POST['username'];
$senha = $_POST['senha'];
$checksenha = $_POST['repetir-senha'];
$email = $_POST['e-mail'];
$CPF = $_POST['cpf'];
$telefone = $_POST['Telefone'];
$endereco = $_POST['endereco'];
$cep = $_POST['cep'];

if ($senha != $checksenha){
    echo("As senhas não correspondem");
}

$sql = "INSERT into clientes(nome, usuario, email, senha, telefone, cpf, endereco, cep) VALUES('$nome','$username','$email','$senha','$telefone','$cpf','$endereco','$cep')";

    $rs = mysqli_query($mysqli, $sql);

    header("Location: ../html/login.html");

?>