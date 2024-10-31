<?php
if (!empty($_GET['id'])) {
    include_once('../conexao-bd.php');

    $id = $_GET['id'];

    $sqlSelect = "SELECT * FROM Documentos WHERE id=$id";

    $result_documentos = $conexao->query($sqlSelect);

    if ($result_documentos->num_rows > 0) {
        while ($user_data = mysqli_fetch_assoc($result_documentos)) {
            $tipo_documento = $user_data['tipo_documento'];
            $descricao = $user_data['descricao'];
            $data_geracao = $user_data['data_geracao'];
            $data_emissao = $user_data['data_emissao'];
            $arquivo = $user_data['arquivo'];
            $projeto_id = $user_data['projeto_id'] ?? null;
        }
    } else {
        header('Location: ../listas/sistema-documentos.php');
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Documento</title>
    <link rel="stylesheet" href="../../visao/css/styleEdit.css">
</head>

<body>
    <form action="saveEdit-documento.php" method="POST" enctype="multipart/form-data"> 
        <h1>Editar Documento</h1>

        <div>
            <label for="tipo_documento">Tipo de Documento:</label>
            <input type="text" value="<?php echo htmlspecialchars($tipo_documento); ?>" id="tipo_documento" name="tipo_documento" required>
        </div>

        <br>

        <div>
            <label for="descricao">Descrição:</label>
            <input type="text" value="<?php echo htmlspecialchars($descricao); ?>" id="descricao" name="descricao" required>
        </div>

        <br>

        <div>
            <label for="data_geracao">Data de Geração:</label>
            <input type="date" value="<?php echo htmlspecialchars($data_geracao); ?>" id="data_geracao" name="data_geracao" required>
        </div>

        <br>

        <div>
            <label for="data_emissao">Data de Emissão:</label>
            <input type="date" value="<?php echo htmlspecialchars($data_emissao); ?>" id="data_emissao" name="data_emissao" required>
        </div>

        <br>

        <div>
            <label for="arquivo">Escolher Novo Arquivo (opcional):</label>
            <input type="file" id="arquivo" name="arquivo">
            <p>Arquivo Atual: <?php echo htmlspecialchars($arquivo); ?></p>
        </div>

        <br>

        <div>
            <label for="projeto_id">ID do Projeto:</label>
            <input type="number" value="<?php echo htmlspecialchars($projeto_id); ?>" id="projeto_id" name="projeto_id" required>
        </div>

        <br>

        <input type="hidden" name="id" value="<?php echo $id; ?>">

        <input type="submit" name="update" id="submit" value="Salvar">
    </form>

    <div>
        <a href="../listas/sistema-documentos.php">Voltar</a>
    </div>
</body>

</html>