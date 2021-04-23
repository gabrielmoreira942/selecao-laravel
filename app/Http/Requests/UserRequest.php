<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserRequest extends FormRequest
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
        $user = auth()->user();

        $rules = [
            'name' => 'required',
            'email' => [
                'required', 'email', Rule::unique('users', 'email')->ignore($user->id)
            ]
        ];

        if(!empty($this->password)) {
            $rules['password'] = 'min:8|confirmed';
        }

        return $rules;
    }

    public function messages()
    {
        return [
            'name.required' => 'Você esqueceu de informar o seu nome!',
            'email.required' => 'Você esqueceu de informar o seu e-mail!',
            'email.email' => 'O e-mail informado parece não ser válido!',
            'email.unique' => 'O e-mail informado já encontra-se cadastrado em nosso sistema!',
            'password.confirmed' => 'A senha informada não foi confirmada!',
            'password.min' => 'A senha deve ter ao menos 8 digitos!'
        ];
    }
}
