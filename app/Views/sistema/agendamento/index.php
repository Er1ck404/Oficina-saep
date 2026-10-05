<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title>Lista de Agendamentos</title>
    </head>
    <body>
        <h1>Lista de Agendamentos</h1>

        <form method="POST" action="<?= base_url('agendamento') ?>">
            <input type="search" id="pesquisar" name="pesquisar" placeholder="Pesquisar...">
            <input type="submit" id="botao_pesquisar" name="botao_pesquisar" value="Filtrar">
        </form>

        <br>

        <table border="1">
            <tr>
                <th>Data e Hora</th>
                <th>Serviço</th>
                <th>Status</th>
                <th>Cliente</th>
                <th>Veiculo</th>
                <th>Editar</th>
                <th>Excluir</th>
            </tr>

            <?php foreach($agendamento as $age): ?>
                <tr>
                    <td><?= $age['AGE_DATA_HORA'] ?></td>
                    <td><?= $age['AGE_MOTIVO'] ?></td>
                    <td><?= $age['AGE_STATUS'] ?></td>
                    <td><?= $age['RES_NOME'] ?></td>
                    <td><?= $age['PAC_NOME'] ?></td>
                    <td><a href="<?= base_url('agendamento/editar/'.$age['AGE_ID']) ?>">Editar</a></td>
                    <td><a href="<?= base_url('agendamento/excluir/'.$age['AGE_ID']) ?>">Excluir</a></td>
                </tr>
            <?php endforeach; ?>
        </table>
        <br>
        <a href="<?= base_url('agendamento/novo') ?>"><button>Cadastrar Agendamento</button></a>
        <br><br>
        <a href="<?= base_url('inicio') ?>"><button>Voltar</button></a>
    </body>
</html>