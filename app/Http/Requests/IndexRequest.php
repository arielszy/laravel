<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class IndexRequest extends FormRequest
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

        ];
    }
    public function messages()
    {
        return [
            'DNI.required' => 'El DNI es requerido',
            'DNI.integer' => 'El DNI debe ser un numero',
            'DNI.max' => 'El DNI es incorrecto',
            'DNI.min' => 'El DNI es incorrecto',
        ];
    }
}
