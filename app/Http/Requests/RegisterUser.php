<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterUser extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'string|max:100|min:3',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|string',
        ];
    }

    public function messages(){
        return [
            'name.string'=> 'El nombre solo debe contener caracteres de texto',
            'name.min:3'=> 'EL nombre debe tener como minimo 3 caracteres',
            'name.max:100'=> 'el nombre deberia tener maximo 100 caracteres',

            'email.required'=> 'eL el email es obligatorio',
            'email.email'=> ' el email no es valido',
            'email.unique'=> 'el email ya esta registrado',

            'password.required'=> 'La contraseña es obligatoria',
            'password.min:6' => 'la contraseña debe tener minimo 6 caracteres'
        ];
    }
}
