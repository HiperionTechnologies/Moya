<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UbicationFormRequest extends FormRequest
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
            'latitude' => 'required',
            'longitude' => 'required',
        ];
    }

    public function messages(){
        return [
            'name.required' => 'El nombre es un dato obligatorio',
            'street.required' => 'La calle es un dato obligatorio',
            'colony.required' => 'La colonia es un dato obligatorio',
            'idSede.required' => 'La Sede es un dato obligatorio',
            'max' => 'Se ha excedido el numero máximo de caracteres',
            'latitude.required' => 'Obtenga la latitud del mapa dando click en el boton: Encontrar Ubicacion',
            'longitude.required' => 'Obtenga la longitud del mapa dando click en el boton: Encontrar Ubicacion',
        ];
    }
}
