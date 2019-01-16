<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StatisticFormRequest extends FormRequest
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
            'editions' => 'required|max:100',
            'brands' => 'required|max:100',
            'customers' => 'required|max:100',
            'sales' => 'required|max:100',
        ];
    }

    public function messages(){
        return [
            'editions.required' => 'Estadistica de ediciones es obligatorio',
            'brands.required' => 'Estadistica de marcas es obligatorio',
            'customers.required' => 'Estadistica de clientes es obligatorio',
            'sales.required' => 'Estadistica de ventas es obligatorio',
            'max' => 'Se ha excedido el numero máximo de caracteres',
        ];
    }
}
