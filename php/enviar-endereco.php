<?php
// enviar-endereço.php
session_start();
require_once 'connection.php';
require_once 'check-session.php';

if (!isset($_SESSION['id'])) {
    die("Usuário não logado.");
}

$userId = $_SESSION['id'];
$cep = htmlentities($_POST['Cep']);
$estado = $_POST['Estado'];
$cidade = htmlentities($_POST['Cidade']);
$bairro = htmlentities($_POST['Bairro']);
$rua = htmlentities($_POST['Rua']);
$complemento = htmlentities($_POST['Complemento']);


if (!is_null(($cep))) {
    // Verifica se o Cep já está setado no usuário
    $stmt = $mysqli->prepare("SELECT id FROM enderecos WHERE id_user = ? AND cep = ?");
    $stmt->bind_param("ii", $userId, $cep);
    $stmt->execute();
    $stmt->store_result();
    // Se o Cep não estiver no usuário, adiciona
    if ($stmt->num_rows == 0) {
        $stmt = $mysqli->prepare("INSERT INTO enderecos (id_user, cep, estado, cidade, bairro, rua, complemento) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sssssss", $userId, $cep, $estado, $cidade, $bairro, $rua, $complemento);
        if ($stmt->execute()) {
            echo "Endereço adicionado com sucesso!";
        } else {
            echo "Erro ao adicionar o endereço."; echo error_reporting();
        }
    } else {
        echo "Endereço repetido.";
    }
    $stmt->close();
}
$mysqli->close();

?>