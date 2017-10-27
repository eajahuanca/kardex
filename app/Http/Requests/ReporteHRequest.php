<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReporteHRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(){
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(){
        return [
            'start' => 'required',
            'end' => 'required',
            'articulo' => 'required',
        ];
    }

    public function attributes(){
        return [
            'start' => 'Fecha Inicial',
            'end' => 'Fecha Final',
            'articulo' => 'Artículo',
        ];
    }
}
