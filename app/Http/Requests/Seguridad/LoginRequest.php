<?php

namespace App\Http\Requests\Seguridad;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
            'usuarioEmail' => 'required|exists:seg_usuario,usuarioEmail',
        ];
    }


    public function messages()
    {
        return [
            'usuarioEmail.required' => 'El campo usuario es requerido.',
            'usuarioEmail.exists' => 'El correo ingresado no se encuentra en la base de datos.',
        ];
    }
}
