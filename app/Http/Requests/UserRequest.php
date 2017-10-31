<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

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
        $user = $this->route('user');
        return [
            'us_nombre' => 'required|min:3',
            'us_paterno' => 'required|min:5',
            'us_materno' => 'required|min:5',
            'us_genero' => 'required',
            'email' => 'required|email|unique:users,email,'.$user.',email',
            'us_cuenta' => 'required|min:10|unique:users,us_cuenta,'.$user.',us_cuenta',
            'us_tipo' => 'required',
            'us_estado' => 'required',
            'us_obs' => 'required',
            'password' => 'required|min:7',
        ];
    }

    public function attributes(){
        return [
            'us_nombre' => 'Nombre',
            'us_paterno' => 'Ap. Paterno',
            'us_materno' => 'Ap. Materno',
            'us_genero' => 'Género',
            'email' => 'Correo Electrónico',
            'us_cuenta' => 'Cuenta de Usuario',
            'us_tipo' => 'Tipo de Usuario',
            'us_estado' => 'Estado',
            'us_obs' => 'Observaciones',
            'password' => 'Contraseña',
        ];
    }
}
