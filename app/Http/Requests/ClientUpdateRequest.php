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
            'mobile' => 'required|min:14|max:15',
            'phone' => 'required|min:14|max:15',
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
            'mobile.required' => 'O Celular é obrigatório.',
            'mobile.min' => 'O Celular informado parece ser inválido',
            'mobile.max' => 'O Celular informado parece ser inválido',
            'phone.required' => 'O Telefone é obrigatório.',
            'phone.min' => 'O Telefone informado parece ser inválido',
            'phone.max' => 'O Telefone informado parece ser inválido',
            'cpf.required' => 'O CPF é obrigatório.',
            'cpf.unique' => 'O CPF informado já encontra-se cadastrado em nossa base de dados!',
            'rg.unique' => 'O RG informado já encontra-se cadastrado em nossa base de dados!',
            'rg.required' => 'Para moradores de SP o campo RG é obrigaório!',
            'email.required' => 'O campo Email é obrigatório.',
            'email.email' => 'O E-mail informado parece não ser válido.'
        ];
    }
}
