<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RefelaboraleStoreRequest extends FormRequest
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
            'empresa' => ['required', 'string', 'max:250'],
            'giro' => ['required', 'string', 'max:250'],
            'direccion' => ['required', 'string', 'max:250'],
            'telefono' => ['required', 'string', 'max:250'],
            'fechaIngreso' => ['required', 'string', 'max:250'],
            'fechaEgreso' => ['required', 'string', 'max:250'],
            'puesto' => ['required', 'string', 'max:250'],
            'area' => ['required', 'string', 'max:250'],
            'salario' => ['required', 'string', 'max:250'],
            'motivoSalida' => ['required', 'string'],
            'quienProporciono' => ['required', 'string', 'max:250'],
            'puestoProporciono' => ['required', 'string', 'max:250'],
            'calificacion' => ['required', 'string', 'max:250'],
            'demanda' => ['required', 'string', 'max:250'],
            'volveria' => ['required', 'string', 'max:250'],
            'porque' => ['required', 'string'],
            'observaciones' => ['required', 'string'],
            'idUsuario' => ['required', 'string', 'max:250'],
            'candidatoes' => ['required', 'string', 'max:250'],
            'periodosInactivo' => ['required', 'string', 'max:250'],
        ];
    }
}
