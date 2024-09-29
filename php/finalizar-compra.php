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
    <link rel="stylesheet" href="../css/finalizar-compra.css">
    <link rel="stylesheet" href="../css/presets.css">
    <link rel="stylesheet" href="../css/coracao-favoritar.css">
    <link rel="shortcut icon" href="../resources/images/favicon.ico" type="image/x-icon">

</head>
<body>
  <?php
    echo htmlHeaderNoNavBar($nome, $role);
  ?>
<div id="div-geral">
    <form id="form-pagamento">
        <div id="conteudo-formulario">
            <div id="finalizar-compra">
                <h1>Finalizar compra</h1>
            </div>

            <div id="linha-preta-div">
                <img src="../resources/images/pixel-linha.jpg" alt="linha preta" id="linha-preta">
            </div>

            <div id="selecionar-titulo">
                <h2>Selecione sua forma de pagamento:</h2>
            </div>

            <div id="metodos-pagamento">
                <div id="pix" class="form-check">
                    <img src="../resources/images/logo-pix.png"   class="image" width="30px" height="30px">
                    <div class="linha-preta-div2">
                    <img src="../resources/images/pixel-linha2.jpg" alt="linha preta2" class="linha-preta2">
                    </div>
                    <input class="form-check-input" type="radio" name="exampleRadios" id="radio-pix" value="opcao1" checked>
                    <label class="form-check-label" for="radio-pix">PIX</label>
                </div>
                <div id="paypal" class="form-check">
                    <img src="../resources/images/logo-paypal.png" class="image" width="30px" height="30px">
                    <div class="linha-preta-div2">
                    <img src="../resources/images/pixel-linha2.jpg" alt="linha preta2" class="linha-preta2">
                    </div>
                    <input class="form-check-input" type="radio" name="exampleRadios" id="radio-paypal" value="opcao2" checked>
                    <label class="form-check-label" for="radio-pix">Paypal</label>
                </div>
                <div id="debito" class="form-check">
                    <img src="../resources/images/logo-debito.png"  class="image" width="30px" height="30px">
                    <div class="linha-preta-div2">
                    <img src="../resources/images/pixel-linha2.jpg" alt="linha preta2" class="linha-preta2">
                    </div>
                    <input class="form-check-input" type="radio" name="exampleRadios" id="radio-debito" value="opcao3" checked>
                    <label class="form-check-label" for="radio-pix">Cartão de débito</label>
                </div>
                <div id="credito" class="form-check">
                    <img src="../resources/images/logo-credito.png"  class="image" width="30px" height="30px">
                    <div class="linha-preta-div2">
                    <img src="../resources/images/pixel-linha2.jpg" alt="linha preta2" class="linha-preta2">
                    </div>
                    <input class="form-check-input" type="radio" name="exampleRadios" id="radio-credito" value="opcao4">
                    <label class="form-check-label" for="radio-credito">Cartão de crédito</label>
                </div>
                <div id="boleto" class="form-check">
                    <img src="../resources/images/logo-boleto.png"  class="image" width="30px" height="30px">
                    <div class="linha-preta-div2">
                    <img src="../resources/images/pixel-linha2.jpg" alt="linha preta2" class="linha-preta2">
                    </div>
                    <input class="form-check-input" type="radio" name="exampleRadios" id="boleto" value="opcao5">
                    <label class="form-check-label" for="radio-boleto">Boleto</label>
                </div>
            </div>

            <div id="div-botao-pagamento"><button id="botao-pagamento">Continuar</button></div>
        </div>
    </form>


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