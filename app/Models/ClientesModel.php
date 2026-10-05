<?php
namespace App\Models;
use CodeIgniter\Model;
class ClientesModel extends Model
{
    protected $table = 'CLIENTES';
    protected $primaryKey = 'CLI_ID';
    protected $allowedFields = [
        'CLI_NOME',
        'CLI_CPF',
        'CLI_TELEFONE'
    ];
}