<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ServiciomedicoUpdateRequest extends FormRequest
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
            'idUsuario' => ['required', 'string', 'max:250'],
            'infonavit' => ['required', 'string', 'max:250'],
            'clinicai' => ['required', 'string', 'max:250'],
            'incidentei' => ['required', 'string', 'max:250'],
            'tipoi' => ['required', 'string', 'max:250'],
            'imss' => ['required', 'string', 'max:250'],
            'clinicaim' => ['required', 'string', 'max:250'],
            'incidenteim' => ['required', 'string', 'max:250'],
            'tipoim' => ['required', 'string', 'max:250'],
            'issste' => ['required', 'string', 'max:250'],
            'clinicais' => ['required', 'string', 'max:250'],
            'incidenteis' => ['required', 'string', 'max:250'],
            'tipois' => ['required', 'string', 'max:250'],
            'seguro' => ['required', 'string', 'max:250'],
            'clinicase' => ['required', 'string', 'max:250'],
            'incidentese' => ['required', 'string', 'max:250'],
            'tipose' => ['required', 'string', 'max:250'],
            'privado' => ['required', 'string', 'max:250'],
            'aseguradora' => ['required', 'string', 'max:250'],
            'incidentepri' => ['required', 'string', 'max:250'],
            'tipopri' => ['required', 'string', 'max:250'],
            'issemym' => ['required', 'string', 'max:250'],
            'clinicaisse' => ['required', 'string', 'max:250'],
            'incidenteisse' => ['required', 'string', 'max:250'],
            'tipoisse' => ['required', 'string', 'max:250'],
            'idEstudio' => ['required', 'string', 'max:250'],
            'notiene' => ['required', 'string', 'max:250'],
        ];
    }
}
