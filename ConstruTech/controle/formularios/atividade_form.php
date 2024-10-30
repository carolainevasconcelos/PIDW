<?php
include_once('../conexao-bd.php');

$nome = $_POST['nome_atividade'] ?? '';
$descricao = $_POST['descricao'] ?? '';
$data_inicio = $_POST['data_inicio'] ?? '';
$data_termino = $_POST['data_termino'] ?? '';
$statu = $_POST['statu'] ?? '';
$funcionario_id = $_POST['funcionario_id'] ?? null;
$projeto_id = $_POST['projeto_id'] ?? null;

if (isset($_POST['submit'])) {
    if (!empty($nome) && !empty($descricao) && !empty($data_inicio) && !empty($statu) && !empty($funcionario_id) && !empty($projeto_id)) {
        $query = "INSERT INTO Atividade (nome_atividade, descricao, data_inicio, data_termino, status, funcionario_id, projeto_id) VALUES ('$nome', '$descricao', '$data_inicio', '$data_termino', '$statu', '$funcionario_id', '$projeto_id')";

        $resultado = mysqli_query($conexao, $query);

        if ($resultado) {
            echo "<script>alert('Cadastro realizado com sucesso!');</script>";
        } else {
            echo "<script>alert('Erro ao cadastrar: " . mysqli_error($conexao) . "');</script>";
        }
    } else {
        echo "<script>alert('Por favor, preencha todos os campos obrigatórios.');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Atividade</title>
    <link rel="stylesheet" href="../../visao/css/formCadastro.css">
</head>

<body>
    <section class="section-atividade">
        <div class="form-container" id="div-atividade">
            <form action="" method="POST">
                <div class="titulo">
                    <h1>Cadastrar Atividade</h1>
                </div>

                <div>
                    <label for="funcionario_id">Funcionario:</label>
                    <select id="funcionario_id" name="funcionario_id" required>
                        <?php
                        $resultado = mysqli_query($conexao, "SELECT id, nome FROM Funcionario");
                        while ($funcionario = mysqli_fetch_assoc($resultado)) {
                            echo "<option value='{$funcionario['id']}'>{$funcionario['nome']}</option>";
                        }
                        ?>
                    </select>
                </div>

                <div>
                    <label for="projeto_id">Projeto:</label>
                    <select id="projeto_id" name="projeto_id" required>
                        <?php
                        $resultado = mysqli_query($conexao, "SELECT id, nome FROM Projeto");
                        while ($projeto = mysqli_fetch_assoc($resultado)) {
                            echo "<option value='{$projeto['id']}'>{$projeto['nome']}</option>";
                        }
                        ?>
                    </select>
                </div>

                <div class="input-group">
                    <label for="nome_atividade">Nome da Atividade:</label>
                    <input type="text" id="nome_atividade" name="nome_atividade" required>
                </div>

                <div class="input-group">
                    <label for="descricao">Descrição:</label>
                    <textarea id="descricao" name="descricao" required></textarea>
                </div>

                <div class="input-group">
                    <label for="data_inicio">Data de Início:</label>
                    <input type="date" id="data_inicio" name="data_inicio" required>
                </div>

                <div class="input-group">
                    <label for="data_termino">Data de Término:</label>
                    <input type="date" id="data_termino" name="data_termino">
                </div>

                <div class="input-group">
                    <label for="statu">Status:</label>
                    <select id="statu" name="statu" required>
                        <option value="">Selecione</option>
                        <option value="pendente">Pendente</option>
                        <option value="em andamento">Em Andamento</option>
                        <option value="concluido">Concluído</option>
                        <option value="cancelado">Cancelado</option>
                        <option value="atrasado">Atrasado</option>
                        <option value="em espera">Em Espera</option>
                    </select>
                </div>

                <input type="submit" name="submit" value="Cadastrar" id="botao">
            </form>
        </div>
    </section>
</body>

</html>