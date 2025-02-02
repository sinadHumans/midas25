<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EgresofamiliareStoreRequest extends FormRequest
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
            'ahorro' => ['required', 'string', 'max:250'],
            'alimentacion' => ['required', 'string', 'max:250'],
            'transporte' => ['required', 'string', 'max:250'],
            'seguros' => ['required', 'string', 'max:250'],
            'luz' => ['required', 'string', 'max:250'],
            'tv' => ['required', 'string', 'max:250'],
            'gas' => ['required', 'string', 'max:250'],
            'celular' => ['required', 'string', 'max:250'],
            'agua' => ['required', 'string', 'max:250'],
            'total' => ['required', 'string', 'max:250'],
            'comentarios' => ['required', 'string'],
            'idUsuario' => ['required', 'string', 'max:250'],
        ];
    }
}
