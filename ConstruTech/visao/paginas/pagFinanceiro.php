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

$sql_projeto = "SELECT * FROM Financeiro WHERE id = '$usuario_id' ORDER BY id ASC";
$result_projeto = $conexao->query($sql_projeto);
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagina Financeiro - Cliente</title>
    <link rel="stylesheet" href="../css/stylePaginas.css">
</head>

<body>
    <header>
        <nav>
            <div class="logo">
                <img src="../img/ferramentas.png" alt="logo" id="logo">
                <p>ConstruTech</p>
            </div>
            <ul>
                <li><a href="pagProjeto.php">Projetos</a></li>
                <li><a href="../pagUsuarios-cliente.php">Home</a></li>
                <li><a href="">Financeiro</a></li>
                <li><a href="atendimento.php">Atendimento</a></li>
            </ul>
            <div class="auth-profile">
                <a href="../../controle/sair.php" class="logout">Sair</a>
            </div>
        </nav>
    </header>

    <div>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Valor do pagamento</th>
                    <th scope="col">Descrição</th>
                    <th scope="col">Data</th>
                </tr>
            </thead>
            <tbody>
            <?php
                // Agora estamos usando a variável correta $result_projeto
                while ($user_data = mysqli_fetch_assoc($result_projeto)) {
                    echo "<tr>";
                        echo "<td>" . number_format($user_data['valor'], 2, ',', '.') . "</td>"; 
                        echo "<td>" . $user_data['descricao'] . "</td>";
                        echo "<td>" . date('d/m/Y', strtotime($user_data['data'])) . "</td>"; 
                        echo "<td>" . $user_data['projeto_id'] . "</td>";
                        echo "<td>" . $user_data['fornecedor_id'] . "</td>";
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
