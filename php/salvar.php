<?php
include('connection.php');

$nome = $mysqli->real_escape_string($_POST['nome-produto']);
$preco = $mysqli->real_escape_string($_POST['preco']);
$categoria = $mysqli->real_escape_string($_POST['gridRadios']);

$sql = "INSERT into produto(categoria, preco, nome_prod) VALUES('$categoria','$preco','$nome')";

    $rs = mysqli_query($mysqli, $sql);

    header("Location: ../html/cadastro-produto.html");
?>