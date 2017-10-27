<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArticuloRequest extends FormRequest
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
        $articulo = $this->route('articulo');
        return [
            'art_codigo' => 'required|min:7|unique:articulos,art_codigo,'.$articulo.'art_codigo',
            'art_descripcion' => 'required|min:20|unique:articulos,art_descripcion,'.$articulo.'art_descripcion',
        ];
    }

    public function attributes(){
        return [
            'art_codigo' => 'Código de Artículo',
            'art_descripcion' => 'Descripción'
        ];
    }
}
