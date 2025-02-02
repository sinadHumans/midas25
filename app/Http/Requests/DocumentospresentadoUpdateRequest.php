<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DocumentospresentadoUpdateRequest extends FormRequest
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
            'documento' => ['required', 'string', 'max:250'],
            'ine' => ['required', 'string', 'max:250'],
            'comprobante' => ['required', 'string', 'max:250'],
            'acta' => ['required', 'string', 'max:250'],
            'cartas' => ['required', 'string', 'max:250'],
            'aviso' => ['required', 'string', 'max:250'],
            'comentarios' => ['required', 'string'],
            'idUsuario' => ['required', 'string', 'max:250'],
        ];
    }
}
