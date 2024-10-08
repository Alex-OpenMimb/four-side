<?php

namespace App\Http\Requests\Seguridad;

use Illuminate\Foundation\Http\FormRequest;

class UsuarioRquest extends FormRequest
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
            'usuarioFoto' => 'required|image|mimes:jpeg,png,jpg|dimensions:max_width=1200,max_height=1200',
        ];
    }


    public function messages()
    {
        return [
            'usuarioFoto.required' => 'El campo usuario es requerido.',
            'usuarioFoto.image' => 'El archivo debe ser una imagen.',
            'usuarioFoto.mimes' => 'Solo se permiten imágenes .jpg, .jpeg o .png.',
        ];
    }
}
