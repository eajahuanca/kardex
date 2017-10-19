<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class KardexinRequest extends FormRequest
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
            'mov_entrada' => 'required',
            'idarticulo' => 'required',
            'mov_obs' => 'required'
        ];
    }

    public function messages(){
        return [
            'mov_entrada.required' => 'El campo Cantidad es requerido',
            'idarticulo.required' => 'El campo Nombre de Artículo es requerido',
            'mov_obs.required' => 'El campo Observaciones es requerido'
        ];
    }
}
