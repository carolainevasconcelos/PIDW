<?php
include_once('../conexao-bd.php');

$produto = '';
$qtd = '';
$movimentacao = '';
$data = '';
$financeiro_id = null;
$projeto_id = null;

if (isset($_POST['submit'])) {
    $produto = $_POST['produto'];
    $qtd = $_POST['quantidade_total'];
    $movimentacao = $_POST['tipo_movimentacao'];
    $data = $_POST['data_movimentacao'];
    $projeto_id = $_POST['projeto_id'];

    // Insere na tabela Estoque
    $resultado = mysqli_query($conexao, "INSERT INTO estoque (produto, quantidade_total, tipo_movimentacao, data_movimentacao, projeto_id) VALUES ('$produto', '$qtd', '$movimentacao', '$data', '$projeto_id')");

    if ($movimentacao === 'entrada') {
        $valor_despesa = 100.00;  // Ajuste para o valor apropriado da despesa
        $descricao = "Despesa gerada pela movimentação de entrada do produto $produto";

        $resultado_financeiro = mysqli_query($conexao, "INSERT INTO financeiro (tipo_transacao, valor, data, descricao, projeto_id) VALUES ('despesas', '$valor_despesa', '$data', '$descricao', '$projeto_id')");

        if (!$resultado_financeiro) {
            echo "Erro ao registrar a despesa no Financeiro: " . mysqli_error($conexao);
        }
    }

    if (!$resultado) {
        echo "Erro ao inserir na tabela Estoque: " . mysqli_error($conexao);
    }
}
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Movimentação de Estoque</title>
    <link rel="stylesheet" href="../../visao/css/formCadastro.css">
    <script src="../../visao/js/validarCampos.js" defer></script>

</head>

<body>
    <section class="section-estoque">
        <div class="form-container" id="div-estoque">
            <form action="" method="POST">
                <div class="titulo">
                    <img src="../../visao/img/ferramentas.png" alt="">
                    <h2>Cadastro de Estoque</h2>
                </div>

                <div class="input-group">
                    <label for="produto">Produto:</label>
                    <input type="text" id="produto" name="produto" required>
                </div>

                <div class="input-group">
                    <label for="quantidade_total">Quantidade Total:</label>
                    <input type="number" id="quantidade_total" name="quantidade_total" required>
                </div>

                <div class="input-group">
                    <label for="tipo_movimentacao">Tipo de Movimentação:</label>
                    <select id="tipo_movimentacao" name="tipo_movimentacao" onchange="verificarMovimentacao()" required>
                        <option value="">Selecione</option>
                        <option value="entrada">Entrada</option>
                        <option value="saida">Saída</option>
                    </select>
                </div>

                <div class="input-group">
                    <label for="data_movimentacao">Data da Movimentação:</label>
                    <input type="date" id="data_movimentacao" name="data_movimentacao" required>
                </div>

                <div class="input-group">
                    <label for="projeto_id">Projeto:</label>
                    <select name="projeto_id" id="projeto_id" required>
                        <option value="">Selecione</option>
                        <?php
                        include_once('../conexao-bd.php');
                        $resultado = mysqli_query($conexao, "SELECT id, nome FROM Projeto");
                        while ($projeto = mysqli_fetch_assoc($resultado)) {
                            echo "<option value='{$projeto['id']}'>{$projeto['nome']}</option>";
                        }
                        ?>
                    </select>
                </div>

                <div class="input-group" id="tipoTransacaoDiv" style="display: none;">
                    <label for="tipo_transacao">Tipo de Transação:</label>
                    <input type="text" id="tipo_transacao" name="tipo_transacao" value="Despesa" readonly>
                </div>

                <input type="submit" name="submit" value="Cadastrar" id="botao">
            </form>

            <script>
                function verificarMovimentacao() {
                    const movimentacao = document.getElementById('tipo_movimentacao').value;
                    const tipoTransacaoDiv = document.getElementById('tipoTransacaoDiv');
                    const tipoTransacaoInput = document.getElementById('tipo_transacao');

                    if (movimentacao === 'entrada') {
                        tipoTransacaoDiv.style.display = 'block';
                        tipoTransacaoInput.value = 'despesa';
                    } else {
                        tipoTransacaoDiv.style.display = 'none';
                        tipoTransacaoInput.value = '';
                    }
                }
            </script>
        </div>
    </section>
</body>

</html>