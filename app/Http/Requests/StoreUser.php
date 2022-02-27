<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUser extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->user()->rol()->id == 1;
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
            'name'      => 'required|string',
            'email'     => ['required','unique:App\Models\User'],
            'password'  => 'required|confirmed',
            'id_rol'    => 'exists:App\Moldes\Rol,id'
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
            'confirmed' => 'Debe confirmar la contraseña',
            'exists'    => 'No existe el rol',
            'unique'    => 'Ya existe una cuenta con ese email'
        ];
    }
}
