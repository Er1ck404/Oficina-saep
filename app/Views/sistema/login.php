<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Login</title>
</head>

<body>
    <h1>Login</h1>
    <h2>Oficina Mecânica</h2>
    <form action="<?= base_url('login/autenticar') ?>" method="POST">
        <label>Email:</label><br>
        <input type="email" id="email" name="email" placeholder="Email..." required>
        <br><br>
        <label>Senha:</label><br>
        <input type="password" id="senha" name="senha" placeholder="Senha..." required>
        <br><br>
        <input type="submit" id="entrar" name="entrar" value="Entrar">
    </form>
    <?= session()->getFlashdata('erro_login') ?>
</body>

</html>