<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ConclusioneStoreRequest extends FormRequest
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
            'acercaCandidato' => ['required', 'string', 'max:250'],
            'acercaFamilia' => ['required', 'string', 'max:250'],
            'conclucionesEntrevistador' => ['required', 'string', 'max:250'],
            'participacion' => ['required', 'string', 'max:250'],
            'entorno' => ['required', 'string', 'max:250'],
            'referencias' => ['required', 'string', 'max:250'],
            'comentariosGenerales' => ['required', 'string', 'max:250'],
            'analisisVerificacion' => ['required', 'string', 'max:250'],
            'atendio' => ['required', 'string', 'max:250'],
            'presento' => ['required', 'string', 'max:250'],
            'documentacionCompartida' => ['required', 'string', 'max:250'],
            'referenciasPersonales' => ['required', 'string', 'max:250'],
            'estatusfinal' => ['required', 'string', 'max:250'],
            'idUsuario' => ['required', 'string', 'max:250'],
        ];
    }
}
