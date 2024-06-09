<?php

namespace App\Http\Requests;

use App\Atendimento;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Validator;

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
            'medico_id' => ['required', 'string', 'exists:medicos,id'],
            'paciente_id' => ['required', 'integer', 'exists:pacientes,id'],
        ];
    }


    public function withValidator(Validator $validator)
    {
        $validator->after(function ($validator) {
            $medicoOcupado = Atendimento::where('medico_id', $this->medico_id)
                ->where('data_atendimento', $this->data_atendimento)
                ->where('id', '!=', $this->atendimento)
                ->where(function ($query) {
                    $query->whereBetween('hora_inicio', [$this->hora_inicio, $this->hora_fim])
                        ->orWhereBetween('hora_fim', [$this->hora_inicio, $this->hora_fim])
                        ->orWhere(function ($query) {
                            $query->where('hora_inicio', '<', $this->hora_inicio)
                                ->where('hora_fim', '>', $this->hora_fim);
                        });
                })
                ->exists();

            if ($medicoOcupado) {
                $validator->errors()->add('medico_id', 'Este médico já está ocupado nesse horário.');
            }

            $pacienteOcupado = Atendimento::where('paciente_id', $this->paciente_id)
                ->where('data_atendimento', $this->data_atendimento)
                ->where('id', '!=', $this->atendimento)
                ->where(function ($query) {
                    $query->whereBetween('hora_inicio', [$this->hora_inicio, $this->hora_fim])
                        ->orWhereBetween('hora_fim', [$this->hora_inicio, $this->hora_fim])
                        ->orWhere(function ($query) {
                            $query->where('hora_inicio', '<', $this->hora_inicio)
                                ->where('hora_fim', '>', $this->hora_fim);
                        });
                })
                ->exists();

            if ($pacienteOcupado) {
                $validator->errors()->add('paciente_id', 'Este paciente já está ocupado nesse horário.');
            }
        });
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
