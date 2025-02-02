<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ResumanStoreRequest extends FormRequest
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
            'social' => ['required', 'string', 'max:250'],
            'escolar' => ['required', 'string', 'max:250'],
            'economica' => ['required', 'string', 'max:250'],
            'laboral' => ['required', 'string', 'max:250'],
            'actitud' => ['required', 'string', 'max:250'],
            'observaciones' => ['required', 'string'],
            'recomendacion' => ['required', 'string'],
            'idUsuario' => ['required', 'string', 'max:250'],
            'observacionesPersonal' => ['required', 'string'],
            'observacionesLaboral' => ['required', 'string'],
            'cali' => ['required', 'string', 'max:250'],
        ];
    }
}
