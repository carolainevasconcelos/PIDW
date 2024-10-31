<?php
session_start();
include_once('../conexao-bd.php');

if ((!isset($_SESSION['usuario']) == true) and (!isset($_SESSION['senha']) == true)) {
    unset($_SESSION['usuario']);
    unset($_SESSION['senha']);
    header('Location: index.php');
}

$logado = $_SESSION['usuario'];

$sql_documentos = "SELECT * FROM Documentos ORDER BY id ASC"; 

$result_documentos = $conexao->query($sql_documentos);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema</title>
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
                    <th scope="col">Tipo</th>
                    <th scope="col">Descrição</th>
                    <th scope="col">Data Geração</th>
                    <th scope="col">Data Emissão</th>
                    <th scope="col">Arquivo</th>
                    <th scope="col">Projeto ID</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($user_data = mysqli_fetch_assoc($result_documentos)) { 
                    echo "<tr>";
                    echo "<td>" . $user_data['id'] . "</td>";
                    echo "<td>" . $user_data['tipo_documento'] . "</td>"; 
                    echo "<td>" . $user_data['descricao'] . "</td>"; 
                    echo "<td>" . $user_data['data_geracao'] . "</td>"; 
                    echo "<td>" . $user_data['data_emissao'] . "</td>"; 
                    echo "<td>" . $user_data['arquivo'] . "</td>"; 
                    echo "<td>" . $user_data['projeto_id'] . "</td>"; 
                    echo "<td>
                        <a class='image' href='../update/edit-documento.php?id=" . $user_data['id'] . "'>
                            <img src='../../visao/img/image-pencil.png' alt='Editar'>
                        </a>
                        <a class='image' href='../delete/delete-documento.php?id=" . $user_data['id'] . "'>
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