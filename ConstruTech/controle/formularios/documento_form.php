<?php
include_once('../conexao-bd.php');

$tipo_documento = '';
$descricao = '';
$data_geracao = '';
$data_emissao = '';
$arquivo = '';
$projeto_id = null;

if (isset($_POST['submit'])) {
    $tipo_documento = $_POST['tipo_documento'];
    $descricao = $_POST['descricao'];
    $data_geracao = $_POST['data_geracao'];
    $data_emissao = $_POST['data_emissao'];
    $arquivo = $_POST['arquivo'];
    $projeto_id = $_POST['projeto_id'] ?? null;

    // Corrigido para usar apenas a consulta de inserção
    $resultado = mysqli_query($conexao, "INSERT INTO Documentos (tipo_documento, descricao, data_geracao, data_emissao, arquivo, projeto_id) VALUES ('$tipo_documento', '$descricao', '$data_geracao', '$data_emissao', '$arquivo', '$projeto_id')");

    if ($resultado) {
        echo "<script>alert('Enviado com sucesso!');</script>";
    } else {
        echo "<script>alert('Erro ao cadastrar: " . mysqli_error($conexao) . "');</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar</title>
    <link rel="stylesheet" href="../../visao/css/formCadastro.css">
</head>

<body>
    <section class="section-documento">
        <div class="form-container" id="div-documento">
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="titulo">
                    <img src="../../visao/img/ferramentas.png" alt="">
                    <h1>Documentos</h1>
                </div>

                <div class="input-group">
                    <label for="tipo_documento">Tipo de Documento:</label>
                    <input type="text" id="tipo_documento" name="tipo_documento" required>
                </div>

                <div class="input-group">
                    <label for="descricao">Descrição:</label>
                    <input type="text" id="descricao" name="descricao" required>
                </div>

                <div class="input-group">
                    <label for="data_geracao">Data de Geração:</label>
                    <input type="date" id="data_geracao" name="data_geracao" required>
                </div>

                <div class="input-group">
                    <label for="data_emissao">Data de Emissão:</label>
                    <input type="date" id="data_emissao" name="data_emissao" required>
                </div>

                <div class="input-group">
                    <label for="arquivo">Escolher Arquivo:</label>
                    <input type="file" id="arquivo" name="arquivo" required>
                </div>

                <div class="input-group">
                    <label for="projeto_id">ID do Projeto:</label>
                    <select id="projeto_id" name="projeto_id" required>
                        <?php
                        $resultado = mysqli_query($conexao, "SELECT id, nome FROM projeto");
                        while ($projeto = mysqli_fetch_assoc($resultado)) {
                            echo "<option value='{$projeto['id']}'>{$projeto['nome']}</option>";
                        }
                        ?>
                    </select>
                </div>

                <div class="input-group">
                    <input type="submit" id="botao" name="submit" value="Cadastrar">
                </div>
            </form>
        </div>
    </section>
</body>

</html>