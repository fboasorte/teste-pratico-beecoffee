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
            'hora_inicio' => ['required', 'date_format:H:i'],
            'hora_fim' => ['required', 'date_format:H:i', 'after:hora_inicio'],
            'medico_id' => ['required', 'integer'],
            'paciente_id' => ['required', 'integer'],
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'data_atendimento.required' => 'A data do atendimento é obrigatória.',
            'data_atendimento.date' => 'A data do atendimento deve ser uma data válida.',
            'hora_inicio.required' => 'A hora de início é obrigatória.',
            'hora_inicio.date_format' => 'A hora de início deve estar no formato HH:MM.',
            'hora_fim.required' => 'A hora de término é obrigatória.',
            'hora_fim.date_format' => 'A hora de término deve estar no formato HH:MM.',
            'hora_fim.after' => 'A hora de término deve ser depois da hora de início.',
            'medico_id.required' => 'O campo médico é obrigatório.',
            'paciente_id.required' => 'O campo paciente é obrigatório.',
        ];
    }
}
