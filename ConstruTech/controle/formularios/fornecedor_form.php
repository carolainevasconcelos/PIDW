<?php
include_once('../conexao-bd.php');

$nome = '';
$nome_fantasia = '';
$cnpj = '';
$email = '';
$telefone = '';
$endereco = '';

if (isset($_POST['submit'])) {
    $nome = $_POST['nome'];
    $nome_fantasia = $_POST['nome_fantasia'];
    $cnpj = $_POST['cnpj'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $endereco = $_POST['endereco'];

    $resultado = mysqli_query($conexao, "INSERT INTO fornecedor (nome, nome_fantasia, cnpj, email, telefone, endereco) VALUES ('$nome', '$nome_fantasia', '$cnpj', '$email', '$telefone', '$endereco')");

    if ($resultado) {
        echo "<script>alert('Cadastro realizado com sucesso!');</script>";
    } else {
        echo "<script>alert('Erro ao cadastrar: " . mysqli_error($conexao) . "');</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Fornecedor</title>
    <link rel="stylesheet" href="../../visao/css/formCadastro.css">
    <script src="../../visao/js/validarCampos.js" defer></script>
</head>

<body>
    <section class="section-fornecedor">
        <div class="form-container" id="div-fornecedor">
            <form action="" method="POST">
                <div class="titulo">
                    <img src="../../visao/img/ferramentas.png" alt="">
                    <h2>Cadastro de Fornecedor</h2>
                </div>
                <div class="input-group">
                    <label for="nome">Nome:</label>
                    <input type="text" id="nome" name="nome" required>
                </div>

                <div class="input-group">
                    <label for="nome_fantasia">Nome Fantasia:</label>
                    <input type="text" id="nome_fantasia" name="nome_fantasia" required>
                </div>

                <div class="input-group">
                    <label for="cnpj">CNPJ:</label>
                    <input type="text" id="cnpj" name="cnpj" required>
                </div>

                <div class="input-group">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" required>
                </div>

                <div class="input-group">
                    <label for="telefone">Telefone:</label>
                    <input type="text" id="telefone" name="telefone" required>
                </div>

                <div class="input-group">
                    <label for="endereco">Endereço:</label>
                    <input type="text" id="endereco" name="endereco" required>
                </div>

                <input type="submit" name="submit" value="Cadastrar" id="botao">
            </form>
        </div>
    </section>
</body>

</html>