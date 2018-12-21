<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DateFormRequest extends FormRequest
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
            'date' => 'required',
            'date2' => 'required',
            'date3' => 'required',
            'date4' => 'required',
            'date5' => 'required',
            'date6' => 'required',
            'date7' => 'required',
            'date8' => 'required',
            'date9' => 'required',
            'date10' => 'required',
        ];
    }

    public function messages(){
        return [
            'required' => 'El campo :attribute es obligatorio',
        ];
    }
}
