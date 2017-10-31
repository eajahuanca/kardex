<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProveedorRequest extends FormRequest
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
        $pro = $this->route('proveedor');
        return [
            'pro_codigo' => 'required|min:4|unique:proveedores,pro_codigo,'.$pro.',pro_codigo',
            'pro_nombre' => 'required|min:8|unique:proveedores,pro_nombre,'.$pro.',pro_nombre',
            'pro_estado' => 'required'
        ];
    }

    public function attributes(){
        return[
            'pro_codigo' => 'Código',
            'pro_nombre' => 'Nombre del Proveedor',
            'pro_estado' => 'Estado'
        ];
    }
}
