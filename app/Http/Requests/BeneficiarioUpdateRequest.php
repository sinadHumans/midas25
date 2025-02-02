<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BeneficiarioUpdateRequest extends FormRequest
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
            'idUsuario' => ['required', 'string', 'max:250'],
            'parentesco' => ['required', 'string', 'max:250'],
            'nombre' => ['required', 'string', 'max:250'],
            'edad' => ['required', 'string', 'max:250'],
            'ocupacion' => ['required', 'string', 'max:250'],
            'donde' => ['required', 'string', 'max:250'],
            'calle' => ['required', 'string', 'max:250'],
            'numero' => ['required', 'string', 'max:250'],
            'colonia' => ['required', 'string', 'max:250'],
            'delegacion' => ['required', 'string', 'max:250'],
            'ciudad' => ['required', 'string', 'max:250'],
            'estado' => ['required', 'string', 'max:250'],
            'cp' => ['required', 'string', 'max:250'],
            'tiempo' => ['required', 'string', 'max:250'],
            'telefono' => ['required', 'string', 'max:250'],
        ];
    }
}
