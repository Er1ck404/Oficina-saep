<?php
namespace App\Controllers;
use App\Controllers\BaseController;
use App\Models\ClientesModel;
use App\Models\VeiculosModel;

// Vincula o Veiculo com seu respectivo Cliente (FK_CLI_ID)
class VeiculosController extends BaseController
{
    // Exibe a listagem de veiculo
    public function index()
    {
        // Instancia o Model de veiculo
        $model = new VeiculosModel();

        // Verifica se o formulário de pesquisa foi enviado
        if ($this->request->getPost('botao_pesquisar')) {

            // Recupera o texto digitado pelo usuário
            $pesquisar = $this->request->getPost('pesquisar');

            // Busca os veiculos juntamente com o nome do cliente
            // cliente por cada veiculo
            $dados['veiculos'] = $model
                ->select('VEICULOS.*, CLIENTES.CLI_NOME')

                // Relaciona VEICULOS com CLIENTES pela chave estrangeira
                ->join(
                    'CLIENTES',
                    'CLIENTES.CLI_ID = VEICULOS.FK_CLI_ID'
                )

                // Agrupa as condições da pesquisa
                ->groupStart()

                // Pesquisa pelo modelo
                ->like('VEI_MODELO', $pesquisar)

                // Pesquisa pela placa
                ->orLike('VEI_PLACA', $pesquisar)
                // Também permite pesquisar pelo nome do cliente
                ->orLike('CLIENTES.CLI_NOME', $pesquisar)

                ->groupEnd()

                // Executa a consulta
                ->findAll();
        } else {

            // Caso não exista pesquisa, busca todos os veiculos
            // juntamente com o nome dos respectivos clientes
            $dados['veiculos'] = $model
                ->select('VEICULOS.*, CLIENTES.CLI_NOME')
                ->join(
                    'CLIENTES',
                    'CLIENTES.CLI_ID = VEICULOS.FK_CLI_ID'
                )
                ->findAll();
        }

        // Carrega a View de veiculo
        return view('sistema/veiculos/index', $dados);
    }


    // Exibe o formulário para cadastrar um novo veiculo
    public function novo()
    {
        // Instancia o Model de cliente
        $clienteModel = new ClientesModel();

        // Busca todos os cliente cadastrados
        // Esses dados serão utilizados em um campo SELECT
        $dados['clientes'] = $clienteModel->findAll();

        // Carrega o formulário de cadastro do veículo
        return view('sistema/veiculos/novo_veiculo', $dados);
    }


    // Insere um novo veiculo
    public function inserir()
    {
        // Instancia o Model de veiculo
        $model = new VeiculosModel();

        // Recupera os dados enviados pelo formulário
        $dados = [
            'VEI_PLACA' => $this->request->getPost('placa'),
            'VEI_MARCA' => $this->request->getPost('marca'),
            'VEI_MODELO' => $this->request->getPost('modelo'),
            'VEI_ANO' => $this->request->getPost('ano'),

            // Guarda o ID do cliente escolhido no formulário
            // como chave estrangeira do veiculo
            'FK_CLI_ID' => $this->request->getPost('cliente')
        ];

        // Insere o veiculo no banco
        $model->insert($dados);

        // Redireciona para a listagem
        return redirect()
            ->to(base_url('veiculos'))
            ->with('success', 'Veiculo cadastrado com sucesso!');
    }


    // Exibe o formulário de edição
    public function editar($id)
    {
        // Instancia o Model de Veiculo
        $veiculoModel = new VeiculosModel();

        // Instancia o Model de cliente
        $clienteModel = new ClientesModel();

        // Busca o veiculo que será editado
        $dados['veiculo'] = $veiculoModel->find($id);

        // Busca todos os clientes para preencher o SELECT
        $dados['clientes'] = $clienteModel->findAll();

        // Carrega a View de edição
        return view('sistema/veiculos/editar_veiculo', $dados);
    }


    // Atualiza um veiculo
    public function atualizar($id)
    {
        // Instancia o Model
        $model = new VeiculosModel();

        // Recupera os novos dados do formulário
        $dados = [
            'VEI_PLACA' => $this->request->getPost('placa'),
            'VEI_MARCA' => $this->request->getPost('marca'),
            'VEI_MODELO' => $this->request->getPost('modelo'),
            'VEI_ANO' => $this->request->getPost('ano'),
            // Guarda o ID do cliente escolhido no formulário
            // como chave estrangeira do veiculo
            'FK_CLI_ID' => $this->request->getPost('cliente')
        ];

        // Atualiza o veiculo pelo ID
        $model->update($id, $dados);

        // Redireciona para a listagem
        return redirect()
            ->to(base_url('veiculos'))
            ->with('success', 'Veiculo atualizado com sucesso!');
    }


    // Exclui um veiculo
    public function excluir($id)
    {
        // Instancia o Model
        $model = new VeiculosModel();

        // Exclui o veículo pelo ID
        $model->delete($id);

        // Redireciona para a listagem
        return redirect()
            ->to(base_url('veiculos'))
            ->with('success', 'Veiculo excluído com sucesso!');
    }
}