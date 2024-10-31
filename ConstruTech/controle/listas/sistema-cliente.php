<?php
session_start();
include_once('../conexao-bd.php');

if ((!isset($_SESSION['usuario']) == true) and (!isset($_SESSION['senha']) == true)) {

    unset($_SESSION['usuario']);
    unset($_SESSION['senha']);

    header('Location: index.php');
}

$logado = $_SESSION['usuario'];

$sql_clientes = "SELECT * FROM Cliente ORDER BY id ASC";

$result_clientes = $conexao->query($sql_clientes);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema Cliente</title>
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
                    <th scope="col">Nome fantasia</th>
                    <th scope="col">CPF</th>
                    <th scope="col">CNPJ</th>
                    <th scope="col">Email</th>
                    <th scope="col">Telefone</th>
                    <th scope="col">Endereco</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($user_data = mysqli_fetch_assoc($result_clientes)) {
                    echo "<tr>";
                    echo "<td>" . $user_data['id'] . "</td>";
                    echo "<td>" . $user_data['nome'] . "</td>";
                    echo "<td>" . $user_data['nome_fantasia'] . "</td>";
                    echo "<td>" . $user_data['cpf'] . "</td>";
                    echo "<td>" . $user_data['cnpj'] . "</td>";
                    echo "<td>" . $user_data['email'] . "</td>";
                    echo "<td>" . $user_data['telefone'] . "</td>";
                    echo "<td>" . $user_data['endereco'] . "</td>";
                    echo "<td>
                        <a class='image' href='../update/edit-cliente.php?id=" . $user_data['id'] . "'>
                            <img src='../../visao/img/image-pencil.png' alt='Editar'>
                        </a>
                    </td>";
                    echo "<td>
                        <a class='image' href='../delete/delete-cliente.php?id=" . $user_data['id'] . "'>
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