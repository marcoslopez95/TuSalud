<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateUser extends FormRequest
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
            //
            'name'                  => 'required|string',
            'email'                 => ['required',Rule::unique('users')->ignore($this->user)],
            'password'              => 'required|confirmed',
            'password_confirmation' => 'required',
            'id_rol'                => 'exists:App\Models\Rol,id'
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
            'required'  => 'El :attribute es requerido',
            'string'    => 'El campo :attribute debe ser un texto',
            'confirmed' => 'La contraseña no coincide',
            'exists'    => 'No existe el rol',
            'unique'    => 'Ya existe una cuenta con ese email'
        ];
    }
}
