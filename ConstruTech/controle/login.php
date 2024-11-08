<?php
session_start();

// print_r($_REQUEST);

if (isset($_POST['submit']) && !empty($_POST['usuario']) && !empty($_POST['senha'])) {
    // acessa
    include_once('conexao-bd.php');

    $usuario = $_POST['usuario'];  
    $senha = $_POST['senha'];

    $sql_cliente = "SELECT * FROM cliente WHERE (cpf = '$usuario' OR cnpj = '$usuario')";
    $result_cliente = $conexao->query($sql_cliente);

    // verifica se é um cliente
    if (mysqli_num_rows($result_cliente) > 0) {
        $row = $result_cliente->fetch_assoc();
        $senha_armazenada = $row['senha'];

        if (password_verify($senha, $senha_armazenada)) {
            $_SESSION['usuario'] = $usuario;
            $_SESSION['senha'] = $senha;

            // Aqui não precisamos mais de um campo $tipo_usuario, pois já sabemos que é um cliente
            header('Location: ../visao/pagUsuarios-cliente.php');
            exit();
        } else {
            echo "<script>alert('Senha incorreta');</script>";
        }
    } else {
        $sql_funcionario = "SELECT * FROM funcionario WHERE cpf = '$usuario'";
        $result_funcionario = $conexao->query($sql_funcionario);

        // verifica se é um funcionário
        if (mysqli_num_rows($result_funcionario) < 1) {
            unset($_SESSION['usuario']);
            unset($_SESSION['senha']);

            header('Location: login.php');
        } else {
            $row = $result_funcionario->fetch_assoc();
            $senha_armazenada = $row['senha'];

            if (password_verify($senha, $senha_armazenada)) {
                $_SESSION['usuario'] = $usuario;
                $_SESSION['senha'] = $senha;

                header('Location: listas/sistema-fornecedor.php');
            } else {
                echo "<script>alert('Senha incorreta');</script>";
            }
        }
    }
} else {
    header('Location: index.php');
}
?>
