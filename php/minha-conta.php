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
    echo htmlHeaderNoNavBar($username, $role);
  ?>

  <div id="informacoes">
      <h1><strong> Minhas Informações: </strong></h1>
      <ul id="lista">
        <li>Usuário: <?php echo htmlspecialchars($username); ?></li>
        <li>Nome completo: <?php echo htmlspecialchars($fullname); ?></li>
        <li>E-mail: <?php echo htmlspecialchars($email);?></li>
      </ul>

       
        <button type="submit" id="cadastrar"><a id="link" href="../php/cadastro-endereço.php">Cadastrar endereço</a></button>
  

      
    </div>
          

    
  <?php
   echo htmlFooter();
  ?>  
    
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" ></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" ></script>
    <script src="../js/bootstrap.bundle.min.js"></script>
</body>
</html>