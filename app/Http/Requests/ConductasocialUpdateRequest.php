<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ConductasocialUpdateRequest extends FormRequest
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
            'quienEstuvo' => ['required', 'string', 'max:250'],
            'conductaEntrevistado' => ['required', 'string', 'max:250'],
            'relacionVecinos' => ['required', 'string', 'max:250'],
            'pertenecegrupo' => ['required', 'string', 'max:250'],
            'problemasLegales' => ['required', 'string', 'max:250'],
            'familiarRecluido' => ['required', 'string', 'max:250'],
            'familiaresAdentro' => ['required', 'string', 'max:250'],
            'idUsuario' => ['required', 'string', 'max:250'],
        ];
    }
}
