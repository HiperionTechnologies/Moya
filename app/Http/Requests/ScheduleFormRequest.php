<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ScheduleFormRequest extends FormRequest
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
            'time' => 'required',
            'hour1' => 'required',
            'itinerary1' => 'required',
            'hour2' => 'required',
            'itinerary2' => 'required',
            'hour3' => 'required',
            'itinerary3' => 'required',
            'hour4' => 'required',
            'itinerary4' => 'required',
            'hour5' => 'required',
            'itinerary5' => 'required',
            'hour6' => 'required',
            'itinerary6' => 'required',
            'hour7' => 'required',
            'itinerary7' => 'required',
            'hour8' => 'required',
            'itinerary8' => 'required',
            'hour9' => 'required',
            'itinerary9' => 'required',
            'hour10' => 'required',
            'itinerary10' => 'required',
        ];
    }

    public function messages(){
        return [
            'required' => 'El campo :attribute es obligatorio',
        ];
    }
}
