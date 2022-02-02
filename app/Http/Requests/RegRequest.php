<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegRequest extends FormRequest
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
            'DNI' => 'required|max:90000000|min:600000|integer',
            'Importe' => 'required|max:250000|min:1|double',
            'Puntos' => 'required|max:250000|min:1|double',
            'inlineRadioOptions'=> 'required',
        ];
    }
    public function messages()
    {
        return [
            'required' => 'El :attribute es requerido',
            'max' => 'El :attribute supera el maximo (250000)',
            'min' => 'El :attribute no llega al minimo (1)',
            'double' => 'El :attribute debe ser un numero',
        ];
    }

}
