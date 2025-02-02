<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreditoStoreRequest extends FormRequest
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
            'fecha' => ['required', 'string', 'max:250'],
            'entidad' => ['required', 'string', 'max:250'],
            'monto' => ['required', 'string', 'max:250'],
            'total' => ['required', 'string', 'max:250'],
            'estatus' => ['required', 'string', 'max:250'],
            'comentario' => ['required', 'string'],
            'endeudamiento' => ['required', 'string', 'max:250'],
            'hipoteca' => ['required', 'string', 'max:250'],
            'score' => ['required', 'string', 'max:250'],
            'idUsuario' => ['required', 'string', 'max:250'],
            'idEstudio' => ['required', 'string', 'max:250'],
        ];
    }
}
