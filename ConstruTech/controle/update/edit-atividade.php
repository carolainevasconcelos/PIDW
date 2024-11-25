<?php
if (!empty($_GET['id'])) {
    include_once('../conexao-bd.php');

    $id = $_GET['id'];

    $sqlSelect = "SELECT * FROM atividade WHERE id=$id";
    $result_atividade = $conexao->query($sqlSelect);

    if ($result_atividade->num_rows > 0) {
        $user_data = mysqli_fetch_assoc($result_atividade);
        $nome = $user_data['nome_atividade'];
        $descricao = $user_data['descricao'];
        $data_inicio = $user_data['data_inicio'];
        $data_termino = $user_data['data_termino'];
        $statu = $user_data['status'];
        $funcionario_id = $user_data['funcionario_id'];
        $projeto_id = $user_data['projeto_id'];
    } else {
        header('Location: ../listas/sistema-atividade.php');
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Atividade</title>
    <link rel="stylesheet" href="../../visao/css/formCadastro.css">
</head>

<body>
    <section class="section-projeto">
        <div class="form-container" id="div-projeto">
            <form action="saveEdit-atividade.php" method="POST">
                <div class="titulo">
                    <img src="../../visao/img/ferramentas.png" alt="">
                    <h1>Editar Atividade</h1>
                </div>

                <div class="input-group">
                    <label for="nome_atividade">Nome da Atividade:</label>
                    <input type="text" value="<?php echo htmlspecialchars($nome); ?>" id="nome_atividade"
                        name="nome_atividade" required>
                </div>
                <br>

                <div class="input-group">
                    <label for="descricao">Descrição:</label>
                    <input type="text" value="<?php echo htmlspecialchars($descricao); ?>" id="descricao"
                        name="descricao" required>
                </div>
                <br>

                <div class="input-group">
                    <label for="data_inicio">Data de Início:</label>
                    <input type="date" value="<?php echo htmlspecialchars($data_inicio); ?>" id="data_inicio"
                        name="data_inicio" required>
                </div>
                <br>

                <div class="input-group">
                    <label for="data_termino">Data de Término:</label>
                    <input type="date" value="<?php echo htmlspecialchars($data_termino); ?>" id="data_termino"
                        name="data_termino" required>
                </div>
                <br>

                <div class="input-group">
                    <label for="statu">Status:</label>
                    <input type="text" value="<?php echo htmlspecialchars($statu); ?>" id="statu" name="statu">
                </div>
                <br>

                <!-- Campo oculto para o ID da atividade -->
                <input type="hidden" name="id" value="<?php echo htmlspecialchars($id); ?>">

                <input type="submit" name="submit" value="Salvar" id="botao">
            </form>

            <!-- <div>
                <a href="../../visao/paginas/pagCronograma-.php">Voltar</a>
            </div> -->
        </div>
    </section>
</body>

</html>