<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PasswordRequest extends FormRequest
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
            'password_actual' => ['required','current_password'],
            'password' => ['required','min:6'],
            'password_confirm' => ['required','same:password'],
        ];
    }

    public function attributes(){
        return [
            'password_actual' => 'Contraseña Actual',
            'password' => 'Contraseña Nueva',
            'password_confirm' => 'Confirmar Contraseña'
        ];
    }

    public function messages(){
        return [
            'password_actual.current_password' => 'La Contraseña Actual no coincide',
            'password_confirm.same' => 'La Contraseña nueva no coincide',
        ];
    }

    public function sanitize()
    {
        return $this->only('password');
    }
}
