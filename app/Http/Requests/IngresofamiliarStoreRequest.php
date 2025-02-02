<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class IngresofamiliarStoreRequest extends FormRequest
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
            'quien' => ['required', 'string', 'max:250'],
            'fuente' => ['required', 'string', 'max:250'],
            'monto' => ['required', 'string', 'max:250'],
            'total' => ['required', 'string', 'max:250'],
            'comentarios' => ['required', 'string'],
            'idUsuario' => ['required', 'string', 'max:250'],
        ];
    }
}
