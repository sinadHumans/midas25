<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DocumentacionStoreRequest extends FormRequest
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
            'titulo' => ['required', 'string', 'max:250'],
            'observaciones' => ['required', 'string'],
            'archivo' => ['required', 'string'],
            'idUsuario' => ['required', 'string', 'max:250'],
            'folio' => ['required', 'string', 'max:250'],
            'seccion' => ['required', 'string', 'max:250'],
            'tipo' => ['required', 'string', 'max:250'],
        ];
    }
}
