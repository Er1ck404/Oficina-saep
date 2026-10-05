<?php
namespace App\Models;
use CodeIgniter\Model;
class UsuariosModel extends Model
{
    protected $table = 'USUARIOS';
    protected $primaryKey = 'USU_ID';
    protected $allowedFields = [
        'USU_NOME',
        'USU_EMAIL',
        'USU_SENHA'
    ];
}