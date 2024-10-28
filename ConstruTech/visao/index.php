<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - ConstruTech</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="css/style-login.css">
    <script src="js/validarCampos.js" defer></script>
</head>

<body>
    <section>
        <div class="form-box">
            <div>
                <form action="login.php" method="post">
                    <div class="titulo">
                        <img src="img/ferramentas.png" alt="">
                        <h1>Login</h1>
                    </div>

                    <div class="inputbox">
                        <i class="fas fa-envelope"></i>
                        <input type="text" name="usuario" required>
                        <label for="">Usuário</label>
                    </div>
                    <div class="inputbox">
                        <i class="material-icons">lock</i>
                        <input type="password" name="senha" required>
                        <label for="">Senha</label>
                    </div>
                    <a href="#" class="link">Esqueceu sua senha?</a>
                    <input type="submit" class="button" name="submit" value="Entrar">
                    <a href="definirSenha.php" class="link" id="create-password">&#9872; Crie uma senha</a>
                </form>
            </div>
        </div>
    </section>
</body>

</html>