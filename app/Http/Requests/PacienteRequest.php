<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PacienteRequest extends FormRequest
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
            'nome' => ['required', 'string', 'max:255'],
            'cpf' => ['required', 'integer','digits:11', 'unique:pacientes,cpf,' . $this->paciente],
            'data_nascimento' => ['required', 'date'],
            'email' => ['required', 'string', 'max:255']
        ];
    }

    /**
     * Get the custom messages for validator errors.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'nome.required' => 'O campo nome é obrigatório.',
            'nome.max' => 'O nome não pode ter mais que 255 caracteres.',
            'cpf.integer' => 'O CPF deve possuir somente números.',
            'cpf.digits' => 'O CPF deve possuir 11 caracteres.',
            'cpf.required' => 'O campo CPF é obrigatório.',
            'cpf.unique' => 'Este CPF já está cadastrado.',
            'data_nascimento.required' => 'O campo data de nascimento é obrigatório.',
            'data_nascimento.date' => 'A data de nascimento deve ser uma data válida.',
            'email.required' => 'O campo email é obrigatório.',
            'email.max' => 'O email não pode ter mais que 255 caracteres.',
        ];
    }
}
