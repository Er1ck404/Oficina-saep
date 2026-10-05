<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Novo Veiculo</title>
</head>

<body>
    <h1>Novo Veiculo</h1>
    <form action="<?= base_url('veiculos/inserir') ?>" method="POST">
        <label>Placa:</label><br>
        <input type="text" id="placa" name="placa" placeholder="Placa..." required>
        <br><br>
        <label>Marca:</label><br>
        <input type="text" id="marca" name="marca" placeholder="Marca..." required>
        <br><br>
        <label>Modelo:</label><br>
        <input type="text" id="modelo" name="modelo" placeholder="Modelo..." required>
        <br><br>
        <label>Ano:</label><br>
        <input type="text" id="ano" name="ano" placeholder="Ano..." required>
        <br><br>
        <label>Cliente:</label><br>
        <select name="cliente" id="cliente" required>
            <option value="">Selecione um cliente</option>
            <?php foreach ($clientes as $cliente): ?>
                <option value="<?= $cliente['CLI_ID'] ?>">
                    <?= $cliente['CLI_NOME'] ?>
                </option>
            <?php endforeach; ?>
        </select>
        <br><br>
        <input type="submit" id="cadastrar_veiculo" name="cadastrar_veiculo" value="Cadastrar">
    </form>
    <br>
    <a href="<?= base_url('veiculos') ?>"><button>Voltar</button></a>
</body>

</html>