<?php
include('connection.php');

$nome = $mysqli->real_escape_string($_POST['nome-produto']);
$preco = $mysqli->real_escape_string($_POST['preco']);
$categoria = $mysqli->real_escape_string($_POST['gridRadios']);

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
        $sql = "INSERT into produto(categoria, preco, nome_prod, path) VALUES('$categoria','$preco','$nome','$path')";

    $rs = mysqli_query($mysqli, $sql);

    header("Location:../html/cadastro-produto.html");

    }

    else
        echo "Falha ao enviar";

}