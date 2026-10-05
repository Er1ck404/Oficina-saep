<?php
namespace App\Models;
use CodeIgniter\Model;
class AgendamentosModel extends Model
{
    protected $table = 'AGENDAMENTOS';
    protected $primaryKey = 'AGE_ID';
    protected $allowedFields = [
        'AGE_DATA_HORA',
        'AGE_SERVICO',
        'AGE_STATUS',
        'FK_CLI_ID',
        'FK_VEI_ID'
    ];
}