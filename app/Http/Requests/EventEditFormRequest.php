<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EventEditFormRequest extends FormRequest
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
            'description' => 'required|max:500',
            'idUbication' => 'required',
        ];
    }

    public function messages(){
        return [
            'name.required' => 'El nombre del evento es un dato obligatorio',
            'description.required' => 'La descripción del evento es un dato obligatorio',
            'idUbication.required' => 'La Ubicacion del evento es un dato obligatorio',
            'max' => 'Se ha excedido el numero maximo de caracteres',
        ];
    }
}
