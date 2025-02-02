<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EntornohabitacionalUpdateRequest extends FormRequest
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
            'tipoZona' => ['required', 'string', 'max:250'],
            'tipoVivienda' => ['required', 'string', 'max:250'],
            'edificacion' => ['required', 'string', 'max:250'],
            'titular' => ['required', 'string', 'max:250'],
            'parentesco' => ['required', 'string', 'max:250'],
            'numRecamaras' => ['required', 'string', 'max:250'],
            'sala' => ['required', 'string', 'max:250'],
            'comedor' => ['required', 'string', 'max:250'],
            'cocina' => ['required', 'string', 'max:250'],
            'garaje' => ['required', 'string', 'max:250'],
            'jardin' => ['required', 'string', 'max:250'],
            'nomBano' => ['required', 'string', 'max:250'],
            'tipobano' => ['required', 'string', 'max:250'],
            'viasdeacceso' => ['required', 'string', 'max:250'],
            'medioTransporte' => ['required', 'string', 'max:250'],
            'tiempoServicio' => ['required', 'string', 'max:250'],
            'entreCalles' => ['required', 'string', 'max:250'],
            'color' => ['required', 'string', 'max:250'],
            'porton' => ['required', 'string', 'max:250'],
            'referencias' => ['required', 'string', 'max:250'],
            'observaciones' => ['required', 'string'],
            'idUSuario' => ['required', 'string', 'max:250'],
            'agua' => ['required', 'string', 'max:250'],
            'luz' => ['required', 'string', 'max:250'],
            'pavimentacion' => ['required', 'string', 'max:250'],
            'telefono' => ['required', 'string', 'max:250'],
            'transporte' => ['required', 'string', 'max:250'],
            'vigilancia' => ['required', 'string', 'max:250'],
            'areas' => ['required', 'string', 'max:250'],
            'drenaje' => ['required', 'string', 'max:250'],
            'paredes' => ['required', 'string', 'max:250'],
            'techos' => ['required', 'string', 'max:250'],
            'pisos' => ['required', 'string', 'max:250'],
            'telNormal' => ['required', 'string', 'max:250'],
            'telPlasma' => ['required', 'string', 'max:250'],
            'estereo' => ['required', 'string', 'max:250'],
            'dvd' => ['required', 'string', 'max:250'],
            'blueray' => ['required', 'string', 'max:250'],
            'estufa' => ['required', 'string', 'max:250'],
            'horno' => ['required', 'string', 'max:250'],
            'lavadora' => ['required', 'string', 'max:250'],
            'centrolavado' => ['required', 'string', 'max:250'],
            'refrigerador' => ['required', 'string', 'max:250'],
            'computadora' => ['required', 'string', 'max:250'],
            'extensionInmueble' => ['required', 'string', 'max:250'],
            'condicionesInmueble' => ['required', 'string', 'max:250'],
            'condicionesMobiliario' => ['required', 'string', 'max:250'],
            'orden' => ['required', 'string', 'max:250'],
            'limpieza' => ['required', 'string', 'max:250'],
            'delincuencia' => ['required', 'string', 'max:250'],
            'vandalismo' => ['required', 'string', 'max:250'],
            'drogadiccion' => ['required', 'string', 'max:250'],
            'alcoholismo' => ['required', 'string', 'max:250'],
            'estudio' => ['required', 'string', 'max:250'],
            'zotehuela' => ['required', 'string', 'max:250'],
            'patio' => ['required', 'string', 'max:250'],
            'internet' => ['required', 'string', 'max:250'],
            'renta' => ['required', 'string', 'max:250'],
            'regadera' => ['required', 'string', 'max:250'],
        ];
    }
}
