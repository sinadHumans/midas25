<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SituacionUpdateRequest extends FormRequest
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
            'nombre' => ['required', 'string', 'max:250'],
            'parentesco' => ['required', 'string', 'max:250'],
            'salario' => ['required', 'string', 'max:250'],
            'ingreso' => ['required', 'string', 'max:250'],
            'concepto' => ['required', 'string', 'max:250'],
            'egresos' => ['required', 'string', 'max:250'],
            'observaciones' => ['required', 'string'],
            'superavit' => ['required', 'string', 'max:250'],
            'idUsuario' => ['required', 'string', 'max:250'],
        ];
    }
}
