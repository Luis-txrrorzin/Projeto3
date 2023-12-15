<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/login.css">
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
    <p><a href="../html/cadastrar.html">Cadastrar</a></p>
    <p><a href="">Esqueci minha senha</a></p>
</body>
</html>