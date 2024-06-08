<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Atendimento extends Model
{
    protected $table = 'atendimentos';

    protected $fillable = [
        'data_atendimento',
        'hora_inicio',
        'hora_fim',
        'medico_id',
        'paciente_id',
    ];

    public function medico() {
        return $this->hasOne(Medico::class, 'id', 'medico_id');
    }

    public function paciente() {
        return $this->hasOne(Paciente::class, 'id', 'paciente_id');
    }
}
