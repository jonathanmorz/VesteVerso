<?php
$nome = $_POST['input-nome-completo'];
$username = $_POST['input-username'];
$Senha = $_POST['input-senha'];
$checksenha = $_POST['input-repetir-senha'];
$email = $_POST['input-email'];
$cpf = $_POST['input-cpf'];
$telefone = $_POST['input-tel'];
$endereco = $_POST['input-endereco'];
$cep = $_POST['input-cep'];

include('connection.php');

    $sql = "INSERT into clientes(nome, username, email, senha, telefone, cpf, endereco, cep) VALUES('$nome','$username','$email','$Senha','$telefone','$cpf','$endereco','$cep')";

    $rs = mysqli_query($mysqli, $sql);

    header('Location:../html/login.html');

?>