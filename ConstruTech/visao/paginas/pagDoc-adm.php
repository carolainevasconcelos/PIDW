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
                <li><a href="pagClientes-adm.php">Clientes</a></li>
                <li><a href="pagProjeto-adm.php">Projetos</a></li>
                <li><a href="pagFuncionario.php">Funcionario</a></li>
                <li><a href="../pagUsuarios-adm.php">Home</a></li>
                <li><a href="">Documentos</a></li>
                <li><a href="pagFinanceiro-adm.php">Financeiro</a></li>
                <li><a href="pagFornecedor-adm.php">Fornecedores</a></li>
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
        include('../../controle/listas/sistema-documento.php');
        ?>
    </main>

    <footer>
        <p>© ConstruTech - 2024</p>
    </footer>
</body>

</html>