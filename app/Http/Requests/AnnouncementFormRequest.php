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
            'first_name' => 'required|max:50',
            'last_name' => 'required|max:50',
            'phone' => 'required|max:20|regex:/^[0-9]*/',
            'brand' => 'required|max:20',
            'social' => 'required',
            'description' => 'required|max:500',
            'image' => 'required|image',
            'answer_moya' => 'required|max:200',
            'organic' => 'required',
            'local' => 'required',
            'artesanal' => 'required',
            'furniture' => 'required',
            //'idSede' => 'required',
            'idCategory' => 'required',
            'photos[0]' => 'image',
            'name_interested' => 'max:50',
            'phone_interested' => 'max:20|regex:/^[0-9]*/',
            'email_interested' => 'max:50|email',
        ];
    }

    public function messages(){
        return [
            'first_name.required' => 'Su nombre es un dato obligatorio',
            'last_name.required' => 'Los apellidos son un dato obligatorio',
            'phone.required' => 'El telefono es un dato obligatorio',
            'brand.required' => 'La marca es un dato obligatorio',
            'social.required' => 'Sus redes sociales son un dato obligatorio',
            'description.required' => 'La descripcion de la marca es un dato obligatorio',
            'image.required' => 'La imagen representativa es obligatoria',
            'image.image' => 'El archivo seleccionado no es una imagen',
            'answer_moya.required' => 'Su respuesta es requerida',
            'organic.required' => 'Seleccione una de las opciones',
            'local.required' => 'Seleccione una de las opciones',
            'artesanal.required' => 'Seleccione una de las opciones',
            'furniture.required' => 'Seleccione una de las opciones',
            //'idSede.required' => 'Seleccione una de las sedes disponibles',
            'idCategory.required' => 'Seleccione una categoria',
            'photos[0].image' => 'Uno o mas archivos seleccionados no son imagenes',
            'max' => 'Se ha excedido el numero maximo de caracteres',
            'regex' => 'Ingrese solamente numeros',
            'email' => 'No es un email valido',
        ];
    }
}
