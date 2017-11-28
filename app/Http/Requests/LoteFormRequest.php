<?php

namespace Vmedic\Http\Requests;

use Vmedic\Http\Requests\Request;
use Illuminate\Foundation\Http\FormRequest;

class LoteFormRequest extends FormRequest
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
            'Id_laboratorio' => 'required|max:50',
            'NumRemision'=> 'required|max:50',
            'FechaRemision'=> 'required|max:50',
            'FechaRemision'=> 'required|max:50',
            'Cantidad'=> 'required|max:50',
            'Costo'=> 'required|max:50',
            'Precio'=> 'required',
            'Fecha_Vencimiento'=> 'required|max:50',
            'Stock_Lote'=> 'required|max:50',

         
        ];
    }
}
