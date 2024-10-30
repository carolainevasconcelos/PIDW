<?php
include_once('../conexao-bd.php');

$nome = '';
$descricao = '';
$data_inicio = '';
$data_termino = '';
$statu = '';
$cliente_id = null;

if (isset($_POST['submit'])) {
    $nome = $_POST['nome-projeto'] ?? ''; 
    $descricao = $_POST['descricao'] ?? ''; 
    $data_inicio = $_POST['data_inicio'] ?? ''; 
    $data_termino = $_POST['data_termino'] ?? ''; 
    $statu = $_POST['statu'] ?? '';
    $cliente_id = $_POST['cliente_id'] ?? null; 

    if (!empty($statu) && !empty($cliente_id) && !empty($nome)) {
        $query = "INSERT INTO Projeto (nome, descricao, data_inicio, data_termino, statu, cliente_id) 
                  VALUES ('$nome', '$descricao', NULLIF('$data_inicio', ''), NULLIF('$data_termino', ''), '$statu', $cliente_id)";
        $resultado = mysqli_query($conexao, $query);

        if ($resultado) {
            echo "<script>alert('Cadastro realizado com sucesso!');</script>";
        } else {
            echo "<script>alert('Erro ao cadastrar: " . mysqli_error($conexao) . "');</script>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Projeto</title>
    <link rel="stylesheet" href="../../visao/css/formCadastro.css">
    <script src="../../visao/js/validarCampos.js" defer></script>
</head>

<body>
    <h2>Cadastrar Projeto</h2>
    <form action="projeto_form.php" method="POST"> 
        <div>
            <label for="cliente_id">Cliente:</label>
            <select id="cliente_id" name="cliente_id" required>
                <?php
                include_once('../conexao-bd.php');
                $resultado = mysqli_query($conexao, "SELECT id, nome FROM Cliente");
                while ($cliente = mysqli_fetch_assoc($resultado)) {
                    echo "<option value='{$cliente['id']}'>{$cliente['nome']}</option>";
                }
                ?>
            </select>
        </div>

        <div>
            <label for="nome-projeto">Nome do Projeto:</label>
            <input type="text" id="nome-projeto" name="nome-projeto" required>
        </div>

        <div>
            <label for="descricao">Descrição:</label>
            <textarea id="descricao" name="descricao" rows="4" cols="50"></textarea>
        </div>

        <div>
            <label for="data_inicio">Data de Início:</label>
            <input type="date" id="data_inicio" name="data_inicio">
        </div>

        <div>
            <label for="data_termino">Data de Término:</label>
            <input type="date" id="data_termino" name="data_termino">
        </div>

        <div>
            <label for="statu">Status:</label>
            <select id="statu" name="statu" required>
                <option value="ativo">Ativo</option>
                <option value="inativo">Inativo</option>
            </select>
        </div>

        <button type="submit" name="submit">Salvar</button>
    </form>
</body>

</html>