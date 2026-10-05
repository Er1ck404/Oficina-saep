<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title>Editar Agendamento</title>
    </head>
    <body>
        <h1>Editar Agendamento</h1>

        <form action="<?= base_url('agendamento/atualizar/'.$agendamento['AGE_ID']) ?>" method="POST">
            <label>Data e Hora:</label><br>
            <input type="datetime-local" id="data_hora" name="data_hora" value="<?= date('Y-m-d\TH:i', strtotime($agendamento['AGE_DATA_HORA'])) ?>" required>
            <br><br>

            <label>Motivo:</label><br>
            <input type="text" id="motivo" name="motivo" value="<?= $agendamento['AGE_MOTIVO'] ?>" required>
            <br><br>

            <label>Status:</label><br>
            <input type="text" id="status" name="status" value="<?= $agendamento['AGE_STATUS'] ?>" required>
            <br><br>

            <label>Responsável:</label><br>
            <select id="responsavel" name="responsavel" required>
                <?php foreach($responsavel as $res): ?>
                    <option value="<?= $res['RES_ID'] ?>"
                        <?= $res['RES_ID'] == $agendamento['FK_RES_ID'] ? 'selected' : '' ?>>
                        <?= $res['RES_NOME'] ?>
                    </option>
                <?php endforeach; ?>
            </select>
            <br><br>

            <label>Paciente:</label><br>
            <select id="paciente" name="paciente" required>
                <?php foreach($paciente as $pac): ?>
                    <option value="<?= $pac['PAC_ID'] ?>"
                        <?= $pac['PAC_ID'] == $agendamento['FK_PAC_ID'] ? 'selected' : '' ?>>
                        <?= $pac['PAC_NOME'] ?>
                    </option>
                <?php endforeach; ?>
            </select>
            <br><br>

            <input type="submit" id="editar_agendamento" name="editar_agendamento" value="Salvar Alterações">
        </form>
        <br>
        <a href="<?= base_url('agendamento') ?>"><button>Voltar</button></a>
    </body>
</html>