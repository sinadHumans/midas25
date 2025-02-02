<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DeudaStoreRequest extends FormRequest
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
            'cuentaDeuda' => ['required', 'string', 'max:250'],
            'conQuien' => ['required', 'string', 'max:250'],
            'monto' => ['required', 'string', 'max:250'],
            'abonoMensual' => ['required', 'string', 'max:250'],
            'apagaren' => ['required', 'string', 'max:250'],
            'cuentaauto' => ['required', 'string', 'max:250'],
            'modelo' => ['required', 'string', 'max:250'],
            'placas' => ['required', 'string', 'max:250'],
            'valorAuto' => ['required', 'string', 'max:250'],
            'propiedad' => ['required', 'string', 'max:250'],
            'ubicacon' => ['required', 'string', 'max:250'],
            'idUsuario' => ['required', 'string', 'max:250'],
            'tarjetaCredito' => ['required', 'string', 'max:250'],
            'bancotarjetaCredito' => ['required', 'string', 'max:250'],
            'creditoAutorizado' => ['required', 'string', 'max:250'],
            'tarjetaTienda' => ['required', 'string', 'max:250'],
            'conquienTienda' => ['required', 'string', 'max:250'],
            'creditoAutorizadotienda' => ['required', 'string', 'max:250'],
            'observaciones' => ['required', 'string'],
        ];
    }
}
