<?php

namespace App\Http\Requests\Seguridad;

use Illuminate\Foundation\Http\FormRequest;

class AccesoFormRequest extends FormRequest
{
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
            'usuarioAlias' => 'required|exists:seg_usuario,usuarioAlias',
            'usuarioPassword' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'usuarioAlias.required' => 'El campo usuario es requerido.',
            'usuarioAlias.exists' => 'El usuario ingresado no está registrado en la base de datos.',
            'usuarioPassword.required' => 'El campo contraseña es requerido.'
        ];
    }
}
