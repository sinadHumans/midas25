<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HistoriallaboralStoreRequest extends FormRequest
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
            'vida' => ['required', 'string', 'max:250'],
            'nusemana' => ['required', 'string', 'max:250'],
            'porcentaje' => ['required', 'string', 'max:250'],
            'numeroempleadores' => ['required', 'string', 'max:250'],
            'progresion' => ['required', 'string', 'max:250'],
            'finiquito' => ['required', 'string', 'max:250'],
            'liquidacion' => ['required', 'string', 'max:250'],
            'aguinaldo' => ['required', 'string', 'max:250'],
            'vacaciones' => ['required', 'string', 'max:250'],
            'comentarios' => ['required', 'string', 'max:250'],
            'idUsuario' => ['required', 'string', 'max:250'],
            'idEstudio' => ['required', 'string', 'max:250'],
        ];
    }
}
