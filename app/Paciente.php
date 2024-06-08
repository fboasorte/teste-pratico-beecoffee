<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
    protected $table = 'pacientes';

    protected $fillable = [
        'nome',
        'cpf',
        'data_nascimento',
        'email'
    ];
}
