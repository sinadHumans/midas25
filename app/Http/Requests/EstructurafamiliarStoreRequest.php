<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EstructurafamiliarStoreRequest extends FormRequest
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
            'familiar' => ['required', 'string', 'max:250'],
            'edad' => ['required', 'string', 'max:250'],
            'ocupacion' => ['required', 'string', 'max:250'],
            'laboraEstudia' => ['required', 'string', 'max:250'],
            'calle' => ['required', 'string', 'max:250'],
            'numero' => ['required', 'string', 'max:250'],
            'colonia' => ['required', 'string', 'max:250'],
            'delegacionMunicipio' => ['required', 'string', 'max:250'],
            'ciudad' => ['required', 'string', 'max:250'],
            'estado' => ['required', 'string', 'max:250'],
            'cpde' => ['required', 'string', 'max:250'],
            'tiempoReside' => ['required', 'string', 'max:250'],
            'tel1' => ['required', 'string', 'max:250'],
            'idUsuario' => ['required', 'string', 'max:250'],
        ];
    }
}
