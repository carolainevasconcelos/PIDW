<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página Usuários</title>
    <link rel="stylesheet" href="../css/style-pagUsuarios.css">
    <link rel="stylesheet" href="../css/style-cadastro.css">
</head>

<body>
    <header>
        <nav>
            <div class="logo">
                <img src="../img/ferramentas.png" alt="logo" id="logo">
                <p>ConstruTech</p>
            </div>
            <ul>
                <li><a href="pagClientes-gestor.php">Clientes</a></li>
                <li><a href="pagProjeto-gestor.php">Projetos</a></li>
                <li><a href="pagFuncionario-gestor.php">Funcionário</a></li>
                <li><a href="pagCronograma-gestor.php">Cronograma</a></li>
                <li><a href="../pagUsuarios-gestor.php">Home</a></li>
                <li><a href="pagDoc-gestor.php">Documentos</a></li>
                <li><a href="">Financeiro</a></li>
                <li><a href="pagFornecedor-gestor.php">Fornecedores</a></li>
                <li><a href="">Cadastro</a></li>
            </ul>
            <div class="auth-profile">
                <div class="profile">
                    <img src="../img/profile-icon.png" alt="User Profile" class="profile-icon">
                </div>
                <a href="../../controle/sair.php" class="logout">Sair</a>
            </div>
        </nav>
    </header>

    <section class="cadastramento">
        <h1>Área de Cadastramento</h1>
        <div class="carousel-container">
            <div class="card-container">
                <div class="card">
                    <a href="../../controle/formularios/projeto_form.php">Projeto</a>
                </div>
                <div class="card">
                    <a href="../../controle/formularios/pj_form.php">Cliente PJ</a>
                </div>
                <div class="card">
                    <a href="../../controle/formularios/pf_form.php">Cliente PF</a>
                </div>
                <div class="card">
                    <a href="../../controle/formularios/financeiro_form.php">Financeiro</a>
                </div>
                <div class="card">
                    <a href="../../controle/formularios/pp_form.php">Funcionário</a>
                </div>
                <div class="card">
                    <a href="../../controle/formularios/fornecedor_form.php">Fornecedor</a>
                </div>
                <div class="card">
                    <a href="../../controle/formularios/documento_form.php">Documentos</a>
                </div>
                <div class="card">
                    <a href="../../controle/formularios/atividade_form.php">Atividade</a>
                </div>
            </div>
        </div>
    </section>

    <footer>
        <p>© ConstruTech - 2024</p>
    </footer>
</body>

</html>