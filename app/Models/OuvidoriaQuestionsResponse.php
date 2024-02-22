<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OuvidoriaQuestionsResponse extends Model
{
    protected $fillable = [
        'response_id',
        'n_question',
        'info',
        'comment'
    ];
}
