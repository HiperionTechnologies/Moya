<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AnnouncementFormRequest extends FormRequest
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
            'first_name' => 'required',
            'last_name' => 'required',
            'phone' => 'required',
            'brand' => 'required',
            'social' => 'required',
            'description' => 'required',
            'answer_moya' => 'required',
            'organic' => 'required',
            'local' => 'required',
            'artesanal' => 'required',
            'furniture' => 'required',
            'idSede' => 'required',
            'idCategory' => 'required',
        ];
    }

    public function messages(){
        return [
            'required' => 'El campo :attribute es obligatorio',
        ];
    }
}
