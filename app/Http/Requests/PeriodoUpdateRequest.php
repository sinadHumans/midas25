<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PeriodoUpdateRequest extends FormRequest
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
            'inicio' => ['required', 'string', 'max:250'],
            'termino' => ['required', 'string', 'max:250'],
            'motivo' => ['required', 'string'],
            'comentarios' => ['required', 'string'],
            'idUsuario' => ['required', 'string', 'max:250'],
            'idEstudio' => ['required', 'string', 'max:250'],
        ];
    }
}
