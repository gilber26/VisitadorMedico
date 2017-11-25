<?php

namespace Vmedic\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;



class TipoUsuarioFormRequest extends FormRequest
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
            
            'NomTipoUsuario' => 'required|max:50',
        ];
    }
}
