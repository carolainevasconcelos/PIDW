<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página Usuários</title>
    <link rel="stylesheet" href="../css/style-pagUsuarios.css">
</head>

<body>
    <header>
        <nav>
            <div class="logo">
                <img src="../img/ferramentas.png" alt="logo" id="logo">
                <p>ConstruTech</p>
            </div>
            <ul>
                <li><a href="../../controle/formularios/atividade_form.php">Atividade</a></li>
                <li><a href="">Cronograma</a></li>
                <li><a href="../pagUsuarios-colab.php">Home</a></li>
                <li><a href="../../controle/listas/sistema-estoque.php">Estoque</a></li>
                <li><a href="../../controle/listas/sistema-equipamento.php">Equipamentos</a></li>
            </ul>
            <div class="auth-profile">
                <div class="profile">
                    <img src="../img/profile-icon.png" alt="User Profile" class="profile-icon">
                </div>
                <a href="../../controle/sair.php" class="logout">Sair</a>
            </div>
        </nav>
    </header>

    <main>
        <?php
        include_once('../../controle/conexao-bd.php');
        include('../../controle/listas/sistema-atividade.php');
        ?>
    </main>

    <footer>
        <p>© ConstruTech - 2024</p>
    </footer>
</body>

</html>