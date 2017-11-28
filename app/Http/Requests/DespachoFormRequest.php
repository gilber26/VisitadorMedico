<?php

namespace Vmedic\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DespachoFormRequest extends FormRequest
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
            

            'Id_Pedido' =>'required|max:50',
            'Fecha_Despacho' =>'required|max:10',
        
        ];
    }
}
