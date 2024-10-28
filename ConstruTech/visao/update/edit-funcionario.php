<?php
if (!empty($_GET['id'])) {
    include_once('../conexao-bd.php');

    $id = $_GET['id'];

    $sqlSelect = "SELECT * FROM funcionario WHERE id=$id";

    $result_funcionario = $conexao->query($sqlSelect);

    if ($result_funcionario->num_rows > 0) {
        while ($user_data = mysqli_fetch_assoc($result_funcionario)) {
            $nome = $user_data['nome'];
            $cpf = $user_data['cpf'];
            $email = $user_data['email'];
            $telefone = $user_data['telefone'];
            $endereco = $user_data['endereco'];
            $data_admissao = $user_data['data_admissao'];
            $cargo = $user_data['cargo'];
            $setor = $user_data['setor'];
        }
    } else {
        header('Location: ../listas/sistema-funcionario.php');
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Funcionario</title>
    <link rel="stylesheet" href="../css/styleEdit.css">
</head>

<body>
    <form action="saveEdit-pp.php" method="POST">
        <h1>Editar Funcionario</h1>

        <div>
            <label for="nome">Nome:</label>
            <input type="text" value="<?php echo htmlspecialchars($nome); ?>" id="nome" name="nome" required>
        </div>
        
        <br>
        
        <div>
            <label for="cpf">CPF:</label>
            <input type="text" value="<?php echo htmlspecialchars($cpf); ?>" id="cpf" name="cpf" required>
        </div>
        
        <br>
        
        <div>
            <label for="email">Email:</label>
            <input type="email" value="<?php echo htmlspecialchars($email); ?>" id="email" name="email" required>
        </div>
        
        <br>
        
        <div>
            <label for="telefone">Telefone:</label>
            <input type="text" value="<?php echo htmlspecialchars($telefone); ?>" id="telefone" name="telefone">
        </div>
        
        <br>
        
        <div>
            <label for="endereco">Endereço:</label>
            <input type="text" value="<?php echo htmlspecialchars($endereco); ?>" id="endereco" name="endereco">
        </div>

        <br>

        <div>
            <label for="data_admissao">Data de Admissão:</label>
            <input type="date" value="<?php echo htmlspecialchars($data_admissao); ?>" id="data_admissao" name="data_admissao" required>
        </div>

        <br>

        <div>
            <label for="cargo">Cargo:</label>
            <input type="text" value="<?php echo htmlspecialchars($cargo); ?>" id="cargo" name="cargo" required>
        </div>

        <br>

        <div>
            <label for="setor">Setor:</label>
            <input type="text" value="<?php echo htmlspecialchars($setor); ?>" id="setor" name="setor" required>
        </div>

        <!-- Campo oculto para o ID do funcionario -->
        <input type="hidden" name="id" value="<?php echo htmlspecialchars($id); ?>">
        
        <input type="submit" name="update" id="submit" value="Salvar">
    </form>
    
    <div>
        <a href="../listas/sistema-funcionario.php">Voltar</a>
    </div>
</body>

</html>