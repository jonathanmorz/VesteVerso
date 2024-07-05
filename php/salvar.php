<?php
include('connection.php');

$nome = $mysqli->real_escape_string($_POST['nome-produto']);
$descricao = $mysqli->real_escape_string($_POST['desc-produto']);
$preco = $mysqli->real_escape_string($_POST['preco']);
$categoria = $mysqli->real_escape_string($_POST['gridRadios']);
$em_alta = $mysqli->real_escape_string($_POST['em_alta']);
$promocao = $mysqli->real_escape_string($_POST['promocao']);
$quantidade = $mysqli->real_escape_string($_POST['quantidade']);

if(isset($_FILES['arquivo'])) {
    $arquivo = $_FILES['arquivo'];

        if($arquivo['error'])
            die("Falha ao enviar arquivo");

        if($arquivo['size'] > 4194304)
            die("Arquivo muito grande! Max: 4MB");

    $pasta = "arquivos/";
    $nomeDoArquivo = $arquivo['name'];
    $novoNomeDoArquivo = uniqid();
    $extensao = strtolower(pathinfo($nomeDoArquivo,PATHINFO_EXTENSION));

    if($extensao != "jpg" && $extensao != "png" && $extensao != "jpeg")
        die("Tipo de arquivo não aceito, necessário ser jpg ou png.");

    $path = $pasta . $novoNomeDoArquivo . "." . $extensao;    

    $deu_certo = move_uploaded_file($arquivo['tmp_name'], $pasta . $novoNomeDoArquivo . "." . $extensao);

    if($deu_certo)
    {
        $sql = "INSERT into produtos(categoria, preco, nome, imagem, descricao, em_alta, promocao, quantidade) VALUES('$categoria','$preco','$nome','$path','$descricao','$em_alta','$promocao','$quantidade')";

    $rs = mysqli_query($mysqli, $sql);

    header("Location:../php/cadastro-produto.php");

    }

    else
        echo "Falha ao enviar";

}