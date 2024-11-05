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
      <p><a href="#"> 📝</a>Usuário</p>
      <li><?php echo htmlspecialchars($nome); ?></li>
      <p><a href="#"> 📝</a>Nome Completo</p>
      <li><?php echo (htmlspecialchars($nome) . " " . htmlspecialchars($sobrenome)); ?></li>
      <p><a href="#"> 📝</a>E-mail</p>
      <li><?php echo htmlspecialchars($email); ?></li>
      <p><a href="#"> 📝</a>CPF</p>
      <li><?php printf('%d%d%d.%d%d%d.%d%d%d-%d%d', ...str_split(htmlspecialchars($cpf))); ?></li>
      <p><a href="#"> 📝</a>CEP</p>
      <li><select name="" id=""><?php
          $sql = "SELECT * FROM enderecos WHERE id_user = $userId"; // Exemplo de consulta
          $result = $mysqli->query($sql);
          if ($result->num_rows > 0) {
            echo MinhaContaCep($result, $sql, $userId);
          } else {
              echo '<option value="">Não registrado</option>';
          } ?>
          </select>
      </li>
    </ul>


    <!-- Botão para abrir o pop-up -->
<button id="openPopupBtn">Cadastrar Endereço</button>

<!-- Estrutura do pop-up -->
<div id="popup" class="popup-overlay">
  <div class="popup-content">
    <span id="closePopupBtn" class="close-btn">&times;</span>
    <h2>Cadastre seu endereço:</h2>
    
    <form>
      <label for="cep">CEP</label>
      <input type="text" id="cep" name="cep" placeholder="00000-000" required>

      <label for="estado">Estado</label>
      <select id="estado" name="estado">
        <option value="SP">SP</option>
        <!-- Adicione outros estados conforme necessário -->
      </select>

      <label for="cidade">Cidade</label>
      <input type="text" id="cidade" name="cidade" placeholder="ex: Duque de Caxias" required>

      <label for="bairro">Bairro</label>
      <input type="text" id="bairro" name="bairro" placeholder="ex: 25 de Agosto" required>

      <label for="rua">Rua</label>
      <input type="text" id="rua" name="rua" placeholder="ex: Rua Assunção" required>

      <label for="complemento">Complemento</label>
      <input type="text" id="complemento" name="complemento" placeholder="ex: Do lado de uma cafeteria">

      <button type="submit">Enviar</button>
    </form>
  </div>
</div>


  </div>



  <?php
  echo htmlFooter();
  ?>

  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
  <script src="../js/bootstrap.bundle.min.js"></script>
  <script src="../js/cadastrar-endereco-teste.js"></script>
</body>

</html>