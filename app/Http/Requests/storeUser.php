<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class storeUser extends FormRequest
{
    //protected $stopOnFirstFailure = true;
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|min:3',
            'lastname' => 'required|min:3',
            'document' => 'required|integer|unique:users,document|min:100000',
            'city' => 'required|not_in:0',
            'phone' => 'required|integer|min:1000000000|max:9999999999',
            'email' => 'required|email|unique:users,email',
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'Nombre',
            'lastname' => 'Apellido',
            'document' => 'Documento',
            'city' => 'Ciudad',
            'phone' => 'Telefono',
            'email' => 'Correo',
        ];
    }


    public function messages()
    {
        return [
            'name.required' => 'El Nombre es Requerido.',
            'name.min' => 'El Nombre debe tener almenos 3 caracteres.',
            'lastname.required' => 'El Apellido es Requerido.',
            'lastname.min' => 'El Apellido debe tener almenos 3 caracteres.',
            'document.required' => 'El Documento es Requerido.',
            'document.integer' => 'El Documento debe ser un numero.',
            'document.unique' => 'Este documento ya fue registrado.',
            'document.min' => 'El documento debe contener al menos 6 digitos.',
            'city.required' => 'La Ciudad es Requerida',
            'city.not_in' => 'Seleccione una Ciudad.',
            'phone.required' => 'El Telefono es Requerido.',
            'phone.integer' => 'El Telefono debe ser un numero.',
            'phone.min' => 'El Telefono debe contener 10 digitos.',
            'phone.max' => 'El Telefono debe contener 10 digitos.',
            'email.required' => 'El Correo es Requerido.',
            'email.email' => 'Correo no valido.',
            'email.unique' => 'Este Correo ya fue registrado.',
        ];
    }
}
