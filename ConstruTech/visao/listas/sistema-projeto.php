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

$sql_projeto = "SELECT * FROM Projeto ORDER BY id ASC";

$result_projeto = $conexao->query($sql_projeto);

// print_r($result_projeto);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema Projeto</title>
    <link rel="stylesheet" href="../css/styleListas.css">
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
                    <th scope="col">Descrição</th>
                    <th scope="col">Data de inicio</th>
                    <th scope="col">Data de termino</th>
                    <th scope="col">Statu</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($user_data = mysqli_fetch_assoc($result_projeto)) {
                    echo "<tr>";
                        echo "<td>" . $user_data['id'] . "</td>";
                        echo "<td>" . $user_data['nome'] . "</td>";
                        echo "<td>" . $user_data['descricao'] . "</td>";
                        echo "<td>" . $user_data['data_inicio'] . "</td>";
                        echo "<td>" . $user_data['data_termino'] . "</td>";
                        echo "<td>" . $user_data['statu'] . "</td>";
                        echo "<td>
                            <a class='image' href='../update/edit-projeto.php?id=" . $user_data['id'] . "'>
                                <img src='../img/image-pencil.png' alt='Editar'>
                            </a>
                        </td>";
                        echo "<td>
                            <a class='image' href='.php'>
                                <img src='../img/image-lixeira.png' alt=''>
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