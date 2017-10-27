<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClienteHRequest extends FormRequest
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
        $nombreCliente = $this->route('hcliente');
        return [
            'cli_nombre' => 'required|min:5|unique:hclientes,cli_nombre,'.$nombreCliente.'cli_nombre',
            'cli_ci' => 'required',
            'cli_nit' => 'required',
            'cli_direccion' => 'required',
            'cli_contacto' => 'required'
        ];
    }

    public function attributes(){
        return [
            'cli_ci' => 'Carnet de Identidad',
            'cli_nombre' => 'Nombre del Cliente',
            'cli_nit' => 'NIT',
            'cli_direccion' => 'Dirección',
            'cli_contacto' => 'Contacto',
        ];
    }
}
