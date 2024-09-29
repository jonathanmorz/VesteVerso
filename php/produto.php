<?php
   require_once 'connection.php';
   require_once 'presets.php';
?>

<?php
// Verificação se o ID do produto é válido
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = intval($_GET['id']);
    $sql = "SELECT id, nome, preco, descricao, imagem FROM produtos WHERE id = ?";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $produto = $result->fetch_assoc();
    } else {
        echo "Produto não encontrado.";
        exit;
    }

    $stmt->close();
} else {
    echo "ID do produto inválido.";
    exit;
}

$mysqli->close();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($produto['nome']); ?> - VesteVerso</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/presets.css">
    <link rel="stylesheet" href="../css/produto.css">
    <link rel="stylesheet" href="../css/coracao-favoritar.css">
    <link rel="shortcut icon" href="../resources/images/favicon.ico" type="image/x-icon">
</head>
<body>
    <?php
        echo htmlHeader($nome, $role);
    ?>

    <container>
        <div class="conteudo">
            <img class="imagem-produto" src="<?php echo htmlspecialchars($produto['imagem']); ?>" alt="Imagem do produto" id="img-produto">
        </div>
        <div id="div-conteudo">
            <div id="nome-produto">
                <h1 class="produto-descricao"><?php echo nl2br(htmlspecialchars($produto['descricao'])); ?></h1>
            </div>
            <div id="preco-produto">
                <h2 class="produto-preco">R$<?php echo number_format($produto['preco'], 2, ',', '.'); ?></h2>
            </div>
            <div id="frete">
                <h4>Frete:</h4>
                <img src="../resources/images/frete.png" alt="Ícone de Frete Caminhão">
                <input type="text" placeholder="Digite seu CEP" id="input-cep">
            </div>
            <div id="tamanho-produto">
                <div class="text">
                    <h4>Tamanho:</h4>
                </div>
            </div>
            <div class="btn-group btn-group-toggle" data-toggle="buttons">
                <label class="btn btn-outline-dark active">
                    <input type="radio" name="options" id="option1" autocomplete="off"> P
                </label>
                <label class="btn btn-outline-dark">
                    <input type="radio" name="options" id="option2" autocomplete="off"> M
                </label>
                <label class="btn btn-outline-dark">
                    <input type="radio" name="options" id="option3" autocomplete="off"> G
                </label>
                <label class="btn btn-outline-dark">
                    <input type="radio" name="options" id="option4" autocomplete="off"> GG
                </label>
            </div>
            <div class="text"><h4>Quantidade:</h4></div>
            <div id="quantidade-produto">
                <div class="botoes-quantidade"><button onclick="diminuir()" id="botao-quantidade-menos">-</button></div>
                <input type="number" id="quantidade" value="0" min="0" max="9">
                <div class="botoes-quantidade"><button onclick="aumentar()" id="botao-quantidade-mais">+</button></div>
            </div>
            <div id="div-button">
                <div class="class-botoes" id="div-botao-carrinho">
                    <a href="enviar-carrinho.php?acao=add&id=<?php echo $produto['id']; ?>">
                        <button id="adicionar-carrinho">Adicionar ao Carrinho</button>
                    </a>
                </div>
                <div class="class-botoes"><button id="comprar-agora">Comprar Agora</button></div>
                <div id="favoritar">
                    <img src="../resources/images/coracao-roxo-grande.png" alt="Coração Favorito" id="coracao-favoritar" onclick="trocarImagem()">
                </div>
            </div>
        </div>
    </container>

    <?php
        echo htmlFooter();
    ?>

        <script>
            function trocarImagem() {
                var coracaofavoritar = document.getElementById('coracao-favoritar');
                if (coracaofavoritar.src.match("../resources/images/coracao-roxo-grande.png")) {
                    coracaofavoritar.src = "../resources/images/coracao-solido-roxo-grande.png";
                } else {
                    coracaofavoritar.src = "../resources/images/coracao-roxo-grande.png";
                }
            }
        </script>
        <script>
            function diminuir() {
                var input = document.getElementById('quantidade');
                var valor = parseInt(input.value);
                if (valor > 0) {
                input.value = valor - 1;
            }
            }
    
            function aumentar() {
                var input = document.getElementById('quantidade');
                var valor = parseInt(input.value);
                input.value = valor + 1;
            }
        </script>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

    </body>
</html>