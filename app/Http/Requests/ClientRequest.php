<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClientRequest extends FormRequest
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
        $rules = [
            'name' => 'required|min:3',
            'email' => 'required|email',
            'cpf' => 'required|min:14|unique:clients,cpf',
            'uf' => 'required',
            'number' => 'required|min:14',
            'birth_date' => 'required|date'
        ];

        if($this->uf === "SP") {
            $rules['rg'] = 'required';
        }

        if(!empty($this->rg)) {
            $rules['rg'] = 'unique:clients,rg';
        }

        return $rules;
    }


    public function messages()
    {
        return [
            'name.required' => 'O nome é obrigatório.',
            'name.min' => 'Seu nome deve ter pelo menos 3 letras!',
            'birth_date.required' => 'A data de nascimento é obrigatória.',
            'uf.required' => 'O campo UF é obrigatório.',
            'number.required' => 'O Celular é obrigatório.',
            'cpf.required' => 'O CPF é obrigatório.',
            'cpf.unique' => 'O CPF informado já encontra-se cadastrado em nossa base de dados!',
            'rg.unique' => 'O RG informado já encontra-se cadastrado em nossa base de dados!',
            'rg.required' => 'Para moradores de SP o campo RG é obrigaório!',
            'email.required' => 'O campo E-mail é obrigatório.',
            'email.email' => 'O E-mail informado parece não ser válido.'
        ];
    }
}
