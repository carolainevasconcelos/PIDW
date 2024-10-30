<?php
session_start();
include_once('../conexao-bd.php');

//print_r($_SESSION);

if ((!isset($_SESSION['usuario']) == true) and (!isset($_SESSION['senha']) == true)) {

    unset($_SESSION['usuario']);
    unset($_SESSION['senha']);

    header('Location: index.php');
}

$logado = $_SESSION['usuario'];

$sql_funcionario = "SELECT * FROM Funcionario ORDER BY id ASC";

$result_funcionario = $conexao->query($sql_funcionario);

// print_r($result_funcionario);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema Funcionario</title>
    <link rel="stylesheet" href="../../visao/css/styleListas.css">
</head>

<body>
    <div class="sair">
        <a href="../sair.php">Sair</a>
    </div>
    <h1>Acessou o sistema</h1>
    <div>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nome</th>
                    <th scope="col">CPF</th>
                    <th scope="col">Email</th>
                    <th scope="col">Telefone</th>
                    <th scope="col">Endereco</th>
                    <th scope="col">Data de admissão</th>
                    <th scope="col">Cargo</th>
                    <th scope="col">Setor</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($user_data = mysqli_fetch_assoc($result_funcionario)) {
                    echo "<tr>";
                        echo "<td>" . $user_data['id'] . "</td>";
                        echo "<td>" . $user_data['nome'] . "</td>";
                        echo "<td>" . $user_data['cpf'] . "</td>";
                        echo "<td>" . $user_data['email'] . "</td>";
                        echo "<td>" . $user_data['telefone'] . "</td>";
                        echo "<td>" . $user_data['endereco'] . "</td>";
                        echo "<td>" . $user_data['data_admissao'] . "</td>";
                        echo "<td>" . $user_data['cargo'] . "</td>";
                        echo "<td>" . $user_data['setor'] . "</td>";
                        echo "<td>
                            <a class='image' href='../update/edit-funcionario.php?id=" . $user_data['id'] . "'>
                                <img src='../../visao/img/image-pencil.png' alt='Editar'>
                            </a>
                        </td>";
                            echo "<td>
                            <a class='image' href='../delete/delete-funcionario.php?id=" . $user_data['id'] . "'>
                                <img src='../../visao/img/image-lixeira.png' alt='Deletar'>
                            </a>
                        </td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>