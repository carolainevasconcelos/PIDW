<?php
session_start();
include_once('../../controle/conexao-bd.php');

if ((!isset($_SESSION['usuario']) == true) and (!isset($_SESSION['senha']) == true)) {
    unset($_SESSION['usuario']);
    unset($_SESSION['senha']);
    header('Location: ../loginPag.php');
    exit;
}

$usuario_id = $_SESSION['usuario'];

$sql_projeto = "SELECT * FROM Projeto WHERE id = '$usuario_id' ORDER BY id ASC";
$result_projeto = $conexao->query($sql_projeto);
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/style-pagUsuarios.css">
    <link rel="stylesheet" href="../css/styleListas.css">
</head>

<body>
    <header>
        <nav>
            <div class="logo">
                <img src="../img/ferramentas.png" alt="logo" id="logo">
                <p>ConstruTech</p>
            </div>
            <ul>
                <li><a href="">Projetos</a></li>
                <li><a href="../pagUsuarios-cliente.php">Home</a></li>
                <li><a href="pagFinanceiro.php">Financeiro</a></li>
                <li><a href="">Atendimento</a></li>
            </ul>
            <div class="auth-profile">
                <div class="profile">
                    <img src="../img/profile-icon.png" alt="User Profile" class="profile-icon">
                </div>
                <a href="../../controle/sair.php" class="logout">Sair</a>
            </div>
        </nav>
    </header>

    <div>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Nome do Projeto</th>
                    <th scope="col">Descrição</th>
                    <th scope="col">Data de inicio</th>
                    <th scope="col">Data de termino</th>
                    <th scope="col">Status</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($user_data = mysqli_fetch_assoc($result_projeto)) {
                    echo "<tr>";
                    echo "<td>" . $user_data['nome'] . "</td>";
                    echo "<td>" . $user_data['descricao'] . "</td>";
                    echo "<td>" . $user_data['data_inicio'] . "</td>";
                    echo "<td>" . $user_data['data_termino'] . "</td>";
                    echo "<td>" . $user_data['statu'] . "</td>";
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