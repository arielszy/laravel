<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'name' => 'required|max:25|min:2',
            'surname' => 'required|max:25|min:2',
            'address' => 'required|max:30|min:5',
            'DNI' => 'required|max:90000000|min:600000|integer',
            'email' => 'required|email',
            'phone' => 'required|digits_between:7,15|integer',
        ];
    }
    public function messages()
    {
        return [
            'phone.digits_between' => 'El telefono debe tener entre 7 y 15 caracteres',
            'required' => 'El :attribute es requerido',
            'max' => 'El :attribute es incorrecto',
            'min' => 'El :attribute es incorrecto',
            'DNI.integer' => 'El DNI debe ser un numero',
            'DNI.max' => 'Ingrese un DNI valido',
            'DNI.min' => 'Ingrese un DNI valido',
            'email' => 'El email debe tener un formato correcto',
        ];
    }


}
