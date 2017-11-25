<?php

namespace Vmedic\Http\Requests;

use Vmedic\Http\Requests\Request;
use Illuminate\Foundation\Http\FormRequest;


class ProductoFormRequest extends FormRequest
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
            
            'Id_TipoProducto' => 'required|max:50',
            'NomProducto'=> 'required|max:50',
            'Descripcion'=> 'required|max:50',
            'Estado'=> 'required|max:10',
            

        ];
    }
}
