<?php

namespace Vmedic\Http\Requests;

use Vmedic\Http\Requests\Request;
use Illuminate\Foundation\Http\FormRequest;

class UsuarioFormRequest extends FormRequest
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
            'id_tipousuario' => 'required|max:50',
            'Nombres'=> 'required|max:50',
            'Apellidos'=> 'required|max:50',
            'Identificacion'=> 'required|max:10',
            'Correo'=> 'required|max:50',
            'Clave'=> 'required|max:50',
            'Direccion'=> 'required|max:50',
            'Estado'=> 'required|max:50',

        ];
    }
}
