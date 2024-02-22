<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OuvidoriaResponse extends Model
{
    protected $fillable = [
        'servidor',
        'entrevistado',
        'tipo_form',
        'data_nasc',
        'email',
        'telefone',
        'endereco',
        'sexo',
        'mensagem'
    ];
}
