<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NivelacademicoStoreRequest extends FormRequest
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
     */
    public function rules(): array
    {
        return [
            'ultimo' => ['required', 'string', 'max:250'],
            'periodo' => ['required', 'string', 'max:250'],
            'profesional' => ['required', 'string', 'max:250'],
            'cedula' => ['required', 'string', 'max:250'],
            'especialidad' => ['required', 'string', 'max:250'],
            'caso' => ['required', 'string', 'max:250'],
            'idUsuario' => ['required', 'string', 'max:250'],
            'idEstudio' => ['required', 'string', 'max:250'],
            'otros' => ['required', 'string'],
        ];
    }
}
