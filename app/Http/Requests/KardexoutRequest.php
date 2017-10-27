<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class KardexoutRequest extends FormRequest
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
            'mov_salida' => 'required|numeric',
            'idarticulo' => 'required',
        ];
    }

    public function attributes(){
        return [
            'mov_salida' => 'Cantidad',
            'idarticulo' => 'Nombre de Artículo',
        ];
    }
}
