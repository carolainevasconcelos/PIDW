<?php
session_start();
include_once('../conexao-bd.php');

if ((!isset($_SESSION['usuario']) == true) and (!isset($_SESSION['senha']) == true)) {

    unset($_SESSION['usuario']);
    unset($_SESSION['senha']);

    header('Location: loginPag.php');
}

$logado = $_SESSION['usuario'];

$sql_projeto = "SELECT * FROM Estoque ORDER BY id ASC";

$result_projeto = $conexao->query($sql_projeto);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema Projeto</title>
    <link rel="stylesheet" href="../../visao/css/styleListas.css">
    <link rel="stylesheet" href="../../visao/css/style-pagUsuarios.css">
</head>

<body>
<header>
        <nav>
            <div class="logo">
                <img src="../../visao/img/ferramentas.png" alt="logo" id="logo">
                <p>ConstruTech</p>
            </div>
            <ul>
                <li><a href="../formularios/atividade_form.php">Atividade</a></li>
                <li><a href="../../visao/paginas/pagCronograma.php">Cronograma</a></li>
                <li><a href="../../visao/pagUsuarios-colab.php">Home</a></li>
                <li><a href="">Estoque</a></li>
                <li><a href="sistema-equipamento.php">Equipamentos</a></li>
            </ul>
            <div class="auth-profile">
                <div class="profile">
                    <img src="../../visao/img/profile-icon.png" alt="User Profile" class="profile-icon">
                </div>
                <a href="../sair.php" class="logout">Sair</a>
            </div>
        </nav>
    </header>
    <h1>Acessou o sistema</h1>
    <div>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Produto</th>
                    <th scope="col">Quantidade total</th>
                    <th scope="col">Movimentação</th>
                    <th scope="col">Projeto</th>
                    <th scope="col">Financeiro</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($user_data = mysqli_fetch_assoc($result_projeto)) {
                    echo "<tr>";
                        echo "<td>" . $user_data['id'] . "</td>";
                        echo "<td>" . $user_data['produto'] . "</td>";
                        echo "<td>" . $user_data['quantidade_total'] . "</td>";
                        echo "<td>" . $user_data['tipo_movimentacao'] . "</td>";
                        echo "<td>" . $user_data['projeto_id'] . "</td>";
                        echo "<td>" . $user_data['financeiro_id'] . "</td>";
                        echo "<td>
                            <a class='image' href='../update/edit-estoque.php?id=" . $user_data['id'] . "'>
                                <img src='../../visao/img/image-pencil.png' alt='Editar'>
                            </a>
                        </td>";
                            echo "<td>
                            <a class='image' href='../delete/delete-estoque.php?id=" . $user_data['id'] . "'>
                                <img src='../../visao/img/image-lixeira.png' alt='Deletar'>
                            </a>
                        </td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
    <footer>
        <p>© ConstruTech - 2024</p>
    </footer>
</body>
</html>