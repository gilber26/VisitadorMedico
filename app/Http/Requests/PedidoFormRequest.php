<?php

namespace Vmedic\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PedidoFormRequest extends FormRequest
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
            'Id_Usuario' => 'required|max:50',
            'Id_Cliente'=> 'required|max:50',
            'Fecha_Registro'=> 'required|max:50',
            'Estado'=> 'required|max:50',
            'Cantidad'=> 'required|max:50',
            'Subtotal'=> 'required|max:50'
            

         
        ];
    }
}
