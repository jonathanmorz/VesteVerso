<?php
require_once 'connection.php';
require_once 'presets.php';
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>VesteVerso</title>
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <link rel="stylesheet" href="../css/minha-conta.css">
  <link rel="stylesheet" href="../css/presets.css">
  <link rel="stylesheet" href="../css/coracao-favoritar.css">
  <link rel="shortcut icon" href="../resources/images/favicon.ico" type="image/x-icon">

</head>

<body>
  <?php
  echo htmlHeaderNoNavBar($nome, $role);
  ?>

  <div id="informacoes">
    <h1><strong> Minhas Informações</strong></h1>
    <ul id="lista">
    <p><a href="#">📝</a>Usuário</p>
      <li><?php echo htmlspecialchars($nome); ?></li>
      <p><a href="#">📝</a>Nome Completo</p>
      <li><?php echo (htmlspecialchars($nome)." ".htmlspecialchars($sobrenome)); ?></li>
      <p><a href="#">📝</a>E-mail</p>
      <li><?php echo htmlspecialchars($email); ?></li>
      <p><a href="#">📝</a>CPF</p>
      <li><?php printf('%d%d%d.%d%d%d.%d%d%d-%d%d',...str_split(htmlspecialchars($cpf)));?></li>
      <p><a href="#">📝</a>CEP</p>
      <li><?php if($cep !== null){echo htmlspecialchars($cep);}else{echo 'não informado';};?></li>
    </ul>


    <button type="submit" id="cadastrar"><a id="link" href="../php/cadastro-endereço.php">Cadastrar endereço</a></button>



  </div>



  <?php
  echo htmlFooter();
  ?>

  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
  <script src="../js/bootstrap.bundle.min.js"></script>
  <script src="../js/ajax-login.js"></script>
</body>

</html>