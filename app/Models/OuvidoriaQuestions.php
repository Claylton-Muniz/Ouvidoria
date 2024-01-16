<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OuvidoriaQuestions extends Model
{
    protected $fillable = [
        'form_id',
        'tipo_question',
        'question'
    ];
}
