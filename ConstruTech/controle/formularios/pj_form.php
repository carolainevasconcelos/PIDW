<?php
    include_once('../conexao-bd.php');

    $nome = '';
    $nome_fantasia = '';
    $cnpj = '';
    $email = '';
    $telefone = '';
    $endereco = '';

    if(isset($_POST['submit'])){
        $nome = $_POST['nome-pj'];
        $nome_fantasia = $_POST['nome_fantasia'];
        $cnpj = $_POST['cnpj'];
        $email = $_POST['email-pj'];
        $telefone = $_POST['telefone-pj'];
        $endereco = $_POST['endereco-pj'];
    }

    $resultado = mysqli_query($conexao, "INSERT INTO cliente (nome, nome_fantasia, cnpj, email, endereco, telefone) VALUES ('$nome', '$nome_fantasia', '$cnpj', '$email', '$telefone', '$endereco')");

    if ($resultado) {
        echo "<script>alert('Cadastro realizado com sucesso!');</script>";
    } else {
        echo "<script>alert('Erro ao cadastrar: " . mysqli_error($conexao) . "');</script>";
    }
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Pessoa Juridica</title>
    <link rel="stylesheet" href="../../visao/css/formCadastro.css">
    <script src="../../visao/js/validarCampos.js" defer></script> 
</head>

<body>
    <section class="section-pj">
        <div class="form-container" id="div-pj">

            <form action="" method="post">
                <div class="titulo">
                    <img src="../../visao/img/ferramentas.png" alt="">
                    <h1>Cadastrar Cliente Juridico</h1>
                </div>

                <div class="input-group">
                    <label for="nome">Nome:</label>
                    <input type="text" id="nome" name="nome-pj" required>
                </div>

                <div class="input-group">
                    <label for="nome-fantasia">Nome Fantasia:</label>
                    <input type="text" id="nome-fantasia" name="nome_fantasia" required>
                </div>

                <div class="input-group">
                    <label for="cnpj">CNPJ:</label>
                    <input type="text" id="cnpj" name="cnpj" required>
                </div>

                <div class="input-group">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email-pj" required>
                </div>

                <div class="input-group">
                    <label for="telefone">Telefone:</label>
                    <input type="text" id="telefone" name="telefone-pj" required>
                </div>

                <div class="input-group">
                    <label for="endereco">Endereço:</label>
                    <input type="text" id="endereco" name="endereco-pj" required>
                </div>

                <input type="submit" name="submit" value="Cadastrar" id="botao">
            </form>
        </div>
    </section>

</body>

</html>