<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UbicationEditFormRequest extends FormRequest
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
            'name' => 'required|max:50',
            'street' => 'required|max:100',
            'colony' => 'required|max:30',
            'idSede' => 'required',
        ];
    }

    public function messages(){
        return [
            'name.required' => 'El nombre es un dato obligatorio',
            'street.required' => 'La calle es un dato obligatorio',
            'colony.required' => 'La colonia es un dato obligatorio',
            'idSede.required' => 'La Sede es un dato obligatorio',
            'max' => 'Se ha excedido el numero máximo de caracteres',
        ];
    }
}
