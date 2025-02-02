<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HobbyUpdateRequest extends FormRequest
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
            'idEstudio' => ['required', 'string', 'max:250'],
            'deportes' => ['required', 'string', 'max:250'],
            'cual' => ['required', 'string', 'max:250'],
            'frecuencia' => ['required', 'string', 'max:250'],
            'pasatiempos' => ['required', 'string', 'max:250'],
            'otros' => ['required', 'string', 'max:250'],
            'idUsuario' => ['required', 'string', 'max:250'],
        ];
    }
}
