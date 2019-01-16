<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PrincipalFormRequest extends FormRequest
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
            'title' => 'required|max:100',
            'description' => 'required|max:500',
            'image' => 'image',
        ];
    }

    public function messages(){
        return [
            'title.required' => 'El titulo es un dato obligatorio',
            'description.required' => 'La descripción es un dato obligatorio',
            'image.required' => 'La imagen es obligatoria',
            'max' => 'Se ha excedido el numero maximo de caracteres',
            'image' => 'El archivo seleccionado no es una imagen',
        ];
    }
}
