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
        return [
            'name' => 'required|min:3',
            'email' => 'required',
            'CPF' => 'required|min:14',
            'UF' => 'required',
            'number' => 'required|min:14',
            'birth_date' => 'required|date'
        ];
    }


    public function messages()
    {

        return [

            'name.required' => 'O nome é obrigatório.',
            'name.min' => 'Seu nome deve ter pelo menos 3 letras!',
            'birth_date.required' => 'A data de nascimento é obrigatória.',
            'UF.required' => 'O campo UF é obrigatório.',
            'number.required' => 'O Celular é obrigatório.',
            'CPF.required' => 'O CPF é obrigatório.',
            'email.required' => 'O campo Email é obrigatório.'
        ];

    }
}
