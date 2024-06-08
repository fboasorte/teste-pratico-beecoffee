<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AtendimentoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'data_atendimento' => ['required', 'date'],
            'hora_inicio' => ['required'],
            'hora_fim' => ['required', 'after:hora_inicio'],
            'medico_id' => ['required', 'integer'],
            'paciente_id' => ['required', 'integer'],
        ];
    }
}
