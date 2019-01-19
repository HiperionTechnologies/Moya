<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GalleryFormRequest extends FormRequest
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
            'gallery' => 'required|image',
        ];
    }

    public function messages(){
        return [
            'required' => 'Selecciona una imagen',
            'image' => 'El archivo seleccionado no es una imagen',
        ];
    }
}
