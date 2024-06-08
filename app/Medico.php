<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Medico extends Model
{
    protected $table = 'medicos';

    protected $fillable = [
        'nome',
        'crm',
    ];

    /**
     * Especialidades do medico.
     */
    public function especialidades()
    {
        return $this->BelongsToMany(Especialidade::class, 'especialidade_medicos', 'medico_id', 'especialidade_id');
    }
}
