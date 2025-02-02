<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SaludUpdateRequest extends FormRequest
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
            'droga' => ['required', 'string', 'max:250'],
            'cualDroga' => ['required', 'string', 'max:250'],
            'fuma' => ['required', 'string', 'max:250'],
            'frecuenciaFuma' => ['required', 'string', 'max:250'],
            'bebidas' => ['required', 'string', 'max:250'],
            'frecuenciaBebidas' => ['required', 'string', 'max:250'],
            'cafe' => ['required', 'string', 'max:250'],
            'frecuenciaCafe' => ['required', 'string', 'max:250'],
            'lentes' => ['required', 'string', 'max:250'],
            'diagnostico' => ['required', 'string', 'max:250'],
            'intervenciones' => ['required', 'string', 'max:250'],
            'dequeintervenciones' => ['required', 'string', 'max:250'],
            'enfermedadesCronicas' => ['required', 'string', 'max:250'],
            'dequeCronicas' => ['required', 'string', 'max:250'],
            'hereditarias' => ['required', 'string', 'max:250'],
            'cualHereditarias' => ['required', 'string', 'max:250'],
            'quienConstante' => ['required', 'string', 'max:250'],
            'porqueConstante' => ['required', 'string', 'max:250'],
            'ultimaVez' => ['required', 'string', 'max:250'],
            'considera' => ['required', 'string', 'max:250'],
            'porqueConsidera' => ['required', 'string', 'max:250'],
            'deporte' => ['required', 'string', 'max:250'],
            'pasatiempo' => ['required', 'string', 'max:250'],
            'ultimavezDeque' => ['required', 'string', 'max:250'],
            'embarazo' => ['required', 'string', 'max:250'],
            'idUsuario' => ['required', 'string', 'max:250'],
        ];
    }
}
