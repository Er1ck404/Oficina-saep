<?php
namespace App\Models;
use CodeIgniter\Model;
class VeiculosModel extends Model
{
    protected $table = 'VEICULOS';
    protected $allowedFields = [
        'VEI_PLACA',
        'VEI_MARCA',
        'VEI_MODELO',
        'VEI_ANO',
        'FK_CLI_ID'
    ];
}
