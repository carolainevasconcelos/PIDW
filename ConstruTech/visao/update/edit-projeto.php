<?php
if (!empty($_GET['id'])) {
    include_once('../conexao-bd.php');

    $id = $_GET['id'];

    $sqlSelect = "SELECT * FROM Projeto WHERE id=$id";

    $result_projeto = $conexao->query($sqlSelect);

    // print_r($result_projeto);

    if ($result_projeto->num_rows > 0) {
        while ($user_data = mysqli_fetch_assoc($result_projeto)) {
            $nome = $user_data['nome'];
            $descricao = $user_data['descricao'];
            $data_inicio = $user_data['data_inicio'];
            $data_termino = $user_data['data_termino'];
            $statu = $user_data['statu'] ?? '';
            $cliente_id = $user_data['cliente_id'] ?? null;
        }
    } else {
        header('Location: ../ listas/sistema-projeto.php');
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Projeto</title>
    <link rel="stylesheet" href="../css/styleEdit.css">
</head>

<body>
    <form action="saveEdit-projeto.php" method="POST">
        <h1>Editar Projeto</h1>

        <div>
            <label for="nome">Nome do Projeto:</label>
            <input type="text" value="<?php echo htmlspecialchars($nome); ?>" id="nome" name="nome" required>
        </div>

        <br>

        <div>
            <label for="descricao">Descrição:</label>
            <input type="text" value="<?php echo htmlspecialchars($descricao); ?>" id="descricao" name="descricao" required>
        </div>

        <br>

        <div>
            <label for="data_inicio">Data de Início:</label>
            <input type="date" value="<?php echo htmlspecialchars($data_inicio); ?>" id="data_inicio" name="data_inicio" required>
        </div>

        <br>

        <div>
            <label for="data_termino">Data de Término:</label>
            <input type="date" value="<?php echo htmlspecialchars($data_termino); ?>" id="data_termino" name="data_termino" required>
        </div>

        <br>

        <div>
            <label for="statu">Status:</label>
            <input type="text" value="<?php echo htmlspecialchars($statu); ?>" id="statu" name="statu">
        </div>

        <br>

        <!-- Campo oculto para o ID do projeto -->
        <input type="hidden" name="id" value="<?php echo $id; ?>">

        <input type="submit" name="update" id="submit" value="Salvar">
    </form>

    <div>
        <a href="../listas/sistema-projeto.php">Voltar</a>
    </div>
</body>

</html>