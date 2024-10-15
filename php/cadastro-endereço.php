<?php
require_once 'connection.php';
require_once 'presets.php';
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <!-- Meta tags Obrigatórias -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <title>VesteVerso</title>
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <link rel="stylesheet" href="../css/cadastro-endereço.css">
  <link rel="stylesheet" href="../css/presets.css">
  <link rel="stylesheet" href="../css/coracao-favoritar.css">
  <link rel="shortcut icon" href="../resources/images/favicon.ico" type="image/x-icon">


</head>

<body>

  <form action="enviar-endereco.php" method="POST" id="enderecoForm" class="enderecovalues">
    <div id="selecionar-titulo">
      <h2>Cadastre seu endereço:</h2>
    </div>
    <div class="form-row">
      <div class="form-group col-md-2">
        <label>CEP</label>
        <input type="text" name="Cep" class="form-control" id="txtCep" placeholder="00000-000">
      </div>
    </div>

    <div class="form-row">
      <div class="form-group col-md-1">
        <label for="txtEstado">Estado</label>
        <select name="Estado" class="form-control" id="txtEstado">
          <option value="SP">SP</option>
          <option value="RJ">RJ</option>
        </select>
      </div>
      <div class="form-group col-md-3">
        <label for="txtCidade">Cidade</label>
        <input type="text" name="Cidade" class="form-control" id="txtCidade" placeholder="ex: Duque de caxias">
      </div>
      <div class="form-group col-md-4">
        <label for="txtBairro">Bairro</label>
        <input type="text" name="Bairro" class="form-control" id="txtBairro" placeholder="ex: 25 de Agosto">
      </div>
      <div class="form-group col-md-4">
        <label for="txtRua">Rua</label>
        <input type="text" name="Rua" class="form-control" id="txtRua" placeholder="ex: Rua Assunção">
      </div>
    </div>
    <div class="form-group">
      <label for="txtComplemento">Complemento</label>
      <input type="text" name="Complemento" class="form-control" id="txtComplemento" placeholder="ex: Do lado de uma cafeteria">
    </div>
    <button type="submit" class="btn btn-primary" id="enviar">Enviar</button>
  </form>

  <!-- JavaScript (Opcional) -->
  <script src="../js/busca-cep.js"></script>
  <!-- jQuery primeiro, depois Popper.js, depois Bootstrap JS -->
  
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <script src="../js/bootstrap.min.js"></script>
</body>

</html>