<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateRol extends FormRequest
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
            'nombre' => ['required','string', Rule::unique('roles')->ignore($this->rol)],
            'descripcion' => 'required|string'
        ];
    }

    /**
    * Get the error messages for the defined validation rules.
    *
    * @return array
    */
    public function messages()
    {
        return [
            'required'  => 'El campo :attribute es requerido',
            'string'    => 'El campo :attribute debe ser un string',
            'unique'    => 'Ya existe un Rol con ese nombre'
        ];
    }
}
