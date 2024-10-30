<?php
    include_once('../conexao-bd.php');

    $nome = '';
    $cpf = '';
    $email = '';
    $telefone = '';
    $endereco = '';

    if(isset($_POST['submit'])){
        $nome = $_POST['nome-pf'];
        $cpf = $_POST['cpf-pf'];
        $email = $_POST['email-pf'];
        $telefone = $_POST['telefone-pf'];
        $endereco = $_POST['endereco-pf'];
    }

    $resultado = mysqli_query($conexao, "INSERT INTO cliente (nome, cpf, email, endereco, telefone) VALUES ('$nome', '$cpf', '$email', '$telefone', '$endereco')");

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
    <title>Cadastrar Pessoa Física</title>
    <link rel="stylesheet" href="../../visao/css/formCadastro.css">
    <script src="../../visao/js/validarCampos.js" defer></script> 
</head>

<body>
    <section class="section-pf">
        <div class="form-container" id="div-pf">
            <form action="" method="post">
                <div class="titulo">
                    <img src="../../visao/img/ferramentas.png" alt="">
                    <h1>Cadastrar Cliente</h1>
                </div>

                <div class="input-group">
                    <label for="nome">Nome:</label>
                    <input type="text" id="nome" name="nome-pf" required>
                </div>

                <div class="input-group">
                    <label for="cpf">CPF:</label>
                    <input type="text" id="cpf" name="cpf-pf" required>
                </div>

                <div class="input-group">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email-pf" required>
                </div>

                <div class="input-group">
                    <label for="telefone">Telefone:</label>
                    <input type="text" id="telefone" name="telefone-pf" required>
                </div>


                <div class="input-group">
                    <label for="endereco">Endereço:</label>
                    <input type="text" id="endereco" name="endereco-pf" required>
                </div>

                <input type="submit" name="submit" value="Cadastrar" id="botao">
            </form>
        </div>
    </section>
</body>

</html>