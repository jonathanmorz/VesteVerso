<?php
include('connection.php');

$nome = $mysqli->real_escape_string($_POST['nome-produto']);
$descricao = $mysqli->real_escape_string($_POST['desc-produto']);
$preco = $mysqli->real_escape_string($_POST['preco']);
$categoria = $mysqli->real_escape_string($_POST['gridRadios']);
$quantidade = $mysqli->real_escape_string($_POST['quantidade']);

//Ambos "if" se referem a buscas pela informação de produtos em alta ou em promoção, respectivamente, e armazenam essa informação com as demais
if(array_key_exists('em_alta', $_POST)) {
    $em_alta = 1;
} else {
    $em_alta = 0;
}
if(array_key_exists('promocao', $_POST)) {
    $promocao = 1;
} else {
    $promocao = 0;
}

//Caso uma imagem seja definida durante o cadastro do produto, ela deverá passar por aqui onde há uma checagem para o tamanho máximo do arquivo
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

//Verifica se a imagem corresponde aos tipos especificados
    if($extensao != "jpg" && $extensao != "png" && $extensao != "jpeg")
        die("Tipo de arquivo não aceito, necessário ser jpg ou png.");

//O nome da imagem é dado aqui, sendo constituída pelo nome da pasta que está armazenada, seu nome único e a extensão do arquivo
    $path = $pasta . $novoNomeDoArquivo . "." . $extensao;    

//Caso o processo dê certo, a pasta será armazenada com sucesso no banco de dados
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