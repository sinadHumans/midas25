<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EntornoUpdateRequest extends FormRequest
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
            'comentarios' => ['required', 'string'],
            'tiempoVivir' => ['required', 'string', 'max:250'],
            'calle' => ['required', 'string', 'max:250'],
            'numero' => ['required', 'string', 'max:250'],
            'interior' => ['required', 'string', 'max:250'],
            'colonia' => ['required', 'string', 'max:250'],
            'entre' => ['required', 'string', 'max:250'],
            'delegacionMunicpio' => ['required', 'string', 'max:250'],
            'estado' => ['required', 'string', 'max:250'],
            'cp' => ['required', 'string', 'max:250'],
            'color' => ['required', 'string', 'max:250'],
            'tipo' => ['required', 'string', 'max:250'],
            'dondeEs' => ['required', 'string', 'max:250'],
            'ubicación' => ['required', 'string', 'max:250'],
            'idUsuario' => ['required', 'string', 'max:250'],
        ];
    }
}
