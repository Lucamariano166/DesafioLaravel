<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Manutencoes extends Model
{
    use HasFactory;
    protected $fillable = ['id_usuario', 'id_veiculo', 'tipo_de_manutencao', 'descricao','data_para_manutencao'];
    protected $table = "manutencoes";
}

