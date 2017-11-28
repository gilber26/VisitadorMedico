<?php

namespace Vmedic\Http\Requests;

use Vmedic\Http\Requests\Request;
use Illuminate\Foundation\Http\FormRequest;

class ClienteFormRequest extends FormRequest
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
            
            
            'Tipo_documento'=> 'required|max:50',
            'Numero_documento'=> 'required|max:50',
            'Direccion'=> 'required|max:50',
            'Telefono'=> 'required|max:50',
            'nombre'=> 'required|max:50'
       //,
       ];
    }
}
