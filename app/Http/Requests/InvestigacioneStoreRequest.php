<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InvestigacioneStoreRequest extends FormRequest
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
            'cuentaConstancia' => ['required', 'string', 'max:250'],
            'proporciono' => ['required', 'string', 'max:250'],
            'casoNo' => ['required', 'string', 'max:250'],
            'demandado' => ['required', 'string', 'max:250'],
            'actualmente' => ['required', 'string', 'max:250'],
            'estabilidad' => ['required', 'string', 'max:250'],
            'inactividad' => ['required', 'string', 'max:250'],
            'registoPatronal' => ['required', 'string', 'max:250'],
            'referenciayPeriodos' => ['required', 'string', 'max:250'],
            'dosEmpleos' => ['required', 'string', 'max:250'],
            'ausentismo' => ['required', 'string', 'max:250'],
            'abandono' => ['required', 'string', 'max:250'],
            'desempenoRegular' => ['required', 'string', 'max:250'],
            'omitio' => ['required', 'string', 'max:250'],
            'informacion' => ['required', 'string', 'max:250'],
            'referencias' => ['required', 'string', 'max:250'],
            'confiable' => ['required', 'string', 'max:250'],
            'comentarios' => ['required', 'string'],
            'notasLegales' => ['required', 'string', 'max:250'],
            'idUsuario' => ['required', 'string', 'max:250'],
        ];
    }
}
