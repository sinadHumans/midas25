<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GradoEstudioStoreRequest extends FormRequest
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
            'grado' => ['required', 'string', 'max:250'],
            'nombre' => ['required', 'string', 'max:250'],
            'lugar' => ['required', 'string', 'max:250'],
            'periodo' => ['required', 'string', 'max:250'],
            'documento' => ['required', 'string', 'max:250'],
            'folio' => ['required', 'string', 'max:250'],
            'idUsuario' => ['required', 'string', 'max:250'],
        ];
    }
}
