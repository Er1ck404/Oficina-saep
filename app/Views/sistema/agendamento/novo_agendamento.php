<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title>Novo Agendamento</title>
    </head>
    <body>
        <h1>Novo Agendamento</h1>

        <form action="<?= base_url('agendamento/inserir') ?>" method="POST">
            <label>Data e Hora:</label><br>
            <input type="datetime-local" id="data_hora" name="data_hora" required>
            <br><br>

            <label>Motivo:</label><br>
            <input type="text" id="motivo" name="motivo" placeholder="Motivo..." required>
            <br><br>

            <label>Status:</label><br>
            <input type="text" id="status" name="status" placeholder="Status..." required>
            <br><br>

            <label>Responsável:</label><br>
            <select id="responsavel" name="responsavel" required>
                <option value="">Selecione um responsavel</option>
                <?php foreach($responsavel as $res): ?>
                    <option value="<?= $res['RES_ID'] ?>">
                        <?= $res['RES_NOME'] ?>
                    </option>
                <?php endforeach; ?>
            </select>
            <br><br>

            <label>Paciente:</label><br>
            <select id="paciente" name="paciente" required>
                <option value="">Selecione um paciente</option>
                <?php foreach($paciente as $pac): ?>
                    <option value="<?= $pac['PAC_ID'] ?>">
                        <?= $pac['PAC_NOME'] ?>
                    </option>
                <?php endforeach; ?>
            </select>
            <br><br>

            <input type="submit" id="cadastrar_agendamento" name="cadastrar_agendamento" value="Cadastrar">
        </form>
        <br>
        <a href="<?= base_url('agendamento') ?>"><button>Voltar</button></a>
    </body>
</html>