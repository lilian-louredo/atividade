<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CadastrosFormRequest extends FormRequest
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
            'nome' => 'required|min:3',
            'cpf' => 'required|min:11',
            'data_nascimento' => 'required',
            'email' => 'required',
            'telefone' => 'required',
            'logradouro' => 'required',
            'cidade' => 'required',
            'estado' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'required' => 'O campo :attribute é obrigatório',
            'nome.min' => 'O campo nome precisa ter pelo menos 2 caracteres',
            'cpf.min' => 'O campo cpf precisa ter pelo menos 11 caracteres numéricos',
        ];
    }
}
