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
                <li><a href="cadastroColab.php">Cadastro</a></li>
                <li><a href="">Cronograma</a></li>
                <li><a href="../pagUsuarios-colab.php">Home</a></li>
                <li><a href="../../controle/listas/sistema-estoque.php">Estoque</a></li>
                <li><a href="../../controle/listas/sistema-equipamento.php">Equipamentos</a></li>
            </ul>
            <div class="auth-profile">
                <div class="profile">
                    <img src="../img/notificacao.png" class="profile-icon" alt="" id="notificacao-icon">
                    <div class="notificacoes-dropdown" id="notificacoes-dropdown" style="display: none;">
                        <ul id="notificacoes-list"></ul>
                    </div>
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
    <script>
        document.getElementById('notificacao-icon').addEventListener('click', function () {
            const dropdown = document.getElementById('notificacoes-dropdown');
            dropdown.style.display = dropdown.style.display === 'none' ? 'block' : 'none';

            // Faz uma requisição para buscar notificações
            fetch('../../controle/notificacoes.php')
                .then(response => response.json())
                .then(data => {
                    const notificacoesList = document.getElementById('notificacoes-list');
                    notificacoesList.innerHTML = '';

                    if (data.length > 0) {
                        data.forEach(notificacao => {
                            const li = document.createElement('li');
                            li.textContent = notificacao.mensagem;
                            notificacoesList.appendChild(li);
                        });
                    } else {
                        notificacoesList.innerHTML = '<li>Sem notificações</li>';
                    }
                });
        });
    </script>

</body>

</html>