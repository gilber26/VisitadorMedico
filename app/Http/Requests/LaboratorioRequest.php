<?php

namespace vMedic\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LaboratorioRequest extends FormRequest
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
            'NomLaboratorio' =>'required|max:50',
            'Nit' =>'required|max:10',
            'Correo' =>'required|max:20',
            'Telefono' =>'required|max:10',
            'Direccion' =>'required|max:50',
     ];
    }
}
