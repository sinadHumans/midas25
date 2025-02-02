<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AvisoUpdateRequest extends FormRequest
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
            'titulo' => ['required', 'string', 'max:250'],
            'mensaje' => ['required', 'string'],
            'dirigido' => ['required', 'string', 'max:250'],
            'tipo' => ['required', 'string'],
            'estatus' => ['required', 'string'],
            'idUsuario' => ['required', 'string', 'max:250'],
        ];
    }
}
