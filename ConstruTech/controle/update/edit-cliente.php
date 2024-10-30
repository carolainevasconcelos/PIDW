<?php
if(!empty($_GET['id'])){
    include_once('../conexao-bd.php');

    $id = $_GET['id'];

    $sqlSelect = "SELECT * FROM cliente WHERE id=$id";

    $result_clientes = $conexao->query($sqlSelect);

    // print_r($result_clientes);

    if($result_clientes->num_rows > 0){
        while ($user_data = mysqli_fetch_assoc($result_clientes)){
            $nome = $user_data['nome'];
            $nome_fantasia = $user_data['nome_fantasia'];
            $cpf = $user_data['cpf'];
            $cnpj = $user_data['cnpj'];
            $email = $user_data['email'];
            $telefone = $user_data['telefone'];
            $endereco = $user_data['endereco'];
        }
    } else {
        header('Location: ../ listas/sistema-cliente.php');
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Cliente</title>
    <link rel="stylesheet" href="../../visao/css/styleEdit.css">
</head>

<body>
    <form action="saveEdit.php" method="POST">
        <h1>Editar Cliente</h1>
        
        <div>
            <label for="nome">Nome:</label>
            <input type="text" value="<?php echo $nome; ?>" id="nome" name="nome" required>
        </div>
        
        <br>
        
        <div>
            <label for="nome_fantasia">Nome Fantasia:</label>
            <input type="text" value="<?php echo $nome_fantasia; ?>" id="nome_fantasia" name="nome_fantasia">
        </div>
        
        <br>
        
        <div>
            <label for="cpf">CPF:</label>
            <input type="text" value="<?php echo $cpf; ?>" id="cpf" name="cpf">
        </div>
        
        <br>
        
        <div>
            <label for="cnpj">CNPJ:</label>
            <input type="text" value="<?php echo $cnpj; ?>" id="cnpj" name="cnpj">
        </div>
        
        <br>
        
        <div>
            <label for="email">Email:</label>
            <input type="email" value="<?php echo $email; ?>" id="email" name="email" required>
        </div>
        
        <br>
        
        <div>
            <label for="telefone">Telefone:</label>
            <input type="text" value="<?php echo $telefone; ?>" id="telefone" name="telefone">
        </div>
        
        <br>
        
        <div>
            <label for="endereco">Endereço:</label>
            <input type="text" value="<?php echo $endereco; ?>" id="endereco" name="endereco">
        </div>

        <br>

        <!-- Campo oculto para o ID do cliente -->
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        
        <input type="submit" name="update" id="submit" value="Salvar">
    </form>
    
    <div>
        <a href="../listas/sistema-cliente.php">Voltar</a>
    </div>
</body>

</html>