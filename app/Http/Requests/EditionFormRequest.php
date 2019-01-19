<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditionFormRequest extends FormRequest
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
            'name' => 'required|max:100',
            'description' => 'required|max:500',
        ];
    }

    public function messages(){
        return [
            'name.required' => 'El nombre de la edicion es un dato obligatorio',
            'description.required' => 'La descripcion de la edicion es un dato obligatorio',
            'max' => 'Se ha excedido el limite de caracteres permitidos',
        ];
    }
}
