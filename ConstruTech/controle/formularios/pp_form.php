<?php
    include_once('../conexao-bd.php');

    $nome = '';
    $cpf = '';
    $email = '';
    $telefone = '';
    $endereco = '';
    $data_admissao = '';
    $cargo = '';
    $setor = '';

    if(isset($_POST['submit'])){
        $nome = $_POST['nome-pp'];
        $cpf = $_POST['cpf-pp'];
        $email = $_POST['email-pp'];
        $telefone = $_POST['telefone-pp'];
        $endereco = $_POST['endereco-pp'];
        $data_admissao = $_POST['data_admissao'];
        $cargo = $_POST['cargo'];
        $setor = $_POST['setor'];
    }

    $resultado = mysqli_query($conexao, "INSERT INTO funcionario (nome, cpf, email, endereco, telefone, data_admissao, cargo, setor) VALUES ('$nome', '$cpf', '$email', '$telefone', '$endereco', NULLIF('$data_admissao', ''), '$cargo', '$setor')");

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
    <title>Cadastrar Funcionário</title>
    <link rel="stylesheet" href="../../visao/css/formCadastro.css">
    <script src="../../visao/js/validarCampos.js" defer></script> 
</head>

<body>
    <section class="section-pp">
        <div class="form-container" id="div-pp">
            <form action="" method="post">
                <div class="titulo">
                    <img src="../../visao/img/ferramentas.png" alt="">
                    <h1>Cadastrar Funcionario</h1>
                </div>
                <div class="input-group">
                    <label for="nome">Nome:</label>
                    <input type="text" id="nome" name="nome-pp" required>
                </div>

                <div class="input-group">
                    <label for="cpf">CPF:</label>
                    <input type="text" id="cpf" name="cpf-pp" required>
                </div>

                <div class="input-group">
                    <label for="endereco">Endereço:</label>
                    <input type="text" id="endereco" name="endereco-pp" required>
                </div>

                <div class="input-group">
                    <label for="telefone">Telefone:</label>
                    <input type="text" id="telefone" name="telefone-pp" required>
                </div>

                <div class="input-group">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email-pp" required>
                </div>

                <div class="input-group">
                    <label for="data_admissao">Data de admissão:</label>
                    <input type="date" name="data_admissao" id="data_admissao" required>
                </div>


                <div class="input-group">
                    <label for="cargo">Cargo:</label>
                    <input type="text" id="cargo" name="cargo" required>
                </div>

                <div class="input-group">
                    <label for="setor">Setor:</label>
                    <input type="text" id="setor" name="setor" required>
                </div>
                <input type="submit" name="submit" value="Cadastrar" id="botao">
        </div>
        </form>
        </div>
    </section>
</body>

</html>