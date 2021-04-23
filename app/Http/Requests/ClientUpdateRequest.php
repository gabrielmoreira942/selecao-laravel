<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ClientUpdateRequest extends FormRequest
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
            'cpf' => ['required', 'min:14', Rule::unique('clients', 'cpf')->ignore($this->segment(2))],
            'uf' => 'required',
            'number' => 'required|min:14',
            'birth_date' => 'required|date'
        ];

        if(!empty($this->rg)) {
            Rule::unique('clients', 'rg')->ignore($this->segment(2));
        }

        if($this->uf === "SP") {
            $rules['rg'] = 'required';
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
            'email.required' => 'O campo Email é obrigatório.',
            'email.email' => 'O E-mail informado parece não ser válido.'
        ];
    }
}
