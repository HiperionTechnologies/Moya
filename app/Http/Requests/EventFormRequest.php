<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EventFormRequest extends FormRequest
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
            'idSede' => 'required',
            'gallery' => 'required',
            'street' => 'required|max:20',
            'number' => 'required|max:10',
            'colony' => 'required|max:20',
            //'latitude' => 'required|max:15',
            //'longitude' => 'required|max:15',
        ]; 
    }

    public function messages(){
        return [
            'required' => 'El campo :attribute es obligatorio',
            'max' => 'El campo :attribute excede el limite de caracteres que puede utilizar',
        ];
    }
}
