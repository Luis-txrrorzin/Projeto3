<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/login.css">
    <script src="https://apis.google.com/js/platform.js" async defer></script>
    <meta name="google-signin-client_id" content="SEU_ID_DO_CLIENTE">
    <title>Login</title>
</head>
<body>
    <h2>LOGIN</h2>
    <form action="../php/login.php" method="post">
        <label for="email">Email:</label>
        <input type="email" name="email" required>
        <br>
        <label for="senha">Senha:</label>
        <input type="password" name="senha" required>
        <br>
        <button type="submit">ENTRAR</button>
    </form>
    <p><a href="../Front/cadastrar.php">Cadastrar</a></p>
    <!--<div class="g-signin2" data-onsuccess="onSignIn"></div>-->
</body>
</html>