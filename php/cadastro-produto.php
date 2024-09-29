<?php
   require_once 'connection.php';   //conexão com bd
   require_once 'presets.php';      //inclusão dos presets, como header, cards e etc
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VesteVerso</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/cadastro-produtos.css">
    <link rel="stylesheet" href="../css/presets.css">
    <link rel="stylesheet" href="../css/coracao-favoritar.css">
    <link rel="shortcut icon" href="../resources/images/favicon.ico" type="image/x-icon">
</head>
<body>
    <?php
         echo htmlHeaderNoNavBar($nome, $role);
    ?>
   
    <div id="div-form">
        <form action="../php/salvar.php" enctype="multipart/form-data" method="POST">
            <div class="form-group row">
              <label for="inputTitle" class="col-sm-2 col-form-label">Título do Produto</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="inputTitle" placeholder="Digite o titulo do produto com poucos caracteres (Máximo de 25): " name="nome-produto">
              </div>
            </div>
            <div class="form-group row">
              <label for="inputTitle" class="col-sm-2 col-form-label">Descrição do Produto</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="inputDesc" placeholder="Digite o titulo do produto: " name="desc-produto">
              </div>
            </div>
            <div class="form-group row">
              <label for="inputPrice" class="col-sm-2 col-form-label">Preço</label>
              <div class="col-sm-10">
                <input type="number" step="0.010" class="form-control" id="inputPrice" placeholder="Digite o preço do produto: " name="preco">
              </div>
            </div>
            <div class="form-group row">
              <label for="inputPassword3" class="col-sm-2 col-form-label">Quantidade</label>
              <div class="col-sm-10">
                <input type="number" class="form-control" id="inputQnt" placeholder="Digite quantas unidades do produto estão em estoque: " name="quantidade">
              </div>
            </div>
            <fieldset class="form-group">
              <div class="row">
                <legend class="col-form-label col-sm-2 pt-0">Categoria</legend>
                <div class="col-sm-10">
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios1" value="roupa_masc" checked>
                    <label class="form-check-label" for="gridRadios1">
                      Roupa Masculina
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios2" value="roupa_fem">
                    <label class="form-check-label" for="gridRadios2">
                      Roupa Feminina
                    </label>
                  </div>
                  <div class="form-check disabled">
                    <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios3" value="roupa_inf">
                    <label class="form-check-label" for="gridRadios3">
                      Roupa Infantil
                    </label>
                  </div>
                </div>
              </div>
            </fieldset>
        <div class="form-group row">
    <div class="col-sm-2">Adicional</div>
    <div class="col-sm-10">
      <div class="form-check">
        <input class="form-check-input" type="checkbox" id="gridCheck1" name="em_alta">
        <label class="form-check-label" for="gridCheck1">
          Em Alta
        </label>
      </div>
      <div class="form-check">
        <input class="form-check-input" type="checkbox" id="gridCheck2" name="promocao">
        <label class="form-check-label" for="gridCheck2">
          Promoção
        </label>
      </div>
    </div>
  </div>
                <div class="form-group">
                  <label for="exampleFormControlFile1">Imagem do Produto</label>
                  <input type="file" class="form-control-file" name="arquivo" placeholder="Escolher Imagem">
                </div>

                <div class="form-group row">
                <div class="col-sm-10">
                    <button type="submit" name="upload" class="btn btn-primary">Enviar</button>
                </div>
                </div>
        </form>
    </div>

</body>
</html>