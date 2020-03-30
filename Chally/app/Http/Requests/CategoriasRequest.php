<?php

namespace App\Http\Requests;

use App\Rules\categoriaSeleccionada;
use App\Rules\nestLimite;
use App\Rules\soloUnHijo;
use Illuminate\Foundation\Http\FormRequest;

class CategoriasRequest extends FormRequest
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
            'nuevaCategoria' => 'unique:categorias,nombre'
        ];
    }

    public function messages()
    {
        return [
            'unique' => "El campo categoria ya se encuentra repetido",
            'required' => "Debe al menos seleccionar una categoria "
        ];
    }

}
