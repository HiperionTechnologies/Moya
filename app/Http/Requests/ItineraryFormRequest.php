<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ItineraryFormRequest extends FormRequest
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
            'itinerary' => 'required',
            'time2' => 'required',
            'itinerary2' => 'required',
            'time3' => 'required',
            'itinerary3' => 'required',
            'time4' => 'required',
            'itinerary4' => 'required',
            'time5' => 'required',
            'itinerary5' => 'required',
            'time6' => 'required',
            'itinerary6' => 'required',
            'time7' => 'required',
            'itinerary7' => 'required',
            'time8' => 'required',
            'itinerary8' => 'required',
            'time9' => 'required',
            'itinerary9' => 'required',
            'time10' => 'required',
            'itinerary10' => 'required',
        ];
    }

    public function messages(){
        return [ 
            'required' => 'El campo :attribute es obligatorio',
        ];
    }
}
