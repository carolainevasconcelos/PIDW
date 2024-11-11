<?php
session_start();

// print_r($_REQUEST);

if (isset($_POST['submit']) && !empty($_POST['usuario']) && !empty($_POST['senha'])) {
    // Acessa o banco
    include_once('conexao-bd.php');

    $usuario = $_POST['usuario'];
    $senha = $_POST['senha'];

    // Verifica se é um cliente
    $sql_cliente = "SELECT * FROM cliente WHERE (cpf = '$usuario' OR cnpj = '$usuario')";
    $result_cliente = $conexao->query($sql_cliente);

    if (mysqli_num_rows($result_cliente) > 0) {
        // Se for um cliente
        $row = $result_cliente->fetch_assoc();
        $senha_armazenada = $row['senha'];

        if (password_verify($senha, $senha_armazenada)) {
            // Cria sessão e redireciona para a página do cliente
            $_SESSION['usuario'] = $usuario;
            $_SESSION['senha'] = $senha;
            header('Location: ../visao/pagUsuarios-cliente.php');
            exit();
        } else {
            echo "<script>alert('Senha incorreta');</script>";
        }
    } else {
        // verifica se é um funcionário
        $sql_funcionario = "SELECT * FROM funcionario WHERE cpf = '$usuario'";
        $result_funcionario = $conexao->query($sql_funcionario);

        if (mysqli_num_rows($result_funcionario) > 0) {
            // Se for um funcionário
            $row = $result_funcionario->fetch_assoc();
            $senha_armazenada = $row['senha'];
            $setor = $row['setor']; // Recupera o setor do funcionário

            if (password_verify($senha, $senha_armazenada)) {
                // Cria sessão e redireciona para a página de acordo com o setor do funcionário
                $_SESSION['usuario'] = $usuario;
                $_SESSION['senha'] = $senha;

                if ($setor == 'administrativo') {
                    header('Location: ../visao/pagUsuarios-adm.php');
                } elseif ($setor == 'colaborativo') {
                    header('Location: ../visao/pagUsuarios-colab.php');
                } elseif ($setor == 'gestao') {
                    header('Location: ../visao/pagUsuarios-gestor.php');
                }
                exit();
            } else {
                echo "<script>alert('Senha incorreta');</script>";
            }
        } else {
            echo "<script>alert('Usuário não encontrado');</script>";
        }
    }
} else {
    header('Location: index.php');
}
?>