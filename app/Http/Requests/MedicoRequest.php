<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MedicoRequest extends FormRequest
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
            'crm' => ['required', 'string', 'max:255', 'unique:medicos,crm,' . $this->medico],
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
            'nome.string' => 'O nome deve ser uma string.',
            'nome.max' => 'O nome não pode ter mais que 255 caracteres.',
            'crm.required' => 'O campo CRM é obrigatório.',
            'crm.string' => 'O CRM deve ser uma string.',
            'crm.max' => 'O CRM não pode ter mais que 255 caracteres.',
            'crm.unique' => 'Este CRM já está cadastrado.'
        ];
    }
}
