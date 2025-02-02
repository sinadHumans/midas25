<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InfonavitUpdateRequest extends FormRequest
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
            'estatus' => ['required', 'string', 'max:250'],
            'puntos' => ['required', 'string', 'max:250'],
            'subcuenta' => ['required', 'string', 'max:250'],
            'maximo' => ['required', 'string', 'max:250'],
            'hipoteca' => ['required', 'string', 'max:250'],
            'idEstudio' => ['required', 'string', 'max:250'],
            'idUsuario' => ['required', 'string', 'max:250'],
        ];
    }
}
