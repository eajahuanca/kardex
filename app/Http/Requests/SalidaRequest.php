<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SalidaRequest extends FormRequest
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
            'mov_factura' => 'required',
            'idhcliente' => 'required'
        ];
    }

    public function messages(){
        return [
            'mov_factura.required' => 'El campo Nro. de Factura es requerido',
            'idhcliente.required' => 'El campo Nombre de Cliente es requerido',
        ];
    }
}
