<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RefepersonaleUpdateRequest extends FormRequest
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
            'tiempoConocerlo' => ['required', 'string', 'max:250'],
            'relacion' => ['required', 'string', 'max:250'],
            'domicilio' => ['required', 'string', 'max:250'],
            'tel1' => ['required', 'string', 'max:250'],
            'opinion' => ['required', 'string'],
            'idUsuario' => ['required', 'string', 'max:250'],
        ];
    }
}
